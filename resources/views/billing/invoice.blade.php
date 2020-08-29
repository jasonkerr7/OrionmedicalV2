
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
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block"> Current Bill</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Previous Bills</span>
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
                                                
                                            </ol>
                  
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                  
                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">


                                    <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                  <div class="row match-height">
                      <div class="col-12">
                          <div class="card">
                             
                              <div class="card-content">
                                  <div class="card-body">
                                      <form class="form"  method="post" action="/do-payment">
                                          <div class="form-body">
                                              <div class="row">
                                                <div class="col-sm-6 col-12">
                                                  <div class="form-group">
                                                    <select id="paymentmethod" name="paymentmethod" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                      @foreach($receiptmodes as $receiptmode)
                                                         <option value="{{ $receiptmode->type }}">{{ $receiptmode->type }}</option>
                                                     @endforeach 
                                                    </select>
                                                  </div>
                                              </div>
                                                  <div class="col-md-6 col-12">
                                                      <div class="form-label-group">
                                                          <input type="text" id="referencenumber" class="form-control" placeholder="Reference Number" name="referencenumber">
                                                          <label for="referencenumber">Reference Number</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 col-12">
                                                      <div class="form-label-group">
                                                          <input type="number" min="0" value="0" step="0.01" id="amountreceived" class="form-control" placeholder="Amount Received" name="amountreceived">
                                                          <label for="amountreceived">Amount Received</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 col-12">
                                                      <div class="form-label-group">
                                                          <input type="text" id="fullname_paid" class="form-control" name="fullname_paid" placeholder="Paid By">
                                                          <label for="fullname_paid">Paid By</label>
                                                      </div>
                                                  </div>
                                                 
                                                  <div class="col-12">
                                                      <button type="submit" class="btn btn-primary mr-1 mb-1 float-right">Pay</button>
                                                      <a href="/billing-print/{{ $bills[0]->visit_id }}"> <button type="button" class="btn btn-outline-warning mr-1 float-right mb-1">Print</button> </a>
                                                      
                                                        <input type="hidden" name="visit_id" id="visit_id" value="{{ $visitdetails->opd_number }}">
                                                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $visitdetails->patient_id }}">
                                                        <input type="hidden" name="yourname" id="yourname" value="{{ $visitdetails->name }}">
                                                        <input type="hidden" name="yourphone" id="yourphone" value="{{ $patients->mobile_number }}">
                                                        <input type="hidden" name="payercode" id="payercode" value="{{ $visitdetails->payercode }}">
                                                        <input type="hidden" name="fullname" id="fullname" value="{{ $visitdetails->name }}">
                                                        <input type="hidden" name="totalamount" id="totalamount" value="{{ Request::old('outstanding') ?: '' }}" >
                                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- // Basic Floating Label Form section end -->
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="invoiceTable" class="table table-hover mb-0 font-small-3">
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
              <!-- users edit ends -->

          </div>
      </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>


  {{--
                  <div class="form-group pull-in clearfix">

                          <div class="col-sm-12">
                          <div class="input-group m-b">
                           <select id="selected_item" name="selected_item" rows="3" tabindex="1" data-placeholder="Add New Service Item" style="width:100%">
                           <option value="">-- Nothing selected --</option>
                          @foreach($services as $service)
                        <option value="{{ $service->type }}">{{ $service->type }}</option>
                          @endforeach 
                        </select>           <div class="input-group-btn">
                           <a><button onclick="addInvestigation()"  class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-circle"></i></button></a>
                        </div>     
                        </div>   
                          </div>
                        </div>
                </footer>
                </aside>
                 </form>
               

                 
            </section>
        </section>
        
  </section> --}}

  @stop



<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {

                loadBills();
                totalPayable();
                $('#selected_item').select2();
                       
  });

 

</script>
  <script type="text/javascript">
  



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



function excludefrombill(id,name)
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
              Swal.fire("Excluded!", "Successfully excluded.", "success"); 
             loadBills();
             totalPayable();
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
        } });

  }

  


</script> 





