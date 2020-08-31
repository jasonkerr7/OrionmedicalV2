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
                        <h2 class="content-header-title float-left mb-0">Clinical Notes</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Notes
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
                                <button class="btn btn-outline-primary" type="button">Send Report</button>
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
                    
                    <!-- Invoice Recipient Details -->
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-sm-6 col-12 text-left">

                          <h6> <strong> Patient Name : </strong> {{ $patients->fullname }}    </h6>
                          <div class="company-info my-2">
                            <p>  <strong> Care Provider : </strong> {{ $admission->care_provider }}</p>
                            <p>  <strong> Age : </strong> {{ $patients->date_of_birth->age }} year(s)</p>
                            <p>  <strong> Gender : </strong> {{ $patients->gender }}</p>
                            <p>  <strong> Contact No.: </strong> {{ $patients->mobile_number }}</p>
                            <p>  <strong> Examination Time/Date : </strong> {{ date("g:ia\, jS M Y", strtotime($admission->created_on )) }}</p>
                            <p>  <strong> Insurance # : </strong> {{ $patients->insurance_id }}</p>
                            <p>  <strong> Examination # : </strong> {{ $admission->opd_number }}</p>
                            <p>  <strong> Patient # : </strong> {{ $patients->patient_id }}</p>
                            <p>  <strong> Date : </strong> {{ date("jS M Y", strtotime(date('Y-m-d')))  }}</p>  
                          </div>
                          
                        </div>
                        <div class="col-sm-6 col-12 text-right">
                           
                          <img src="/images/{{ $mycompany->logo }}" width="25%">
                          <div class="recipient-info my-2">
                            <h4>{{$mycompany->legal_name }}</h4>
                            <p><i class="feather icon-mail"></i>{{ $mycompany->email }}</p>
                             <p>{{ $mycompany->address }}</p>
                             <p><i class="feather icon-phone"></i>{{ $mycompany->phone }}</p>
                             <p>{{ $mycompany->website }}</p>
                          </div>
                        
                        </div>
                    </div>
                    <!--/ Invoice Recipient Details -->

                    <!-- Invoice Items Details -->

                    <div>

               <div class="line"></div>
               <p> <strong> To whom it May Concern: </strong><br>
                I had the privilege to see {{ $patients->fullname }} at the clinic today. @if($patients->gender=='Male') He @else She @endif is a  {{ $patients->date_of_birth->age }}-year-old {{ $patients->gender }} with no significant past medical history who presents to {{$mycompany->legal_name }} as a participant in the <strong> {{ $admission->consultation_type }}  </strong>.
               </p>

 
               <div class="line"></div>
                    


                  <div class="row">
                  <div class="media-body">
                  <p>
                    <span><strong>History</strong></span>
                               <ol>
                                @foreach($myhistories as $history)
                               
                                @if($history->medical_history == '') @else <li> Past Medical History : <b> {{ strtoupper($history->medical_history)}} </b>  </li> @endif
                                
                                @if($history->family_history == '') @else <li>  Family History : <b>{{strtoupper($history->family_history)}} </b> </li> @endif
                              
                              
                                 @if($history->drug_history == '') @else<li>  Drug History :  <b> Takes {{strtoupper($history->drug_history)}}  </b>  </li> @endif
                                
                                @if($history->surgical_history == '') @else <li>  Surgical History : <b>{{strtoupper($history->surgical_history)}}</b>  </li> @endif
                               
                                @if($history->allergy == '') @else <li> Allergies : <b>{{strtoupper($history->allergy)}} </b>  </li> @endif

                                 @if($history->vaccinations_history == '') @else <li>  Vacinnations : <b>{{strtoupper($history->vaccinations_history)}} </b>  </li> @endif
                              
                               @endforeach
                               </ol>
                               
                           </p>
                           </div>
                           </div>
                 
            <div class="row">
                    <div>
                  <p>
                    <span><strong>Vitals</strong></span>
                              <table>
                               @foreach($myvitals as $vital)
                               <tr>
                               <td>
                                @if($vital->weight == '') @else <li> Weight <label class="badge bg-info"> {{strtoupper($vital->weight)}}  </label></li> @endif
                                </td>
                                <td>
                                @if($vital->height == '') @else <li> Height <label class="badge bg-info"> {{strtoupper($vital->height)}}  </label></li> @endif
                                </td>
                                <td>
                                 @if($vital->bmi == '') @else <li> BMI <label class="badge bg-info"> {{strtoupper($vital->bmi)}}  </label></li> @endif
                                 </td>
                                 <td>
                                @if($vital->temperature == '') @else <li> Temperature <label class="badge bg-info"> {{strtoupper($vital->temperature)}} ° </label></li> @endif
                                </td>
                                <td>
                                @if($vital->pulse_rate == '') @else <li> Pulse Rate <label class="badge bg-info"> {{strtoupper($vital->pulse_rate)}}  </label></li> @endif
                                </td>
                                <td>
                                @if($vital->sbp == '') @else <li> Blood Pressure <label class="badge bg-info"> {{strtoupper($vital->sbp)}} / {{$vital->dbp}}  </label></li> @endif
                                </td>
                                 </tr>
                               @endforeach
                               </table>
                  </p>
                  </div>
                  </div>

                  <div class="row">
                  <div>
                  <p>
                     <span><strong>General Examination</strong></span>
                                 @foreach($mype as $physical)
                                <ol>
                                @if($physical->pe_general == '') @else <li> <small class="block m-t-xs">General : <b> {{ strtoupper($physical->pe_general)}} </b> </small> </li> @endif

                                @if($physical->pe_HEENT == '') @else  <li> <small class="block m-t-xs">HEENT : <b> {{strtoupper($physical->pe_HEENT)}} </b> </small> </li> @endif


                                @if($physical->pe_neck == '') @else  <li> <small class="block m-t-xs">Neck : <b> {{strtoupper($physical->pe_neck)}} </b> </small> </li> @endif

                                 @if($physical->pe_respiratory == '') @else  <li> <small class="block m-t-xs">Respiratory : <b> {{strtoupper($physical->pe_respiratory)}} </b> </small> </li> @endif

                                @if($physical->pe_heart == '') @else  <li> <small class="block m-t-xs">Cardiovascular : <b> {{strtoupper($physical->pe_heart)}} </b> </small> </li> @endif


                                @if($physical->pe_abdominal == '') @else  <li> <small class="block m-t-xs">Abdominal : <b> {{strtoupper($physical->pe_abdominal)}} </b> </small> </li> @endif

                                @if($physical->pe_extremities == '') @else  <li> <small class="block m-t-xs">Extremities : <b> {{strtoupper($physical->pe_extremities)}} </b> </small> </li> @endif

                                @if($physical->pe_cns == '') @else  <li> <small class="block m-t-xs">CNS : <b> {{strtoupper($physical->pe_cns)}} </b> </small> </li> @endif

                                @if($physical->pe_musculoskeletal == '') @else  <li> <small class="block m-t-xs">Musculoskeletal : <b> {{strtoupper($physical->pe_musculoskeletal)}} </b> </small> </li> @endif


                                @if($physical->pe_psychological == '') @else <li> <small class="block m-t-xs">Psychological : <b> {{strtoupper($physical->pe_psychological)}} </b> </small> </li> @endif
                                 </ol>

                               @endforeach

                  </p>
                  </div>
                  </div>

              
              <div class="row">
              <div>
                  <p>
                      <span><strong>Investigations</strong></span>
                       

                            <div>
                            <ul class="checkbox-grid">
                             @foreach($mylabs as $key => $lab)
                              <li><span>{{ ++$key }}. {{$lab->investigation}}</span> - <b>{{ strtoupper($lab->remark)}} </b></li>
                            
                               @endforeach
                          </ul>
                          </div>

                        
                  </p>
                  </div>
                  </div>


            
                  
                  <p>
                    <span><strong>Diagnosis</strong></span>
                     <p> @foreach($mydiagnosis as $diagnosis) <label > {{ strtoupper($diagnosis->diagnosis) }}, </label> @endforeach </p> 
                  </p> 
                 
                 

                  <div class="row">
                  <div>
                  <p>
                    <span><strong>Conclusion</strong></span>
                   
                    <p> @foreach($myplans as $myplan) <label > {!! strtoupper($myplan->plan) !!}, </label> @endforeach.....................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................ </p>      
                  </p> 
                  </div>
                  </div>
                    <br>
                    <br>

                   <div class="row">
                  <div>
                  <p>
                    <span><strong>Recommendation(s)</strong></span>
                   
                    <p> @foreach($myplans as $myplan) <label > {!! strtoupper($myplan->action) !!}, </label> @endforeach.....................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................ </p>      
                  </p> 
                  </div>
                  </div> 
                  <br>
                  <br>
                  <br>
                  <p class="pull-right"> ............................................................................. <br> Medical Practitioner's Name : {{ $admission->referal_doctor  }} </p>
                  
                 

                    </div>
                    

                </div>
            </section>
            <!-- invoice page end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<!-- END: Content-->

{{-- <div class="sidenav-overlay"></div>
<div class="drag-target"></div>


          <section class="vbox bg-white">
           <header class="header b-b b-light hidden-print">
                <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
                <p>NOTES</p>
              </header>
              
              <section class="scrollable wrapper" id="summaryreport">
                  <img src="/images/{{ $mycompany->logo }}" width="15%">
                  <h4>{{$mycompany->legal_name }}</h4>
                  <p><a href="#">{{ $mycompany->email }}</a></p>
                   <p><a href="#">{{ $mycompany->address }}</a></p>
                   <p><a href="#">{{ $mycompany->phone }}</a></p>
                   <p><a href="#">{{ $mycompany->website }}</a></p>
                  <br>
              <div class="row">
                <div class="col-xs-8">
                  
              
                
                 
                </div>
                <div class="col-xs-4 text-right">
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$admission->opd_number', 'QRCODE')}}" alt="barcode" />     
                  
                     
                </div>
              </div>    

                  
                  </section> --}}

             
@stop



