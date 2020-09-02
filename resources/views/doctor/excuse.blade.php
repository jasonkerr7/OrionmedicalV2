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
                      <h2 class="content-header-title float-left mb-0">Excuse Duty</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Pages</a>
                              </li>
                              <li class="breadcrumb-item active">Excuse Duty
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
           <img src="/images/{{ $mycompany->logo }}" width="15%">
            <div class="row">
              <div class="col-sm-6 col-12 text-left">
                <h4>{{$mycompany->legal_name }}</h4>
                <p><a href="#">{{ $mycompany->email }}</a></p>
                 <p><a href="#">{{ $mycompany->address }}</a></p>
                 <p><a href="#">{{ $mycompany->phone }}</a></p>
                 <p><a href="#">{{ $mycompany->website }}</a></p>
                <br>
                <br>
                <br>
                   
                </div>
                <div class="col-sm-6 col-12 text-right">
                  <p class="h4"># {{ $admission->opd_number }}</p>
                  <h5>{{ date('Y-m-d') }}</h5> 
                  <br>
                  <br>
                   <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($admission->name, 'QRCODE')}}" alt="barcode" /> 
                </div>
              </div>    
            <div>
              <h3 align="center"> <strong> MEDICAL EXCUSE NOTE </strong> </h3>
              <p> This medical excuse note certifies that <strong> {{ $admission->name }} </strong> has been seen at the Gilead Medical & Dental Centre for professional medical attention on <strong> {{ Carbon\Carbon::now()->toDayDateTimeString()  }} </strong></p>
              <br>
              <p> He / She is to be seen for review on (date) ...................................................................... </p>
              <br>

              <p> <strong>Remarks</strong> .....................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................<br>...............................................................................................................................</p>
              <br>
              <p>*We urge employer / school to consider this an excused absence. </p>
            </div>
            
             
            <p class="text-left"> Doctor : {{ Auth::user()->getNameOrUsername() }}</p>
            <br>
            <br>
            <br>
              <br>
            <p class="text-right">Requesting Doctor's Signature : .....................................................................  </p>
            <br>
            <br>
              <br>
              
            
          
          </section>
       
          <!-- invoice page end -->

      </div>
  </div>
</div>
<!-- END: Content-->

                  

        

@stop