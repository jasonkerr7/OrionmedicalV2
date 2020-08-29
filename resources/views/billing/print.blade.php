@extends('layouts.default')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Invoice</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="#">{{ $bills[0]->fullname }}</a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#">Pages</a>
                                  </li>
                                  <li class="breadcrumb-item active">Invoice
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
          </div>
          <div class="content-body">
              <!-- invoice functionality start -->
              <section class="invoice-print mb-1">
                  <div class="row">

                      <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                              <div class="input-group-append" id="button-addon2">
                                  <button class="btn btn-outline-primary" type="button">Send Invoice</button>
                              </div>
                          </div>
                      </fieldset>
                      <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                          <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                          <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Download</button>
                      </div>
                  </div>
              </section>
              <!-- invoice functionality end -->
              <!-- invoice page -->
              <section class="card invoice-page">
                  <div id="invoice-template" class="card-body">
                      <!-- Invoice Company Details -->
                      <div id="invoice-company-details" class="row">
                          <div class="col-sm-6 col-12 text-left pt-1">
                              <div class="media pt-1">
                                  <img src="/images/{{ $mycompany->logo }}" width="30%" alt="company logo" />
                              </div>
                          </div>
                          <div class="col-sm-6 col-12 text-right">
                              <h1>Invoice</h1>
                              <div class="invoice-details mt-2">
                                  <h6>INVOICE NO.</h6>
                                  <p>#{{ $bills[0]->uuid }}</p>
                                  <h6 class="mt-2">INVOICE DATE</h6>
                                  <p>{{ $bills[0]->date }}</p>
                              </div>
                          </div>
                      </div>
                      <!--/ Invoice Company Details -->

                      <!-- Invoice Recipient Details -->
                      <div id="invoice-customer-details" class="row pt-2">
                          <div class="col-sm-6 col-12 text-left">
                              <h5>Recipient</h5>
                              <div class="recipient-info my-2">
                                <p><i class="feather icon-mail"></i><a href="#">{{ $mycompany->email }}</a></p>
                                <p><a href="#">{{ $mycompany->address }}</a></p>
                                <p><i class="feather icon-phone"></i><a href="#">{{ $mycompany->phone }}</a></p>
                                <p><a href="#">{{ $mycompany->website }}</a></p>
                              </div>
                             
                          </div>
                          <div class="col-sm-6 col-12 text-right">
                              <h5>{{ $bills[0]->fullname }}</h5>
                              <div class="company-info my-2">
                                  <p>{{ $patients[0]->mobile_number }}</p>
                                  <p> <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$bills[0]->paymentid', 'QRCODE')}}" alt="barcode" />  </p>
                              </div>
                             
                          </div>
                      </div>
                      <!--/ Invoice Recipient Details -->

                      <!-- Invoice Items Details -->
                      <div id="invoice-items-details" class="pt-1 invoice-items-table">
                          <div class="row">
                              <div class="table-responsive col-12">
                                <table class="table table-striped m-b-none text-sm" width="100%">
                                  <thead>
                                    <tr>
                                       
                                      <th width="30" style="font-size:12px">DESCRIPTION</th>
                                      <th width="30" style="font-size:12px">UNIT PRICE</th>
                                      <th width="30" style="font-size:12px">QTY</th>
                                      <th width="30" style="font-size:12px">TOTAL</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   @foreach($bills as $bill )
                                    <tr>
                                     
                                      <td>{{ $bill->item_name }}</td>
                                      <td>{{ $bill->amount }}</td>
                                       <td>{{ $bill->quantity }}</td>
                                      <td>{{ $bill->amount * $bill->quantity }}</td>
                                    </tr>
                                   @endforeach
                  
                  
                  
                                    <tr>
                                      <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                                      <td>GHS {{ $payables }}</td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" class="text-right no-border"><strong>Paid</strong></td>
                                      <td>GHS{{$receivables}}</td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
                                      <td><strong>GHS {{ number_format($payables-$receivables, 1, '.', ',') }}</strong></td>
                                    </tr>
                                  </tbody>
                                </table> 
                              </div>
                          </div>
                      </div>
                      
                      <!-- Invoice Footer -->
                      <div id="invoice-footer" class="text-right pt-3">
                          <p>Transfer the amounts to the business account below. Please include invoice number on your check.
                              <p class="bank-details mb-0">
                                  <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
                                  <span>MOMO: <strong>1111-2222-3333</strong></span>
                              </p>
                      </div>
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


         
@stop


