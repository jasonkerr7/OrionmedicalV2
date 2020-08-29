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
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Bills</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Payments</span>
                                      </a>
                                  </li>
                                 
                                  
                                  <form action="/find-bill" method="GET">
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
                                                                      <th scope="col">Invoice No</th>
                                                                      <th scope="col">Name</th>
                                                                      <th scope="col">Copayer</th>
                                                                      <th scope="col">Description</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col">Invoice</th>
                                                                      <th scope="col">Paid</th>
                                                                      <th scope="col">Balance</th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($bills as $bill )
                                                                  <tr>
                                                                        <td><a href="#" class="text-danger">IN-{{ $bill->visit_id }}</a></td>
                                                                        <td>{{ ucwords(strtolower($bill->fullname)) }}</td>
                                                                        <td>{{ $bill->copayer }}</td>
                                                                        <td>{{ $bill->item_name }} ...</td>
                                                                        <td>{{ $bill->date }}</td>
                                                                        <td>{{ number_format($bill->total_cost , 1, '.', ',') }}</td>
                                                                        <td>{{ number_format($bill->payments->sum('AmountReceived'), 1, '.', ',') }}</td>
                                                                        <td>{{ number_format($bill->total_cost - ($bill->payments->sum('AmountReceived')) ,1, '.', ',') }}</td>
                                                                        <td>
                                                                        @if(($bill->total_cost - $bill->payments->sum('AmountReceived')) <= 1)
                                                                                <a href="/billing-invoice/{{ $bill->visit_id }}" class="btn mr-1 mb-1 btn-success btn-sm">Paid</a>
                                                                            <td>
                                                                                <a href="/billing-print/{{ $bill->visit_id }}" ><i class="feather icon-printer"></i></a>
                                                                            </td> 
                                                                        @else
                                                                                <a href="/billing-invoice/{{ $bill->visit_id }}" class="btn mr-1 mb-1 btn-danger btn-sm">Collect Payment</a>
                                                                            <td>
                                                                        @if($bill->payercode!='Private')
                                                                                <a href="/claim-form/{{ $bill->visit_id }}" ><i class="feather icon-printer"></i></a>
                                                                        @else
                                                                                <a href="/billing-print/{{ $bill->visit_id }}"><i class="feather icon-printer"></i></a>
                                                                        @endif
                                                                            </td> 
                                                                        
                                                                        @permission('edit-bill')
                                                                            <td>
                                                                                <a href="#" onclick="excludefrombill('{{ $bill->id }}','{{ $bill->item_name }}')" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                                            </td> 
                                                                        @endpermission
                                        
                                                                        @endif
                                                                        </td>
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
                                      <div> Record(s) Found : {{ $bills->total() }} {{ str_plural('Bill', $bills->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$bills->render()!!}
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


@stop

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#review_period span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#review_period').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
    
});


</script>

<script type="text/javascript">
  
function excludefrombill(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to exclude "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, exclude it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
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
              swal("Excluded!", "Successfully excluded.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", "Operation failed", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", "Operation failed", "error");   
        } });

  }

 

</script>

