
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
                          <input type="text" class="btn btn-sm badge badge-pill badge-glow badge-warning mr-1 mb-1" readonly="true" value="{{ Request::old('outstanding') ?: '' }}" id="outstanding" name="outstanding">     
                                              <input type="text" class="btn btn-sm badge badge-pill badge-glow badge-danger mr-1 mb-1" readonly="true" value="{{ Request::old('payable') ?: '' }}" id="payable" name="payable"> 
                                               <input type="text" class="btn btn-sm badge badge-pill badge-glow badge-success mr-1 mb-1" readonly="true" value="{{ Request::old('receivable') ?: '' }}" id="receivable" name="receivable"> 
                                            
                        </div>
                    </div>
                </div>
      
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                  
                    <div class="form-group breadcrum-right">
                      
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#new-prescription" class="bootstrap-modal-form-open" data-toggle="modal">Add New Prescription</a>
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Drug Formulary</a>
                              <a class="dropdown-item" target="_new" href="https://reference.medscape.com/drug-interactionchecker">Drug Interaction Checker</a>
                              <a class="dropdown-item" target="_new" href="/images/BNF 57.pdf">BNF</a>
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
                                          <i class="feather icon-user-x  mr-25"></i><span class="d-none d-sm-block"> Requested </span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Dispensed</span>
                                      </a>
                                  </li>
                              </ul>

                              <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                      <h2 class="content-header-title float-left mb-0">{{ $patients->fullname }}</h2>
                                        <div class="breadcrumb-wrapper col-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->gender }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->date_of_birth->age }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#"> {{ $visit_details->care_provider }}</a>
                                                </li>
                                               
                                                <li class="breadcrumb-item active"><i class="feather icon-phone-call"></i> {{ $patients->mobile_number }}
                                                </li>

                                                {{-- <a a href="#">Diagnosis : @foreach($mydiagnosis as $val) <label class="badge bg-info"> {{ $val->diagnosis }} </label> </a> @endforeach 
                                                <a a href="#">CC : @foreach($mycomplaints as $val) <label class="badge bg-dark"> {{ $val->complaint }} </label> </a> @endforeach
                                                 --}}

                                                 <input type="hidden" id="opd_number" name="opd_number" value="{{ $prescriptions->visitid }}">
                                                 <input type="hidden" id="patient_id" name="patient_id" value="{{ $prescriptions->patientid }}">
                                                 <input type="hidden" id="fullname" name="fullname" value="{{ $prescriptions->patient_name }}">
                                            </ol>
                  
                                           
                                        </div>
                                    </div>
                                </div>

                                
                                 
                                 @foreach($mydiagnosis as $val) <label class="badge badge-pill badge-glow badge-primary mr-1 mb-1"> {{ $val->diagnosis }} </label>  @endforeach 
                               
                            </div>
                  
                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                   
                                      <!-- users edit media object start -->
                                      <form id="dispenseform" method="post" action="/dispense-medication" >
                                      <div class="row" id="table-hover-animation">
                                        
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                          
                                                            <table id="drugTable" class="table table-hover table-striped font-small-2">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col"><input type="checkbox"></th>
                                                                      <th scope="col">#</th>
                                                                      <th scope="col">Requested Date</th>
                                                                      <th scope="col">Medication</th>
                                                                      <th scope="col">Dosage</th>
                                                                      <th scope="col">Quantity</th>
                                                                      <th scope="col">Unit Cost</th>
                                                                      <th scope="col">Total</th>
                                                                      <th scope="col">Requested By</th>
                                                                      <th scope="col">Status</th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 
                                                                </tbody>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <footer class="modal-footer">
                                              <a href="/print-prescription/{{$visit_details->opd_number}}"> <button type="button" class="btn btn-default btn-s-xs"> Print   </button></a>
                       
                                              
                                               <button type="submit" class="btn btn-success btn-s-xs">Dispense</button>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                              
                                              
                                             </footer> 
                                        </div>
                                     
                                        
                                    </div>
                                  </form>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="dispenseTable" class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col"><input type="checkbox"></th>
                                                                      <th scope="col">#</th>
                                                                      <th scope="col">Requested Date</th>
                                                                      <th scope="col">Medication</th>
                                                                      <th scope="col">Dosage</th>
                                                                      <th scope="col">Quantity</th>
                                                                      <th scope="col">Unit Cost</th>
                                                                      <th scope="col">Total</th>
                                                                      <th scope="col">Requested By</th>
                                                                      <th scope="col">Status</th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 
                                                                </tbody>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <!-- users edit media object ends -->
                                     
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




  <div class="modal fade" id="new-prescription" tabindex="-1" role="dialog" aria-labelledby="new-prescription" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new-prescription">New Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-body">
                  <div class="row">
                      <div class="col-md-12 col-12">
                          <div class="form-label-group">
                            <select id="medication" name="medication" rows="3" tabindex="1" data-placeholder="Search medication ..." style="width:100%">
                              <option value="">-- Select drug from pharmacy--</option>
                              @foreach($druglists as $selectdrug)
                              <option value="{{ $selectdrug->id }}">{{ $selectdrug->name }} - {{$selectdrug->generic_name }}</option>
                              @endforeach
                           </select>  
                              <label for="first-name-column">Drug</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-label-group">
                              <input type="text" id="drug_application" class="form-control" placeholder="Dosage Remark" name="drug_application">
                              <label for="last-name-column">Dosage Remark</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-label-group">
                              <input type="number" id="drug_quantity" class="form-control" placeholder="Number of Days" name="drug_quantity">
                              <label for="city-column">Number of Day(s)</label>
                          </div>
                      </div>
                     
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addDrug()" class="btn btn-primary" data-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>



  @stop

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {

                totalPayable();
                loadMedication();
                loadDispensedMedication();
                loadReturnedMedication();

                $('#medication').select2();

   
   
               
  });

 

