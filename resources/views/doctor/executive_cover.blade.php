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
                      <h2 class="content-header-title float-left mb-0">Cover Letter</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Pages</a>
                              </li>
                              <li class="breadcrumb-item active">Cover Letter
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
                              <button class="btn btn-outline-primary" type="button">Send Cover</button>
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
              <br>
               <br>
               <br>
               <br>
               <p> Dear {{ ucwords(strtolower($patients->fullname)) }}, </p>
                <p>
                Thank you for participating in the <strong>{{ $admission->consultation_type }}</strong>. We appreciate your visit and hope the experience met your expectations. </p> 
                <br>
                 
                 <p>
                Enclosed please find the results of your various examinations and summary of your visit by the physician. We suggest that you retain this with your medical records that you provide a copy to your personal physician. We would be pleased to hear from you or your physican if you have any questions or concerns about the results or if we can be helpful in providing referrals for any additional services that may have been recommended. </p>
                   <br>
                
                <p>
                We are most interested in your feedback about ways we can improve our services, and be grateful for any comments you might provide. 

               </p>

               <p> Best wishes for your good health.</p>

               <br>

               <p >Warmest Regards,</p>
               <br>
               <br>

               <p>Catherine Adu-Sarkodee, <br>
               Medical Director
               </p>
               <p> Executive Health: The Program for Diagnostic and Preventive Medicine </p>

            </div>
            
             
           
            <br>
            <br>
            <br>
              <br>
            <p class="text-right"> Signature : .....................................................................  </p>
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

