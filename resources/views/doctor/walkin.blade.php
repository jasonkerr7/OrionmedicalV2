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
              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block"> Walkin Bill</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Previous Walkin Bills</span>
                                      </a>
                                  </li>

                                  <p>
                                    <input type="text" class="btn btn-danger btn-lg pull-right" readonly="true" value="{{ Request::old('outstanding') ?: '' }}" id="outstanding" name="outstanding">     
                                  </p>
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
                                                <li class="breadcrumb-item active"><i class="feather icon-phone-call"></i> {{ $patients->mobile_number }}
                                                </li>
                                                <li class="breadcrumb-item active"><a href="#"> {{ $visitdetails->payercode }}</a>
                                                </li>
                                                <li class="breadcrumb-item active"><a href="#"> {{ $visitdetails->care_provider }}</a>
                                                </li>
                                                <li class="breadcrumb-item active"><a href="#"> {{ $visitdetails->consultation_type }}</a>
                                                </li>
                                                
                                            </ol>
                  
                                            <input type="hidden" name="visit_id" id="visit_id" value="{{ $visitdetails->opd_number }}">
                                            <input type="hidden" name="patient_id" id="patient_id" value="{{ $visitdetails->patient_id }}">
                                            
                                            <input type="hidden" name="payercode" id="payercode" value="{{ $visitdetails->payercode }}">
                                            <input type="hidden" name="fullname" id="fullname" value="{{ $visitdetails->name }}">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-warning mt-1 p-1">
                              
                              Diagnosis : @foreach($mydiagnosis as $val) <label class="badge badge-pill badge-glow badge-primary mr-1 mb-1"> {{ $val->diagnosis }} </label>  @endforeach 
                              <div class="row">
                               
                                <div class="col-md-6 col-12 mb-1">
                                    <fieldset>
                                        <div class="input-group">
                                          <select id="diagnosis" name="diagnosis" rows="3" tabindex="1" data-placeholder="Add New Diagnosis Item" class="form-control">
                                            <option value="">-- Nothing selected --</option>
                                            <option value="">-- Select Diagnosis --</option>
                                            @foreach($diagnosis as $diagnosis)
                                         <option value="{{ $diagnosis->type }}">{{ $diagnosis->type }}</option>
                                           @endforeach
                                         </select>
                                            <div class="input-group-append">
                                              <button onclick="addDiagnosis()" class="btn btn-primary" type="button">+</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                  <fieldset>
                                      <div class="input-group">
                                        <select id="selected_item" name="selected_item" rows="3" tabindex="1" data-placeholder="Add New Service Item" class="form-control">
                                          <option value="">-- Nothing selected --</option>
                                         @foreach($services as $service)
                                       <option value="{{ $service->type }}">{{ $service->type }}</option>
                                         @endforeach 
                                       </select>
                                          <div class="input-group-append" id="button-addon2">
                                              <button onclick="addInvestigation()" class="btn btn-primary" type="button">+</button>
                                          </div>
                                      </div>
                                  </fieldset>
                              </div>
                            </div>
                            </div> 
                  
                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">


                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="invoiceTable" class="table table-hover table-striped mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col"></th>
                                                                      <th scope="col">#</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col">Item Name</th>
                                                                      <th scope="col">Quantity</th>
                                                                      <th scope="col">Unit Price</th>
                                                                      <th scope="col">Source</th>
                                                                      <th scope="col">Discount</th>
                                                                      <th scope="col">Amount Payable</th>
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

              <!-- Counter Textarea start -->
             
            <!-- Counter Textarea end -->
              <!-- users edit ends -->

          </div>
      </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>


                 


  @stop



  
  

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {
   
                loadBills();
                totalPayable();
    $('#selected_item').select2();
    $('#medication').select2();
    $('#drug_application').select2({
      tags: true
      });
     $('#diagnosis').select2({
      tags: true
      });
    //loadInvestigation();
    

  });



  function loadBills()
   {
         
        $.get('/invoice-list',
          {
            "opd_number": $('#visit_id').val()
          },
          function(data)
          { 

            $('#invoiceTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#invoiceTable tbody').append('<tr><td><input type="checkbox" name="drug['+value['id']+']" id="'+value['id']+'" value="'+value['id']+'"></td><td>.</td><td>'+ value['date'] +'</td><td>'+ value['item_name'] +'</td><td>'+ value['quantity'] +'</td><td>'+ value['amount'] +'</td><td>'+ value['category'] +'</td><td><input type="text" class="form-control form-control-sm" item_code="'+ value['id'] +'" value="'+ value['discount'] +'" onchange="discount_invoice_item(this);"></td><td>'+ ((value['amount']*value['quantity'])-value['discount']) +'</td><td><a a href="#"><i onclick="excludefrombill(\''+value['id']+'\',\''+value['item_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');

           
            // 
            });
                                          
         },'json');      
    }


    function totalPayable()
    {
     
          $.get('/billing-total',
        {
          "opd_number": $('#visit_id').val()
        },
        function(data)
        { 
         // alert(data.outstanding);
          $.each(data, function (key, value) 
          { 
            
          $('#outstanding').val('GHS '+ data.outstanding);

           });
                                        
        },'json'); 
}

    function discount_invoice_item(obj)
    {

      var item_code=$(obj).attr('item_code');
      var new_qty=parseInt($(obj).val());
        //alert(item_code);

          $.get('/update-discount-value',
          {
             "invoice_id": item_code ,
             "discount_charge": new_qty
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              loadBills();
              totalPayable();
             }
            else
            { 
              loadBills();
              totalPayable();
              
            }
           
        });
                                          
          },'json');    
           
    }


