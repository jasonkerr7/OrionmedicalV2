


@extends('layouts.default')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">

  <div class="content-wrapper">
      {{-- <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                  <div class="col-12">
                      <h2 class="content-header-title float-left mb-0">Prescription</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Pages</a>
                              </li>
                              <li class="breadcrumb-item active">Prescription
                              </li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
              <div class="form-group breadcrum-right">
                  <div class="dropdown">
                      <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                  </div>
              </div>
          </div>
      </div> --}}
      <div class="content-body">
          <!-- invoice functionality start -->
          {{-- <section class=" mb-1">
              <div class="row">

                  <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                          <div class="input-group-append" id="button-addon2">
                              <button class="btn btn-outline-primary" type="button">Send Prescription</button>
                          </div>
                      </div>
                  </fieldset>
                  <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                      <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                      <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Download</button>
                  </div>
              </div>
          </section> --}}
          <!-- invoice functionality end -->
          <!-- invoice page -->
          <section class="card">
              <div class="card-body">
                  <!-- Invoice Company Details -->
                  <div class="row">
                      <div class="col-sm-6 col-12 text-left pt-1">
                          <div class="media pt-1">
                              <img src="/images/{{ $mycompany->logo }}" width="25%"/>
                          </div>
                      </div>
                     
                  </div>
                  <!--/ Invoice Company Details -->

                  <!-- Invoice Recipient Details -->
                  <div class="row pt-2">
                      
                      <div class="col-sm-6 col-12 text-left">
                          <div class="company-info my-2">
                            <h4 style="font-size:12px">{{$mycompany->legal_name }}</h4>
                             <p style="font-size:12px">{{ $mycompany->email }}</p>
                             <p style="font-size:12px">{{ $mycompany->address }}</p>
                             <p style="font-size:12px">{{ $mycompany->phone }}</p>
                             <p style="font-size:12px">{{ $mycompany->website }}</p>
                          </div>
                        
                      </div>
                      <div class="col-sm-6 col-12 text-right">
                        <div class="recipient-info my-2">
                          <p style="font-size:12px">{{ $patients->fullname }}</p>
                          <p style="font-size:12px">{{ $patients->date_of_birth->age }}</p>
                          <p style="font-size:12px">{{ $patients->gender }}</p>
                          <p style="font-size:12px">{{ $patients->mobile_number }}</p>
                          <p style="font-size:12px">{{ date('Y-m-d') }}</p>   
                         {{-- <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$bills[0]->visit_id ,$patients->fullname', 'QRCODE')}}" alt="barcode" /> --}}
                        </div>
                       
                    </div>
                  </div>
                  <!--/ Invoice Recipient Details -->

                  <!-- Invoice Items Details -->
                  <div>
                      <div class="row">
                          <div class="table-responsive col-12">
                              <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                  <thead>
                                      <tr>
                                          <th>QTY</th>
                                          <th>DRUG NAME</th>
                                          <th>DOSAGE REMARK</th>
                                          <th>STATUS</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @foreach($bills as $bill )
                                        <tr>
                                          <td>{{ $bill->drug_quantity }}</td>
                                          <td>{{ $bill->drug_name }}</td>
                                          <td>{{ ucwords($bill->drug_application) }}</td>
                                          @if($bill->status == 'Dispensed')
                                          <td>Dispensed</td>
                                          @else
                                          <td>Not Dispensed</td>
                                          @endif
                                        </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                 

                  <!-- Invoice Footer -->
               
                  <!--/ Invoice Footer -->

              </div>
          </section>
          <!-- invoice page end -->

      </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>





          {{-- <section class="vbox bg-white">
            <header class="header b-b b-light hidden-print">
              <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
              <p>Receipt</p>
            </header>
             <section class="scrollable wrapper">
             <img src="/images/{{ $mycompany->logo }}" width="15%">
              <div class="row">
                <div class="col-xs-6">
                  <h4 style="font-size:12px">{{$mycompany->legal_name }}</h4>
                  <p style="font-size:12px"><a href="#">{{ $mycompany->email }}</a></p>
                   <p style="font-size:12px"><a href="#">{{ $mycompany->address }}</a></p>
                   <p style="font-size:12px"><a href="#">{{ $mycompany->phone }}</a></p>
                   <p style="font-size:12px"><a href="#">{{ $mycompany->website }}</a></p>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="h4 badge bg-default">#{{ $bills[0]->visit_id }}</p>
                   <p>{{ $patients->fullname }}</p>
                  <p>{{ $patients->date_of_birth->age }}</p>
                  <p>{{ $patients->gender }}</p>
                  <p>{{ $patients->mobile_number }}</p>
                  <h5>{{ date('Y-m-d') }}</h5>   
                  <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$bills[0]->visit_id ,$patients->fullname', 'QRCODE')}}" alt="barcode" />        
                </div>
              </div>          
          
              <div class="line"></div>
              <table class="table table-striped m-b-none text-sm" width="100%">
                <thead>
                  <tr>
                    
                  </tr>
                </thead>
                <tbody>
                
                  
                </tbody>
              </table> 
            

               <p class="btn btn-sm btn-default pull-right" style="font-size:12px">Printed By : {{ Auth::user()->getNameOrUsername() }} </p>
               
               
             

            
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section> --}}
@stop
