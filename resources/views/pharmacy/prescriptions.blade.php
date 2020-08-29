
@extends('layouts.default')
@section('content')
         <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- users edit start -->

              <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                         
                        </div>
                    </div>
                </div>
      
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                  
                    <div class="form-group breadcrum-right">
                      
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Drug Formulary</a>
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Expired Drugs</a>
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Low Stock Drugs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Pending Request</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Dispensed</span>
                                      </a>
                                  </li>
                                
                                 
                                  
                                  <form action="/find-prescription" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>
                              </ul>

                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="investigationsTable" class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>

                                                                      <th scope="col"></th>
                                                                      <th scope="col">Visit Number</th>
                                                                      <th scope="col">Patient Number</th>
                                                                      <th scope="col">Patient Name</th>
                                                                      <th scope="col">Prescriber</th>
                                                                      <th scope="col">Medication</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($prescriptions as $prescription)
                                                                    <tr>
                                                                      
                                                                      <td><a href="#modal_check_in" class="bootstrap-modal-form-open" onclick="getdrug('{{ $prescription->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a></td>
                                                                      <td>{{ $prescription->visitid }}</td>
                                                                      <td>{{ $prescription->patientid }}</td>
                                                                      <td>{{ $prescription->patient_name }}</td>
                                                                      <td>{{ $prescription->created_by }}</td>
                                                                      <td>{{ $prescription->drug_name }}</td>
                                                                      <td>{{ $prescription->created_on }}</td>
                                                                      <td>
                                                                          @if($prescription->status != 'Dispensed')
                                                                            <a href="/dispense-medication-master/{{ $prescription->visitid }}" class="badge badge-pill badge-glow badge-success mr-1 mb-1">Dispense Medication</a>
                                                                        @elseif($prescription->status == 'Dispensed')
                                                                            <a href="/dispense-medication-master/{{ $prescription->visitid }}" class="badge badge-pill badge-glow badge-success mr-1 mb-1">View</a>
                                                                          @else
                                                                            <a href="#" class="btn btn-sm btn-outline-success ml-50">Dispensed</a>
                                                                          @endif
                                                                      </td>
                                                                          @if($prescription->created_by == Auth::user()->getNameOrUsername())
                                                                        <td>
                                                                          <a href="/walkin-service/{{$prescription->visitid}}" class="bootstrap-modal-form-open"><i class="fa fa-pencil"></i></a>
                                                                        </td> 
                                                                        @else
                                                                        @endif
                                                                      
                                                                    </tr>
                                                                  @endforeach
                                                                </tbody>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 col-md-5">
                                      <div> Record(s) Found : {{ $prescriptions->total() }} {{ str_plural('Request', $prescriptions->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$prescriptions->render()!!}
                                      </div>
                                        </div>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                     
                                      <!-- users edit Info form ends -->
                                  </div>
                                  <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                      <!-- users edit socail form start -->
                                     
                                      <!-- users edit socail form ends -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- users edit ends -->

          </div>
      </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>



 <div class="modal fade" id="new-request" size="600">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">New Request</h4>
      </div>
      <div class="modal-body">
        <p></p>
                    <section class="vbox">
                  <section class="scrollable">
                    <div class="tab-content">
                      <div class="tab-pane active" id="individual">
                         <form  class="bootstrap-modal-form"  method="post" action="/update-prescription-status" class="panel-body wrapper-lg">
                         @include('pharmacy.request')
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                      </div>
                
                
                      </div>
                  </section>
                </section>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>



@stop


<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
   
    $('#medication').select2();
  });
</script>


  <script>



