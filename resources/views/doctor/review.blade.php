@role(['System Admin','Doctor','Nurse','Nurse Assistance','Dentist','Ophthalmologist'])
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
                   
                  {{-- <img class="rounded-circle float-left" src="/images/{{ $patients[0]->image }}" alt="Generic placeholder image" height="64" width="64" /> --}}
                    <h2 class="content-header-title float-left mb-0">{{ $patients[0]->fullname }}</h2>
                    
                      
                       
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">{{ $patients[0]->gender }}</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">{{ $patients[0]->date_of_birth->age }}</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#"> {{ $patients[0]->civil_status }}</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#"> {{ $visit_details->care_provider }}</a>
                              </li>
                              <li class="breadcrumb-item active"><i class="feather icon-phone-call"></i> {{ $patients[0]->mobile_number }}
                              </li>
                             
                          </ol>
                         
                      </div>
                     
                  </div>
                  
              </div>
              
          </div>
          
                             
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <input type="text" class="btn mr-1 mb-1 btn-danger float-left" readonly="true" value="{{ Request::old('outstanding') ?: '' }}" id="outstanding" name="outstanding">     
              <div class="form-group breadcrum-right">
                
                  <div class="dropdown">
                      <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item"   href="tel:{{$patients[0]->mobile_number  }}">Call</a>
                        <a class="dropdown-item" href="https://wa.me/233{{ltrim($patients[0]->mobile_number,'0')}}?text=Hello {{ ucwords(strtolower($patients[0]->fullname)) }}." target="_new">Whatsapp</a>
                        <a class="dropdown-item" href="#">Video Call</a>
                      <a class="dropdown-item" href="/print-visit-summary/{{ $visit_details->opd_number  }}">Print Clinical Note</a>
                        <a class="dropdown-item" href="#">Print Cover Letter</a>
                        <a class="dropdown-item" href="#">Print Excuse Duty</a>
                        <a class="dropdown-item" href="#">Print Treatment  Letter</a>
                      </div>
                  </div>
                  @role(['Nurse','Nurse Assistant','System Admin'])
                  <div class="dropdown">
                    <button class="btn-icon btn btn-warning btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-user"></i></button>
                    <div class="dropdown-menu dropdown-menu-right scrollable">
                      @foreach($doctors as $doctor)
                      <a class="dropdown-item" onclick="assignDoctor('{{ $visit_details->id }}','{{ $doctor->name }}')">{{ $doctor->name }}</a>
                      @endforeach
                    </div>
                </div>
                @endrole
              </div>
              
          </div>
      </div>
      <div class="content-body">

                                    <input type="hidden" id="accounttype" name="accounttype" value="{{ $patients[0]->accounttype }}">
                                    <input type="hidden" id="opd_number" name="opd_number" value="{{ $visit_details->opd_number }}">
                                    <input type="hidden" id="fullname" name="fullname" value="{{ $visit_details->name }}">
                                    <input type="hidden" id="patient_id" name="patient_id" value="{{ $visit_details->patient_id }}">
          <!-- account setting page start -->
          <section id="page-account-settings">
              <div class="row">
                  <!-- left menu section -->
                  <div class="col-md-2 mb-2 mb-md-0">
                      <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                          
                          @role(['Doctor','Dentist','System Admin'])
                          <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i class="feather icon-sliders mr-50 font-medium-3"></i>
                                    Encounter Notes
                                </a>
                            </li>
                          @endrole

                          @role(['Dentist'])
                            <li class="nav-item">
                              <a class="nav-link d-flex py-75" id="account-pill-extraoral" data-toggle="pill" href="#account-vertical-extraoral" aria-expanded="false">
                                  <i class="feather icon-grid mr-50 font-medium-3"></i>
                                  Ortho Notes
                              </a>
                          </li>
                          @endrole

                          <li class="nav-item">
                              <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                  <i class="feather icon-info mr-50 font-medium-3"></i>
                                  Plan
                              </a>
                          </li>

                          @role(['Doctor','Dentist','System Admin'])
                          <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-diagnosis" data-toggle="pill" href="#account-vertical-diagnosis" aria-expanded="false">
                                <i class="feather icon-unlock mr-50 font-medium-3"></i>
                                Diagnosis
                            </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link d-flex py-75" id="account-pill-lab-request" data-toggle="pill" href="#account-vertical-lab-request" aria-expanded="false">
                                  <i class="feather icon-thermometer mr-50 font-medium-3"></i>
                                   Investigations
                              </a>
                          </li>
                          <li class="nav-item">
                            
                            <a class="nav-link d-flex py-75" id="account-pill-results" data-toggle="pill" href="#account-vertical-results" aria-expanded="false">
                                <i class="feather icon-align-justify mr-50 font-medium-3"> </i>
                                Lab Results
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                <span class="badge badge badge-pill badge-danger float-right mr-2">{{ $mylabsready}} / {{$mylabstotal}}</span>
                            </a>
                           
                        </li>
                        
                        @endrole

                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-procedure" data-toggle="pill" href="#account-vertical-procedure" aria-expanded="false">
                              <i class="feather icon-scissors mr-50 font-medium-3"></i>
                               Procedures
                          </a>
                      </li>

                          <li class="nav-item">
                              <a class="nav-link d-flex py-75" id="account-pill-medication" data-toggle="pill" href="#account-vertical-medication" aria-expanded="false">
                                  <i class="feather icon-link-2 mr-50 font-medium-3"></i>
                                  Prescription
                              </a>
                          </li>

                          @role(['Ophthalmologist'])
                          <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-ocular" data-toggle="pill" href="#account-vertical-ocular" aria-expanded="false">
                                <i class="feather icon-eye-off mr-50 font-medium-3"></i>
                                Ocular Examination
                            </a>
                         </li>

                         <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-refraction" data-toggle="pill" href="#account-vertical-refraction" aria-expanded="false">
                              <i class="feather icon-crosshair mr-50 font-medium-3"></i>
                              Refraction Finding 
                          </a>
                         </li>
                       @endrole


                          <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-vitals" data-toggle="pill" href="#account-vertical-vitals" aria-expanded="false">
                                <i class="feather icon-bar-chart-2 mr-50 font-medium-3"></i>
                                Vital Chart 
                            </a>
                         </li>


                        
                         @role(['Gynaecologist'])
                         <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-antenatal" data-toggle="pill" href="#account-vertical-antenatal" aria-expanded="false">
                              <i class="feather icon-share-2 mr-50 font-medium-3"></i>
                              Antenatal Chart
                          </a>
                        </li>
                         
                  
                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-surgery" data-toggle="pill" href="#account-vertical-surgery" aria-expanded="false">
                              <i class="feather icon-list mr-50 font-medium-3"></i>
                              Surgery Notes 
                          </a>
                        </li>
                        @else
                        @endif


                         @role(['Nurse','System Admin'])
                         <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-drug-chart" data-toggle="pill" href="#account-vertical-drug-chart" aria-expanded="false">
                              <i class="feather icon-server mr-50 font-medium-3"></i>
                              Drug Course Chart 
                          </a>
                        </li>

                       <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-fluid-chart" data-toggle="pill" href="#account-vertical-fluid-chart" aria-expanded="false">
                            <i class="feather icon-filter mr-50 font-medium-3"></i>
                            Fluid Chart 
                        </a>
                       </li>
                        <!-- Nurse tab start section -->
                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-nurse-plan" data-toggle="pill" href="#account-vertical-nurse-plan" aria-expanded="false">
                              <i class="feather icon-file-text mr-50 font-medium-3"></i>
                              Nurse Plan 
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-nurse-notes" data-toggle="pill" href="#account-vertical-nurse-notes" aria-expanded="false">
                              <i class="feather icon-layout mr-50 font-medium-3"></i>
                              Nurse Notes 
                          </a>
                        </li>
                        @endrole

                       

                        
                        <!-- Nurse tab end content section -->


                          <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-referal" data-toggle="pill" href="#account-vertical-referal" aria-expanded="false">
                                <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                Refereral Note
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-discharge" data-toggle="pill" href="#account-vertical-discharge" aria-expanded="false">
                              <i class="feather icon-user-x mr-50 font-medium-3"></i>
                              Discharge Note
                          </a>
                      </li>
                      

                      <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-appointment" data-toggle="pill" href="#account-vertical-appointment" aria-expanded="false">
                          <i class="feather icon-bell mr-50 text-danger font-medium-3"></i>
                            Book Next Visit
                        </a>
                       
                      </li>

                      <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-admission" data-toggle="pill" href="#account-vertical-admission" aria-expanded="false">
                          <i class="feather icon-log-in mr-50 text-danger font-medium-3"></i>
                            Admit Patient to Ward
                        </a>
                      </li>


                        <li class="nav-item">
                          <a class="nav-link d-flex py-75" id="account-pill-documents" data-toggle="pill" href="#account-vertical-documents" aria-expanded="false">
                              <i class="feather icon-upload-cloud mr-50 font-medium-3"></i>
                              Uploaded Documents
                          </a>
                      </li>
                      </ul>
                  </div>
                  <!-- right content section -->
                  <div class="col-md-9">
                      <div class="card">
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                          <div class="media">
                                             
                                              <div class="media-body mt-75">
                                                  <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                      {{-- <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Vitals</label> --}}
                                                      {{-- <input type="file" id="account-upload" hidden> --}}
                                                      @foreach($myvitals as $vital)
                                                      @if($vital->weight == '') @else <label class="badge badge-pill badge-glow badge-danger mr-1 mb-1"> Weight - {{$vital->weight}} </label> @endif
                                                      @if($vital->height == '') @else <label class="abdge badge-pill badge-glow badge-danger mr-1 mb-1"> Height -  {{$vital->height}} </label> @endif
                                                      @if($vital->bmi == '') @else <label class="badge  badge-pill badge-glow badge-danger mr-1 mb-1"> BMI - {{$vital->bmi}} ({{ $vital->bmi_status }}) </label> @endif
                                                      @if($vital->temperature == '') @else <label class="badge  badge-pill badge-glow badge-danger mr-1 mb-1"> Temp - {{$vital->temperature}} ° ({{ $vital->temp_status }})  </label> @endif
                                                      @if($vital->pulse_rate == '') @else <label class="badge  badge-pill badge-glow badge-danger mr-1 mb-1"> Pulse - {{$vital->pulse_rate}} </label> @endif
                                                      @if($vital->bp_status == '') @else <label class="badge  badge-pill badge-glow badge-danger mr-1 mb-1"> BP - {{$vital->sbp }} / {{ $vital->dbp  }} ({{ $vital->bp_status }}) </label> @endif
                                                      
                                                      {{-- @if($vital->waist_circumference == '') @else <li> Waist Circumference <label class="badge bg-info"> {{$vital->waist_circumference }} </label></li> @endif
                                                      @if($vital->hip_circumference == '') @else <li> Hip Circumference <label class="badge bg-info"> {{$vital->hip_circumference }} </label></li> @endif
                                                      @if($vital->b_fat == '') @else <li> Body Fat <label class="badge bg-info"> {{$vital->b_fat }} </label></li> @endif
                                                      @if($vital->v_fat == '') @else <li> Visceral Fat <label class="badge bg-info"> {{$vital->v_fat }} </label></li> @endif
                                                      @if($vital->calories == '') @else <li> Current Calories <label class="badge bg-info"> {{$vital->calories }} </label></li> @endif
                                                      @if($vital->weight == '') @else <li> WHR <label class="badge bg-info"> {{ $vital->waist_circumference/$vital->hip_circumference }}  </label></li> @endif
                                                      @if($vital->IBW_range_lower == '') @else <li> IBW Range Upper <label class="badge bg-info"> {{ $vital->IBW_range_lower }}  </label></li> @endif
                                                      @if($vital->IBW_range_upper == '') @else <li> IBW Range Lower <label class="badge bg-info"> {{ $vital->IBW_range_upper }}  </label></li> @endif --}}
                                                        @endforeach

                                                  </div>
                                                  {{-- <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                          size of
                                                          800kB</small></p> --}}
                                              </div>
                                          </div>
                                          <hr>
                                          <br>
                                          <br>
                                         

                                          
                                              <div class="row">
                                                  <div class="col-6">
                                                    <fieldset class="form-label-group">
                                                    <textarea class="form-control text-uppercase" id="complaint" name="complaint" rows="3" placeholder="Chief Complaint">{{ $mycomplaints->complaint }}</textarea>
                                                      <label for="label-textarea">Chief Complaint</label>
                                                    </fieldset>
                                                  </div>
                                                  <div class="col-6">
                                                    <fieldset class="form-label-group">
                                                      <textarea class="form-control text-uppercase" id="directquestion" name="directquestion" rows="3" placeholder="Direct Questions">{{ $mycomplaints->directquestion }}</textarea>
                                                      <label for="label-textarea">Direct Questions</label>
                                                    </fieldset>
                                                </div>
                                                  <div class="col-12">
                                                   
                                                    <fieldset class="form-label-group">
                                                      <textarea class="form-control text-uppercase" id="presentingcomplaint" name="presentingcomplaint" rows="3" placeholder="History of Presenting Illness">{!! $mycomplaints->presenting !!}</textarea>
                                                      
                                                      {{-- <div id="presentingcomplaint" name="presentingcomplaint" class="form-control" placeholder="History of Presenting Illness" style="overflow:scroll;height:100px;max-height:150px" contenteditable="true"> {!! $mycomplaints->presenting !!} </div> --}}

                                                      <label for="label-textarea">History of Presenting Illness</label> 
                                                  </fieldset>
                                                  </div>
                                                  
                                                  <div class="col-12">
                                                      <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span>
                                                          </button>
                                                          <p class="mb-0">
                                                              Histories
                                                          </p>
                                                          
                                                      </div>
                                                  </div> 
                                                  <!-- Accordion with margin start -->
                                                 
                

              <!-- Nav Justified Starts -->
              <section id="nav-justified">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                           
                            <div class="card-content">
                                <div class="card-body">
                                   
                                    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">Clinical History</a>
                                        </li>
                                        @role(['Doctor','System Admin'])
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="false">Review of Systems</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="messages-tab-justified" data-toggle="tab" href="#messages-just" role="tab" aria-controls="messages-just" aria-selected="false">Physical Examination</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-toggle="tab" href="#settings-just" role="tab" aria-controls="settings-just" aria-selected="true">Doctor's Remarks</a>
                                        </li> 
                                        @endrole
                                        @role(['Dentist','System Admin'])
                                        <li class="nav-item">
                                          <a class="nav-link" id="extraoral-tab-justified" data-toggle="tab" href="#extraoral-just" role="tab" aria-controls="extraoral-just" aria-selected="true">Dental History</a>
                                        </li> 
                                       @endrole
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                                          <p>
                                            {{-- <code>A narrative or record of past events and circumstances that are or may be relevant to a patient's current state of health. Informally, an account of past diseases, injuries, treatments, and other strictly medical facts</code> --}}
                                        </p>
                                          <div class="row">
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="medical_history" class="badge badge-pill badge-light-primary mr-1 mb-1">Medical History</label>
                                                <div class="form-label-group">
                                                  <select name="medical_history[]" id="medical_history" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $myhistories->medical_history }}" @if($myhistories->medical_history) selected @else @endif> {{ $myhistories->medical_history }} </option>
                                                    @foreach($pastmedicalhx as $pastmedicalhx)
                                                    <option  value="{{ $pastmedicalhx->type }}">{{ $pastmedicalhx->type }}</option>
                                                    @endforeach
                                                   </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="family_history" class="badge badge-pill badge-light-primary mr-1 mb-1">Family History</label>
                                                <div class="form-label-group">
                                                  <select name="family_history[]" id="family_history" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $myhistories->family_history }}" @if($myhistories->family_history) selected @else @endif > {{ $myhistories->family_history }}</option>
                                                    @foreach($familyhx as $familyhx)
                                                    <option  value="{{ $familyhx->type }}">{{ $familyhx->type }}</option>
                                                    @endforeach
                                                   </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="city-column" class="badge badge-pill badge-light-primary mr-1 mb-1">Social History</label>
                                                <div class="form-label-group">
                                                  <select name="social_history[]" id="social_history" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $myhistories->social_history }}" @if($myhistories->social_history) selected @else @endif >  {{ $myhistories->social_history }} </option>
                                                    @foreach($socialhx as $socialhx)
                                                    <option  value="{{ $socialhx->type }}">{{ $socialhx->type }}</option>
                                                    @endforeach
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Vaccinnation</label>
                                                <div class="form-label-group">
                                                  <select name="vaccinations_history[]" id="vaccinations_history" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $myhistories->vaccinations_history }}" @if($myhistories->vaccinations_history) selected @else @endif> {{ $myhistories->vaccinations_history }} </option>
                                                    @foreach($vacinnationhx as $vacinnationhx)
                                                    <option  value="{{ $vacinnationhx->type }}">{{ $vacinnationhx->type }}</option>
                                                    @endforeach
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Drug History</label>
                                              <div class="form-label-group">
                                                <select name="drug_history[]" id="drug_history" class="select2-size-sm form-control" multiple="multiple">
                                                  <option value="{{ $myhistories->drug_history }}" @if($myhistories->drug_history) selected @else @endif> {{ $myhistories->drug_history }} </option>
                                                  @foreach($medicationhx as $medicationhx)
                                                  <option  value="{{ $medicationhx->type }}">{{ $medicationhx->type }}</option>
                                                  @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Surgical History</label>
                                            <div class="form-label-group">
                                              <select name="surgical_history[]" id="surgical_history" class="select2-size-sm form-control" multiple="multiple">
                                                <option value="{{ $myhistories->surgical_history }}" @if($myhistories->surgical_history) selected @else @endif> {{ $myhistories->surgical_history }}</option>
                                                @foreach($surgicalhx as $surgicalhx)
                                                <option  value="{{ $surgicalhx->type }}">{{ $surgicalhx->type }}</option>
                                                @endforeach
                                                </select> 
                                            </div>
                                         </div>
                                         <div class="col-md-4 col-12 font-small-3">
                                          <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Reproductive History</label>
                                          <div class="form-label-group">
                                            <select name="reproductive_history[]" id="reproductive_history" class="select2-size-sm form-control" multiple="multiple">
                                              <option value="{{ $myhistories->reproductive_history }}" @if($myhistories->reproductive_history) selected @else @endif > {{ $myhistories->reproductive_history }} </option>
                                              @foreach($reproductivehx as $reproductivehx)
                                              <option  value="{{ $reproductivehx->type }}">{{ $reproductivehx->type }}</option>
                                              @endforeach
                                              </select> 
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-12 font-small-3">
                                        <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Allegy</label>
                                        <div class="form-label-group">
                                          <select name="allergy[]" id="allergy" class="select2-size-sm form-control" multiple="multiple">
                                            <option value="{{ $myhistories->allergy }}" @if($myhistories->allergy) selected @else @endif> {{ $myhistories->allergy }} </option>
                                            @foreach($allergichx as $allergichx)
                                            <option  value="{{ $allergichx->type }}">{{ $allergichx->type }}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                     </div>

                                   <div class="col-md-4 col-12 font-small-3">
                                    <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Recent Drug History</label>
                                    <div class="form-label-group">
                                      <select name="drug_history_recent[]" id="drug_history_recent" class="select2-size-sm form-control" multiple="multiple">
                                        <option value="{{ $myhistories->drug_history_recent }}" @if($myhistories->drug_history_recent) selected @else @endif> {{ $myhistories->drug_history_recent }} </option>
                                        </select>  
                                        
                                    </div>
                                 </div>



                                   
                                           
                                           
                                        </div>
                                        </div>
                                        <div class="tab-pane" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
                                          <div class="row">
    
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Constitutional</label>
                                              <div class="form-label-group">
                                                  <select name="ros_constitutional[]" id="ros_constitutional" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->general }}" @if($myros->general) selected @else @endif > {{ $myros->general }} </option>
                                                      @foreach($ros_constitutional as $ros_constitutional)
                                                      <option  value="{{ $ros_constitutional->type }}">{{ $ros_constitutional->type }}</option>
                                                      @endforeach
                                                      </select>    
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Skin</label>
                                              <div class="form-label-group">
                                                  <select name="ros_skin[]" id="ros_skin" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->skin }}" @if($myros->skin) selected @else @endif >  {{ $myros->skin }} </option>
                                                      @foreach($ros_skin as $ros_skin)
                                                      <option  value="{{ $ros_skin->type }}">{{ $ros_skin->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Head</label>
                                              <div class="form-label-group">
                                                  <select name="ros_head[]" id="ros_head" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->head }}" @if($myros->head) selected @else @endif > {{ $myros->head }} </option>
                                                      @foreach($ros_head as $ros_head)
                                                      <option  value="{{ $ros_head->type }}">{{ $ros_head->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Eyes</label>
                                              <div class="form-label-group">
                                                  <select name="ros_eyes[]" id="ros_eyes" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->eyes }}" @if($myros->eyes) selected @else @endif >  {{ $myros->eyes }} </option>
                                                      @foreach($ros_eyes as $ros_eyes)
                                                      <option  value="{{ $ros_eyes->type }}">{{ $ros_eyes->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Ears</label>
                                              <div class="form-label-group">
                                                  <select name="ros_ears[]" id="ros_ears" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->ears }}" @if($myros->ears) selected @else @endif > {{ $myros->ears }} </option>
                                                      @foreach($ros_ears as $ros_ears)
                                                      <option  value="{{ $ros_ears->type }}">{{ $ros_ears->type }}</option>
                                                      @endforeach
                                                  </select>  
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Nose</label>
                                              <div class="form-label-group">
                                                  <select name="ros_nose[]" id="ros_nose" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->nose }}" @if($myros->nose) selected @else @endif > {{ $myros->nose }} </option>
                                                      @foreach($ros_nose as $ros_nose)
                                                      <option  value="{{ $ros_nose->type }}">{{ $ros_nose->type }}</option>
                                                      @endforeach
                                                  </select>  
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Throat</label>
                                              <div class="form-label-group">
                                                  <select name="ros_throat[]" id="ros_throat" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->throat }}" @if($myros->throat) selected @else @endif >{{ $myros->throat }} </option>
                                                      @foreach($ros_throat as $ros_throat)
                                                      <option  value="{{ $ros_throat->type }}">{{ $ros_throat->type }}</option>
                                                      @endforeach
                                                      </select>  
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Respiratory</label>
                                              <div class="form-label-group">
                                                  <select name="ros_respiratory[]" id="ros_respiratory" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->respiratory }}" @if($myros->respiratory) selected @else @endif > {{ $myros->respiratory }} </option>
                                                      @foreach($ros_respiratory as $ros_respiratory)
                                                      <option  value="{{ $ros_respiratory->type }}">{{ $ros_respiratory->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                          
                                          <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Cardiovascular</label>
                                              <div class="form-label-group">
                                                  <select name="ros_cardiovasular[]" id="ros_cardiovasular" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->cardiovascular }}" @if($myros->cardiovascular) selected @else @endif > {{ $myros->cardiovascular }} </option>
                                                      @foreach($ros_cardiovasular as $ros_cardiovasular)
                                                      <option  value="{{ $ros_cardiovasular->type }}">{{ $ros_cardiovasular->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Gynecologic</label>
                                              <div class="form-label-group">
                                                  <select name="ros_gynecology[]" id="ros_gynecology" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->gynecologic }}" @if($myros->gynecologic) selected @else @endif >{{ $myros->gynecologic }} </option>
                                                      @foreach($ros_gynecology as $ros_gynecology)
                                                      <option  value="{{ $ros_gynecology->type }}">{{ $ros_gynecology->type }}</option>
                                                      @endforeach
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Genitourinary</label>
                                              <div class="form-label-group">
                                                  <select name="ros_genitourinary[]" id="ros_genitourinary" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->genitourinary }}" @if($myros->genitourinary) selected @else @endif> {{ $myros->genitourinary }} </option>
                                                      @foreach($ros_genitourinary as $ros_genitourinary)
                                                      <option  value="{{ $ros_genitourinary->type }}">{{ $ros_genitourinary->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">endocrine</label>
                                              <div class="form-label-group">
                                                  <select name="ros_endocrine[]" id="ros_endocrine" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->endocrine }}" @if($myros->endocrine) selected @else @endif > {{ $myros->endocrine }} </option>
                                                      @foreach($ros_endocrine as $ros_endocrine)
                                                      <option  value="{{ $ros_endocrine->type }}">{{ $ros_endocrine->type }}</option>
                                                      @endforeach
                                                      </select>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Musculoskeletal</label>
                                              <div class="form-label-group">
                                                  <select name="ros_musculoskeletal[]" id="ros_musculoskeletal" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->musculoskeletal }}" @if($myros->musculoskeletal) selected @else @endif > {{ $myros->musculoskeletal }} </option>
                                                      @foreach($ros_musculoskeletal as $ros_musculoskeletal)
                                                      <option  value="{{ $ros_musculoskeletal->type }}">{{ $ros_musculoskeletal->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Peripheral Vascular</label>
                                              <div class="form-label-group">
                                                  <select name="ros_peripheral_vascular[]" id="ros_peripheral_vascular" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->peripheral_vascular }}" @if($myros->peripheral_vascular) selected @else @endif > {{ $myros->peripheral_vascular }} </option>
                                                      @foreach($ros_peripheral_vascular as $ros_peripheral_vascular)
                                                      <option  value="{{ $ros_peripheral_vascular->type }}">{{ $ros_peripheral_vascular->type }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Hematology</label>
                                              <div class="form-label-group">
                                                  <select name="ros_hematology[]" id="ros_hematology" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->hematology }}" @if($myros->hematology) selected @else @endif > {{ $myros->hematology }} </option>
                                                      @foreach($ros_hematology as $ros_hematology)
                                                      <option  value="{{ $ros_hematology->type }}">{{ $ros_hematology->type }}</option>
                                                      @endforeach
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Neuropsychiatric</label>
                                              <div class="form-label-group">
                                                  <select name="ros_neuropsychiatric[]" id="ros_neuropsychiatric" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myros->neuro }}" @if($myros->neuro) selected @else @endif > {{ $myros->neuro }} </option>
                                                      @foreach($ros_neuropsychiatric as $ros_neuropsychiatric)
                                                      <option  value="{{ $ros_neuropsychiatric->type }}">{{ $ros_neuropsychiatric->type }}</option>
                                                      @endforeach
                                                  </select>   
                                              </div>
                                           </div>
                                        
                                        
                                        </div>
                                        </div>


                                        <div class="tab-pane" id="messages-just" role="tabpanel" aria-labelledby="messages-tab-justified">
                                          <p>
                                          <code>Evaluating objective anatomic findings through the use of observation, palpation, percussion, and auscultation. The information obtained must be thoughtfully integrated with the patient's history and pathophysiology. </code>
                                          </p>

                                           <div class="row">
                                            <div class="col-md-4 col-12 font-small-3">
                                              <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">General</label>
                                              <div class="form-label-group">
                                                  <select name="pe_general[]" id="pe_general" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $mype->pe_general }}" @if($mype->pe_general) selected @else @endif> {{ $mype->pe_general }} </option>
                                                      @foreach($pe_constitutional as $pe_constitutional)
                                                      <option  value="{{ $pe_constitutional->type }}">{{ $pe_constitutional->type }}</option>
                                                      @endforeach 
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">HEENT</label>
                                              <div class="form-label-group">
                                                  <select name="pe_HEENT[]" id="pe_HEENT" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_HEENT }}" @if($mype->pe_HEENT) selected @else @endif> {{ $mype->pe_HEENT }} </option>
                                                      @foreach($pe_HEENT as $pe_HEENT)
                                                      <option  value="{{ $pe_HEENT->type }}">{{ $pe_HEENT->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Neck</label>
                                              <div class="form-label-group">
                                                  <select name="pe_neck[]" id="pe_neck" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_neck }}" @if($mype->pe_neck) selected @else @endif> {{ $mype->pe_neck }} </option>
                                                      @foreach($pe_neck as $pe_neck)
                                                      <option  value="{{ $pe_neck->type }}">{{ $pe_neck->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Skin</label>
                                              <div class="form-label-group">
                                                  <select name="pe_skin[]" id="pe_skin" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_skin }}" @if($mype->pe_skin) selected @else @endif> {{ $mype->pe_skin }} </option>
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Lungs</label>
                                              <div class="form-label-group">
                                                  <select name="pe_respiratory[]" id="pe_respiratory" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_respiratory }}" @if($mype->pe_respiratory) selected @else @endif> {{ $mype->pe_respiratory }} </option>
                                                      @foreach($pe_respiratory as $pe_respiratory)
                                                      <option  value="{{ $pe_respiratory->type }}">{{ $pe_respiratory->type }}</option>
                                                      @endforeach 
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Heart</label>
                                              <div class="form-label-group">
                                                  <select name="pe_heart[]" id="pe_heart" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_heart }}" @if($mype->pe_heart) selected @else @endif> {{ $mype->pe_heart }} </option>
                                                      @foreach($pe_heart as $pe_heart)
                                                      <option  value="{{ $pe_heart->type }}">{{ $pe_heart->type }}</option>
                                                      @endforeach 
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Abdomen</label>
                                              <div class="form-label-group">
                                                  <select name="pe_abdominal[]" id="pe_abdominal" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_abdominal }}" @if($mype->pe_abdominal) selected @else @endif> {{ $mype->pe_abdominal }} </option>
                                                      @foreach($pe_abdominal as $pe_abdominal)
                                                      <option  value="{{ $pe_abdominal->type }}">{{ $pe_abdominal->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Extremities</label>
                                              <div class="form-label-group">
                                                  <select name="pe_extremities[]" id="pe_extremities" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_extremities }}" @if($mype->pe_extremities) selected @else @endif> {{ $mype->pe_extremities }} </option>
                                                      @foreach($pe_extremities as $pe_extremities)
                                                      <option  value="{{ $pe_extremities->type }}">{{ $pe_extremities->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">CNS</label>
                                              <div class="form-label-group">
                                                  <select name="pe_cns[]" id="pe_cns" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_cns }}" @if($mype->pe_cns) selected @else @endif> {{ $mype->pe_cns }} </option>
                                                      @foreach($pe_neuropsychiatric as $pe_neuropsychiatric)
                                                      <option  value="{{ $pe_neuropsychiatric->type }}">{{ $pe_neuropsychiatric->type }}</option>
                                                      @endforeach 
                                                  </select> 
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Musculoskeletal</label>
                                              <div class="form-label-group">
                                                  <select name="pe_musculoskeletal[]" id="pe_musculoskeletal" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_musculoskeletal }}" @if($mype->pe_musculoskeletal) selected @else @endif> {{ $mype->pe_musculoskeletal }} </option>
                                                      @foreach($pe_musculoskeletal as $pe_musculoskeletal)
                                                      <option  value="{{ $pe_musculoskeletal->type }}">{{ $pe_musculoskeletal->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Psychological</label>
                                              <div class="form-label-group">
                                                  <select name="pe_psychological[]" id="pe_psychological" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_psychological }}" @if($mype->pe_psychological) selected @else @endif> {{ $mype->pe_psychological }} </option>
                                                      @foreach($pe_psychological as $pe_psychological)
                                                      <option  value="{{ $pe_psychological->type }}">{{ $pe_psychological->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-4 col-12 font-small-3">
                                            <label for="country-floating" class="badge badge-pill badge-light-primary mr-1 mb-1">Breast</label>
                                              <div class="form-label-group">
                                                  <select name="pe_breast[]" id="pe_breast" class="select2-size-sm form-control" multiple="multiple">
                                                    <option value="{{ $mype->pe_breast }}" @if($mype->pe_breast) selected @else @endif> {{ $mype->pe_breast }} </option>
                                                      @foreach($pe_breast as $pe_breast)
                                                      <option  value="{{ $pe_breast->type }}">{{ $pe_breast->type }}</option>
                                                      @endforeach 
                                                  </select>
                                              </div>
                                           </div>
                                           </div>
                                        </div>
                                        <div class="tab-pane" id="settings-just" role="tabpanel" aria-labelledby="settings-tab-justified">
                                          <p>
                                            <code> Short record of important information and facts which may be used in transactions between two or more parties. This note can be an advice of a doctor or a medical professional about  current medical condition according to the results of your medical examination. It may serve as your sick note in the instance of your absence from school or work– a verification of your excuse. </code>
                                         </p>
                                        <section class="basic-textarea">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="card">
                                                       
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                              
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <fieldset class="form-group">
                                                                        <textarea class="form-control" id="perspective_comment_doctor" name="perspective_comment_doctor" rows="3" placeholder=""> {{ $mycomplaints->doctors_note }} </textarea>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section> 
                                        </div>

{{-- 
                                        <div class="tab-pane" id="extraoral-just" role="tabpanel" aria-labelledby="extraoral-tab-justified">
                                          <p> <code>The extraoral head and neck soft tissue examination
                                            includes checking for asymmetries, a lymph node
                                            examination and a brief temporomandibular joint
                                            examination. </code> </p>
                                          <div class="row">
                                            <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="lymph_node[]" id="lymph_node" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myortho->lymph_node }}" selected > {{ $myortho->lymph_node }} </option>
                                                      <option  value="Enlarged ">Enlarged </option>
                                                      <option  value="Tender">Tender</option>
                                                      <option  value="Muttered">Muttered </option>
                                                      <option  value="Ulcerated">Ulcerated </option>
                                                      <option  value="Discharging ">Discharging  </option>
                                                      <option  value="Other">Other </option>
                                                  </select>   
                                                  <label for="country-floating">Lymph Node</label>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="tmj[]" id="tmj" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value=" {{ $myortho->tmj }}" selected >  {{ $myortho->tmj }} </option>
                                                      <option  value="Click">Click</option>
                                                      <option  value="Discomfort on palpation">Discomfort on palpation</option>
                                                      <option  value="Dislocation ">Dislocation</option>
                                                    </select>  
                                                  <label for="country-floating">TMJ</label>
                                              </div>
                                           </div>
                                          
                                           <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="muscle_of_mastication[]" id="muscle_of_mastication" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myortho->muscle_of_mastication }}" selected > {{ $myortho->muscle_of_mastication }} </option>
                                                      <option  value="Tender">Tender</option>
                                                      <option  value="Swelling">Swelling</option>
                                                      <option  value="Dislocation ">Dislocation</option>
                                                    </select>   
                                                  <label for="country-floating">Muscle of mastication</label>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="skeletal_pattern[]" id="skeletal_pattern" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myortho->skeletal_pattern }}" selected > {{ $myortho->skeletal_pattern }}</option>
                                                      <option  value="Antero-posterior - I - Mild"> Antero-posterior - I - Mild</option>
                                                      <option  value="Antero-posterior - II - Mild"> Antero-posterior - II - Mild</option>
                                                      <option  value="Antero-posterior - III - Mild"> Antero-posterior - III - Mild</option>
                                                      <option  value="Antero-posterior - I - Moderate"> Antero-posterior - I - Moderate </option>
                                                      <option  value="Antero-posterior - II - Moderate"> Antero-posterior - II - Moderate</option>
                                                      <option  value="Antero-posterior - III - Moderate"> Antero-posterior - III - Moderate</option>
                                                      <option  value="Antero-posterior - I - Severe"> Antero-posterior - I - Severe</option>
                                                      <option  value="Antero-posterior - II - Severe"> Antero-posterior - II - Severe</option>
                                                      <option  value="Antero-posterior - III - Severe"> Antero-posterior - III - Severe</option>
                                                      <option  value="Vertical - FMPA - Average"> Vertical - FMPA - Average</option>
                                                      <option  value="Vertical - FMPA - Increased"> Vertical - FMPA - Increased</option>
                                                      <option  value="Vertical - FMPA - Decreased"> Vertical - FMPA - Decreased</option>
                                                      <option  value="Vertical - LAFH - Average"> Vertical - LAFH - Average</option>
                                                      <option  value="Vertical - LAFH - Increased"> Vertical - LAFH - Increased</option>
                                                      <option  value="Vertical - LAFH - Decreased"> Vertical - LAFH - Decreased</option>
                                                      <option  value="Transverce - Yes">Transverce - Yes</option>
                                                      <option  value="Vertical - No">Vertical - No</option>
                                                      </select>     
                                                  <label for="country-floating">Skeletal Pattern</label>
                                              </div>
                                           </div>
                                          
                                           
                                           <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="smile_incisor_show[]" id="smile_incisor_show" class="select2-size-sm form-control" multiple="multiple">
                                                  <option value="{{ $myortho->smile_incisor_show }}" selected > {{ $myortho->smile_incisor_show }} </option>
                                                  </select>   
                                                  <label for="country-floating">Smile</label>
                                              </div>
                                           </div>
                                          
                                          
                                           <div class="col-md-6 col-12 font-small-2">
                                              <div class="form-label-group">
                                                  <select name="soft_tissue_extraoral[]" id="soft_tissue_extraoral" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="{{ $myortho->soft_tissue_extraoral }}" selected > {{ $myortho->soft_tissue_extraoral }} </option>
                                                      <option  value="Lips - Competent">Lips - Competent</option>
                                                      <option  value="Lips - Inompetent">Lips - Inompetent</option>
                                                      <option  value="Lip Length - Short">Lip Length - Short</option>
                                                      <option  value="Lip Length - Average">Lip Length - Average</option>
                                                      <option  value="Lip Length - Increased">Lip Length - Increased</option>
                                                      <option  value="Lip Line - High">Lip Line - High</option>
                                                      <option  value="Lip Line - Normal">Lip Line - Normal</option>
                                                      <option  value="Lip Line - Low">Lip Line - Low</option>
                                                      <option  value="Nasolabial angle - Acute">Nasolabial angle - Acute</option>
                                                      <option  value="Nasolabial angle - Normal">Nasolabial angle - Normal</option>
                                                      <option  value="Nasolabial angle - Obtuse">Nasolabial angle - Obtuse</option>
                                                      <option  value="Labiomental groove - Marked">Labiomental groove - Marked</option>
                                                      <option  value="Labiomental groove - Normal">Labiomental groove - Normal</option>
                                                      <option  value="Labiomental groove - Absent">Labiomental groove - Absent</option>
                                                      </select>     
                                                  <label for="country-floating">Soft Tissues</label>
                                              </div>
                                           </div>
                                          
                                          </div>
                                        </div> --}}



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Nav Justified Ends -->

              
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                      <button type="button" onclick="addNote()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                          changes</button>
                                                      <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                  </div>
                                              </div>

                                              
                                          
                                      </div>



                                      <div class="tab-pane fade " id="account-vertical-extraoral" role="tabpanel" aria-labelledby="account-pill-extraoral" aria-expanded="false">
                                      <!-- Description -->
                                      @role('Dentist')
                                      <div class="content-body">
                                             
                                                <section id="description" class="card">
                                                  <div class="card-header">
                                                      <h4 class="card-title">Ortho Notes</h4>
                                                  </div>
                                                  {{-- <div class="card-content">
                                                      <div class="card-body">
                                                          <div class="card-text">
                                                           
                                                              <div class="alert alert-warning" role="alert">
                                                                  Vuexy Admin Template default layout is 2 columns. If you do not define pageConfig block on page or template
                                                                  level, it will consider 2 columns by default.
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div> --}}
                                              </section>
                                              <!--/ Description -->
                                              <!-- CSS Classes -->
                                              <section id="css-classes" class="card">
                                                  <div class="card-header">
                                                      <h4 class="alert alert-warning card-title" role="alert">Extra Oral Exam</h4>
                                                  </div>
                                                  <div class="card-content">
                                                      <div class="card-body">
                                                          <div class="card-text">
                                                              
                                                              <div class="table-responsive">
                                                                  <table class="table table-hover font-small-2">
                                                                     
                                                                      <tbody>
                                                                          <tr>
                                                                              <th scope="row"> Lymph Node </th>
                                                                              <td>
                                                                                  <div class="col-12">
                                                                                    <select name="lymph_node[]" id="lymph_node" class="select2-size-sm form-control" multiple="multiple">
                                                                                      <option value="{{ $myortho->lymph_node }}" selected > {{ $myortho->lymph_node }} </option>
                                                                                      <option  value="Enlarged ">Enlarged </option>
                                                                                      <option  value="Tender">Tender</option>
                                                                                      <option  value="Muttered">Muttered </option>
                                                                                      <option  value="Ulcerated">Ulcerated </option>
                                                                                      <option  value="Discharging ">Discharging  </option>
                                                                                      <option  value="Other">Other </option>
                                                                                    </select> 
                                                                                 </div>
                                                                                </td>
                                                                            
                                                                              <th scope="row">TMJ</th>
                                                                              <td>
                                                                                  <div class="col-12">
                                                                                    <select name="tmj[]" id="tmj" style="width:100%" class="select2-size-sm form-control" multiple="multiple">
                                                                                      <option value="{{ $myortho->tmj }}" selected > {{ $myortho->tmj }} </option>
                                                                                        <option  value="Click">Click</option>
                                                                                        <option  value="Discomfort on palpation">Discomfort on palpation</option>
                                                                                        <option  value="Dislocation ">Dislocation</option>
                                                                                        
                                                                                         </select>   
                                                                                 </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                              <th scope="row">Muscle Of Mastication</th>
                                                                              <td>
                                                                                  <div class="col-12">
                                                                                    <select name="muscle_of_mastication[]" id="muscle_of_mastication" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->muscle_of_mastication }}" selected > {{ $myortho->muscle_of_mastication }} </option>
                                                                                        <option  value="Tender">Tender</option>
                                                                                        <option  value="Swelling">Swelling</option>
                                                                                        <option  value="Dislocation ">Dislocation</option>
                                                                                        </select>    
                                                                                 </div>
                                                                                </td>
                                                                            
                                                                              <th scope="row">Skeletal Pattern</th>
                                                                              <td>
                                                                                  <div class="col-12">
                                                                                    <select name="skeletal_pattern[]" id="skeletal_pattern" class="select2-size-sm form-control" multiple="multiple">
                                                                                      <option value="{{ $myortho->skeletal_pattern }}" selected > {{ $myortho->skeletal_pattern }} </option>
                                                                                      <option  value="Antero-posterior - I - Mild"> Antero-posterior - I - Mild</option>
                                                                                      <option  value="Antero-posterior - II - Mild"> Antero-posterior - II - Mild</option>
                                                                                      <option  value="Antero-posterior - III - Mild"> Antero-posterior - III - Mild</option>
                                                              
                                                                                      <option  value="Antero-posterior - I - Moderate"> Antero-posterior - I - Moderate </option>
                                                                                      <option  value="Antero-posterior - II - Moderate"> Antero-posterior - II - Moderate</option>
                                                                                      <option  value="Antero-posterior - III - Moderate"> Antero-posterior - III - Moderate</option>
                                                              
                                                                                      <option  value="Antero-posterior - I - Severe"> Antero-posterior - I - Severe</option>
                                                                                      <option  value="Antero-posterior - II - Severe"> Antero-posterior - II - Severe</option>
                                                                                      <option  value="Antero-posterior - III - Severe"> Antero-posterior - III - Severe</option>
                                                              
                                                                                      <option  value="Vertical - FMPA - Average"> Vertical - FMPA - Average</option>
                                                                                      <option  value="Vertical - FMPA - Increased"> Vertical - FMPA - Increased</option>
                                                                                      <option  value="Vertical - FMPA - Decreased"> Vertical - FMPA - Decreased</option>
                                                              
                                                                                      <option  value="Vertical - LAFH - Average"> Vertical - LAFH - Average</option>
                                                                                      <option  value="Vertical - LAFH - Increased"> Vertical - LAFH - Increased</option>
                                                                                      <option  value="Vertical - LAFH - Decreased"> Vertical - LAFH - Decreased</option>
                                                              
                                                              
                                                                                      <option  value="Transverce - Yes">Transverce - Yes</option>
                                                                                      <option  value="Vertical - No">Vertical - No</option>
                                                                                      </select>    
                                                                                 </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                              <th scope="row">Smile</th>
                                                                              <td>
                                                                                  <div class="col-12">
                                                                                    <select name="smile_incisor_show[]" id="smile_incisor_show" class="select2-size-sm form-control" multiple="multiple">
                                                                                      <option value="{{ $myortho->smile_incisor_show }}" selected> {{ $myortho->smile_incisor_show }} </option>
                                                              
                                                                                      </select>      
                                                                                 </div>
                                                                                </td>
                                                                            </tr>
                                                                      </tbody>
                                                                  </table>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </section>

                                              


                                              <section id="css-classes" class="card">
                                                <div class="card-header">
                                                    <h4 class="alert alert-warning card-title" role="alert">Intra Oral Exam</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            
                                                            <div class="table-responsive">
                                                                <table class="table table-hover font-small-2">
                                                                  
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row"> Occlusion </th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="occlusion[]" id="occlusion" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value="{{ $myortho->occlusion }}" selected > {{ $myortho->occlusion }} </option>
                                                                                    <option  value="Premature contact">Premature contact</option>
                                                                                    <option  value="Occlusal wear">Occlusal wear</option>
                                                                                  </select>   
                                                                               </div>
                                                                              </td>
                                                                          
                                                                            <th scope="row">Soft Tissue</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="soft_tissue[]" id="soft_tissue" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value=" {{ $myortho->soft_tissue }}" selected > {{ $myortho->soft_tissue }} </option>
                                                                                      
                                                                                      <option  value="Tongue Ulcer">Tongue Ulcer</option>
                                                                                      <option  value="Tongue Swelling">Tongue Swelling</option>
                                                                                      <option  value="Palate Ulcer">Palate Ulcer</option>
                                                                                      <option  value="Palate Swelling">Palate Swelling</option>
                                                                                      <option  value="Cheek Ulcer">Cheek Ulcer</option>
                                                                                      <option  value="Cheek Swelling">Cheek Swelling</option>
                                                                                      <option  value="Lip Swelling">Lip Swelling</option>
                                                                                      <option  value="Lip Ulcer">Lip Ulcer</option>
                                                                                      <option  value="NAD">NAD</option>
                                                                                      <option  value="Chronic gingivitis">Chronic gingivitis</option>
                                                                                      </select>    
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                          <tr>
                                                                            <th scope="row">Stage</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="stage[]" id="stage" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value="{{ $myortho->stage }}" selected >{{ $myortho->stage }} </option>
                                                                                    <option  value="Deciduous">Deciduous</option>
                                                                                    <option  value="Early Mix">Early Mix</option>
                                                                                    <option  value="Late Mix">Late Mix</option>
                                                                                    <option  value="Permanentr">Permanent</option>
                                                                                    </select>    
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Sublingual Area</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="sublingual_area[]" id="sublingual_area" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value="{{ $myortho->sublingual_area }}" selected > {{ $myortho->sublingual_area }} </option>
                                                                                    <option  value="Ulcer">Ulcer</option>
                                                                                    <option  value="Swelling">Swelling</option>
                                                                                    <option  value="Patches">Patches</option>
                                                                                    <option  value="Saliva pooling">Saliva pooling</option>
                                                                                    <option  value="Other">Other</option>
                                                                                    </select>    
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                          <tr>
                                                                            <th scope="row">Oropharynx</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="oropharynx[]" id="oropharynx" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value="{{ $myortho->oropharynx }}" selected >{{ $myortho->oropharynx }} </option>
                                                                                    <option  value="Tonsillitis">Tonsillitis</option>
                                                                                    <option  value="Ulcer">Ulcer</option>
                                                                                    <option  value="Discharge">Discharge</option>
                                                                                    </select>   
                                                                               </div>
                                                                              </td>
                                                                          
                                                                            <th scope="row">Edentulous Ridge</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                  <select name="edentulous_ridge[]" id="edentulous_ridge" class="select2-size-sm form-control" multiple="multiple">
                                                                                    <option value="{{ $myortho->edentulous_ridge }}" selected >{{ $myortho->edentulous_ridge }} </option>
                                                                                    <option  value="Alveolar resorption">Alveolar resorption</option>
                                                                                    <option  value="Ulcer">Ulcer</option>
                                                                                    <option  value="Swelling">Swelling</option>
                                                                                    </select>   
                                                                               </div>
                                                                              </td>
                                                                          </tr>

                                                                          <tr>
                                                                            <th scope="row">Periodontal Assessment</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="periodontal_assessment[]" id="periodontal_assessment" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->periodontal_assessment }}" selected >{{ $myortho->periodontal_assessment }} </option>
                                                                                        <option  value="Calculus">Calculus</option>
                                                                                        <option  value="Furcation">Furcation</option>  
                                                                                    </select>   
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Teeth present</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="teeth_present[]" id="teeth_present" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value=" {{ $myortho->teeth_present }}" selected >{{ $myortho->teeth_present }}</option>
                                                                                    </select>    
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Tooth quality</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="tooth_quality[]" id="tooth_quality" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->tooth_quality }}" selected > {{ $myortho->tooth_quality }} </option>
                                                                                        <option  value="Good">Good</option>
                                                                                        <option  value="Fair">Fair</option>
                                                                                        <option  value="Poor">Poor</option>
                                                                                        </select>    
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Tooth anomalies</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="tooth_anomalities[]" id="tooth_anomalities" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->tooth_anomalities }}" selected > {{ $myortho->tooth_anomalities }} </option>
                                                                                        </select>    
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Trauma</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="trauma[]" id="trauma" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->trauma }}" selected> {{ $myortho->trauma }} </option>
                                                                                    </select>      
                                                                               </div>
                                                                              </td>
                                                                          
                                                                            <th scope="row">Lower Labial Segment</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="lower_labial[]" id="lower_labial" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->lower_labial }}" selected > {{ $myortho->lower_labial }} </option>
                                                                                        <option  value="Inclination">Inclination</option>
                                                                                        <option  value="Aligned">Aligned</option>
                                                                                        <option  value="Discharge">Canine</option>
                                                                                    </select>       
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Lower Buccal Segment</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="lower_buccal[]" id="lower_buccal" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->lower_buccal }}" selected > {{ $myortho->lower_buccal }} </option>
                                                                                        <option  value="Aligned">Aligned</option>
                                                                                        <option  value="Crowded">Crowded</option>
                                                                                        <option  value="Spaced">Spaced</option>
                                                                                        <option  value="Mild">Mild</option>  
                                                                                        <option  value="Moderate">Moderate</option> 
                                                                                        <option  value="Severe">Severe</option>
                                                                                    </select>       
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Upper Labial Segment</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="upper_labial[]" id="upper_labial" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->upper_labial }}" selected > {{ $myortho->upper_labial }} </option>
                                                                                        <option  value="Aligned">Aligned</option>
                                                                                        <option  value="Crowded">Crowded</option>
                                                                                        <option  value="Spaced">Spaced</option>
                                                                                        <option  value="Mild">Mild</option>  
                                                                                        <option  value="Moderate">Moderate</option> 
                                                                                        <option  value="Severe">Severe</option>
                                                                                    </select>        
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Upper buccal Segment</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="upper_buccal[]" id="upper_buccal" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->upper_buccal }}" selected > {{ $myortho->upper_buccal }} </option>
                                                                                        <option  value="Aligned">Aligned</option>
                                                                                        <option  value="Crowded">Crowded</option>
                                                                                        <option  value="Spaced">Spaced</option>
                                                                                        <option  value="Mild">Mild</option>  
                                                                                        <option  value="Moderate">Moderate</option> 
                                                                                        <option  value="Severe">Severe</option>   
                                                                                    </select>        
                                                                               </div>
                                                                              </td>
                                                                          
                                                                            <th scope="row">Arch Form</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="arch_form[]" id="arch_form" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->arch_form }}" selected > {{ $myortho->arch_form }} </option>
                                                                                         <option  value="Upper - Right">Upper - Ovoid</option>
                                                                                        <option  value="Upper - Central">Upper - Square</option>
                                                                                        <option  value="Upper - Left">Upper - Tapered</option>
                                                                                        <option  value="Upper - Left">Upper - V</option>
                                                                                        <option  value="Lower - Right">Lower - Ovoid</option>
                                                                                        <option  value="Lower - Central">Lower - Square</option>
                                                                                        <option  value="Lower - Left">Lower - Tapered</option>
                                                                                        <option  value="Lower - Left">Lower - V</option>
                                                                                    </select>         
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Overjet</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="overjet[]" id="overjet" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->overjet }}" selected > {{ $myortho->overjet }} </option>
                                                                                    </select>         
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Overbite</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="overbite[]" id="overbite" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->overbite }}" selected > {{ $myortho->overbite }} </option>
                                                                                        <option  value="Average">Average</option>
                                                                                        <option  value="Incerased">Incerased</option>
                                                                                        <option  value="Decreased">Decreased</option>
                                                                                        <option  value="Complete">Complete</option>  
                                                                                        <option  value="Incomplete">Incomplete</option> 
                                                                                        <option  value="Traumatic">Traumatic</option>
                                                                                    </select>         
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Centre Lines</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="centre_lines[]" id="centre_lines" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->centre_lines }}" selected > {{ $myortho->centre_lines }} </option>
                                                                                        <option  value="Upper - Right">Upper - Right</option>
                                                                                        <option  value="Upper - Central">Upper - Central</option>
                                                                                        <option  value="Upper - Left">Upper - Left</option>
                                                                                        <option  value="Lower - Right">Lower - Right</option>
                                                                                        <option  value="Lower - Central">Lower - Central</option>
                                                                                        <option  value="Lower - Left">Lower - Left</option>
                                                                                        </select>         
                                                                               </div>
                                                                              </td>
                                                                          
                                                                            <th scope="row">Incisor Relationship</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="incisor_relationship[]" id="incisor_relationship" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->incisor_relationship }}" selected > {{ $myortho->incisor_relationship }} </option>
                                                                                        <option  value="I">I</option>
                                                                                        <option  value="II/1">II/1</option>
                                                                                        <option  value="II/2">II/2</option>
                                                                                        <option  value="III">III</option>
                                                                                    </select>          
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Canine Relationship</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="canine_relationship[]" id="canine_relationship" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->canine_relationship }}" selected > {{ $myortho->canine_relationship }} </option>
                                                                                        <option  value="Right - I">Right - I</option>
                                                                                        <option  value="Right - II">Right - II</option>
                                                                                        <option  value="Right - III">Right - III</option>
                                                                                        <option  value="Left - I">Left - I</option>
                                                                                        <option  value="Left - II">Left - II</option>
                                                                                        <option  value="Left - III">Left - III</option>
                                                                                    </select>          
                                                                               </div>
                                                                              </td>
                                                                         
                                                                            <th scope="row">Molar Relationship</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="molar_relationship[]" id="molar_relationship" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->molar_relationship }}" selected > {{ $myortho->molar_relationship }} </option>
                                                                                        <option  value="Right - I">Right - I</option>
                                                                                        <option  value="Right - II">Right - II</option>
                                                                                        <option  value="Right - III">Right - III</option>
                                                                                        <option  value="Left - I">Left - I</option>
                                                                                        <option  value="Left - II">Left - II</option>
                                                                                        <option  value="Left - III">Left - III</option>
                                                                                    </select>           
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Curve of Spee</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="curve_of_spee[]" id="curve_of_spee" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->curve_of_spee }}" selected >{{ $myortho->curve_of_spee }} </option>
                                                                                        <option  value="Upper">Flat</option>
                                                                                        <option  value="Lower">Moderate</option>
                                                                                        <option  value="Right">Severe</option>
                                                                                    </select>            
                                                                               </div>
                                                                              </td>
                                                                        
                                                                            <th scope="row">Crosbite</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="cross_bite[]" id="cross_bite" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->cross_bite }}" selected > {{ $myortho->cross_bite }} </option>
                                                                                        <option  value="Unilateral - Left">Unilateral - Left</option>
                                                                                        <option  value="Unilateral - Right">Unilateral - Right</option>
                                                                                        <option  value="Bilateral - Left">Bilateral - Left</option>
                                                                                        <option  value="Bilateral - Right">Bilateral - Right</option>
                                                                                        <option  value="Displacement - Yes">Displacement - Yes</option>
                                                                                        <option  value="Displacement - No">Displacement - No</option>
                                                                                    </select>            
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                        
                                                                        
                                                                        
                                                                          <tr>
                                                                            <th scope="row">Scissor Bite</th>
                                                                            <td>
                                                                                <div class="col-12">
                                                                                    <select name="scissors_bite[]" id="scissors_bite" class="select2-size-sm form-control" multiple="multiple">
                                                                                        <option value="{{ $myortho->scissors_bite }}" selected > {{ $myortho->scissors_bite }} </option>
                                                                                        <option  value="Unilateral - Left">Unilateral - Left</option>
                                                                                        <option  value="Unilateral - Right">Unilateral - Right</option>
                                                                                        </select>             
                                                                               </div>
                                                                              </td>
                                                                          </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                      </div>
                                      @endrole
                                      </div>











                                      <div class="tab-pane fade " id="account-vertical-diagnosis" role="tabpanel" aria-labelledby="account-pill-diagnosis" aria-expanded="false">
                                          
                                              <div class="row">

                                                <div class="col-md-6 col-12">
                                                  <div class="form-label-group">
                                                    <select id="diagnosis_type" name="diagnosis_type" rows="3" tabindex="1" data-placeholder="Search diagnosis ..." class="form-control m-b">
                                                      <option value="">-- Select Diagnosis Type --</option>
                                                       <option value="Differential Diagnosis">Differential Diagnosis</option>
                                                        <option value="Provisional Diagnosis">Provisional Diagnosis</option>
                                                        <option value="Final Diagnosis">Final Diagnosis</option>
                                                   </select>    
                                                  </div>
                                              </div>
                                                <div class="col-md-6 col-12">
                                                  <div class="form-label-group">
                                                    <select id="diagnosis" name="diagnosis[]" rows="3" tabindex="1" data-placeholder="Search diagnosis ..." style="width:100%">
                                                      <option value="">-- Select Diagnosis --</option>
                                                      @foreach($diagnosis as $diagnosis)
                                                      <option value="{{ $diagnosis->type }}">{{ $diagnosis->type }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                              </div>

                                              <div class="col-12">
                                                <label for="lmp">Remarks</label>
                                                <fieldset class="form-label-group">
                                                  
                                                  <div id="diagnosis_remark" name="diagnosis_remark" placeholder="Remarks"  class="form-control" style="overflow:scroll;height:80px;max-height:100px" contenteditable="true"> </div>
                                                 

                                              </fieldset>
                                              </div>

                                              

                                              
                                           

                                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button onclick="addDiagnosis();" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                            </div>
                                         
                                          <!-- Table Hover Animation start - diagnosis added -->
                                          <div class="row" id="table-hover-animation">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Diagnosis</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                           
                                                            <div class="table-responsive">
                                                                <table id="diagnosisTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Type</th>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Doctor</th>
                                                                            <th scope="col">Date Added</th>
                                                                            
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
                                        <!-- Table head options end - diagnosis added -->

                                          
                                      </div>



                                      <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                         
                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                         
                                                          {{-- <div class="form-control" contenteditable="true" id="assessment" name="assessment" rows="5" placeholder="Your plan data here..."></div> --}}
                                                          <div id="assessment" name="assessment" class="form-control" style="overflow:scroll;height:300px;max-height:150px" contenteditable="true">  </div>

                                                     
                                                        </div>
                                                  </div>
                                                
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                      <button onclick="addAssessment()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                          changes</button>
                                                      <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                  </div>
                                              </div>
                                         
                                            <!-- Table Hover Animation start - diagnosis added -->
                                            <div class="row" id="table-hover-animation">
                                              <div class="col-12">
                                                  <div class="card">
                                                      <div class="card-header">
                                                          <h4 class="card-title">History</h4>
                                                      </div>
                                                      <div class="card-content">
                                                          <div class="card-body">
                                                             
                                                              <div class="table-responsive">
                                                                  <table id="assessmentTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                                      <thead>
                                                                          <tr>
                                                                              <th scope="col">Plan</th>
                                                                              <th scope="col">Created By</th>
                                                                              <th scope="col">Date</th>
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
                                          <!-- Table head options end - diagnosis added -->
                                      </div>


                                      <!-- Table head options start - nurse plan  -->
                                      <div class="tab-pane fade" id="account-vertical-nurse-plan" role="tabpanel" aria-labelledby="account-pill-nurse-plan" aria-expanded="false">
                                         
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                   
                                                    <div style="overflow:scroll;height:150px;max-height:200px;border-style: solid; border-width: thin;line-height: 1.6rem;font-size: 1rem;" contenteditable="true" id="assessment" name="assessment" rows="5" placeholder="Your plan data here..."></div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button onclick="addAssessment()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                   
                                      <!-- Table Hover Animation start - diagnosis added -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">History</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="assessmentTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Plan</th>
                                                                        <th scope="col">Created By</th>
                                                                        <th scope="col">Date</th>
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
                                   
                                </div>
                                 <!-- Table head options end - nurse plan added -->





                                   <!-- Antenatal Tab start -->
                                   <div class="tab-pane fade" id="account-vertical-antenatal" role="tabpanel" aria-labelledby="account-pill-antenatal" aria-expanded="false">
                                    <section class="panel panel-default">
                                      <form>
                                        <div class="row">
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="lmp" class="form-control" value="" placeholder="LMP" name="lmp">
                                                  <label for="lmp">LMP</label>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="edd" class="form-control" value="" placeholder="EDD/EDC" name="edd">
                                                  <label for="edd">EDD/EDC</label>
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="gestation_by_date" class="form-control" value="" placeholder="Gestational Week" name="gestation_by_date">
                                                  <label for="gestation_by_date">Gestational Week</label>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="gestation_by_date_day" class="form-control" value="" placeholder="Gestational Days" name="gestation_by_date_day">
                                                  <label for="gestation_by_date_day">Gestational Days</label>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <select id="lie" name="lie[]" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="">-- Not set --</option>
                                                      {{-- @foreach($lie as $lie)
                                                      <option value="{{ $lie->type }}">{{ $lie->type }}</option>
                                                      @endforeach --}}
                                                  </select> 
                                                  <label for="gestation_by_date_day">Lie</label>
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <select id="presentation" name="presentation[]" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="">-- Not set --</option>
                                                      {{-- @foreach($presentations as $presentation)
                                                      <option value="{{ $presentation->type }}">{{ $presentation->type }}</option>
                                                      @endforeach --}}
                                                  </select> 
                                              <label for="gestation_by_date_day">Presentation</label>
                                              </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <select id="engagement" name="engagement[]" class="select2-size-sm form-control" multiple="multiple">
                                                      <option value="">-- Not set --</option>
                                                      <option value="Not Engaged">Not Engaged</option>
                                                      <option value="Fully Engaged">Fully Engaged</option>
                                                      <option value="Not Applicable">Not Applicable</option>
                                                  </select> 
                                              <label for="gestation_by_date_day">Engagement</label>
                                              </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="fh_fm" class="form-control" value="" placeholder="Fundal Height" name="fh_fm">
                                                  <label for="gestation_by_date_day">Fundal Height</label>
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <select id="fetus" name="fetus" rows="1" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                      <option value="">-- Not set --</option>
                                                      {{-- @foreach($fetus as $fetus)
                                                      <option value="{{ $fetus->type }}">{{ $fetus->type }}</option>
                                                     @endforeach --}}
                                                     </select>
                                                  <label for="fetus">Fetus</label>
                                              </div>
                                          </div>
                                          
                                        </div>
                                  
                                  
                                  
                                  
                                  
                                    <div class="row">
                                      <div class="col-md-2 col-12">
                                          <div class="form-label-group">
                                              <input type="text" id="position" class="form-control" value="" placeholder="Position" name="position">
                                              <label for="ivf">Position</label>
                                          </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-2 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="oedema" class="form-control" value="" placeholder="Oedema" name="oedema">
                                            <label for="ivf">Oedema</label>
                                        </div>
                                    </div>
                                            
                                    
                                    <div class="col-md-2 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="fetal_heart_tone" class="form-control" value="" placeholder="Fetal Heart Tone" name="fetal_heart_tone">
                                            <label for="ivf">Fetal Heart Tone</label>
                                        </div>
                                    </div>
                                    
                                            
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="antenatal_remarks" class="form-control" value="" placeholder="Remarks" name="antenatal_remarks">
                                            <label for="ivf">Remarks (Comment on the size / shape / appearance of the abdomen / Fetal movements / Linea Nigra / Striae Gravidarum)</label>
                                        </div>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                  <button type="button" onclick="" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                  </div>
                                  
                                  </form>
                                  
                                    </section>


                                    <section class="panel panel-info">
                                      <header class="panel-heading font-bold">Antenatal History</header>
                                      <div class="panel-body">
                                            <div class="table-responsive" style="overflow-y: scroll;">
                             <table id="AntenatalTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>LMP</th>
                                    <th>Gest Date</th>
                                    <th>EDD/EDC</th>
                                    <th>Pos.</th>
                                    <th>Pres.</th>
                                    <th>Eng.</th>
                                    <th>FH</th>
                                    <th>Lie</th>
                                    <th>Fetus</th>
                                    <th>SP</th>
                                    <th>FHT</th>
                                    <th>Remark</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                              </table>
                          </div>
                          </div>
                          </section>

                                   </div>
                                   <!-- Antenatal Tab end -->



                                   <!-- Surgery Note Tab start -->
                                   <div class="tab-pane fade" id="account-vertical-surgery" role="tabpanel" aria-labelledby="account-pill-surgery" aria-expanded="false">
                                   

                                  </div>
                                  <!-- Surgeey Note Tab end -->
                                   
                                      





                                      <!-- Vitals Tab start -->
                                      <div class="tab-pane fade" id="account-vertical-vitals" role="tabpanel" aria-labelledby="account-pill-vitals" aria-expanded="false">
                                      
                                      

                                        <section class="panel panel-default">
                                          <form>
                                            <div class="row">
                                              <div class="col-md-2 col-12">
                                                  <div class="form-label-group">
                                                      <input type="text" id="weight" class="form-control" value="" placeholder="Weight ( kg )" name="weight">
                                                      <label for="fluid_time">Weight ( kg )</label>
                                                  </div>
                                              </div>
    
                                              <div class="col-md-2 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="height" class="form-control" value="{{ $defaultheight }}" placeholder="Height ( m )" name="height">
                                                    <label for="ivf">Height ( m )</label>
                                                </div>
                                            </div>
    
                                              <div class="col-md-2 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="temperature" class="form-control" value="" placeholder="Temperature ( C )" name="temperature">
                                                    <label for="oral">Temperature ( C )</label>
                                                </div>
                                            </div>
                                                 
                                            <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="systolic" class="form-control" value="" placeholder="Systolic BP" name="systolic">
                                                  <label for="oral">Systolic BP</label>
                                              </div>
                                          </div>
                                            <div class="col-md-2 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="diastolic" class="form-control" value="" placeholder="Diastolic BP" name="diastolic">
                                                  <label for="oral">Diastolic BP</label>
                                              </div>
                                          </div>
                                          <div class="col-md-2 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="pulse_rate" class="form-control" value="" placeholder="Pulse Rate ( / min )" name="pulse_rate">
                                                <label for="fluid_time">Pulse Rate ( / min )</label>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-2 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="respiration" class="form-control" value="" placeholder="Respiration ( / min )" name="respiration">
                                                <label for="ivf">Respiration ( / min )</label>
                                            </div>
                                        </div>

                                          <div class="col-md-2 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="waist_circumference" class="form-control" value="" placeholder="Waist Circumference" name="waist_circumference">
                                                <label for="oral">Waist Circumference</label>
                                            </div>
                                        </div>
                                             
                                        <div class="col-md-2 col-12">
                                          <div class="form-label-group">
                                              <input type="text" id="hip_circumference" class="form-control" value="" placeholder="Hip Circumference" name="hip_circumference">
                                              <label for="oral">Hip Circumference</label>
                                          </div>
                                      </div>
                                        <div class="col-md-2 col-12">
                                          <div class="form-label-group">
                                              <input type="text" id="SpO2" class="form-control" value="" placeholder="SpO2" name="SpO2">
                                              <label for="oral">SpO2</label>
                                          </div>
                                      </div>
                                      <div class="col-md-2 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="b_fat" class="form-control" value="" placeholder="Body Fat" name="b_fat">
                                            <label for="oral">Body Fat</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="v_fat" class="form-control" value="" placeholder="Visceral Fat" name="v_fat">
                                          <label for="oral">Visceral Fat</label>
                                      </div>
                                  </div>
                                 </div>



                                 <div class="row">
                                  <div class="col-md-2 col-12">
                                    <div class="form-label-group">
                                        <input type="text" id="rbs" class="form-control" value="" placeholder="RBS" name="rbs">
                                        <label for="ivf">RBS</label>
                                    </div>
                                </div>

                                  <div class="col-md-2 col-12">
                                    <div class="form-label-group">
                                        <input type="text" id="fbs" class="form-control" value="" placeholder="FBS" name="fbs">
                                        <label for="oral">FBS</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                  <div class="form-label-group">
                                      <input type="text" id="vr_visual_ascuity" class="form-control" value="" placeholder="Visual Acuity" name="vr_visual_ascuity">
                                      <label for="vr_visual_ascuity">Visual Acuity</label>
                                  </div>
                              </div>
                                     
                                <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <input type="text" id="vital_remark" class="form-control" value="" placeholder="Remarks" name="vital_remark">
                                      <label for="oral">Remarks</label>
                                  </div>
                              </div>
                               
                          </div>
                        
                             <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                      <button type="button" onclick="addVitals()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                             </div>
                                    
                                          </form>

                                        </section>
                                       
                                       
                                        <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                        </div>
                                        
                                        
                                       
                                            <section class="panel panel-info">
                                                    <header class="panel-heading font-bold">Vital Signs</header>
                                                    <div class="panel-body">
                                                          <div class="table-responsive">
                                           <table id="vitalTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                              <thead>
                                                 <tr>
                                                  <th>Date</th>
                                                  <th>Weight (kg)</th>
                                                  <th>Height (m)</th>
                                                  <th>BMI</th>
                                                  <th>Temperature (C)</th>
                                                  <th>BP (mm of Hg)</th>
                                                  <th>Pulse Rate (/ min)</th>
                                                   <th>Respiration (/ min)</th>
                                                   <th>SP02 </th>
                                                   <th>RBS/FBS</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        </section> 

                                        <br>
                                        <br>
                                        <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                        </div>

                                        <section class="panel panel-default">
                                          <header class="panel-heading">
                                            Vital Chart Graph
                                          </header>
                                          <div class="panel-body text-center">
                                            
                                            <small class="text-muted block"></small>
                                            <div class="inline">
                                                @include('charts/vitals') 
                                            </div>                      
                                          </div>
                                          <div class="panel-footer"><small><a href="#" > % of change</a></small></div>
                                        </section>

                                       
                                    </div>

                                     <!-- Vitals Tab start -->

                                     <!-- drugs chart Tab start -->
                                     <div class="tab-pane fade" id="account-vertical-drug-chart" role="tabpanel" aria-labelledby="account-pill-drug-chart" aria-expanded="false">
                                          {{-- <section class="panel panel-info">
                                              <header class="panel-heading font-bold">Medication History</header>
                                            <div class="panel-body">
                                                  <div class="table-responsive">
                                                      <table id="drugTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                          <thead>
                                                            <tr>
                                                              <th scope="col">Quantity</th>
                                                              <th scope="col">Drug Name</th>
                                                              <th scope="col">Dosage Remark</th>
                                                              <th scope="col">Unit Cost</th>
                                                              <th scope="col">Total Cost</th>
                                                              <th scope="col">Requested By</th>
                                                              <th scope="col">Requested On</th>
                                                              <th></th>
                                                              <th></th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            
                                                          </tbody>
                                                        </table>
                                                  </div>
                                            </div>
                                        </section>

                                        <br>
                                        <br>
                                        <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                        </div> --}}


                                        <section>

                                          <form>
                                            <div class="row">
                                              
                                            <div class="col-sm-4 col-12">
                                              <div class="form-group">
                                                <select id="medication_given" name="medication_given" rows="3" tabindex="1"  data-placeholder="Search medication ..." style="width:100%">
                                                  <option value="">-- Select Procedure --</option>
                                                   @foreach($prescriptions as $drug)
                                                   <option value="{{ $drug->drug_name }}">{{ $drug->drug_name }}</option>
                                                  @endforeach 
                                               </select> 
                                              </div>
                                          </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="medication_time" class="form-control" value="" placeholder="Time given" name="medication_time">
                                                    <label for="medication_time">Time Given</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="medication_plan" class="form-control" value="" placeholder="Remark" name="medication_plan">
                                                  <label for="procedure_quantity">Remark</label>
                                              </div>
                                          </div>
                                               
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                  <button type="button" onclick="addTreatementPlan()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </form>
                                        </section>

                                        <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                        </div>
                                
                               
                              
                                          <section class="panel panel-info">
                                                <header class="panel-heading font-bold">Treatment History</header>
                                                    <div class="panel-body">
                                                          <div class="table-responsive">
                                                                <table id="treatmentTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Drug</th>
                                                                        <th>Time</th>
                                                                        <th>Remark</th>
                                                                        <th>Created By</th>
                                                                        <th></th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                      
                                                                    </tbody>
                                                                  </table>
                                                          </div>
                                                    </div>
                                           </section>
                                                        
                                                        </div>

                                   <!-- drugs chart Tab end -->

                                     <!-- fluid chart Tab start -->
                                     <div class="tab-pane fade" id="account-vertical-fluid-chart" role="tabpanel" aria-labelledby="account-pill-fluid-chart" aria-expanded="false">
                                      
                                      <section>

                                      <form>
                                        <div class="row">
                                          <div class="col-md-3 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="fluid_time" class="form-control" value="" placeholder="Date & Time" name="fluid_time">
                                                  <label for="fluid_time">Date & Time</label>
                                              </div>
                                          </div>

                                          <div class="col-md-3 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="ivf" class="form-control" value="" placeholder="Fluid Intake Kind & Amount" name="ivf">
                                                <label for="ivf">Fluid Intake Kind & Amount</label>
                                            </div>
                                        </div>

                                          <div class="col-md-3 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="oral" class="form-control" value="" placeholder="Fluid Output Kind & Amount" name="oral">
                                                <label for="oral">Fluid Output Kind & Amount</label>
                                            </div>
                                        </div>
                                             
                                        <div class="col-md-3 col-12">
                                          <div class="form-label-group">
                                              <input type="text" id="fluid_remark" class="form-control" value="" placeholder="Remarks" name="fluid_remark">
                                              <label for="oral">Remarks</label>
                                          </div>
                                      </div>
                                           
                                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="button" onclick="addFluids()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                                 
                                                  
                                              </div>
                                          </div>
                                      </form>
                                      </section>

                                      <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                      </div>


                                      
                                    <section class="panel panel-info">
                                        <div class="row" id="table-hover-animation">
                                              <div class="col-12">
                                                  <div class="card">
                                                      <div class="card-header">
                                                          <h4 class="card-title"> Fluid Intake - Output Chart</h4>
                                                      </div>
                                                      <div class="card-content">
                                                          <div class="card-body">
                                                             
                                                              <div class="table-responsive">
                                                                  <table id="FluidTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                      <thead>
                                                                          <tr>
                                                                              <th scope="col">Date & Time</th>
                                                                              <th scope="col">Intake Type & Amount</th>
                                                                              <th scope="col">Fluid Output Kind & Amount</th>
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
                                      </section>
                                    </div>
 
                                    <!-- fluid chart Tab end -->


                                     

                                      <div class="tab-pane fade " id="account-vertical-documents" role="tabpanel" aria-labelledby="account-pill-documents" aria-expanded="false">
                                        <div class="col-lg-12 col-12">
                                          <div class="card">
                                              <div class="card-header">
                                                  <h4>Latest Uploads</h4>
                                              </div>
                                              <div class="card-body">
                                                  <div class="row">
                                                    @foreach($images as $keys => $image)
                   

                                                    <div class="col-md-4 col-6 user-latest-img">
                                   
                                                     @if($image->mime == 'docx')
                                                    <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                               <img  class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/ms_word.png' !!}">
                                                               </a>  {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                     @elseif($image->mime == 'pdf')
                                                      <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                               <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/pdf.png' !!}" >
                                                               </a>{{ $image->filename }} <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a> <span class="label label-default btn-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $image->created_on}}">{{ $image->created_on->diffForHumans() }}</span>
                                                       @else 
                                                      <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                               <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/uploads/images/'.$image->filepath !!}">
                                                               </a> {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                     @endif        
                                                       </div>
                                                     @endforeach
                                                      
                                                          
                                                      </div>
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                    </div>

                                    <div class="tab-pane fade " id="account-vertical-refraction" role="tabpanel" aria-labelledby="account-pill-refraction" aria-expanded="false">
                                      <section class="panel panel-default">
                                        <div class="panel-body">
                                           <div class="form-group pull-in clearfix">
                                            <div class="col-sm-12">
                                           
                                             <select id="examination_type" name="examination_type" rows="3" tabindex="1" data-placeholder="Examinationn Type" style="width:100%">
                                             <option value="{{ $eyefindings['examination_type']}}" selected>{{ $eyefindings['examination_type']}}</option>
                                             <option value="">-- Select Examination --</option>
                                            @foreach($treatments as $treatment)
                                          <option value="{{ $treatment->type }}">{{ $treatment->type }}</option>
                                            @endforeach
                                          </select>         
                                            </div>
                                          </div>
                  
                                        
                                          <label>Auto Refraction </label>
                                          <div class="card-body">
                                          <div class="table-responsive">
                                         <table id="" cellpadding="2" cellspacing="0" border="2" class="table table-striped m-b-none text-sm" width="100%">
                                           
                                            <thead>
                                              <tr>
                                              
                                                <th></th>
                                                <th>Sphere</th>
                                                <th>Cylinder</th>
                                                <th>Axis</th>
                                                <th>PD</th>
                                                 <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>OD</td>
                                          <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_sphere_auto" name="od_sphere_auto" value="{{ $eyefindings['od_sphere_auto']}}"></td>
                                          <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_cylinder_auto" name="od_cylinder_auto" value="{{ $eyefindings['od_cylinder_auto']}}"</td>
                                          <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_axis_auto" name="od_axis_auto" value="{{ $eyefindings['od_axis_auto']}}"></td>
                                          <td>D: <input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_h_prism_auto" name="od_h_prism_auto" value="{{ $eyefindings['od_h_prism_auto']}}"> N: <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="os_h_prism_auto" name="os_h_prism_auto" value="{{ $eyefindings['os_h_prism_auto']}}">  </td>
                  
                                            
                                            <td></td>
                                            </tr>
                  
                                            <tr>
                                             <tr>
                                            <td>OS</td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_sphere_auto" name="os_sphere_auto" value="{{ $eyefindings['os_sphere_auto']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_cylinder_auto" name="os_cylinder_auto" value="{{ $eyefindings['os_cylinder_auto']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_axis_auto" name="os_axis_auto" value="{{ $eyefindings['os_axis_auto']}}"></td>
                                            <td>VR: <input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="vr_visual_ascuity" name="vr_visual_ascuity" value="{{ $eyefindings['vr_visual_ascuity']}}"> VL: <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="vl_visual_ascuity" name="vl_visual_ascuity" value="{{ $eyefindings['vl_visual_ascuity']}}">   </td>
                                            <td></td>
                                            </tr>
                                            </tbody>
                                                   
                                          </table>
                                      </div>
                                          </div>
                  
                                    
                                          <label>Subjective Refraction </label>
                                          <div class="card-body">
                                          <div class="table-responsive">
                                         <table id="" cellpadding="2" cellspacing="0" border="2" class="table table-striped m-b-none text-sm" width="100%">
                                            <thead>
                                              <tr>
                                              
                                                <th></th>
                                                <th>Sphere</th>
                                                <th>Cylinder</th>
                                                <th>Axis</th>
                                                <th>Prism</th>
                                                <th>Add</th>
                                                <th>PD</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>OD</td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_sphere" name="od_sphere" value="{{ $eyefindings['od_sphere']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_cylinder" name="od_cylinder" value="{{ $eyefindings['od_cylinder']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_axis" name="od_axis" value="{{ $eyefindings['od_axis']}}"></td>
                                            <td>H: <input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_h_prism" name="od_h_prism" value="{{ $eyefindings['od_h_prism']}}"> <br><br> V: <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="od_v_prism" name="od_v_prism" value="{{ $eyefindings['od_v_prism']}}"> </td>
                  
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_h_add" name="od_h_add" value="{{ $eyefindings['od_h_add']}}"> {{-- <br><br> <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="od_v_add" name="od_v_add"> --}} </td>
                  
                                            <td> D: <input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="od_h_pd" name="od_h_pd" value="{{ $eyefindings['od_h_pd']}}"> N: <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="od_v_pd" name="od_v_pd" value="{{ $eyefindings['od_v_pd']}}"> </td>
                                            <td></td>
                                            </tr>
                  
                                            <tr>
                                             <tr>
                                            <td>OS</td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_sphere" name="os_sphere" value="{{ $eyefindings['os_sphere']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_cylinder" name="os_cylinder" value="{{ $eyefindings['os_cylinder']}}"></td>
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_axis" name="os_axis" value="{{ $eyefindings['os_axis']}}"></td>
                                            <td>H: <input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_h_prism" name="os_h_prism" value="{{ $eyefindings['os_h_prism']}}"> <br><br> V: <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="os_v_prism" name="os_v_prism" value="{{ $eyefindings['os_v_prism']}}"> </td>
                  
                                            <td><input type="text" style="width:60px; border: 1px solid #ABADB3; text-align: center;" id="os_h_add" name="os_h_add" value="{{ $eyefindings['os_h_add']}}"> {{-- <br><br> <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="os_v_add" name="os_v_add">  --}}</td>
                  
                                            <td>{{-- <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="os_h_pd" name="os_h_pd"> <br><br> <input type="text" style="width:40px; border: 1px solid #ABADB3; text-align: center;" id="os_v_pd" name="os_v_pd">  --}}</td>
                                            <td></td>
                                            </tr>
                                            </tbody>
                                          </table>
                                      </div>
                                          </div>
                   
                                          
                                      <div class="row">
                                              
                                        <div class="col-sm-2 col-12">
                                          <label>Lense Material </label>
                                          <div class="form-group">
                                            <select id="lens_type" name="lens_type[]" rows="3" multiple tabindex="1" data-placeholder="Select lense material" style="width:100%">
                                              <option value="{{ $eyefindings['lens_type']}}" selected="">{{ $eyefindings['lens_type']}}</option>
                                               <option value="">-- Select lens --</option>
                                              <option value="Plastic">Plastic</option>
                                              <option value="Polycarbonate">Polycarbonate</option>
                                            </select> 
                                          </div>
                                      </div>

                                        <div class="col-md-2 col-12">
                                          <label>Lense Type </label>
                                            <div class="form-label-group">
                                              <select id="lens_power" name="lens_power[]" multiple rows="3" tabindex="1" data-placeholder="Select lense type" style="width:100%">
                                                <option value="{{ $eyefindings['lens_power']}}" selected="">{{ $eyefindings['lens_power']}}</option>
                                               <option value="">-- Select lens --</option>
                                               @foreach($lenstypes as $type)
                                               <option value="{{ $type->lens }}">{{ $type->lens }}</option>
                                              @endforeach 
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                          <label>Lense Treatment </label>
                                          <div class="form-label-group">
                                            <select id="lens_treatment" name="lens_treatment[]" multiple rows="3" tabindex="1" data-placeholder="Select treatment" style="width:100%">
                                                <option value="{{ $eyefindings['lens_treatment']}}" selected>{{ $eyefindings['lens_treatment']}}</option>
                                               <option value="">-- Select --</option>
                                               @foreach($lenstreatments as $type)
                                               <option value="{{ $type->treatments }}">{{ $type->treatments }}</option>
                                               @endforeach 
                                            </select>
                                             
                                          </div>
                                      </div>

                                      <div class="col-md-2 col-12">
                                        <label>Lense Index </label>
                                        <div class="form-label-group">
                                          <select id="lens_index" name="lens_index[]" multiple rows="3" tabindex="1" data-placeholder="Select index" style="width:100%">
                                            <option value="{{ $eyefindings['lens_index']}}" selected>{{ $eyefindings['lens_index']}}</option>
                                             <option value="">-- Select --</option>
                                             <option value="1.49">1.49</option>
                                             <option value="1.50">1.50</option>
                                             <option value="1.56">1.56</option>
                                             <option value="1.67">1.67</option>
                                          </select>        
                                          
                                        </div>
                                      </div>

                                      <div class="col-md-2 col-12">
                                        <label>Style</label>
                                        <div class="form-label-group">
                                          <select id="lens_style" name="lens_style[]" multiple rows="3" tabindex="1" data-placeholder="Select style" style="width:100%">
                                            <option value="{{ $eyefindings['style']}}" selected>{{ $eyefindings['style']}}</option>
                                        </select>   
                                        </div>
                                      </div>

                                      <div class="col-md-2 col-12">
                                        <label>Color</label>
                                        <div class="form-label-group">
                                          <select id="lens_color" name="lens_color[]" multiple rows="3" tabindex="1" data-placeholder="Select style" style="width:100%">
                                            <option value="{{ $eyefindings['color']}}" selected>{{ $eyefindings['color']}}</option>
                                           </select>  
                                        </div>
                                      </div>

                                      <div class="col-md-2 col-12">
                                        <label>Rim Type</label>
                                        <div class="form-label-group">
                                          <select id="rim_type" name="rim_type[]" multiple rows="3" tabindex="1" data-placeholder="Select type" style="width:100%">
                                            <option value="{{ $eyefindings['rim_type']}}" selected>{{ $eyefindings['rim_type']}}</option>
                                             <option value="Full Rim">Full Rim</option>
                                             <option value="Half Rim">Half Rim</option>
                                             <option value="Rimless">Rimless</option>
                                          </select>  
                                        </div>
                                      </div>
                                  </div>
                                      
                  
                                      
                                       
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                          <button type="button" onclick="addlense()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                          <a href="/print-eye-plan/{{ $visit_details->opd_number }}" Class="btn btn-warning mr-sm-1 mb-1 mb-sm-0"> Print </a> 
                                            
                                        </div>

                                      </section>
                                    </div>

                                    <div class="tab-pane fade " id="account-vertical-ocular" role="tabpanel" aria-labelledby="account-pill-ocular" aria-expanded="false">
                                      <section class="panel panel-default">
                                    <div class="panel-body">

                                       
                                       
                                      <div class="table-responsive">
                                    <table id="" class="table table-hover-animation table-striped mb-0 font-small-2">
                                        <thead>
                                          <tr>
                                          
                                            <th></th>
                                            <th>OD</th>
                                            <th>OS</th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                        <td>Visual Acuity</td>
                                        <td>
                                        {{--  <input type="text" style="width:300px; border: 1px solid #ABADB3; text-align: center;" id="od_ocular_adnexae" name="od_ocular_adnexae">  --}}
                                        <select id="od_visual_ascuity" name="od_visual_ascuity[]" multiple rows="3" tabindex="1" data-placeholder="" class="form-control" style="width:100%">
                                        <option value="{{ $ocularfindings['od_visual_ascuity']}}" selected>{{ $ocularfindings['od_visual_ascuity']}}</option>
                                    
                                        <option value="NAD">NAD</option>
                                        </select>

                                        </td>
                                        <td>
                                        <select id="os_visual_ascuity" name="os_visual_ascuity[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                          <option value="{{ $ocularfindings['os_visual_ascuity']}}" selected>{{ $ocularfindings['os_visual_ascuity']}}</option>
                              
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                      
                                        </tr>


                                        <tr>
                                        <td>Ocular Adnexae</td>
                                        <td>
                                        {{--  <input type="text" style="width:300px; border: 1px solid #ABADB3; text-align: center;" id="od_ocular_adnexae" name="od_ocular_adnexae">  --}}
                                        <select id="od_ocular_adnexae" name="od_ocular_adnexae[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_ocular_adnexae']}}" selected>{{ $ocularfindings['od_ocular_adnexae']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select>

                                        </td>
                                        <td>
                                        <select id="os_ocular_adnexae" name="os_ocular_adnexae[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                          <option value="{{ $ocularfindings['os_ocular_adnexae']}}" selected>{{ $ocularfindings['os_ocular_adnexae']}}</option>
                                      
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                      
                                        </tr>


                                        <tr>
                                        <td>Conjunctiva / Sclera</td>
                                        <td>
                      
                                        <select id="od_conjunctiva_sclera" name="od_conjunctiva_sclera[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_conjunctiva_sclera']}}" selected>{{ $ocularfindings['od_conjunctiva_sclera']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select>

                                        </td>
                                        <td>
                                        <select id="os_conjunctiva_sclera" name="os_conjunctiva_sclera[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                          <option value="{{ $ocularfindings['os_conjunctiva_sclera']}}" selected>{{ $ocularfindings['os_conjunctiva_sclera']}}</option>
                                
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                      
                                        </tr>






                                        <tr>
                                        <td>Cornea</td>
                                        <td>
                                        <select id="od_cornea" name="od_cornea[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_cornea']}}" selected>{{ $ocularfindings['od_cornea']}}</option>
                                  
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                        <td><select id="os_cornea" name="os_cornea[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_cornea']}}" selected>{{ $ocularfindings['os_cornea']}}</option>
                                      
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                      
                                        </tr>

                                        <tr>
                                        <td>AC</td>
                                        <td>
                                        <select id="od_ac_lens" name="od_ac_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_ac_lens']}}" selected>{{ $ocularfindings['od_ac_lens']}}</option>
                                      
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                        <td><select id="os_ac_lens" name="os_ac_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_ac_lens']}}" selected>{{ $ocularfindings['os_ac_lens']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                      
                                        </tr>

                                        <tr>
                                        <td>Pupil</td>
                                        <td><select id="od_pupil_lens" name="od_pupil_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_pupil_lens']}}" selected>{{ $ocularfindings['od_pupil_lens']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                          <option value="PERRLA">PERRLA</option>
                                        </select></td>
                                        <td><select id="os_pupil_lens" name="os_pupil_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_pupil_lens']}}" selected>{{ $ocularfindings['os_pupil_lens']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        <option value="PERRLA">PERRLA</option>
                                        </select></td>
                                      
                                        </tr>


                                        <tr>
                                        <td>Lens</td>
                                        <td><select id="od_ocular_lens" name="od_ocular_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_ocular_lens']}}" selected>{{ $ocularfindings['od_ocular_lens']}}</option>
                              
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        <td><select id="os_ocular_lens" name="os_ocular_lens[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_ocular_lens']}}" selected>{{ $ocularfindings['os_ocular_lens']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                      
                                        </tr>


                                        <tr>
                                        <td>Virteous</td>
                                        <td><select id="od_virteous" name="od_virteous[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_virteous']}}" selected>{{ $ocularfindings['od_virteous']}}</option>
                                    
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        <td><select id="os_virteous" name="os_virteous[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_virteous']}}" selected>{{ $ocularfindings['os_virteous']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                      
                                        </tr>

                                        <tr>
                                        <td>C/D Ratio</td>
                                        <td><select id="od_c_d_ratio" name="od_c_d_ratio[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_c_d_ratio']}}" selected>{{ $ocularfindings['od_c_d_ratio']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        <td><select id="os_c_d_ratio" name="os_c_d_ratio[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_c_d_ratio']}}" selected>{{ $ocularfindings['os_c_d_ratio']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        </tr>


                                        <tr>
                                        <td>Retina</td>
                                        <td><select id="od_retina" name="od_retina[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_retina']}}" selected>{{ $ocularfindings['od_retina']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select>
                                        </td>
                                        <td><select id="os_retina" name="os_retina[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_retina']}}" selected>{{ $ocularfindings['os_retina']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        </tr>

                                        <tr>
                                        <td>Others</td>
                                        <td><select id="od_others" name="od_others[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_others']}}" selected>{{ $ocularfindings['od_others']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        <td><select id="os_others" name="os_others[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_others']}}" selected>{{ $ocularfindings['os_others']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        </tr>


                                        <tr>
                                        <td>IOP (mmHG)</td>
                                        <td><select id="od_iop" name="od_iop[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['od_iop']}}" selected>{{ $ocularfindings['od_iop']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        <td><select id="os_iop" name="os_iop[]" multiple rows="3" tabindex="1" data-placeholder="" style="width:100%">
                                        <option value="{{ $ocularfindings['os_iop']}}" selected>{{ $ocularfindings['os_iop']}}</option>
                                        
                                        <option value="NAD">NAD</option>
                                        </select></td>
                                        </tr>

                                        
                                
                                        </tbody>
                                      </table>
                                  </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                      <button type="button" onclick="addOptha()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                    </div>
                    
                      </section>
                                    </div>
                                      


                                    <div class="tab-pane fade " id="account-vertical-procedure" role="tabpanel" aria-labelledby="account-pill-procedure" aria-expanded="false">
                                          <form>
                                              <div class="row">
                                                
                                              <div class="col-sm-6 col-12">
                                                <div class="form-group">
                                                  <select id="procedure" name="procedure" rows="3" tabindex="1"  data-placeholder="Search procedure or consumable ..." style="width:100%">
                                                    <option value="">-- Select Procedure --</option>
                                                    @foreach($treatments as $treatment)
                                                       <option value="{{ $treatment->type }}">{{ $treatment->type }}</option>
                                                    @endforeach
                                                 </select> 
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center mb-1">
                                              <div class="input-group input-group-lg">
                                                <input type="number" id="procedure_quantity" class="touchspin" value="1" placeholder="Quantity" name="procedure_quantity">
                                              </div>
                                          </div>
                                              {{-- <div class="col-md-6 col-12">
                                                  <div class="form-label-group">
                                                      <input type="number" id="procedure_quantity" class="touchspin" value="0" placeholder="Quantity" name="procedure_quantity">
                                                      <label for="procedure_quantity">Quantity</label>
                                                  </div>
                                              </div> --}}
                                              
                                                 
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="button" onclick="addProcedure()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                                     
                                                      
                                                  </div>
                                              </div>
                                          </form>

                                           <!-- Table Hover Animation start - drug requested -->
                                        <div class="row" id="table-hover-animation">
                                          <div class="col-12">
                                              <div class="card">
                                                  <div class="card-header">
                                                      <h4 class="card-title"> Requested</h4>
                                                  </div>
                                                  <div class="card-content">
                                                      <div class="card-body">
                                                         
                                                          <div class="table-responsive">
                                                              <table id="procedureTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                  <thead>
                                                                      <tr>
                                                                          <th scope="col">Procedure</th>
                                                                          <th scope="col">Cost</th>
                                                                          <th scope="col">Requested On</th>
                                                                          <th scope="col">Request By</th>
                                                                          <th scope="col">Status</th>
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
                                         <!-- Accordion with margin start -->
                                         <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                      </div>
                                              <!-- Accordion with margin end -->
                                      <!-- Table head options end - drug requested -->

                                      </div>

                                     


                                      <div class="tab-pane fade " id="account-vertical-lab-request" role="tabpanel" aria-labelledby="account-pill-lab-request" aria-expanded="false">
                                          <form>
                                              <div class="row">
                                                
                                              <div class="col-sm-6 col-12">
                                                <div class="form-group">
                                                  <select id="investigation" name="investigation" rows="3" tabindex="1"  data-placeholder="Search investigation ..." style="width:100%">
                                                    <option value="">-- Select Investigation --</option>
                                                    @foreach($investigations as $investigation)
                                                 <option value="{{ $investigation->type }}">{{ $investigation->type }}</option>
                                                   @endforeach
                                                 </select> 
                                                </div>
                                            </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-label-group">
                                                      <input type="text" id="investigation_remark" class="form-control" value="-" placeholder="Remarks" name="investigation_remark">
                                                      <label for="last-name-column">Remarks</label>
                                                  </div>
                                              </div>
                                                 
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="button" onclick="addInvestigation()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add Investigation</button>
                                                    
                                                  </div>
                                              </div>
                                          </form>

                                           <!-- Table Hover Animation start - drug requested -->
                                        <div class="row" id="table-hover-animation">
                                          <div class="col-12">
                                              <div class="card">
                                                  <div class="card-header">
                                                      <h4 class="card-title"> Requested</h4>
                                                  </div>
                                                  <div class="card-content">
                                                      <div class="card-body">
                                                         
                                                          <div class="table-responsive">
                                                              <table id="investigationsTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                  <thead>
                                                                      <tr>
                                                                          <th scope="col">Investigation</th>
                                                                          <th scope="col">Cost</th>
                                                                          <th scope="col">Requested On</th>
                                                                          <th scope="col">Request By</th>
                                                                          <th scope="col">Remarks</th>
                                                                          <th scope="col">Status</th>
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
                                         <!-- Accordion with margin start -->
                                         <div class="progress progress-bar-warning">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                        </div>
                                                <section id="accordion-with-margin">
                                                  <div class="row">
                                                      <div class="col-sm-12">
                                                          <div class="card collapse-icon accordion-icon-rotate">
                                                              
                                                              <div class="card-body">
                                                                  
                                                                  <div class="accordion" id="accordionExample">
                                                                  @foreach ($myoldlabs as $oldlabs => $myrequest)
                                                                      <div class="collapse-margin">
                                                                          <div class="card-header" id="heading{{ $oldlabs }}" data-toggle="collapse" role="button" data-target="#collapse{{ $oldlabs }}" aria-expanded="false" aria-controls="collapse{{ $oldlabs }}">
                                                                              <span class="lead collapse-title font-small-3">
                                                                                {{ $myrequest[0]->created_by }}  <span class="text-warning"> >> </span> {{ Carbon\Carbon::parse($myrequest[0]->created_on)->diffForHumans() }}
                                                                              </span>
                                                                          </div>

                                                                          <div id="collapse{{ $oldlabs }}" class="collapse" aria-labelledby="heading{{ $oldlabs }}" data-parent="#accordionExample">
                                                                              <div class="card-body">

                                                                                <div class="table-responsive">
                                                                                  <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                                      <thead>
                                                                                          <tr>
                                                                                            <th scope="col">Investigation</th>
                                                                                            <th scope="col">Cost</th>
                                                                                            <th scope="col">Remarks</th>
                                                                                            <th scope="col">Requested On</th>
                                                                                            <th scope="col">Request By</th>
                                                                                            <th scope="col">Status</th>
                                                                                            
                                                                                          </tr>
                                                                                      </thead>
                                                                                      <tbody>
                                                                                        @foreach ($myrequest as $labs)
                                                                                        <tr>
                                                                                            <td>{{ $labs->investigation }}</td>
                                                                                            <td>{{ $labs->cost }}</td>
                                                                                            <td>{{ $labs->remarks }}</td>
                                                                                            <td>{{ $labs->created_on }}</td>
                                                                                            <td>{{ $labs->created_by }}</td>
                                                                                            <td>{{ $labs->status }}</td>
                                                                                        </tr>
                                                                                    @endforeach 
                                                                                      </tbody>
                                                                                  </table>
                                                                              </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      @endforeach
                                                                    
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </section>
                                              <!-- Accordion with margin end -->
                                      <!-- Table head options end - drug requested -->

                                      </div>
                                      
                                      <div class="tab-pane fade " id="account-vertical-results" role="tabpanel" aria-labelledby="account-pill-results" aria-expanded="false">
                                        <form>
                                            
                                            
                                                <!-- Table Hover Animation start -->
                                                <div class="row" id="table-hover-animation">
                                                  <div class="col-12">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h4 class="card-title">Lab Results</h4>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                  <p>Key: <code> L - Abnormal Low, H - Abnormal High.
                                                                    </code> Test results relate only to the item tested.</p>
                                                                  <div class="table-responsive">
                                                                      <table id="investigationsResultsTable" class="table table-hover-animation table-striped mb-0 font-small-2" width="60%">
                                                                          <tbody>
                                                                            @foreach ($labresults as $result => $result_list)
                                                                            <tr>
                                                                               
                                                                                <th colspan="4" style="background-color: #F5B7B1">
                                                                                    {{ $result }}     
                                                                              </th>
                                                                              
                                                                            </tr>
                                                                            <tr>
                                                                            <th>Parameters</th>
                                                                            <th>Result</th>
                                                                            <th>Reference</th>
                                                                            <th>Interpretation</th>
                                                                            </tr>
                                                                            @foreach ($result_list as $parameter)
                                                                                <tr>
                                                                                    <td>{{ $parameter->test }}</td>
                                                                                    <td>{{ $parameter->result }}</td>
                                                                                    <td>{{ $parameter->range }}</td>
                                                                                    <td>@if($parameter->interpretation=='H' || $parameter->interpretation=='-H')
                                                                                      <a href class="btn btn-sm btn-danger btn-rounded">{{ $parameter->interpretation }}</a>
                                                                                      @elseif($parameter->interpretation=='L' || $parameter->interpretation=='-L')
                                                                                      <a href class="btn btn-sm btn-warning btn-rounded">{{ $parameter->interpretation }}</a>
                                                                                      @else
                                                                                      {{ $parameter->interpretation }}
                                                                                      @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endforeach
                                                                          </tbody>
                                                                      </table>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- Table head options end -->
                                            
                                        </form>
                                    </div>
                                    
                                      
                                      <div class="tab-pane fade" id="account-vertical-medication" role="tabpanel" aria-labelledby="account-pill-medication" aria-expanded="false">
                                          <div class="row">
                                            <div class="col-md-6 col-12">
                                              <div class="form-label-group">
                                                <select id="medication" name="medication" rows="3" onchange="getdrugdetail()" tabindex="1" data-placeholder="Select drug ..." style="width:100%">
                                                  <option value="">-- Select drug from pharmacy--</option>
                                                 @foreach($drugs as $drugs)
                                               <option value="{{ $drugs->id }}">{{ $drugs->name }}</option>
                                                 @endforeach
                                               </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6 col-12">
                                              <div class="form-label-group">
                                                  <input type="text" id="drug_application" class="form-control text-uppercase" placeholder="Dosage Remark" name="drug_application">
                                                  <label for="drug_application">Dosage Remark</label>
                                              </div>
                                          </div>
                                          <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="button" onclick="addDrug()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add </button>
                                             
                                              
                                          </div>
                                        </div>
                                        <!-- Table Hover Animation start - drug requested -->
                                        <div class="row" id="table-hover-animation">
                                          <div class="col-12">
                                              <div class="card">
                                                  <div class="card-header">
                                                      <h4 class="card-title">Drugs Requested</h4>
                                                  </div>
                                                  <div class="card-content">
                                                      <div class="card-body">
                                                         
                                                          <div class="table-responsive">
                                                              <table id="drugTable" class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                  <thead>
                                                                      <tr>
                                                                          <th scope="col">Quantity</th>
                                                                          <th scope="col">Drug Name</th>
                                                                          <th scope="col">Dosage Remark</th>
                                                                          <th scope="col">Unit Cost</th>
                                                                          <th scope="col">Total Cost</th>
                                                                          <th scope="col">Requested By</th>
                                                                          <th scope="col">Requested On</th>
                                                                          <th></th>
                                                                          <th></th>
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
                                      <!-- Table head options end - drug requested -->

                                      <!-- Accordion with margin start -->
                                      <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                    </div>
                                              <section id="accordion-with-margin">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card collapse-icon accordion-icon-rotate">
                                                            
                                                            <div class="card-body">
                                                                
                                                                <div class="accordion" id="accordionExample1">
                                                                @foreach ($myolddrugs as $olddrugs => $mydrugrequest)
                                                                    <div class="collapse-margin">
                                                                        <div class="card-header" id="heading{{ $olddrugs }}" data-toggle="collapse" role="button" data-target="#collapse{{ $olddrugs }}" aria-expanded="false" aria-controls="collapse{{ $olddrugs }}">
                                                                            <span class="lead collapse-title font-small-3">
                                                                              {{ $mydrugrequest[0]->created_by }}  <span class="text-warning"> >> </span> {{ Carbon\Carbon::parse($mydrugrequest[0]->created_on)->diffForHumans() }}
                                                                            </span>
                                                                        </div>

                                                                        <div id="collapse{{ $olddrugs }}" class="collapse" aria-labelledby="heading{{ $olddrugs }}" data-parent="#accordionExample1">
                                                                            <div class="card-body">

                                                                              <div class="table-responsive">
                                                                                <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                          <th scope="col">Quantity</th>
                                                                                          <th scope="col">Drug Name</th>
                                                                                          <th scope="col">Dosage Remark</th>
                                                                                          <th scope="col">Unit Cost</th>
                                                                                          <th scope="col">Total Cost</th>
                                                                                                
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                      @foreach ($mydrugrequest as $drugs)
                                                                                      <tr>
                                                                                          <td>{{ $drugs->drug_quantity }}</td>
                                                                                          <td>{{ $drugs->drug_name }}</td>
                                                                                          <td>{{ $drugs->drug_application }}</td>
                                                                                          <td>{{ $drugs->drug_cost }}</td>
                                                                                          <td>{{ $drugs->drug_cost * $drugs->drug_quantity  }}</td>
                                                                                          
                                                                                      </tr>
                                                                                  @endforeach 
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Accordion with margin end -->


                                      </div>

                                          
                                   
                                      
                                      <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                          <div class="row">
                                              <h6 class="m-1">Activity</h6>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                      <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                      <span class="switch-label w-100">Email me when someone comments
                                                          onmy
                                                          article</span>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                      <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                      <span class="switch-label w-100">Email me when someone answers on
                                                          my
                                                          form</span>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                      <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                      <span class="switch-label w-100">Email me hen someone follows
                                                          me</span>
                                                  </div>
                                              </div>
                                              <h6 class="m-1">Application</h6>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                      <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                      <span class="switch-label w-100">News and announcements</span>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                      <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                      <span class="switch-label w-100">Weekly product updates</span>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-1">
                                                  <div class="custom-control custom-switch custom-control-inline">
                                                      <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                      <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                      <span class="switch-label w-100">Weekly blog digest</span>
                                                  </div>
                                              </div>
                                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                  <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                      changes</button>
                                                  <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                              </div>
                                          </div>
                                      </div>



                                      <div class="tab-pane fade" id="account-vertical-appointment" role="tabpanel" aria-labelledby="account-pill-appointment" aria-expanded="false">
                                        <section id="multiple-column-form">
                                          <div class="row match-height">
                                            <div class="col-12">
                                              <div class="card">
                                                 
                                                <div class="card-content">
                                                  <div class="card-body">
                                                    <form class="form">
                                                      <div class="form-body">
                                                        <div class="row">
                                                          <div class="col-md-12 col-12">
                                                            <div class="form-label-group">
                                                              <select id="name" name="name" rows="3" tabindex="1" data-required="true" data-placeholder="Select Patient.." class="select2 form-control">
                                                                <option value="">Select Patient</option>
                                                                @foreach($patients as $patient)
                                                                  <option value="{{ $patient->id }}">{{ $patient->fullname }}</option>
                                                                 @endforeach
                                                              </select>
                                                              <label for="first-name-column">Name</label>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="title" name="title" rows="3" tabindex="1" data-required="true" data-placeholder="Select appointment type.." style="width:100%">
                                                                <option value="">Select Appointment Type</option>
                                                                  @foreach($servicetypes as $myservice)
                                                                 <option value="{{ $myservice->type }}">{{ $myservice->type }}</option>
                                                                 @endforeach 
                                                               </select>
                                                              <label for="last-name-column">Appointment Type</label>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="referal_doctor" name="referal_doctor" rows="3" data-required="true" tabindex="1" data-placeholder="Select doctor.." style="width:100%">
                                                                <option value="">Select Doctor</option>
                                                                  @foreach($doctors as $doctor)
                                                                <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                                                  @endforeach
                                                              </select> 
                                                              <label for="city-column">Doctor </label>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <input type="text" class="form-control" id="time" name="time" value="">
                                                              <label for="country-floating">Time</label>
                                                            </div>
                                                          </div>
                                                        
                                                          
                                                           
                                                          <div class="col-12">
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                 
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1  float-right">Save</button>
                                                            <a href="/event-calendar" target="_new" class="btn btn-outline-warning mr-1 mb-1  float-right">View Calendar</a>
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
                                      </div>


                                      <div class="tab-pane fade" id="account-vertical-admission" role="tabpanel" aria-labelledby="account-pill-admission" aria-expanded="false">
                                        <section id="multiple-column-form">
                                          <div class="row match-height">
                                            <div class="col-12">
                                              <div class="card">
                                                 
                                                <div class="card-content">
                                                  <div class="card-body">
                                                    <form class="form" action="POST" action="/create-ipd-opd">
                                                      <div class="form-body">
                                                        <div class="row">
                                                         
                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="title" name="title" rows="3" tabindex="1" data-required="true" data-placeholder="Select appointment type.." class="select2 form-control">
                                                                <option value="">Select Billing Account</option>
                                                                @foreach($accounttype as $accounttype)
                                                                 <option value="{{ $accounttype->type }}">{{ $accounttype->type }}</option>
                                                                @endforeach 
                                                               </select>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="admission_visit_type" name="admission_visit_type" rows="3" data-required="true" tabindex="1" data-placeholder="Select Admission Type" class="select2 form-control">
                                                                <option value="">Admission Type</option>
                                                                <option value="Admission">Admission</option>
                                                                <option value="Detention">Detention</option>
                                                              </select>
                                                            </div>
                                                          </div>

                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <input type="text" class="form-control" id="visit_date" name="visit_date" value="">
                                                              <label for="country-floating">Admission Date</label>
                                                            </div>
                                                          </div>

                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="admisson_service" name="admisson_service" rows="3" data-required="true" tabindex="1" data-placeholder="Select Admission Service Type" class="select2 form-control">
                                                                <option value="">Admission Service</option>
                                                                  @foreach($ipdservices as $ipd)
                                                                <option value="{{ $ipd->type }}">{{ ucfirst(trans($ipd->type)) }} </option>
                                                                  @endforeach
                                                              </select> 
                                                            </div>
                                                          </div>


                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="ward_id" name="ward_id" rows="3" data-required="true" tabindex="1" data-placeholder="Select Ward Name" class="select2 form-control">
                                                                <option value="">-- Select Ward --</option>
                                                                @foreach($wards as $ward)
                                                                <option value="{{ $ward->ward_type }}">{{  $ward->ward_type }}</option>
                                                                @endforeach
                                                              </select> 
                                                            </div>
                                                          </div>

                                                          <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                              <select id="bed_number" name="bed_number" rows="3" data-required="true" tabindex="1" data-placeholder="Select Bed Number" class="select2 form-control">
                                                                <option value="">-- Select Bed Number --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="1">3</option>
                                                                <option value="2">4</option>
                                                                <option value="1">5</option>
                                                                <option value="2">6</option>
                                                                <option value="1">7</option>
                                                                <option value="2">8</option>
                                                                <option value="1">9</option>
                                                                <option value="2">10</option>
                                                              </select> 
                                                            </div>
                                                          </div>
                                                        
                                                        
                                                          
                                                           
                                                          <div class="col-12">
                                                            <input type="hidden" id="patient_id" name="patient_id" value="{{ $visit_details->patient_id }}">
                                                            <input type="hidden" id="myopdnumber" name="myopdnumber" value="{{ $visit_details->opd_number }}">
                                                            <input type="hidden" id="fullname" name="fullname" value="{{ $visit_details->name }}">
                                                            <input type="hidden" id="myaccounttype" name="myaccounttype" value="{{ $visit_details->payercode }}"> 
                                                            <input type="hidden" id="mycopayer" name="mycopayer" value="{{ $visit_details->care_provider }}"> 
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                 
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1  float-right">Click to Admit</button>
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
                                      </div>

                                      <div class="tab-pane fade" id="account-vertical-referal" role="tabpanel" aria-labelledby="account-pill-referal" aria-expanded="false">
                                      <!-- Floating Label Textarea start -->
                                          <section class="floating-label-textarea">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                       
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                             
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea class="form-control" name="myreferal" id="myreferal" rows="3" placeholder="Enter referal text"></textarea>
                                                                            <label for="label-textarea">Referal Note</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary mr-1 mb-1 float-right">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
              <!-- Floating Label Textarea end -->

                                      </div>

                                      <div class="tab-pane fade" id="account-vertical-discharge" role="tabpanel" aria-labelledby="account-pill-discharge" aria-expanded="false">
                                        <!-- Floating Label Textarea start -->
                                            <section class="floating-label-textarea">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="card">
                                                         
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                               
                                                                  <div class="row">
                                                                      <div class="col-12">
                                                                          <fieldset class="form-label-group">
                                                                              <textarea class="form-control" name="treatment_plan" id="treatment_plan" rows="6" placeholder="Conclusion"></textarea>
                                                                              <label for="label-textarea">Conclusion</label>
                                                                          </fieldset>
                                                                      </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea class="form-control" name="treatment_plan_action" id="treatment_plan_action" rows="6" placeholder="Recommendation"></textarea>
                                                                            <label for="label-textarea">Recommendation</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                  <button type="submit" type="button" onclick="addPlan()" class="btn btn-primary mr-1 mb-1 float-right">Save</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          <section class="panel panel-info">
                                            <header class="panel-heading font-bold">Discharge History</header>
                                            <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table id="planTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Conclusion</th>
                                                            <th scope="col">Recommendation</th>
                                                            <th></th>
                                                            <th></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          
                                                      </tbody>
                                                  </table>
                                              </div>
                                              </div>
                                          </section>
                <!-- Floating Label Textarea end -->
  
                                        </div>

                                     

                                      




                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- account setting page end -->

      </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>




{{-- 
<div class="modal fade" id="new-admission" style="height:600px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Admit Patient</h4>
      </div>
      <div class="modal-body">
        <p></p>
                    <section class="vbox">
                  <section class="scrollable">
                    <div class="tab-content">
                      <div class="tab-pane active" id="individual">
                         
                          @include('doctor/admit') 
                    
                      </div>                  
                      </div>
                      </section>
              </section>
       </div>        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog --> --}}





<div class="modal fade" id="new-medication" style="height:600px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add New Medication</h4>
      </div>
      <div class="modal-body">
        <p></p>
                    <section class="vbox">
                  <section class="scrollable">
                    <div class="tab-content">
                      <div class="tab-pane active" id="individual">
                         <form  class="bootstrap-modal-form" class="panel-body wrapper-lg">
                         @include('doctor/medication')
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                      </div>                  
                      </div>
                      </section>
              </section>
       </div>        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->


@stop

  

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script src="{{ asset('/event_components/moment.min.js')}}"></script> 
<script src="{{ asset('/js/daterangepicker.js')}}"></script>

<script src="{{ asset('/js/tinymce/tinymce.min.js')}}"></script>


 <script>tinymce.init({
  selector: '#continuation_sheet',
  height: 500,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount',
    'template'
  ],
  toolbar: 'insert | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'

  

});
 </script>

  <script>tinymce.init({
  selector: '#continuation_sheet_nurse',
  height: 500,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount',
    'template'
  ],
  toolbar: 'insert | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'

  

});
 </script>


{{-- <script>tinymce.init({
  selector: '#treatment_plan',
  height: 200,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount',
    'template'
  ],
  toolbar: 'insert | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'

  

});
 </script>


<script>tinymce.init({
  selector: '#treatment_plan_action',
  height: 200,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount',
    'template'
  ],
  toolbar: 'insert | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'

  

});
 </script> --}}





 <script type="text/javascript">
        $(window).on("beforeunload", function() {
          //swal ("Are you sure? You didn't finish the form!");
            return "Are you sure? You didn't finish the form!";

        });
        
        $(document).ready(function() {
            $("#masterform").on("submit", function(e) {
                //check form to make sure it is kosher
                //remove the ev
                $(window).off("beforeunload");
                return true;
            });
        });
</script> 


<script type="text/javascript">
$(function () {
  $('#new-appointment-request input[name="time"]').daterangepicker({
     "daysOfWeek": ['Mo', 'Tu', 'We', 'Th', 'Fr'],
    "singleDatePicker":true,
    "autoApply": true,
    "showISOWeekNumbers": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "locale": {
     "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});

$(function () {
  $('#medication_time').daterangepicker({
      "minDate": moment('1930-06-14'),
      "maxDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "timePicker": true,
      "timePicker24Hour": true,
      //"timePickerIncrement": 15,
      "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});

$(function () {
  $('#time').daterangepicker({
      "minDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "timePicker": true,
      "timePicker24Hour": true,
      //"timePickerIncrement": 15,
      "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  })
});
</script>



<script type="text/javascript">

$(document).ready(function () {
                loadMedication();
                loadComplaints();
                loadInvestigation();
                //loadInvestigationResults();
                loadDiagnosis();
                loadProcedure();
                loadHistory();
                loadVitals();
                loadAssessment();
                loadPlan();
                totalPayable();
                loadTreatmentPlan();
                loadFluids();
                loadAntenatal();
                
                
                //loadTreatmentPlan();

$('#medication_given').select2();
$('#referal_doctor').select2();    
$('#consultation_type').select2();
$('#location').select2();
$('#visit_type').select2();
$('#ipd_accounttype').select2();

$('#ipd_referal_doctor').select2({
      tags: true
      });


    $('#investigation').select2();  
     $('#procedure').select2();
     $('#title').select2();
  
   
      $('#medication').select2();

    
    $('#history').select2({
      tags: true
      });
     $('#diagnosis').select2({
      tags: true
      });
    
    
   
     $('#complaint_assoc').select2({
      tags: true
      });

    



      $('#od_ocular_adnexae').select2({
      tags: true
      });
    $('#os_ocular_adnexae').select2({
      tags: true
      });
    $('#od_cornea').select2({
      tags: true
      });
     $('#os_cornea').select2({
      tags: true
      });
    $('#od_ac_lens').select2({
      tags: true
      });
    $('#os_ac_lens').select2({
      tags: true
      });
    $('#od_pupil_lens').select2({
      tags: true
      });
    $('#os_pupil_lens').select2({
      tags: true
      });
    $('#od_ocular_lens').select2({
      tags: true
      });
    $('#os_ocular_lens').select2({
      tags: true
      });
    $('#od_virteous').select2({
      tags: true
      });
    $('#os_virteous').select2({
      tags: true
      });
    $('#od_c_d_ratio').select2({
      tags: true
      });
    $('#os_c_d_ratio').select2({
      tags: true
      });
    $('#od_retina').select2({
      tags: true
      });
    $('#os_retina').select2({
      tags: true
      });
    $('#od_others').select2({
      tags: true
      });
    $('#os_others').select2({
      tags: true
      });
    $('#od_iop').select2({
      tags: true
      });
    $('#os_iop').select2({
      tags: true
      });
     $('#od_visual_ascuity').select2({
      tags: true
      });
      $('#os_visual_ascuity').select2({
      tags: true
      });
       $('#od_conjunctiva_sclera').select2({
      tags: true
      });
       $('#os_conjunctiva_sclera').select2({
      tags: true
      });


       $('#examination_type').select2();

    $('#lens_treatment').select2();
          $('#lens_power').select2();
       $('#rim_type').select2({
      tags: true
      });
    $('#lens_type').select2();
    $('#lens_color').select2({
      tags: true
      });
    $('#lens_style').select2({
      tags: true
      });
    $('#lens_index').select2();

    
  

  });
</script>





  <script type="text/javascript" >

function addVitals()
{


    $.get('/add-vitals',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "weight": $('#weight').val(),
          "height": $('#height').val(),
          "waist_circumference": $('#waist_circumference').val(),
          "hip_circumference":  $('#hip_circumference').val(),
          "frame": $('#frame').val(),
          "b_fat": $('#b_fat').val(),
          "v_fat": $('#v_fat').val(),
          "diastolic": $('#diastolic').val(),
          "systolic": $('#systolic').val(),
          "pulse_rate": $('#pulse_rate').val(),
          "blood_pressure": $('#blood_pressure').val(),
          "respiration": $('#respiration').val(),
          "spo2": $('#SpO2').val(),
          "fbs": $('#fbs').val(),
          "rbs": $('#rbs').val(),
           "vr_visual_ascuity": $('#vr_visual_ascuity').val(),
          "vital_remark": $('#vital_remark').val(),
          "temperature": $('#temperature').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
         
           loadVitals();

        }
        else
        {
          sweetAlert("Vital parameters failed to be added!");
        }
      });
                                        
        },'json');
  
}



    function getdrugdetail()
{ 
   //alert($('#medication').val());

  $.get("/get-drug-info",
          {"medication": $('#medication').val()},
          function(json)
          {
                 getDrugAvailable();
                 getDiagnosisState();
            
                $('#drug_dosage').val(json['drug_dosage']);
                $('#drug_form').val(json['drug_form']);
                $('#drug_pack_size').val(json['drug_pack_size']);
                $('#drug_generic').val(json['drug_generic']);
                $('#drug_quantity').val("");

               
                
              //}
          },
          'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function totalPayable()
    {
     
          $.get('/billing-total',
        {
          "opd_number": $('#opd_number').val()
        },
        function(data)
        { 
         // alert(data.outstanding);
          $.each(data, function (key, value) 
          { 

            //thousands_separators(data["Premium"])
            
          $('#outstanding').val('PAYABLE: GHS '+ data.outstanding);
          $('#payable').val('BILL - GHS '+ data.payables);
          $('#receivable').val('PAID - GHS '+ data.receivables);

           });
                                        
        },'json'); 
}


function doDischarge(id,name)
  {

         
      swal({   
        title: "Discharging " + name +"!",  
        text: "Do you want to discharge "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, discharge!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/discharge-opd',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Discharged!", name +" was successfully deleted.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to discharge.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

  }


  function deletedrug(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the prescription list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-medication',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from prescription list.", "success"); 
             loadMedication();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from prescription.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from prescription.", "error");   
        } });

    
   }


function addNote()
{
if($('#complaint').val()!= "")
{

  //alert($('#editor').html());
    $.get('/add-note',
        {
          // Chief Complaint & HPI
          "patient_id":  $('#patient_id').val(),
          "opd_number":  $('#opd_number').val(),
          "complaint":   $('#complaint').val(),
          "com_period":  $('#com_period').val(),
          "com_span":    $('#com_span').val(),
          "com_remark":  $('#com_remark').val(),
          "presentingcomplaint":  $('#presentingcomplaint').val(),
          "directquestion": $('#directquestion').val(),
          "doctors_note":   $('#perspective_comment_doctor').val(),
          "patients_note":  $('#perspective_comment_patient').val(),

          //History
          "medical_history":  $('#medical_history').val(),
          "family_history":  $('#family_history').val(),
          "social_history":  $('#social_history').val(),
          "vaccinations_history":  $('#vaccinations_history').val(),
          "drug_history":  $('#drug_history').val(),
          "drug_history_recent":  $('#drug_history_recent').val(),
          "g6pd":  $('#g6pd').val(),
          "blood_group":  $('#blood_group').val(),
          "surgical_history":  $('#surgical_history').val(),
          "reproductive_history":  $('#reproductive_history').val(),
          "allergy":  $('#allergy').val(),

          //ROS
          "ros_constitutional":  $('#ros_constitutional').val(),
          "ros_skin":  $('#ros_skin').val(),
          "ros_head":  $('#ros_head').val(),
          "ros_eyes":  $('#ros_eyes').val(),
          "ros_ears":  $('#ros_ears').val(),
          "ros_nose":  $('#ros_nose').val(),
          "ros_throat":  $('#ros_throat').val(),
          "ros_respiratory":  $('#ros_respiratory').val(),
          "ros_cardiovasular":  $('#ros_cardiovasular').val(),
          "ros_gastro":  $('#ros_gastro').val(),
          "ros_gynecology":  $('#ros_gynecology').val(),
          "ros_genitourinary":  $('#ros_genitourinary').val(),
          "ros_endocrine":  $('#ros_endocrine').val(),
          "ros_musculoskeletal":  $('#ros_musculoskeletal').val(),
          "ros_peripheral_vascular":  $('#ros_peripheral_vascular').val(),
          "ros_hematology":  $('#ros_hematology').val(),
          "ros_neuropsychiatric":  $('#ros_neuropsychiatric').val(),

          //PE
          "pe_general":  $('#pe_general').val(),
          "pe_HEENT":  $('#pe_HEENT').val(),
          "pe_neck":  $('#pe_neck').val(),
          "pe_skin":  $('#pe_skin').val(),
          "pe_respiratory":  $('#pe_respiratory').val(),
          "pe_heart":  $('#pe_heart').val(),
          "pe_abdominal":  $('#pe_abdominal').val(),
          "pe_extremities":  $('#pe_extremities').val(),
          "pe_cns":  $('#pe_cns').val(),
          "pe_musculoskeletal":  $('#pe_musculoskeletal').val(),
          "pe_psychological":  $('#pe_psychological').val(),
          "pe_breast":  $('#pe_breast').val(),
  
          

        },
        function(data)
        { 
          
        $.each(data, function (key, value) {
        if(data["OK"])
        {
          
           toastr.success("Note successfully saved!");
          loadComplaints();
        }
        else
        {
          toastr.success("Complaint failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add a complaint!");}
}


function addNoAvailableDrug()
{

  if($('#medication_no_available').val()!= "")
{

    $.get('/add-medication-no-stock',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "medication": $('#medication_no_available').val(),
          "drug_application": $('#medication_no_remark').val(),
          "drug_quantity": $('#medication_no_days').val(),
          "fullname":  $('#fullname').val()       
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //sweetAlert("Drug has been forwarded to pharmacy!");
          $('#new-medication').modal('toggle')
          loadMedication();
        }
        else
        {
          sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please type a drug name!");}

}

function addPlan()
{
if($('#treament_plan').val()!= "")
{

  //alert($('#complaint').val());
  tinyMCE.triggerSave();
    $.get('/add-plan',
        {
          "opd_number": $('#opd_number').val(),
          "treament_plan": $('#treatment_plan').val(),
          "treament_plan_action": $('#treatment_plan_action').val()
                         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          loadPlan();
        }
        else
        {
          sweetAlert("Assessment failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add an assessment!");}
}


function updateLocationStatus(id,status)
{
  //alert(status);

    $.get('/update-location-status',
        {
          "id": id,
          "status": status,                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //location.reload(true);
           toastr.success("Location changed!");
           
        }
        else
        {
          toastr.error("Error updating location!");
        }
      });
                                        
        },'json');
  }
  


function updateCareStatus(id,status)
{

    $.get('/update-location-status',
        {
          "id": id,
          "status": status,                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //location.reload(true);
           toastr.success("Status updated!");
           
        }
        else
        {
          toastr.error("Error updating status!");
        }
      });
                                        
        },'json');
  }


  function assignDoctor(id,doctor)
{

    $.get('/assign-doctor-patient',
        {
          "id": id,
          "doctor": doctor,                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //location.reload(true);
           toastr.success("Doctor assigned!");
           
        }
        else
        {
          toastr.error("Error assigning doctor!");
        }
      });
                                        
        },'json');
  }
  

function addPlanReferal()
{
if($('#myreferal').html()!= "")
{

  //alert($('#complaint').val());
    $.get('/add-doctor-referal',
        {
          "opd_number": $('#opd_number').val(),
          "patient_id": $('#patient_id').val(),
          "referal_note": $('#myreferal').html()
                         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
           sweetAlert("Note saved successfully!");
          loadAssessment();
        }
        else
        {
          sweetAlert("Assessment failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add an assessment!");}
}


function addAssessment()
{
if($('#assessment').html()!= "")
{

  //alert($('#complaint').val());

  //tinyMCE.triggerSave();
    $.get('/add-assessment',
        {
          "opd_number": $('#opd_number').val(),
          "patient_id": $('#patient_id').val(),
          "assessment": $('#assessment').html()
                         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //sweetAlert("Plan saved successfully!");
          //toastr.success("Note successfully saved!");
          toastr.success('Plan successully saved.', 'Saved!', { positionClass: 'toast-top-full-width', });
          loadAssessment();
        }
        else
        {
          sweetAlert("Assessment failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add an assessment!");}
}

function addContinuation()
{
if($('#continuation_sheet').val()!= "")
{

  //alert($('#complaint').val());
  tinyMCE.triggerSave();
    $.get('/add-continuation',
        {
          "opd_number": $('#opd_number').val(),
          "patient_id": $('#patient_id').val(),
          "continuation_sheet": $('#continuation_sheet').val()
                         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          sweetAlert("Note saved successfully!");
          //loadContinuation();
        }
        else
        {
          sweetAlert("Note failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add a Note!");}
}



function getDrugAvailable()
{

     $.get('/get-drug-availability',
        {
          "medication": $('#medication').val()    

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Drug is out of stock!");
         
        }
        else
        {
          //sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');

}

function getDiagnosisState()
{

     $.get('/get-diagnosis-state',
        {
           "opd_number": $('#opd_number').val()    

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("No Diagnosis has been added");

          $('#medication').val('');
          $('#investigation').val('');


         
        }
        else
        {
          //sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');

}


function addTreatementPlan()
{
if($('#medication_given').val()!= "")
{

  //alert($('#complaint').val());
    $.get('/add-treatment_schedule',
        {
          "opd_number": $('#opd_number').val(),
          "medication": $('#medication_given').val(),
          "medication_plan": $('#medication_plan').val(),
          "medication_time": $('#medication_time').val()
                         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          loadTreatmentPlan();
        }
        else
        {
          sweetAlert("Treatment details failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Treatment details!");}
}

function addFluids()
{
if($('#ivf').val()!= "")
{

    $.get('/add-fluid',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "ivf"       : $('#ivf').val(),
          "oral"      : $('#oral').val(),
          "urine"     : $('#urine').val(),
          "ngt"       : $('#ngt').val(),
          "fluid_time"       : $('#fluid_time').val(),
          "drains"    : $('#drains').val()

        },
        function(data)
        { 
          
        $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          loadFluids();
        }
        else
        {
          sweetAlert("Input / Output record failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a Procedure!");}
}

function loadFluids()
   {
         
        
        $.get('/patient-fluids',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#fluidTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#fluidTable tbody').append('<tr><td>'+ value['fluid_time'] +'</td><td>'+ value['ivf'] +'</td><td>'+ value['oral'] +'</td><td><a a href="#"><i onclick="removeFluid('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

function addDrug()
{
if($('#medication').val()!= "" || $('#drug_application').val()!= "")
{
  //alert($('#opd_number').val());

    $.get('/add-medication',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
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
          loadMedication();
          totalPayable();
        }
        else
        {
          sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please select a drug or add the number of day to take drugs!");
    }
}

function addInvestigation()
{
if($('#investigation').val()!= "")
{

    $.get('/add-investigation',
        {
          "patient_id":           $('#patient_id').val(),
          "accounttype":           $('#accounttype').val(),
          "opd_number":           $('#opd_number').val(),
          "remark":               $('#investigation_remark').val(),
          "investigation":        $('#investigation').val(),
          "remark":               $('#investigation_remark').val(),
          "fullname":             $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //sweetAlert("Investigation has been forwarded to Lab!");
          //$('#new-investigation').modal('toggle')
          loadInvestigation();
          totalPayable();
        
        }
        else
        {
          Swal.fire("Investigation failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {Swal.fire("Please select an Investigation!");}
}

function addProcedure()
{
if($('#procedure').val()!= "" && $('#procedure_quantity').val()!= "")
{

  //alert($('#procedure_quantity').val());

    $.get('/add-procedure-nurse',
        {
          "patient_id": $('#patient_id').val(),
           "accounttype": $('#accounttype').val(),
          "opd_number": $('#opd_number').val(),
          "procedure": $('#procedure').val(),
          "procedure_quanity": $('#procedure_quantity').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //sweetAlert("Procedure added!");
           //$('#new-procedure').modal('toggle')
          loadProcedure();
          totalPayable();
        }
        else
        {
          Swal.fire("Procedure failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {Swal.fire("Please select a Procedure or enter a quantity!");}
}

function loadAntenatal()
    {
       $.get('/get-antenatal-records',
          {
            "patient_id": $('#patient_id').val()
          },
          function(data)
          { 
            $('#AntenatalTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#AntenatalTable tbody').append('<tr><td>'+ value['created_on'] +'</td><td>'+ value['lmp'] +'</td><td>'+ value['gestation_by_date'] +'</td><td>'+ value['edd'] +'</td><td>'+ value['position'] +'</td><td>'+ value['presentation'] +'</td><td>'+ value['engagement'] +'</td><td>'+ value['fh_fm'] +'</td> <td>'+ value['lie'] +'</td><td>'+ value['fetus'] +'</td><td>'+ value['sp'] +'</td><td>'+ value['fetal_heart_tone'] +'</td><td>'+ value['remarks'] +'</td><td><a a href="#"><i onclick="removeAntenatalRecord('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });                                 
         },'json');      
    }


function addAntenatal()
{
  //alert($('#patient_id').val());
if($('#lmp').val()!= "" && $('#presentation').val()!="")
{

    $.get('/add-antenatal-records',
        {
          "opd_number": $('#opd_number').val(),
          "lmp" :$('#lmp').val(), 
          "patient_id": $('#patient_id').val(),
          "gestation_by_date": $('#gestation_by_date').val() + ' ' + $('#gestation_by_date_day').val() + 'day(s)',
          "fetus":  $('#fetus').val(),
          "presentation": $('#presentation').val(),
          "engagement": $('#engagement').val(),
          "fh_fm": $('#fh_fm').val(),
          "position": $('#position').val(),
          "lie": $('#lie').val(),
          "oedema": $('#oedema').val(),
          "antenatal_remarks": $('#antenatal_remarks').val(),
          "urine_sugar": $('#urine_sugar').val(),
          "urine_protein": $('#urine_protein').val(),
          "edd": $('#edd').val(),
          "bloodtype": $('#bloodtype').val(),
          "g6pd": $('#ant_g6pd').val(),
          "tt": $('#tt').val(),
          "sp": $('#sp').val(),
          "fetal_heart_tone": $('#fetal_heart_tone').val()


        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          loadAntenatal();
          sweetalert('Records Added');
        }
        else
        {
          sweetAlert("Record failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Add a record first before saving !");
    }
}


function removeAntenatalRecord(id)
   {
      
          $.get('/delete-antenatal-records',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from history list.", "success"); 
              loadAntenatal();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from record.", "error");
              
            }
           
        });
                                          
          },'json');    
           
   }

function addDiagnosis()
{
if($('#diagnosis').val()!= "" && $('#diagnosis_type').val()!= "")
{

    $.get('/add-diagnosis',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "diagnosis":  $('#diagnosis').val(),
          "diagnosis_type":  $('#diagnosis_type').val(),
          "diagnosis_remark":       $('#diagnosis_remark').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          
          loadDiagnosis();
          //$('#diagnosis').val('');
        }
        else
        {
          Swal.fire("Diagnosis failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {Swal.fire("Please select a diagnosis type or select a diagnosis from the list !");}
}

 function loadDiagnosisDescription()
    {
         
        
        $.get('/load-dignosis-description',
          {
            "diagnosis_category": $('#diagnosis_category').val()
          },
          function(data)
          { 

            $('#diagnosis').empty();
            $.each(data, function () 
            {           
            $('#diagnosis').append($('<option></option>').val(this['type']).html(this['type']));
            });
                                          
         },'json');      
    }

function addHistory()
{
if($('#history').val()!= "")
{

    $.get('/add-history',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "family_history": $('#family_history').val(),
          "social_history": $('#social_history').val(),
          "medical_history": $('#medical_history').val(),
          "vaccinations_history": $('#vaccinations_history').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          //sweetAlert("History added!");
          // $('#new-history').modal('toggle')
          loadHistory();
        }
        else
        {
          sweetAlert("History failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a social or family history!");}
}


  function loadAllDiagnosis()
   {
         
         if($('#search').val()=="")
  {sweetAlert("Please enter a diagnosis",'Fill field', "error");}
        
        else
        {
        $.get('/load-dignosis-description',
          {
            "search": $('#search').val()
          },
          function(data)
          { 

            $('#searchTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#searchTable tbody').append('<tr><td><a a href="#" class="text-info" onclick="setDiagnosis(\''+value['type']+'\')">'+ value['code'] +'</a></td><td>'+ value['category'] +'</td><td>'+ value['type'] +'</td></tr>');
            });
                                          
         },'json');  
         }    
    }



 function setDiagnosis(diagnosis)
   {
         //alert($('#opd_number').val());
        $.get("/add-diagnosis-icd",
          
          {

            "opd_number":$('#opd_number').val(),
            "diagnosis":diagnosis
          },
          function(json)
          {

                 //sweetAlert(json.diagnosis);
                //$('#customer_number').val(json.fullname);
                //sweetAlert("Diagnosis added!");
                $('#new-diagnosis').modal('toggle')
                loadDiagnosis();
               
               
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

    }


function loadDocumentDetail()
   {
         
        
        $.get('/load-document-details',
          {
            "patient_id": $('#patient_id').val()
          },
          function(data)
          { 

            $('#DocumentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#DocumentTable tbody').append('<tr><td>'+ value['filename'] +'</td><td>'+ value['original_name'] +'</td><td>'+ value['size'] +'</td><td>'+ value['created_on'] +'</td><td><a a href="/uploads/images/'+ value['filepath'] +'"><i onclick="/uploads/images/'+ value['filepath'] +'" class="fa fa-eye"></i></a></td><td><a a href="#"><i onclick="deleteDocument('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }




function loadMedication()
   {
         
        
        $.get('/patient-medication',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#drugTable tbody').empty();
            $.each(data, function (key, value) 
            {  
              
              
                
            $('#drugTable tbody').append('<tr><td>'+ value['drug_quantity'] +'</td><td>'+ value['drug_name'] +'</td><td>'+ value['drug_application'] +'</td><td>'+ value['drug_cost'] +'</td><td>'+ value['drug_cost']*value['drug_quantity'] +'</td><td>'+ value['created_by'] +'</td><td>'+ value['created_on'] +'</td><td>'+ (value['status'] == "Dispensed" ? '<a href="#" class="btn btn-sm btn-success btn-rounded">' : '<a href="#" class="btn btn-sm btn-danger btn-rounded">' ) + value['status'] +'</a></td><td><a a href="#"><i onclick="removeMedication('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadPlan()
   {
         
        
        $.get('/patient-plan',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#planTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#planTable tbody').append('<tr><td>'+ value['date'] +'</td><td>'+ value['plan'] +'</td><td>'+ value['action'] +'</td><td><a a href="#"><i onclick="removePlan('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    

    function loadAssessment()
   {
         
        
        $.get('/patient-assessment',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#assessmentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#assessmentTable tbody').append('<tr><td>'+ value['assessment'] +'</td><td>'+ value['created_by'] +'</td><td>'+ value['created_on'] +'</td><td><a a href="#"><i onclick="removeAssessment('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }




function loadComplaints()
   {
         
        
        $.get('/patient-complaint',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#complaintTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#complaintTable tbody').append('<tr><td>'+ value['complaint'] +'</td><td>'+ value['period'] +' '+ value['span'] +' '+ value['remark'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removecomplain('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



function loadInvestigation()
   {


         
        
        $.get('/patient-investigation',
          {
            "opd_number": $('#opd_number').val() 
          },
          function(data)
          { 

            $('#investigationsTable tbody').empty();
            $.each(data, function (key, value) 
            {           
           $('#investigationsTable tbody').append('<tr><td>'+ value['investigation'] +'</td><td>'+ value['cost'] +'</td><td>'+ value['created_on'] +'</td><td>'+ value['created_by'] +'</td><td><input type="text" class="form-control form-control-sm" item_code="'+ value['id'] +'" value="'+ value['remark'] +'" onchange="change_count(this);"></td><td>'+ value['status'] +'</td><td>' + (value['type'] == "Laboratory" ? '<a a href="/test-collection-slip/'+value['visitid']+'">' : '<a a href="/image-request-slip/'+value['id']+'">' ) + '<i onclick="" class="feather icon-printer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print investigation request"></i></a></td><td>' + ( value['type'] == "Laboratory" && value['status'] == "Ready"  ? '<a href="/laboratory-results-master/'+value['result_id']+'" target="_blank">' : '<a a href="#">' ) + '<i onclick="" class="feather icon-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="View result"></i></a></td><td><a onclick="removeinvestigation('+value['id']+')"><i class="feather icon-trash-2"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadInvestigationResults()
   {


         
        
        $.get('/patient-investigation-results',
          {
            "opd_number": $('#opd_number').val() 
          },
          function(data)
          { 

            $('#investigationsResultsTable tbody').empty();
            $.each(data, function (key, value) 
            {           
           $('#investigationsResultsTable tbody').append('<tr><td>'+ value['test'] +'</td><td>'+ value['result'] +'</td><td>'+ value['range'] +'</td><td>'+ value['interpretation'] +'</td></tr>');
            });
                                          
         },'json');      
    }


    function change_count(obj)
    {

      var item_code=$(obj).attr('item_code');
      var new_qty=$(obj).val();
        //alert(item_code);

          $.get('/update-investigation-comment',
          {
             "id": item_code,
             "drug_quantity": new_qty
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
             loadInvestigation();
             }
            else
            { 
             loadInvestigation();
              
            }
           
        });
                                          
          },'json');    
           
    }

function loadDiagnosis()
   {
         
        
        $.get('/patient-diagnosis',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#diagnosisTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#diagnosisTable tbody').append('<tr><td>'+ value['diagnosis_type'] +'</td><td>'+ value['diagnosis'] +'</td><td>'+ value['created_by'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removediagnosis('+value['id']+')" class="feather icon-trash-2"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


      function loadDiagnosisDescription()
    {
         
        
        $.get('/load-dignosis-description',
          {
            "diagnosis_category": $('#diagnosis_category').val()
          },
          function(data)
          { 

            $('#diagnosis').empty();
            $.each(data, function () 
            {           
            $('#diagnosis').append($('<option></option>').val(this['type']).html(this['type']));
            });
                                          
         },'json');      
    }


function loadVitals()
   {
         
        
        $.get('/patient-vitals',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#vitalTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#vitalTable tbody').append('<tr><td>'+ value['created_on'] +'</td><td>'+ value['weight'] +'</td><td>'+ value['height'] +'</td><td>'+ value['bmi']  + (value['bmi_status'] == "Normal" ? '<span class="btn btn-sm btn-success btn-rounded">'+ value['bmi_status'] +'</span>' :  '<span class="btn btn-sm btn-danger btn-rounded">'+ value['bmi_status'] +'</span>' ) +'</td><td>'+ value['temperature'] + (value['temp_status'] == "Normal" ? '<span class="btn btn-sm btn-success btn-rounded">'+ value['temp_status'] +'</span>' :  '<span class="btn btn-sm btn-danger btn-rounded">'+ value['temp_status'] +'</span>' ) +'</td><td>'+ value['sbp'] + '/' + value['dbp'] + (value['bp_status'] == "Normal" ? '<span class="btn btn-sm btn-success btn-rounded">'+ value['bp_status'] +'</span>' :  '<span class="btn btn-sm btn-danger btn-rounded">'+ value['bp_status'] +'</span>' ) +'</td><td>'+ value['pulse_rate'] +'</td><td>'+ value['respiration'] +'</td><td>'+ value['waist_circumference'] +'</td><td>'+ value['hip_circumference'] +'</td><td><a a href="#"><i onclick="removeVital('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



    function loadProcedure()
   {
         
        
        $.get('/patient-procedure',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#procedureTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#procedureTable tbody').append('<tr><td>'+ value['procedure'] +'</td><td>'+ value['cost'] +'</td><td>'+ value['created_on'] +'</td><td>'+ value['created_by'] +'</td><td>'+ value['status'] +'</td><td><a a href="#"><i onclick="removeprocedure('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadHistory()
   {
         
        
        $.get('/patient-history',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#historyTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#historyTable tbody').append('<tr><td>'+ value['medical_history'] +'</td><td>'+ value['family_history'] +'</td><td>'+ value['social_history'] +'</td><td>'+ value['vaccinations_history'] +'</td><td><a a href="#"><i onclick="removeHistory('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadImages()
   {
         
        
        $.get('/patient-imaging',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#ImageTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ImageTable tbody').append('<tr><td>'+ value['diagnosis'] +'</td><td>'+ value['remark'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removediagnosis('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadTreatmentPlan()
   {
         
        
        $.get('/patient-nurse-treatment',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#treatmentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#treatmentTable tbody').append('<tr><td>'+ value['treatment_name'] +'</td><td>'+ value['time_given'] +'</td><td>'+ value['remark'] +'</td><td>'+ value['created_by'] +'</td><td><a a href="#"><i onclick="removeTreatment('+value['id']+')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



  @if($visit_details->referal_doctor == Auth::user()->getNameOrUsername())
  function removeMedication(id)
   {
    

          $.get('/delete-medication',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from prescription list.", "success"); 
              loadMedication();
              totalPayable();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from prescription.", "error");
              
            }
           
        });
                                          
          },'json');    
           
   }


   


    function removeHistory(id)
   {
      
          $.get('/delete-history',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from history list.", "success"); 
              loadHistory();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from history.", "error");
              
            }
           
        });
                                          
          },'json');    
           
   }




   function removediagnosis(id)
   {
     
          $.get('/delete-diagnosis',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from list.", "success"); 
              loadDiagnosis();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    

   }


function removeinvestigation(id)
   {
     
          $.get('/delete-investigation',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from list.", "success"); 
              loadInvestigation();
              totalPayable();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');        
    
   }

  
   function removeAssessment(id)
   {
     
          $.get('/delete-assessment',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from list.", "success"); 
              loadAssessment();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');        
    
   }


function removeprocedure(id)
   {
     
          $.get('/delete-procedure',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from list.", "success"); 
              loadProcedure();
              totalPayable();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
            

    
   }


   function removeVital(id)
   {
      
          $.get('/delete-vital',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from history list.", "success"); 
              loadVitals();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from records.", "error");
              
            }
           
        });
                                          
          },'json');    
           
   }


   function removecomplain(id)
   {

     
          $.get('/delete-complaint',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              toastr.error("Deleted!", name +" was removed from list.", "success"); 
              loadComplaints();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
    
   }


@else

@endif

 function removePlan(id)
   {
     
          $.get('/delete-plan',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              //swal("Deleted!", name +" was removed from list.", "success"); 
              loadPlan();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');        
    
   }


function getAge()
{

    $.get('/patient-age-occupation',
        {

          "id": $('#patient_id').val()
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#age').val(data.age);
           $('#occupation').val(data.occupation);
           $('#accounttype').val(data.accounttype);
       
      });
                                        
        },'json');
  
}

function loadRisk()
   {
         
        
        $.get('/load-account',
          {
            "patient_id": $('#patient_id').val()
          },
          function(data)
          { 

            $('#ref_accounttype').empty();
            $.each(data, function () 
            {           
            $('#ref_accounttype').append($('<option></option>').val(this['accounttype']).html(this['accounttype']));
            });
                                          
         },'json');      
    }

function getDetails(acct_no)
{ 
  //alert(acct_no);

  $.get("/edit-patient",
          {"patient_id":acct_no},
          function(json)
          {

                $('#internal-referral input[name="ref_patient_id"]').val(json.patient_id);
                $('#internal-referral input[name="ref_fullname"]').val(json.fullname);
                $('#internal-referral select[name="ref_accounttype"]').select2();
                $('#internal-referral select[name="ref_referal_doctor"]').select2();
                $('#internal-referral select[name="ref_consultation_type"]').select2();
                $('#internal-referral select[name="ref_visit_type"]').select2();
                $('#internal-referral img[name="imagePreview"]').attr("src", '/images/'+json.image);

                getAge();
                loadRisk();

          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function addlense()
{
if($('#examination_type').val()!= "")
{

    $.get('/add-eye-finding',
        {
          "opd_number": $('#opd_number').val(),
          "patient_id": $('#patient_id').val(),
          "examination_type": $('#examination_type').val(),
          "od_sphere": $('#od_sphere').val(),
          "od_cylinder":  $('#od_cylinder').val(),
          "od_axis":  $('#od_axis').val(),
          "od_h_prism": $('#od_h_prism').val(),
          "od_v_prism":  $('#od_v_prism').val(),
          "od_h_add":  $('#od_h_add').val(),
          "od_v_add": $('#od_v_add').val(),
          "od_h_pd":  $('#od_h_pd').val(),
          "od_v_pd":  $('#od_v_pd').val(),
          "os_sphere": $('#os_sphere').val(),
          "os_cylinder":$('#os_cylinder').val(),
          "os_axis":  $('#os_axis').val(),
          "os_h_prism": $('#os_h_prism').val(),
          "os_v_prism":  $('#os_v_prism').val(),
          "os_h_add":  $('#os_h_add').val(),
          "os_v_add": $('#os_v_add').val(),
          "os_h_pd":  $('#os_h_pd').val(),
          "os_v_pd":  $('#os_v_pd').val(),

          "vl_visual_ascuity":  $('#vl_visual_ascuity').val(),
          "vr_visual_ascuity":  $('#vr_visual_ascuity').val(),

          "od_sphere_auto":  $('#od_sphere_auto').val(),
          "od_cylinder_auto":  $('#od_cylinder_auto').val(),
          "od_axis_auto": $('#od_axis_auto').val(),
          "od_h_prism_auto":  $('#od_h_prism_auto').val(),
          "os_h_prism_auto":  $('#os_h_prism_auto').val(),
           "os_sphere_auto":  $('#os_sphere_auto').val(),
          "os_cylinder_auto":  $('#os_cylinder_auto').val(),
          "os_axis_auto": $('#os_axis_auto').val(),
         
          "lens_type":        $('#lens_type').val(),
          "lens_color":        $('#lens_color').val(),
          "lens_style":        $('#lens_style').val(),
          "lens_power":        $('#lens_power').val(),
          "rim_type":        $('#rim_type').val(),
          "lens_remark":        $('#lens_remark').val(),
          "lens_index":        $('#lens_index').val(),
          "lens_treatment":  $('#lens_treatment').val()

           

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {

          //sweetAlert("Refraction Examination Findings has been added successfully!");
        Swal.fire({
        title: "Good job!",
        text: "Refraction Examination Findings has been added successfully!",
        type: "success",
        confirmButtonClass: 'btn btn-primary',
        buttonsStyling: false,
          });
         
        }
        else
        {
          //sweetAlert("Items failed to be added!");
          Swal.fire({
            title: "Error!",
            text: "Items failed to be added!!",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
          });
        }
      });
                                        
        },'json');
  }
  else
    {
      Swal.fire({
            title: "Error!",
            text: "Please fill required items!",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
          });
    
    }
}

function addOptha()
{
if($('#od_ocular_adnexae').val()!= "")
{

    $.get('/add-ocular-finding',
        {
          "opd_number": $('#opd_number').val(),
          "patient_id": $('#patient_id').val(),
          "od_ocular_adnexae": $('#od_ocular_adnexae').val(),
          "os_ocular_adnexae":  $('#os_ocular_adnexae').val(),
          "od_cornea":  $('#od_cornea').val(),
          "os_cornea": $('#os_cornea').val(),

          "od_ac_lens":  $('#od_ac_lens').val(),
          "os_ac_lens":  $('#os_ac_lens').val(),

          "od_pupil_lens":  $('#od_pupil_lens').val(),
          "os_pupil_lens":  $('#os_pupil_lens').val(),

          "od_ocular_lens":  $('#od_ocular_lens').val(),
          "os_ocular_lens":  $('#os_ocular_lens').val(),

          "od_iop":$('#od_iop').val(),
          "os_iop":  $('#os_iop').val(),

          "os_virteous": $('#os_virteous').val(),
          "od_virteous":  $('#od_virteous').val(),
          "od_c_d_ratio":  $('#od_c_d_ratio').val(),
          "os_c_d_ratio": $('#os_c_d_ratio').val(),
          "od_retina":$('#od_retina').val(),
          "os_retina":  $('#os_retina').val(),

          "os_visual_ascuity":$('#os_visual_ascuity').val(),
          "od_visual_ascuity":  $('#od_visual_ascuity').val(),


          "od_others": $('#od_others').val(),
          "os_others":  $('#os_others').val(),

           "os_conjunctiva_sclera":$('#os_conjunctiva_sclera').val(),
          "od_conjunctiva_sclera":  $('#od_conjunctiva_sclera').val(),





        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          Swal.fire({
        title: "Good job!",
        text: "Ocular Examination Findings has been added successfully!",
        type: "success",
        confirmButtonClass: 'btn btn-primary',
        buttonsStyling: false,
          });
        }
        else
        {
          Swal.fire({
            title: "Error!",
            text: "Please fill required items!",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
          });
        }
      });
                                        
        },'json');
  }
  else
    {
      Swal.fire({
            title: "Error!",
            text: "Please fill required items!",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
          });
    
    }
}




  </script>


<script type="text/javascript">
$(function () {
  $('#ref_visit_date').daterangepicker({
     "minDate": moment('2017-02-01'),
     "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>


<script type="text/javascript">
$(function () {
  $('#visit_date').daterangepicker({
     "minDate": moment('2017-02-01'),
     "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>







    

@endrole

