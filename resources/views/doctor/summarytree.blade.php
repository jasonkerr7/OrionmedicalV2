<div class="tab-pane @if($visit_details->doctor!= Auth::user()->getNameOrUsername()) active @else @endif" id="review-summary">
                    
        <section class="panel panel-info">
                    <header class="panel-heading font-bold">Note Summary</header>
                    <div class="panel-body">
                           <section class="scrollable wrapper">
      <div class="timeline">
        <article class="timeline-item active">
            <div class="timeline-caption">
              <div class="panel bg-primary lter no-borders">
                <div class="panel-body">
                  <span class="timeline-icon"><i class="fa fa-bell-o time-icon bg-primary"></i></span> 
                  <span class="timeline-date"> <label class="badge bg-danger">  <label class="badge bg-danger"> {{ $visit_details->created_on }} -  {{ $visit_details->consultation_type  }} </span>
                  <h5>
                    <span>Chief Complaint</span>
                   @foreach($mycomplaints as $complaint)
                   <a href="#"> <label class="badge bg-danger"> {{$complaint->complaint}} <i onclick="removecomplain('{{$complaint->id}}','{{$complaint->complaint}}')" class="fa fa-trash-o"></i></label></a>
                   @endforeach
                  </h5>
                  <div class="m-t-sm timeline-action">
                   {{--  <span class="h3 pull-left m-r-sm">4:51</span> --}}
                    <a href="/print-visit-summary/{{ $visit_details->opd_number  }}"><button class="btn btn-sm btn-default btn-bg"><i class="fa fa-check"></i> Print this note </button></a>

                    <a href="/print-executive-cover/{{ $visit_details->opd_number  }}"><button class="btn btn-sm btn-default btn-bg"><i class="fa fa-check"></i> Exec Cover Note </button></a>

                     <a href="/doctor-appointments/{{ $visit_details->referal_doctor}}" class="btn btn-default rounded" data-toggle="modal">Appointment Request</a>

                       <a href="/print-referal-note/{{ $visit_details->opd_number }}" class="btn btn-default rounded" data-toggle="modal">Print Referral Letter</a>

                       <a href="/print-excuse-duty/{{ $visit_details->opd_number }}" class="btn btn-default rounded" data-toggle="modal">Print Excuse Duty</a>

                        <a href="/print-refusal-treatment/{{ $visit_details->opd_number }}" class="btn btn-default rounded" data-toggle="modal">Print Refusal of Treatment</a>
                  </div>
                </div>
              </div>
            </div>
        </article>
        <article class="timeline-item">
            <div class="timeline-caption">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow left"></span>
                  <span class="timeline-icon"><i class="fa fa-phone time-icon bg-primary"></i></span>
                  <span class="timeline-date">HPI</span>
                  <h5>
                    <span>HPI</span>
                    @foreach($mycomplaints as $complaint)
                     <a>{!!$complaint->presenting!!} </a>
                   @endforeach

                   <span>On Direct Questions</span>
                    @foreach($mycomplaints as $complaint)
                     <a>{{$complaint->directquestion}} <i class="fa fa-trash-o text-muted"></i> </a>
                   @endforeach
                  </h5>
                </div>       
              </div>
            </div>
        </article>
        <article class="timeline-item alt">
            <div class="timeline-caption">                
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow right"></span>
                  <span class="timeline-icon"><i class="fa fa-male time-icon bg-success"></i></span>
                  <span class="timeline-date">History</span>
                  <h5>
                    <span>History</span>
                    
                    <ul>
                    @if($myhistories->medical_history == '') @else <li>Past Medical History <label class="badge bg-default"> {{$myhistories->medical_history}}  </label></li> @endif
                    @if($myhistories->family_history == '') @else <li>Family History <label class="badge bg-info"> {{$myhistories->family_history}}  </label></li> @endif
                    @if($myhistories->social_history == '') @else <li> Social History <label class="badge bg-primary"> {{$myhistories->social_history}}  </label></li> @endif
                     @if($myhistories->drug_history == '') @else <li> Drug History <label class="badge bg-success">Takes {{$myhistories->drug_history}}  </label></li> @endif
                    @if($myhistories->surgical_history == '') @else <li>Surgical History <label class="badge bg-warning"> {{$myhistories->surgical_history}}  </label></li> @endif
                    @if($myhistories->reproductive_history == '') @else <li> Reproductive History <label class="badge bg-danger"> {{$myhistories->reproductive_history}}  </label></li> @endif
                    @if($myhistories->vaccinations_history == '') @else <li>Vacinnations <label class="badge bg-default"> {{$myhistories->vaccinations_history}}  </label></li> @endif
                    @if($myhistories->allergy == '') @else <li> Allergies <label class="badge bg-danger"> {{$myhistories->allergy}}  </label></li> 
                    @endif
                    </ul>
                   
                  </h5>
                  <p></p>
                </div>
              </div>
            </div>
        </article>          
        <article class="timeline-item">
            <div class="timeline-caption">                
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow left"></span>
                  <span class="timeline-icon"><i class="fa fa-plane time-icon bg-dark"></i></span>
                  <span class="timeline-date">ROS</span>
                  <h5>
                    <span>Review of System</span>
                    @foreach($myros as $ros)
                    <ul>
                    @if($ros->general == '') @else <li> General <label class="badge bg-default"> {{$ros->general}}  </label></li> @endif
                    @if($ros->skin == '') @else <li> Skin <label class="badge bg-info"> {{$ros->skin}}  </label></li> @endif
                    @if($ros->head == '') @else <li> Head <label class="badge bg-primary"> {{$ros->head}}  </label></li> @endif
                     @if($ros->eyes == '') @else <li>Eyes <label class="badge bg-success"> {{$ros->eyes}}  </label></li> @endif
                    @if($ros->ears == '') @else <li> Ears <label class="badge bg-warning"> {{$ros->ears }}  </label></li> @endif
                    @if($ros->nose == '') @else <li> Nose <label class="badge bg-danger"> {{$ros->nose}}  </label></li> @endif
                    @if($ros->throat == '') @else <li> Throat <label class="badge bg-default"> {{$ros->throat}}  </label></li> @endif
                    @if($ros->respiratory == '') @else <li> Respiratory <label class="badge bg-danger"> {{$ros->respiratory}}  </label></li> @endif
                    </ul>
                    @if($ros->cardiovascular == '') @else <li> Cardiovascular <label class="badge bg-default"> {{$ros->cardiovascular}}  </label></li> @endif
                    @if($ros->gastrointestinal == '') @else <li> Gastrointestinal <label class="badge bg-default"> {{$ros->gastrointestinal}}  </label></li> @endif
                    @if($ros->gynecologic == '') @else <li> Gynecologic <label class="badge bg-default"> {{$ros->gynecologic}}  </label></li> @endif
                    @if($ros->genitourinary == '') @else <li> Genitourinary <label class="badge bg-default"> {{$ros->genitourinary}}  </label></li> @endif
                    @if($ros->endocrine == '') @else <li> Endocrine <label class="badge bg-default"> {{$ros->endocrine}}  </label></li> @endif
                    @if($ros->musculoskeletal == '') @else <li> Musculoskeletal <label class="badge bg-default"> {{$ros->musculoskeletal}}  </label></li> @endif
                    @if($ros->peripheral_vascular == '') @else <li> Peripheral Vascular <label class="badge bg-default"> {{$ros->peripheral_vascular}}  </label></li> @endif
                    @if($ros->hematology == '') @else <li> Hematology <label class="badge bg-default"> {{$ros->hematology}}  </label></li> @endif
                    @if($ros->neuro == '') @else <li> Neuropsychiatric  <label class="badge bg-default"> {{$ros->neuro}}  </label></li> @endif
                   @endforeach
                  </h5>
                 
                </div>
              </div>
            </div>
        </article>
        <article class="timeline-item alt">
            <div class="timeline-caption">                
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow right"></span>
                  <span class="timeline-icon"><i class="fa fa-file-text time-icon bg-info"></i></span>
                  <span class="timeline-date">Vitals</span>
                  <h5>
                    <span>Vitals</span>
                   @foreach($myvitals as $vital)
                   <ul>
                    @if($vital->weight == '') @else <li> Weight <label class="badge bg-info"> {{$vital->weight}}  </label></li> @endif
                    @if($vital->height == '') @else <li> Height <label class="badge bg-info"> {{$vital->height}}  </label></li> @endif
                     @if($vital->bmi == '') @else <li> BMI <label class="badge bg-info"> {{$vital->bmi}}  </label></li> @endif
                    @if($vital->temperature == '') @else <li> Temperature <label class="badge bg-info"> {{$vital->temperature}} ° </label></li> @endif
                    @if($vital->pulse_rate == '') @else <li> Pulse Rate <label class="badge bg-info"> {{$vital->pulse_rate}}  </label></li> @endif
                    @if($vital->blood_pressure == '') @else <li> Blood Pressure <label class="badge bg-info"> {{$vital->blood_pressure}}  </label></li> @endif
                     </ul>
                   @endforeach
                  </h5>
                
                </div>
              </div>
            </div>
        </article>
        <article class="timeline-item">
            <div class="timeline-caption">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow left"></span>
                  <span class="timeline-icon"><i class="fa fa-code time-icon bg-dark"></i></span>
                  <span class="timeline-date">Physical Exam</span>
                  <h5>
                    <span>Physical Exam</span>
                     @foreach($mype as $physical)
                    <ul>
                    @if($physical->pe_general == '') @else <li> General <label class="badge bg-default"> {{$physical->pe_general}}  </label></li> @endif
                    @if($physical->pe_HEENT == '') @else <li> HEENT <label class="badge bg-info"> {{$physical->pe_HEENT}}  </label></li> @endif
                    @if($physical->pe_neck == '') @else <li> Neck <label class="badge bg-primary"> {{$physical->pe_neck}}  </label></li> @endif
                     @if($physical->pe_respiratory == '') @else <li> Respiratory <label class="badge bg-success"> {{$physical->pe_respiratory}}  </label></li> @endif
                    @if($physical->pe_heart == '') @else <li> Heart <label class="badge bg-warning"> {{$physical->pe_heart }}  </label></li> @endif
                    @if($physical->pe_abdominal == '') @else <li> Abdominal <label class="badge bg-danger"> {{$physical->pe_abdominal}}  </label></li> @endif
                    @if($physical->pe_extremities == '') @else <li> Extremities <label class="badge bg-default"> {{$physical->pe_extremities}}  </label></li> @endif
                    @if($physical->pe_cns == '') @else <li> CNS <label class="badge bg-default"> {{$physical->pe_cns}}  </label></li> @endif

                    @if($physical->pe_musculoskeletal == '') @else <li> Musculoskeletal <label class="badge bg-default"> {{$physical->pe_musculoskeletal}}  </label></li> @endif

                    @if($physical->pe_psychological == '') @else <li> Psychological <label class="badge bg-default"> {{$physical->pe_psychological}}  </label></li> @endif

                     @if($physical->pe_breast == '') @else <li> Breast <label class="badge bg-default"> {{$physical->pe_breast}}  </label></li> @endif
                    
                   @endforeach
                  </h5>
                 
                </div>
              </div>
            </div>
        </article>
         <article class="timeline-item alt">
            <div class="timeline-caption">                
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow right"></span>
                  <span class="timeline-icon"><i class="fa fa-gavel time-icon bg-success"></i></span>
                  <span class="timeline-date">Assessment</span>
                  <h5>
                    <span>Assessment</span>
                     @foreach($mydiagnosis as $mydiagnosis)
                   <ul>
                     <li><label class="badge bg-success">{{$mydiagnosis->diagnosis}}</label></li>
                     </ul>
                   @endforeach
                  </h5>
                  <p>Diagnosis and differential diagnosis</p>
                </div>
              </div>
            </div>
        </article>
           <article class="timeline-item">
            <div class="timeline-caption">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow left"></span>
                  <span class="timeline-icon"><i class="fa fa-fire time-icon bg-dark"></i></span>
                  <span class="timeline-date">Investigations</span>
                  <h5>
                    <span>Investigations</span>
                   @foreach($mylabs as $lab)
                   <ul>
                     <li><label class="label label-default">{{$lab->investigation}}</label></li>
                     </ul>
                   @endforeach
                  </h5>
                  
                </div>
              </div>
            </div>
        </article>
         <article class="timeline-item alt">
            <div class="timeline-caption">                
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow right"></span>
                  <span class="timeline-icon"><i class="fa fa-flask time-icon bg-danger"></i></span>
                  <span class="timeline-date">Medications</span>
                  <h5>
                    <span>Drugs Prescribed</span>
                   @foreach($mydrugs as $drug)
                   <ul>
                     <li><label class="badge bg-danger">{{$drug->drug_name}}</label></li>
                     </ul>
                   @endforeach
                  </h5>
                  
                </div>
              </div>
            </div>
        </article>
         <article class="timeline-item">
            <div class="timeline-caption">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="arrow left"></span>
                  <span class="timeline-icon"><i class="fa fa-fire time-icon bg-dark"></i></span>
                  <span class="timeline-date">Plan</span>
                  <h5>
                    <span>Plan</span>
                    @foreach($myplan as $plan)
                     <a>{!!$plan->assessment!!} <i class="fa fa-trash-o text-muted"></i> </a>
                   @endforeach
                  </h5>
                  
                </div>
              </div>
            </div>
        </article>
        <div class="timeline-footer"><a href="#"><i class="fa fa-plus time-icon inline-block bg-dark"></i></a></div>
      </div>
    </section>
        </div>

          </section>
      </div>