function getdrug(id)
{ 
//alert(id);
  $.get("/get-prescription",
          {"id":id},
          function(json)
          {


                $('#administer-medication input[name="ItemID"]').val(json.ID);
                $('#administer-medication input[name="VisitID"]').val(json.VisitID);
                $('#administer-medication input[name="PatientID"]').val(json.PatientID);
                $('#administer-medication input[name="PatientName"]').val(json.PatientName);
                $('#administer-medication img[name="imagePreview"]').attr("src", '/images/'+json.PatientID+'.jpg');
                $('#administer-medication a[name="visitid"]').attr("href", '/print-prescription/'+json.VisitID);
                loadMedication();
                loadTotalCost();
                getAge();

          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function getAge()
{

    $.get('/patient-age-occupation',
        {

          "id": $('#PatientID').val()
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#age').val(data.age);
           $('#occupation').val(data.occupation);
           $('#accounttype').val(data.accounttype);
       
      });
                                        
        },'json');
  
}

function loadTotalCost()
{
  $.get('/drug-total',
          {
            "id": $('#VisitID').val()
          },
          function(data)
          { 
               $.each(data, function (key, value) {
        
        
            $('#administer-medication label[name="totalcost"]').text(data.total_price);
            //sweetAlert("Total Bill : ", 'GHS'+ data["total_price"], "info");

            
          });
                                          
         },'json');   
}



function addDrug()
{
if($('#medication').val()!= "" && $('#drug_quantity').val()!=0 && $('#patient_id').val()!= "")
{

    $.get('/add-medication',
        {
          "patient_id": $('#request_patient_id').val(),
          "opd_number": $('#request_visitid').val(),
          "medication": $('#medication').val(),
          "fullname":  $('#request_name').val(),
          "drug_quantity": $('#drug_quantity').val(),
          "drug_dosage": $('#drug_dosage').val(),
          "drug_application": $('#drug_application').val(),
          "drug_frequency": $('#drug_frequency').val(),
          "drug_days": $('#drug_days').val(),
          "drug_span": $('#drug_span').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          loadMedication();
          $('#medication').val()!= "";
        }
        else
        {
          sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please complete form!");}
}




function getVisitDetails()
{

 if($('#request_name').val() != "")
 {


 $.get('/get-visit-details-pharmacy',
        {

          "id": $('#request_visitid').val(),
          "fullname": $('#request_name').val(),
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
            //sweetAlert("Employee SSF : ", data["PatientName"], "info");
            $('#accounttype').val(data.AccountType);
            $('#request_patient_id').val(data.PatientID);
            //$('#request_name').val(data.PatientName);
            $('#request_visitid').val(data.VisitID);
       
      });
                                        
        },'json');

}

else
{
   sweetAlert("Please enter patient name!");

}


}


function loadMedication()
   {
         
        
        $.get('/patient-medication',
          {
            "opd_number": $('#request_visitid').val()
          },
          function(data)
          { 

            $('#drugTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#drugTable tbody').append('<tr><td>'+ value['drug_quantity'] +'</td><td>'+ value['drug_name'] +'</td><td>'+ value['drug_application'] +'</td><td>'+ value['drug_cost'] +'</td><td>'+ value['drug_cost']*value['drug_quantity'] +'</td><td><a a href="#"><i onclick="removeMedication(\''+value['id']+'\',\''+value['drug_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

   


function dispenseMedication(id,name)
{

  if($('#receipt_number').val()=="")
  {sweetAlert("Payment must be made first ",'Please enter receipt number', "error");}

else
{
  swal({   
        title: "Are you sure?",   
        text: "Do you want to dispense "+ name + " from the prescription list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, dispense it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/dispense-medication',
          {
             "id": id, 
             "receipt_number": $('#receipt_number').val() 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Dispense!", name +" was dispensed from prescription list.", "success"); 
              loadMedication();
               loadTotalCost();
             }
            else
            { 
              swal("Cancelled", name +" failed to be dispensed from prescription.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be dispensed from prescription.", "error");   
        } });
}





}


 function getdrugdetail()
{ 
   //alert($('#medication').val());\



  $.get("/get-drug-info",
          {"medication": $('#medication').val()},
          function(json)
          {


              
                $('#drug_dosage').val(json['drug_dosage']);
                $('#drug_form').val(json['drug_form']);
                $('#drug_pack_size').val(json['drug_pack_size']);
                $('#drug_generic').val(json['drug_generic']);

                $('#drug_quantity').val("");
              //}
          },
          'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function updatePrescription()
  {
if($('#VisitID').val()!="")
{

    $.get('/update-prescription-status',
        {

          "ItemID": $('#ItemID').val(),
          "DrugQuantity": $('#DrugQuantity').val(),
          "DrugFrequency": $('#DrugFrequency').val(),
          "DrugDosage":  $('#DrugDosage').val(), 
          "DrugApplication":  $('#DrugApplication').val(),                  
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Drug has successfully been processed!");
         
        }
        else
        {
          sweetAlert("Drug is out of stock!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Error processing medication dispense");}
  }



</script>


