@extends('layouts.default')
@section('content')
<section id="content">
         <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- users edit start -->

              {{-- <div class="content-header row float-right">
              <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                  <div class="form-group breadcrum-right">
                      <div class="dropdown">
                          <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Call</a>
                            <a class="dropdown-item" href="#">Whatsapp</a>
                            <a class="dropdown-item" href="#">Video Call</a>
                            <a class="dropdown-item" href="#">Print Clinical Note</a>
                            <a class="dropdown-item" href="#">Print Cover Letter</a>
                            <a class="dropdown-item" href="#">Print Excuse Duty</a>
                            <a class="dropdown-item" href="#">Print Treatment  Letter</a>
                          </div>
                      </div>
                  </div>
                  
              </div>
              </div> --}}


              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Pending</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Vetted</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                          <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Rejected</span>
                                      </a>
                                  </li>

                                    <!-- Inputs Group with Buttons -->
                                   
                                  <div class="col-md-6 col-12 mb-1">
                                    <form action="/find-claim" method="GET">
                                      <fieldset>
                                          <div class="input-group">
                                            
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                              
                                              <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary" type="button"><i class="feather icon-search"></i></button>
                                              </div>

                                              <input type="text" name='review_period' id='review_period' class="input-sm form-control" placeholder="Search by patient, test, status">
                                          </div>
                                          
                                      </fieldset>
                                      
                                    </form> 
                                  </div>
                                 
                                  
              <!-- Inputs Group with Buttons end -->

                                  
                                  {{-- <form action="/find-patient-folder" method="GET">
                                    <div class="col-12">
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                  </div>
                                  <div class="col-6">
                                    <input type="text" name='review_period' id='review_period' class="input-sm form-control" placeholder="Search by patient, test, status">
                                   </div>
                                  
                                  </form> --}}
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
                                                                      <th scope="col">Claim #</th>
                                                                      <th scope="col">Name</th>
                                                                      <th scope="col">Copayer</th>
                                                                      <th scope="col">Description</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col">Amount</th>
                                                                      <th scope="col">Top Up</th>
                                                                      <th scope="col">Payable</th>
                                                                      <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($bills as $bill )
                                                                      <tr>
                                                                        <td><a href="#" class="text-danger">CL{{ $bill->visit_id }}</a></td>
                                                                        <td>{{ ucwords(strtolower($bill->fullname)) }}</td>
                                                                        <td>{{ $bill->copayer }}</td>
                                                                        <td>{{ $bill->item_name }} ...</td>
                                                                        <td>{{ $bill->date }}</td>
                                                                        <td> {{ number_format($bill->total_cost , 1, '.', ',') }}</td>
                                                                        <td>{{ number_format($bill->payments->sum('AmountReceived'), 1, '.', ',') }}</td>
                                                                        <td>{{  number_format($bill->total_cost - $bill->payments->sum('AmountReceived') ,1, '.', ',') }}</td>
                                                                        <td>
                                                                        @if($bill->claimstatus=="Vetted")
                                                                        <a href="/vet-claim/{{ $bill->visit_id }}" class="btn mr-1 mb-1 btn-success btn-sm">Vetted</a>
                                                                        <td><a href="/claim-form/{{ $bill->visit_id }}"><i class="feather icon-printer"></i></a></td> 
                                                                        @else
                                                                        <a href="/vet-claim/{{ $bill->visit_id }}" class="btn mr-1 mb-1 btn-danger btn-sm" >Vet Claim</a>
                                                                        <td><a href="/claim-form/{{ $bill->visit_id }}"><i class="feather icon-printer"></i></a></td> 
                                                                        @permission('edit-bill')
                                                                        <td><a href="#" onclick="excludefrombill('{{ $bill->id }}','{{ $bill->item_name }}')"><i class="fa fa-trash"></i></a></td> 
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
                                      <div> Record(s) Found : {{ $bills->total() }} {{ str_plural('Claim', $bills->total()) }}</div>
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
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#bulk_period span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#bulk_period').daterangepicker({
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

