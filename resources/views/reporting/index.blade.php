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
                      <h2 class="content-header-title float-left mb-0">Reports</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Main</a>
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
 <!-- With Handle Starts -->
 <section id="dd-with-handle">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
             
              <div class="card-content">
                  <div class="card-body">
                     
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="my-1">OPD</h4>
                              <ul class="list-group" id="handle-list-1">
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/patient-doctor-ratio"> Patient - Doctor Visit Stats </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/patient-visit-stats"> Visit Statistics </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/morbidity-assessment"> Morbidity Assessement </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/patient-list"> Patient List </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/form-patient-visit"> Visits </a></li>
                              </ul>
                          </div>
                          <div class="col-sm-6">
                              <h4 class="my-1">Revenue</h4>
                              <ul class="list-group" id="handle-list-2">
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/medical-summary-department"> Revenue By Departments </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/medical-summary-doctors"> Revenue By Doctors </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/medical-summary-consultation"> Revenue By Consultation </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/bill-listing"> Bills </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/collection-summary"> Receipts </a></li>
                                  <li class="list-group-item"><span class="handle">+</span> <a href="/locum-sheet"> Locums Report </a></li>
                              </ul>
                          </div>
                      </div>
                      <br>
                      <br>
                      <br>

                      <div class="row">
                        <div class="col-sm-6">
                            <h4 class="my-1">Pharmacy & Stores</h4>
                            <ul class="list-group" id="handle-list-1">
                                <li class="list-group-item"><span class="handle">+</span> Revenue For Pharmacy</li>
                                <li class="list-group-item"><span class="handle">+</span> Drug Formulary</li>
                                <li class="list-group-item"><span class="handle">+</span> Stock List</li>
                                <li class="list-group-item"><span class="handle">+</span> Porta ac consectetur ac</li>
                                <li class="list-group-item"><span class="handle">+</span> Vestibulum at eros</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="my-1">Administrative</h4>
                            <ul class="list-group" id="handle-list-2">
                                <li class="list-group-item"><span class="handle">+</span> Cras justo odio</li>
                                <li class="list-group-item"><span class="handle">+</span> Dapibus ac facilisis in</li>
                                <li class="list-group-item"><span class="handle">+</span> Morbi leo risus</li>
                                <li class="list-group-item"><span class="handle">+</span> Porta ac consectetur ac</li>
                                <li class="list-group-item"><span class="handle">+</span> Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // With Handle Ends -->

</div>
</div>
</div>
<!-- END: Content-->


{{-- <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Reports</li>
                
              </ul>
            
              <div class="row">

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-warning portlet-item">
                <header class="panel-heading">
                 OPD
                </header>
                <div class="list-group bg-white">
                  <a href="/patient-doctor-ratio" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Summary of Patient to Doctor Ratio
                  </a>

                  <a href="/patient-visit-stats" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Summary of Visit Statistics
                  </a>

                    <a href="/medical-summary-department-count" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Department - Count
                  </a>

                   <a href="/medical-summary-department" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Department
                  </a>


                  <a href="/vital-temperature" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Visits Vrs Temperature Summary
                  </a>
                   <a href="/vital-bmi" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Vital Summary for BMI
                  </a>

                   <a href="/vital-blood-pressure" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Vital Summary for BP
                  </a>

                       <a href="/morbidity-assessment" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Morbidity Assessment Report
                  </a>

                  <a href="/patient-list" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Patient List
                  </a>

                  <a href="/form-patient-visit" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Patient Visits
                  </a>


                </div>
              </section>
              </div>






               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                 Revenue
                </header>

              
                <div class="list-group bg-white">
                  @role(['System Admin','Billing'])
                  <a href="/bill-listing" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Bill Listings and Summary
                  </a>
                  <a href="/collection-summary" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Collection Summary Report
                  </a>

                   <a href="/locum-sheet" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Locum Sheet
                  </a>
                @endrole

                 @role(['System Admin'])
                  <a href="/medical-summary-consultation" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Consultation
                  </a>
                  <a href="/medical-summary-department" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Department
                  </a>

                   <a href="/medical-summary-department-count" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Department - Count
                  </a>
                  
                     <a href="/medical-summary-doctors" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary By Doctors
                  </a>

                     <a href="/medical-summary-department-all" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary for All Department
                  </a>

                     <a href="/medical-summary-pharmarcy" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary for Pharmacy
                  </a>
                  @endrole

                </div>
              </section>
              </div>

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-success portlet-item">
                <header class="panel-heading">
                 Pharmacy
                </header>
                <div class="list-group bg-white">
                   <a href="/medical-summary-pharmarcy" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Revenue Summary for Pharmacy
                  </a>
                  <a href="/sales-main" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Sales report
                  </a>
                  <a href="/sales" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Drug List
                  </a>
                  <a href="/sales-stock-flow" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Stock List
                  </a>
                
                </div>
              </section>
              </div>

          
    
              </div>
              

            
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section> --}}
@stop