function excludefrombill(id,name)
  {

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
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
        $.get('/exclude-from-bill',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
               
                    Swal.fire(
                      {
                        type: "success",
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                      }
                    )
              location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled", "Operation failed", "error");
              
            }
           
        });
                                          
          },'json'); 
       
      }
      else {     
          Swal.fire("Cancelled", "Operation failed", "error");   
        }
    });


  }

  function addDrug()
{
if($('#medication').val()!= "")
{
  //alert($('#opd_number').val());

    $.get('/add-medication-extra',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#visit_id').val(),
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
          location.reload(true);
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

  
function addInvestigation()
{
if($('#selected_item').val()!= "")
{
    //alert($('#payercode').val());

    $.get('/add-investigation',
        {
          "patient_id":  $('#patient_id').val(),
          "accounttype": $('#payercode').val(),
          "opd_number":  $('#visit_id').val(),
          "investigation": $('#selected_item').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
         
          loadBills();
          totalPayable();
          $('#investigation').val()!= ""
        }
        else
        {
          sweetAlert("Investigation failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select an Investigation!");}
}


function addDiagnosis()
{
if($('#diagnosis').val()!= "")
{

    $.get('/add-diagnosis',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#visit_id').val(),
          "diagnosis":  $('#diagnosis').val(),
          "code":       $('#diagnosis_remark').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          location.reload(true);
        }
        else
        {
          sweetAlert("Diagnosis failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a Diagnosis!");}
}


function approveclaim()
{

    $.get('/approve-claim',
        {
         
          "opd_number": $('#visit_id').val(),
          "vetting_remark": $('#vetting_remark').val()
                        
        },
        function(data)
        { 
          
        $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          location.reload(true);
        }
        else
        {
          sweetAlert("Claim failed to approve!");
        }
      });
                                        
        },'json');
 
}

function rejectclaim()
{

    $.get('/reject-claim',
        {
         
          "opd_number": $('#visit_id').val(),
          "vetting_remark": $('#vetting_remark').val()
                            
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          location.reload(true);
        }
        else
        {
          sweetAlert("Action failed!");
        }
      });
                                        
        },'json');
 
}


function queryclaim()
{


    $.get('/query-claim',
        {
          
          "opd_number": $('#visit_id').val(),
          "vetting_remark": $('#vetting_remark').val()
              
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          location.reload(true);
        }
        else
        {
          sweetAlert("Action failed!");
        }
      });
                                        
        },'json');
  
}

</script>






<div class="modal fade" id="new-service" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Service<span id="selectedName"></span></h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">

                       
                       
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="details">
                            <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/do-payment" class="panel-body wrapper-lg">
                          @include('billing/service')
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




 <div class="modal fade" id="new-service-request" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Charge Service Request</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="" class="panel-body wrapper-lg">
                         @include('billing.service')
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



  