</script>
  <script type="text/javascript">
  function removeMedication(id,name)
   {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to delete "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      {
          $.get('/exclude-medication',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire("Deleted!", name +" was removed from prescription list.", "success"); 
              totalPayable();
              loadMedication();
             }
            else
            { 
              Swal.fire("Cancelled", name +" failed to be removed from prescription.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled", name +" failed to be removed from prescription.", "error");   
        } });

    
   }

   function totalPayable()
    {
     
          $.get('/billing-total',
        {
          "opd_number": $('#opd_number').val()
        },
        function(data)
        { 
         // alert(data.outstanding);
          $.each(data, function (key, value) 
          { 

            //thousands_separators(data["Premium"])
            
          $('#outstanding').val('OUT. - GHS '+ data.outstanding);
          $('#payable').val('BILL - GHS '+ thousands_separators(data.payables));
          $('#receivable').val('PAID - GHS '+ thousands_separators(data.receivables));

           });
                                        
        },'json'); 
}


function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }


   function addDrug()
{
if($('#medication').val()!= "")
{
  //alert($('#opd_number').val());

    $.get('/add-medication',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "medication": $('#medication').val(),
          "fullname":  $('#fullname').val(),
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
          //sweetAlert("Drug has been forwarded to pharmacy!");
          //$('#new-medication').modal('toggle')
          totalPayable();
                loadMedication();
        }
        else
        {
          sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a drug or add the number of day to take drugs!");}
}



   function loadMedication()
   {
         
        $.get('/patient-medication-pending',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#drugTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#drugTable tbody').append('<tr><td><input type="checkbox" name="drug['+value['id']+']" id="'+value['id']+'" value="'+value['id']+'"></td><td>.</td><td>'+ value['created_on'] +'</td><td>'+ value['drug_name'] +'</td><td>'+ value['drug_application'] +'</td><td><input type="text" class="form-control" item_code="'+ value['id'] +'" value="'+ value['drug_quantity'] +'" onchange="change_count(this);"></td><td>'+ value['drug_cost'] +'</td><td>'+ value['drug_cost']*value['drug_quantity'] +'</td><td>'+ value['created_by'] +'</td><td>'+ (value['pay_status'] == "Unpaid" ? '<span class="label label-danger btn-rounded">'+ value['pay_status'] +'</span>' :  '<span class="label label-success btn-rounded">'+ value['pay_status'] +'</span>' ) +'</td><td><a a href="#"><i onclick="removeMedication(\''+value['id']+'\',\''+value['drug_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');

           
            // 
            });
                                          
         },'json');      
    }

    function loadDispensedMedication()
   {
         
        $.get('/medication-dispensed-to-patient',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#dispenseTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#dispenseTable tbody').append('<tr><td><input type="checkbox" name="drug['+value['id']+']" id="'+value['id']+'" value="'+value['id']+'"></td><td>1</td><td>'+ value['created_on'] +'</td><td>'+ value['drug_name'] +'</td><td>'+ value['drug_application'] +'</td><td><input type="text" class="form-control" value="'+ value['drug_quantity'] +'"></td><td><input type="text" class="form-control" item_code="'+ value['id'] +'" value="0" onchange="return_stock(this);"></td><td>'+ value['drug_cost'] +'</td><td>'+ value['drug_cost']*value['drug_quantity'] +'</td><td><a a href="#"><i onclick="removeMedication(\''+value['id']+'\',\''+value['drug_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            

            // 
            });
                                          
         },'json');      
    }


    function loadReturnedMedication()
   {
         
        $.get('/medication-returned-to-patient',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#returnTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#returnTable tbody').append('<tr><td><input type="checkbox" name="drug['+value['id']+']" id="'+value['id']+'" value="'+value['id']+'"></td><td>1</td><td>'+ value['created_on'] +'</td><td>'+ value['drug_name'] +'</td><td><input type="text" style="width:40px; border: 1px solid #ABADB3 readonly; text-align: center;" item_code="'+ value['id'] +'" value="'+ value['drug_quantity'] +'" onchange="change_count(this);"></td><td>'+ value['drug_cost'] +'</td><td>'+ value['drug_cost']*value['drug_quantity'] +'</td><td><a a href="#"><i onclick="removeMedication(\''+value['id']+'\',\''+value['drug_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            $('#drugTable footer').append('<tr><td class="text-right" style="text-align:right" colspan="5"><h4 style="padding-right: 40px;">Total <span style="font-size: 12px">(this is an approximate total, price may change)</span> : $ 407.00</h4></td></tr>');

            // 
            });
                                          
         },'json');      
    }


    function change_count(obj)
    {

      var item_code=$(obj).attr('item_code');
      var new_qty=parseInt($(obj).val());
        //alert(item_code);

          $.get('/update-drug-quantity',
          {
             "ID": item_code ,
             "drug_quantity": new_qty
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              totalPayable();
                loadMedication();
             }
            else
            { 
              totalPayable();
                loadMedication();
              
            }
           
        });
                                          
          },'json');    
           
    }

    function return_stock(obj)
    {

      var item_code=$(obj).attr('item_code');
      var new_qty=parseInt($(obj).val());
        //alert(item_code);

          $.get('/return-drug-quantity',
          {
             "ID": item_code ,
             "drug_quantity": new_qty
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              totalPayable();
                loadMedication();
             }
            else
            { 
              totalPayable();
                loadMedication();
              
            }
           
        });
                                          
          },'json');    
           
    }




  </script>


