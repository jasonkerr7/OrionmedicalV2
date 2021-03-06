<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;
use OrionMedical\Models\LabRequest;
use OrionMedical\Models\Labs;
use OrionMedical\Models\LabDocs;
use OrionMedical\Models\AccountType;
use OrionMedical\Models\Bill;
use OrionMedical\Models\Payments;
use OrionMedical\Models\Customer;
use OrionMedical\Models\Images;
use OrionMedical\Models\Company;
use OrionMedical\Models\OPD;
use OrionMedical\Models\ServiceCharge;
use OrionMedical\Models\PatientInvestigation;
use OrionMedical\Models\LabTestResult;
use OrionMedical\Models\LabResultDrop;
use OrionMedical\Models\PatientDiagnosis;
use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;
use Input;
use Response;
use Carbon\Carbon;
use DB;
use Auth;
use OneSignal;

class LabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company = Company::get()->first();
        $patients = Customer::get();
        $billingaccounts = AccountType::get();
         $investigations = ServiceCharge::where('department','Laboratory')->orwhere('department','Radiology')->orderBy('type', 'ASC')->get();
    	 
          $today =        Carbon::now()->format('Y-m-d').'%';

          if(Auth::user()->getRole()=="Laboratory")
          {
         $myrequests = DB::table('patient_investigation')
                     ->select(DB::raw('uuid,patientid,patient_name,GROUP_CONCAT(investigation) as investigation,visitid,created_by,created_on,GROUP_CONCAT(status) as status'))
                     ->where('type','Laboratory')
                     ->groupBy('visitid')
                     ->orderBy('created_on','desc')
                    ->paginate(30);
          }
            else
            {
                $myrequests = DB::table('patient_investigation')
                ->select(DB::raw('uuid,patientid,patient_name,GROUP_CONCAT(investigation) as investigation,visitid,created_by,created_on,GROUP_CONCAT(status) as status'))
                ->groupBy('visitid')
                ->orderBy('created_on','desc')
               ->paginate(30);

            }

        // $myrequests = PatientInvestigation::where('type','Laboratory')->orderby('created_on','desc')->groupby('visitid')->paginate(10);

         return view('laboratory.index',compact('myrequests','billingaccounts','investigations','patients','company'));
    }


    public function doAnalysis($id)
    {
        $biochemistry = LabRequest::where('category','Biochemistry')->orderby('seq','asc')->get();
        $pathology = LabRequest::where('category','Pathology')->orderby('seq','asc')->get();
        $haematology = LabRequest::where('category','Haematology')->orderby('seq','asc')->get();
        $serology = LabRequest::where('category','Serology')->orderby('seq','asc')->get();
        $microbiology = LabRequest::where('category','microbiology')->orderby('seq','asc')->get();
        $resultselector = LabResultDrop::get();


        
        
        //dd($haematology);

         $visitdetails  =    OPD::where('opd_number' ,'=', $id)->first();
         $images       =    Images::where('visit_number' ,$visitdetails->opd_number)->where('source','Laboratory')->get();

         if(Auth::user()->getRole()=="Laboratory")
         {
         $tests         = PatientInvestigation::where('type','Laboratory')->where('visitid' ,'=', $id)->get();
         }
         else
         {
            $tests         = PatientInvestigation::where('visitid' ,'=', $id)->get();
         }


         $myheamatologylabs = LabTestResult::where('labid',$visitdetails->opd_number)->where('category','haematology')->get();
         $mybiochemistrylabs = LabTestResult::where('labid',$visitdetails->opd_number)->where('category','biochemistry')->get();
         $mypathologylabs = LabTestResult::where('labid',$visitdetails->opd_number)->where('category','pathology')->get();
         $myserologylabs = LabTestResult::where('labid',$visitdetails->opd_number)->where('category','serology')->get();
         $mymicrobiologylabs = LabTestResult::where('labid',$visitdetails->opd_number)->where('category','microbiology')->get();


         //dd($myserologylabs);

         $bills              = Bill::where('visit_id', $id)->orderBy('date', 'desc')->get();
        $paiditems          = Payments::where('EventID', $id)->get();
    
        $payables = 0;
        $receivables = 0;
        $outstanding=0;

        foreach($bills as $bill)
       {
            $payables += ($bill->rate * $bill->quantity);
       }

       foreach($paiditems as $paiditem)
       {
            $receivables += ($paiditem->AmountReceived);
       }

        $outstanding = ($payables - $receivables);
        //dd($payables);

        $patients   =   Customer::where('patient_id' ,'=', $visitdetails->patient_id)->first();
        $mydiagnosis    =   PatientDiagnosis::where('visitid',$id)->get();

        return view('laboratory.test',compact('patients','mydiagnosis','myheamatologylabs','microbiology','mymicrobiologylabs','mybiochemistrylabs','mypathologylabs','myserologylabs','receivables','outstanding','images','biochemistry','resultselector','payables','visitdetails','parameters','tests','pathology','haematology','serology'));
    }



    public function fbc($id)
    {
        $fbc = LabRequest::where('category','FBC')->orderby('seq','asc')->get();
      
        
        //dd($haematology);

         $visitdetails  =    OPD::where('opd_number' ,'=', $id)->first();
         $images        =    Images::where('accountnumber' ,$visitdetails->patient_id)->where('source','Laboratory')->get();
         $tests         = PatientInvestigation::where('type','Laboratory')->where('visitid' ,'=', $id)->get();

          $bills              = Bill::where('visit_id' ,'=', $id)->where('note', 'Unpaid')->where('category','Laboratory')->orderBy('date', 'ASC')->get();
          $payables = 0;


        foreach($bills as $bill)
       {
            $payables += ($bill->rate * $bill->quantity);
       }
        //dd($payables);

        $patients   =   Customer::where('patient_id' ,'=', $visitdetails->patient_id)->first();

        return view('laboratory.fbc',compact('patients','images','fbc','visitdetails','tests'));
    }

    public function bfformps($id)
    {
        $fbc = LabRequest::where('category','BF FOR MPS')->orderby('seq','asc')->get();
      
        
        //dd($haematology);

         $visitdetails  =    OPD::where('opd_number' ,'=', $id)->first();
         $images        =    Images::where('accountnumber' ,$visitdetails->patient_id)->where('source','Laboratory')->get();
         $tests         = PatientInvestigation::where('type','Laboratory')->where('visitid' ,'=', $id)->get();
          $resultselector = LabResultDrop::get();

          $bills              = Bill::where('visit_id' ,'=', $id)->where('note', 'Unpaid')->where('category','Laboratory')->orderBy('date', 'ASC')->get();
          $payables = 0;


        foreach($bills as $bill)
       {
            $payables += ($bill->rate * $bill->quantity);
       }
        //dd($payables);

        $patients   =   Customer::where('patient_id' ,'=', $visitdetails->patient_id)->first();

        return view('laboratory.bf',compact('patients','images','fbc','visitdetails','tests','resultselector'));
    }


    public function malaria($id)
    {
        $fbc = LabRequest::where('category','MALARIA ANTIGEN')->orderby('seq','asc')->get();
      
        
        //dd($haematology);

         $visitdetails  =    OPD::where('opd_number' ,'=', $id)->first();
         $images        =    Images::where('accountnumber' ,$visitdetails->patient_id)->where('source','Laboratory')->get();
         $tests         = PatientInvestigation::where('type','Laboratory')->where('visitid' ,'=', $id)->get();
          $resultselector = LabResultDrop::get();

          $bills              = Bill::where('visit_id' ,'=', $id)->where('note', 'Unpaid')->where('category','Laboratory')->orderBy('date', 'ASC')->get();
          $payables = 0;


        foreach($bills as $bill)
       {
            $payables += ($bill->rate * $bill->quantity);
       }
        //dd($payables);

        $patients   =   Customer::where('patient_id' ,'=', $visitdetails->patient_id)->first();

        return view('laboratory.bf',compact('patients','images','fbc','visitdetails','tests','resultselector'));
    }


     public function bloodgroup($id)
    {
        $fbc = LabRequest::where('category','BLOOD GROUPING')->orderby('seq','asc')->get();
      
        
        //dd($haematology);

         $visitdetails  =    OPD::where('opd_number' ,'=', $id)->first();
         $images        =    Images::where('accountnumber' ,$visitdetails->patient_id)->where('source','Laboratory')->get();
         $tests         = PatientInvestigation::where('type','Laboratory')->where('visitid' ,'=', $id)->get();
          $resultselector = LabResultDrop::get();

          $bills              = Bill::where('visit_id' ,'=', $id)->where('note', 'Unpaid')->where('category','Laboratory')->orderBy('date', 'ASC')->get();
          $payables = 0;


        foreach($bills as $bill)
       {
            $payables += ($bill->rate * $bill->quantity);
       }
        //dd($payables);

        $patients   =   Customer::where('patient_id' ,'=', $visitdetails->patient_id)->first();

        return view('laboratory.bf',compact('patients','images','fbc','visitdetails','tests','resultselector'));
    }





    public function getlabstypes()
    {

         $investigations = LabRequest::orderby('type','asc')->get();
         $tests = ServiceCharge::where('department','Laboratory')->orderBy('type', 'ASC')->paginate(30);
         return view('laboratory.type',compact('tests','investigations'));
    }

    public function collectionslip($id)
    {
        $company = Company::get()->first();
        $patientid = PatientInvestigation::where('type','Laboratory')->where('visitid',$id)->first();
        $patients = Customer::where('patient_id',$patientid->patientid)->first();
        $labrequest = PatientInvestigation::where('type','Laboratory')->where('visitid',$id)->get();

        return view('laboratory.slip',compact('patients','labrequest','company'));
    }

     public function findtestresult(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

            $search = $request->get('search');

         $patients = Customer::get();
         $investigations = ServiceCharge::where('department','Laboratory')->orderBy('type', 'ASC')->get();
         $myrequests = PatientInvestigation::where('investigation', 'like', "%$search%")
            ->where('type','Laboratory')
            ->orwhere('visitid', 'like', "%$search%")
            ->orwhere('patient_name', 'like', "%$search%")
            ->orderBy('patient_name','asc')
            ->paginate(30)
            ->appends(['search' => $search])
        ;

     return view('laboratory.index',compact('myrequests','investigations','patients'));
    
    }


    public function findtest(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

            $search = $request->get('search');

            $tests =ServiceCharge::where('department','Laboratory')
            ->where('status','Active')
            ->orderBy('type')
            ->paginate(30)
            ->appends(['search' => $search])
        ;

       return view('laboratory.type',compact('tests'));
    
    }



    public function findLabRequest(Request $request)
    {
      

       
    
    }

    public function getCheckedIn()
    {
        $servicetype    = ServiceType::orderBy('description', 'ASC')->get();
        $departments    = Department::get();
        $doctors        = Doctor::get();
        $patients       = OPD::where('status','Checked-In')->orderBy('created_on', 'DESC')->paginate(30);
        return view('laboratory.visit', compact('patients'))
        ->with('doctors',$doctors)
        ->with('servicetype',$servicetype)
        ->with('departments',$departments);
    }


    public function newrequest()
    {
        
         $myrequest = Labs::get();
         return view('laboratory.new',compact('myrequest'));
    }

    
    public function newLabRequest()
    {
        $myrequest = Labs::get();
         return view('laboratory.new',compact('myrequest'));
    }

    public function viewrequest($id)
    {

       
         $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->first();
         $myrequest = Labs::where('visitid',$labrequest->visitid)->where('testname',$labrequest->investigation)->first();
         
         if($myrequest)
         {
         return view('laboratory.view',compact('myrequest','patients','labrequest'));
        
        }

        else
        {
            return view('errors.403');
        }
        

    }

    public function newBodyFluidRequest($id)
    {
          $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
         $myrequest = LabDocs::where('id',2)->get();
         return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }

    public function newDrugAlcoholRequest($id)
    {   
        $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
         $myrequest = LabDocs::where('id',3)->get();
        return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }


     public function newHormonalRequest($id)
    {
       $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
         $myrequest = LabDocs::where('id',5)->get();
        return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }



    public function newSurgicalRequest($id)
    {
         $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
         $myrequest = LabDocs::where('id',6)->get();
         return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }

     public function newMicrobiologyRequest($id)
    {
        $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
          $myrequest = LabDocs::where('id',9)->get();
          return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }

     public function testsave(Request $request)
    {
        $input = $request->all();

        //dd($input);
        $resultskey = uniqid();

         

        if($input['template']== 'heamatology')
        {
            $doupdate = $input['requested_test'];
        }
        elseif($input['template']== 'biochemistry')
        {
            $doupdate = $input['requested_test1'];
        }
        elseif($input['template']== 'pathology')
        {
            $doupdate = $input['requested_test2'];
        }
        elseif($input['template']== 'serology')
        {
            $doupdate = $input['requested_test3'];
        }

        elseif($input['template']== 'microbiology')
        {
            $doupdate = $input['requested_test4'];
        }
        else
        {
            $doupdate = $input['requested_test'];
        }
        

       // $labtypes = $input['requested_test'];
        if($doupdate)
        {$labtypes =  implode(", ", $doupdate);} 
        else {$labtypes = null;}
        //dd($doupdate);

        $affectedRows = LabTestResult::where('labid', $input['opd_number'])->where('category',$input['template'])->delete();

        for($i=0; $i<= count($input['test_name']); $i++) {
            
           
            if(empty($input['test_name'][$i])) continue;
            
            

           $data = [ 
           'labid' => $input['opd_number'],
           'type' => $labtypes,
           'result_id' => $resultskey,
           'category' => $input['template'],
           'test' => $input['test_name'][$i],
           'result' => $input['test_result'][$i],
           'range' => $input['test_range'][$i],
            //'template' => $input['template'],
           'interpretation' => $input['test_interpretation'][$i],
            //'impression' => $input['test_impression'][$i],
           'created_on' => Carbon::now(),
           'created_by' => Auth::user()->getNameOrUsername()
          ];

            //dd($data);
            LabTestResult::create($data);
           // PatientInvestigation::where('visitid', $input['opd_number'])->where('type','Laboratory')->where('investigation','like','%' .$input['requested_test']. '%')->update(array('status' => 'Partially Ready - Pending Approval'));

        }

        foreach($doupdate as $key => $doupdaterecord) 
        {
            PatientInvestigation::where('visitid', $input['opd_number'])->where('type','Laboratory')->where('investigation',$doupdaterecord)->update(array('status' => 'Ready','result_id'=>$resultskey,'processed_on'=>Carbon::now(),'processed_by'=>Auth::user()->getNameOrUsername()));

        }

            return redirect()
            ->back()
            ->with('success','Result saved successfully');
    }

     public function newHaematologyRequest($id)
    {
         $labrequest = PatientInvestigation::where('type','Laboratory')->where('id',$id)->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->get();
         $myrequest = LabDocs::where('id',8)->get();
         return view('laboratory.request',compact('myrequest','patients','labrequest'));
    }

    public function newlabreport(Request $request)
    {
        $result = $request->input('patientid');
        //dd($result);

        $report                  = new Labs;
        $report->request_type    = $request->input('report');
        $report->patientid       = $request->input('patientid');
        $report->visitid         = $request->input('visitid');
        $report->testname        = $request->input('investigation');
        $report->created_on      = Carbon::now();
        $report->created_by      = Auth::user()->getNameOrUsername();
        
        if($report->save())
        {


              $affectedRows = PatientInvestigation::where('visitid', '=', $request->input('visitid'))->where('type','Laboratory')->where('investigation',$request->input('investigation'))
            ->update(array(
                           'status'       => 'Partially Ready',
                           'processed_on' => Carbon::now(),
                           'processed_by' => Auth::user()->getNameOrUsername()));

            if($affectedRows > 0)
            {
        
            return redirect()
            ->route('laboratory')
            ->with('info','Test successfully been processed!');
            }

        }
       
    }

    public function savelabrequest(Request $request)
    {
        $result = $request->input('report');
        //dd($result);

        $event         = new LabDocs;
        $event->doc    = $request->input('report');
        $event->save();
    
    }

    Public function loadTestResults()
    {


    try
    {
            $opd_number = Input::get("opd_number");
            $results = LabTestResult::where('labid','=',$opd_number)->get();
            return  Response::json($results);
    }

    catch (\Exception $e) 
    { 
           echo $e->getMessage();
        
    }


    }

    public function saveTestResults()
    {

    //   $parameters = Input::get('item');
    // //dd($salary_checked);
      
    // if(is_array($parameters))
    // {
    //   foreach($parameters as $parameters)
    //   {
    //        $labs         = new LabTestResult;
    //        $labs->labid  = Input::get('labid');
    //        $labs->test   = Input::get('parameter');
    //        $labs->result = Input::get('result');
    //        $labs->comment = Input::get('comment');
    //        //$labs->range  = $testsrange->range;
    //        $labs->save();

    //   }

    // }

    // return redirect()
    //         ->route('laboratory')
    //         ->with('success','hash_algos');
         
          
                          
           
    }


    public function excludeLabResult()
   {
        if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = LabTestResult::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                $ini   = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini   = array('No Data'=>$ID);
                return  Response::json($ini);
            }
        }
        else
        {
           $ini   = array('No Data'=>'No Data');
           return  Response::json($ini);
        }

   }


   public function printResultsMaster($id)
   {

        $myresultsid = $id;
      
        //$labresults = LabTestResult::where('labid',$myresultsid)->where('result','<>',null)->get();

        $labresults          = LabTestResult::where('labid', $myresultsid)->where('result','<>',null)->get()->groupBy(function($item) {
            return $item->type;
        });

        //dd($labresults);

        $labrequest = PatientInvestigation::where('visitid',$myresultsid)->where('type','Laboratory')->first();
        $patients = Customer::where('patient_id',$labrequest->patientid)->first();
        $tests = PatientInvestigation::where('visitid' ,'=', $id)->where('type','Laboratory')->get();
        
        
        return view('laboratory.result',compact('patients','labrequest','labresults','tests'));
      
      
      
       

   }

   public function printResults($id,$category)
    {

       
         $labresults = LabTestResult::where('labid',$id)->where('category',$category)->where('result','<>',null)->get();
         $labrequest = PatientInvestigation::where('visitid',$id)->where('type','Laboratory')->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->first();
          $tests = PatientInvestigation::where('visitid' ,'=', $id)->where('type','Laboratory')->get();
         
         if($labresults)
         {
         return view('laboratory.result',compact('patients','labrequest','labresults','tests'));
        
        }

        else
        {
            return view('errors.403');
        }
        

    }


    public function printResultsBio($id)
    {

       
         $labresults = LabTestResult::where('labid',$id)->get();
         $labrequest = PatientInvestigation::where('visitid',$id)->where('type','Laboratory')->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->first();
          $tests = PatientInvestigation::where('visitid' ,'=', $id)->where('type','Laboratory')->get();
         
         if($labresults)
         {
         return view('laboratory.biochemistry',compact('patients','labrequest','labresults','tests'));
        
        }

        else
        {
            return view('errors.403');
        }
        

    }


    public function printResultsPath($id)
    {

       
         $labresults = LabTestResult::where('labid',$id)->get();
         $labrequest = PatientInvestigation::where('visitid',$id)->where('type','Laboratory')->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->first();
          $tests = PatientInvestigation::where('visitid' ,'=', $id)->where('type','Laboratory')->get();
         
         if($labresults)
         {
         return view('laboratory.pathology',compact('patients','labrequest','labresults','tests'));
        
        }

        else
        {
            return view('errors.403');
        }
        

    }

    public function printResultsSero($id)
    {

       
         $labresults = LabTestResult::where('labid',$id)->get();
         $labrequest = PatientInvestigation::where('visitid',$id)->where('type','Laboratory')->first();
         $patients = Customer::where('patient_id',$labrequest->patientid)->first();
          $tests = PatientInvestigation::where('visitid' ,'=', $id)->where('type','Laboratory')->get();
         
         if($labresults)
         {
         return view('laboratory.serology',compact('patients','labrequest','labresults','tests'));
        
        }

        else
        {
            return view('errors.403');
        }
        

    }

 
}
