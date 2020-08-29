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
                          <h2 class="content-header-title float-left mb-0">{{ $patients->fullname }}</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">{{ $patients->gender }}</a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#">{{ $patients->date_of_birth->age }}</a>
                                  </li>
                                  <li class="breadcrumb-item active"> {{ $patients->civil_status }}
                                  </li>
                                  <li class="breadcrumb-item active"><i class="feather icon-phone"></i> {{ $patients->mobile_number }}
                                  </li>

                                  <li class="breadcrumb-item active"> Utilization : {{ number_format($statements->SUM('total_cost'), 2, '.', ',') }}
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
              <!-- account setting page start -->
              <section id="page-account-settings">
                  <div class="row">
                      <!-- left menu section -->
                      <div class="col-md-3 mb-2 mb-md-0">
                          <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-checkin" data-toggle="pill" href="#account-vertical-checkin" aria-expanded="false">
                                    <i class="feather icon-play-circle mr-50 font-medium-3"></i>
                                    New Visit
                                </a>
                            </li>

                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                      <i class="feather icon-globe mr-50 font-medium-3"></i>
                                      General
                                  </a>
                              </li>
                              
                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                      <i class="feather icon-skip-back mr-50 font-medium-3"></i>
                                      Previous Visits
                                  </a>
                              </li>
                             

                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                      <i class="feather icon-info mr-50 font-medium-3"></i>
                                      Bills
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                      <i class="feather icon-camera mr-50 font-medium-3"></i>
                                      Appointments
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                      <i class="feather icon-feather mr-50 font-medium-3"></i>
                                      Connections
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                      <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                      Notifications
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
                                          <div role="tabpanel" class="tab-pane fade" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                              <div class="media">
                                                  <a href="javascript: void(0);">
                                                      <img src="../images/{{ $patients->image }}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                  </a>
                                                  <div class="media-body mt-75">
                                                      <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                          <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                          <input type="file" id="account-upload" hidden>
                                                          <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                      </div>
                                                      <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                              size of
                                                              800kB</small></p>
                                                  </div>
                                              </div>
                                              <hr>
                                              <form novalidate>
                                                  <div class="row">
                                                      <div class="col-12">
                                                          <div class="form-group">
                                                              <div class="controls">
                                                                  <label for="account-username">Username</label>
                                                                  <input type="text" class="form-control" id="account-username" placeholder="Username" value="{{ $patients->patient_id }}" required data-validation-required-message="This username field is required">
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="form-group">
                                                              <div class="controls">
                                                                  <label for="account-name">Name</label>
                                                                  <input type="text" class="form-control" id="account-name" placeholder="Name" value="{{ $patients->fullname }}" required data-validation-required-message="This name field is required">
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="form-group">
                                                              <div class="controls">
                                                                  <label for="account-e-mail">E-mail</label>
                                                                  <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="{{ $patients->email }}" required data-validation-required-message="This email field is required">
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                              </button>
                                                              <p class="mb-0">
                                                                  Your email is not confirmed. Please check your inbox.
                                                              </p>
                                                              <a href="javascript: void(0);">Resend confirmation</a>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="form-group">
                                                              <label for="account-company">Company</label>
                                                          <input type="text" class="form-control" id="account-company" value="{{ $patients->company }}" placeholder="Company name">
                                                          </div>
                                                      </div>
                                                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                          <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                              changes</button>
                                                          <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>

                        
                      








                                          <div class="tab-pane active " id="account-vertical-checkin" role="tabpanel" aria-labelledby="account-pill-checkin" aria-expanded="false">
                                                                            <!-- // Basic multiple Column Form section start -->
                                                <section id="multiple-column-form">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Create New Visit</h4>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <form class="form" method="post" action="/create-opd">
                                                                            <div class="form-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="accounttype" name="accounttype" data-required="true" rows="3" tabindex="1" data-placeholder="Billing Account.." style="width:100%">
                                                                                                <option value=""></option>
                                                                                               @foreach($accounttype as $accounttype)
                                                                                             <option value="{{ $accounttype->type }}">{{ $accounttype->type }}</option>
                                                                                               @endforeach 
                                                                                             </select>     
                                                                                            <label for="first-name-column">Billing Type</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="authorization_code" name="authorization_code" onchange="stickerexiststatus()" rows="3" tabindex="1" data-placeholder="Authorization Code" style="width:100%">
                                                                                                <option value="">-- select from here --</option>
                                                                                               @foreach($stickers as $sticker)
                                                                                             <option value="{{ $sticker->card_number }}"> {{ $sticker->card_number }}</option>
                                                                                               @endforeach
                                                                                             </select> 
                                                                                            <label for="last-name-column">Authorization Code</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="visit_type" name="visit_type" data-required="true" rows="3" tabindex="1" data-placeholder="Visit Type.." style="width:100%">
                                                                                                <option value=""> -- Select Visit Type -- </option>
                                                                                                     @foreach($visittypes as $visittypes)
                                                                                                 <option value="{{ $visittypes->type }}">{{ $visittypes->type }}</option>
                                                                                                     @endforeach  
                                                                                                 </select>  
                                                                                            <label for="city-column">Visit Type</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="consultation_type" name="consultation_type" data-required="true" rows="3" tabindex="1" data-placeholder="Consulation Type.." style="width:100%">
                                                                                                <option value=""> -- Select Consulation Type -- </option>
                                                                                                @foreach($servicetype as $servicetype)
                                                                                            <option value="{{ $servicetype->type }}">{{ $servicetype->type }} </option>
                                                                                                @endforeach 
                                                                                            </select>
                                                                                            <label for="country-floating">Consulationn Type</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="location" name="location" data-required="true" rows="3" tabindex="1" data-placeholder="Branch" style="width:100%">
                                                                                                @foreach($branches as $branch)
                                                                                              <option value="{{ $branch->location }}">{{ $branch->location }}</option>
                                                                                                @endforeach  
                                                                                              </select>
                                                                                            <label for="company-column">Location</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="referal_doctor" name="referal_doctor" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%" >
                                                                                                <option value="Non Assigned">Non Assigned</option>
                                                                                                @foreach($doctors as $doctor)
                                                                                              <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                                                                                @endforeach 
                                                                                              </select> 
                                                                                            <label for="email-id-column">Doctor</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <div class="form-label-group">
                                                                                            <select id="sensitivity" name="sensitivity" data-required="true" rows="3" tabindex="1" data-placeholder="Visit Priority" style="width:100%">
                                                                                                <option value=""></option>
                                                                                                <option value="Normal">Normal</option>
                                                                                                <option value="High">High</option>
                                                                                                <option value="High">Low</option>
                                                                                                  
                                                                                                </select> 
                                                                                            <label for="email-id-column">Doctor</label>
                                                                                        </div>
                                                                                    </div>
                                                                                  
                                                                                    <div class="col-12">
                                                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                                                        <input type="hidden" id="fullname" name="fullname" value="{{ $patients->fullname }}">
                                                                                        <input type="hidden" id="patient_id" name="patient_id" value="{{ $patients->patient_id }}">
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

                                         </div>

                                        


                                          <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                             <!-- DataTable starts -->
                                                      <div class="table-responsive">
                                                        <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>APPOINTMENNT TYPE</th>
                                                                    <th>DOCTOR</th>
                                                                    <th>VISIT #</th>
                                                                    <th>PROVIDER</th>
                                                                    <th>DATE</th>
                                                                    <th>ACTION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              @foreach($consultations as $keys => $consult)
                                                                <tr>
                                                                <td>{{ ++$keys }}</td>
                                                                    <td class="product-name">{{ $consult->consultation_type }}</td>
                                                                    <td class="product-category">{{ $consult->referal_doctor }}</td>
                                                                    <td class="product-category">{{ $consult->opd_number }}</td>
                                                                    <td class="product-category">{{ $consult->care_provider }}</td>
                                                                    <td class="product-price">{{ $consult->created_on }}</td>
                                                                    <td class="product-action">
                                                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                              
                                                                  
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- DataTable ends -->
                                          </div>
                                          <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                             <!-- DataTable starts -->
                                             <div class="table-responsive">
                                              <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                                  <thead>
                                                      <tr>
                                                          <th></th>
                                                          <th>VISITS</th>
                                                          <th>ITEMS</th>
                                                          <th>DATE</th>
                                                          <th>BILL</th>
                                                      <th>PAID</th>
                                                          <th>OUTSTANDINNG</th>
                                                          <th>ACTION</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($statements as $keys => $bill )
                                                      <tr>
                                                         <td>{{ ++$keys }}</td>
                                                         <td class="product-name">{{ $bill->visit_id }}</td>
                                                          <td class="product-name">{{ $bill->item_name }}</td>
                                                          <td class="product-category">{{ $bill->date }}</td>
                                                          <td class="product-category">{{ number_format($bill->total_cost , 1, '.', ',') }}</td>
                                                          <td class="product-category">{{ number_format($bill->payments->sum('AmountReceived'), 1, '.', ',') }}</td>
                                                          <td class="product-price">{{ number_format($bill->total_cost - $bill->payments->sum('AmountReceived') ,1, '.', ',') }}</td>
                                                          <td class="product-action">
                                                              <span class="action-edit"><i class="feather icon-edit"></i></span>
                                                              <span class="action-delete"><i class="feather icon-trash"></i></span>
                                                          </td>
                                                      </tr>
                                                      @endforeach
                                                    
                                                        
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- DataTable ends -->
                                          </div>
                                          <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                               <!-- DataTable starts -->
                                             <div class="table-responsive">
                                              <table class="table table-hover-animation table-striped mb-0 font-small-2">
                                                  <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Time In</th>
                                                        <th scope="col">Patient</th>
                                                        <th scope="col">Mobile Number</th>
                                                        <th scope="col">Appointment</th>
                                                        <th scope="col">Doctor to see</th>
                                                        <th scope="col">From</th>
                                                        <th scope="col">To</th>
                                                        <th scope="col">Action</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($events as $keys => $event)

         
                                                    <tr>
                                                         <th scope="row">{{ ++$keys }}</th>
                                                         <td><a href="#">{{ $event->start_time->diffForHumans() }}</a></td>
                                                         <td><a href="#">{{ ucwords(strtolower($event->name)) }}</a></td>
                                                         <td><a href="#">{{ $event->mobile_number }}</a></td>
                                                         <td><a href="#">{{ ucwords(strtolower($event->title)) }}</a></td>
                                                         <td><a href="/doctor-appointments/{{ $event->doctor }}">{{ ucwords(strtolower($event->doctor)) }}</a></td>
                                                         <td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
                                                         <td>{{ date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
                                                         <td>
                                                            <div class="input-group-btn">
                                                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">{{ $event->status }} <span class="caret"></span>
                                                              </button>
                                                             
                                                              </div>
                                                         </td>
                                                         <td><a href="http://web.whatsapp.com//send?text=Hello {{ ucwords(strtolower($event->name)) }} you have an appointment booked with {{ ucwords(strtolower($event->doctor)) }} at {{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}. Please text YES to confirm.&phone=233{{$event->mobile_number}}" target="_new" class="btn btn-s-md btn-danger btn-rounded"  data-toggle="modal" alt="edit">Send Message</a> </td>
                                                         <td><a href="#" class="bootstrap-modal-form-open" onclick="deleteappointment('{{ $event->id }}','{{ $event->title }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                         </td>
                                                         </tr>
                                                        @endforeach
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- DataTable ends -->
                                          </div>
                                          <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                              <div class="row">
                                                  
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                              <div class="row">
                                                 
                                              </div>
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


  @stop

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function () {
    
    $('#referal_doctor').select2();   
    $('#sensitivity').select2();    
    $('#issues').select2();     
    $('#consultation_type').select2();
    $('#location').select2();
    $('#visit_type').select2();
    $('#accounttype').select2();
    $('#authorization_code').select2({
          tags: true
          });
    
    loadVitals();
    
    
      });
    </script>



