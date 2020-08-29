@extends('layouts.default')
@section('content')

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
                  <h6> <strong>{{$mycompany->legal_name }} -   {{ $admission->consultation_type }}   </strong> </h6>
              
                 <p>  <strong> Patient Name : </strong> {{ $patients->fullname }}</p>
                  <p>  <strong> Care Provider : </strong> {{ $admission->care_provider }}</p>
                 <p>  <strong> Age : </strong> {{ $patients->date_of_birth->age }} year(s)</p>
                  <p>  <strong> Gender : </strong> {{ $patients->gender }}</p>
                  <p>  <strong> Contact No.: </strong> {{ $patients->mobile_number }}</p>
                   <p>  <strong> Examination Time/Date : </strong> {{ date("g:ia\, jS M Y", strtotime($admission->created_on )) }}</p>
                 
                </div>
                <div class="col-xs-4 text-right">
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$admission->opd_number', 'QRCODE')}}" alt="barcode" />     
                  <p>  <strong> Insurance # : </strong> {{ $patients->insurance_id }}</p>
                  <p>  <strong> Examination # : </strong> {{ $admission->opd_number }}</p>
                  <p>  <strong> Patient # : </strong> {{ $patients->patient_id }}</p>
                  <p>  <strong> Date : </strong> {{ date("jS M Y", strtotime(date('Y-m-d')))  }}</p>  
                     
                </div>
              </div>    

               <div class="line"></div>
               <p style="font-size:12px"> <strong> To whom it May Concern: </strong><br>
                I had the privilege to see {{ $patients->fullname }} at the clinic today. @if($patients->gender=='Male') He @else She @endif is a  {{ $patients->date_of_birth->age }}-year-old {{ $patients->gender }} with no significant past medical history who presents to {{$mycompany->legal_name }} for <strong> {{ $admission->consultation_type }}  </strong>.
               </p>

 
               <div class="line"></div>
                    
               <div class="row">
                  <div class="col-xs-12">
                  <p style="font-size:12px">
                     <span><strong>HPI</strong></span>
                             <br> {!! strtoupper($mycomplaints[0]->presenting) !!}  
                  </p>
                  </div>
                  </div>

                  <br>
                  <br>


                  <div class="row">
                  <div class="media-body">
                  <p>
                    <span><strong>History</strong></span>
                               <ol>
                                @foreach($myhistories as $history)
                               
                                @if($history->medical_history == '') @else <li> <small class="block m-t-xs">Past Medical History : <b> {{ strtoupper($history->medical_history)}} </b> </small> </li> @endif
                                
                                @if($history->family_history == '') @else <li> <small class="block m-t-xs"> Family History : <b>{{strtoupper($history->family_history)}} </b> </small> </li> @endif
                              
                              
                                 @if($history->drug_history == '') @else<li> <small class="block m-t-xs"> Drug History :  <b> Takes {{strtoupper($history->drug_history)}}  </b> </small> </li> @endif
                                
                                @if($history->surgical_history == '') @else <li> <small class="block m-t-xs"> Surgical History : <b>{{strtoupper($history->surgical_history)}}</b> </small> </li> @endif
                               
                                @if($history->allergy == '') @else <li> <small class="block m-t-xs"> Allergies : <b>{{strtoupper($history->allergy)}} </b> </small> </li> @endif

                                 @if($history->vaccinations_history == '') @else <li> <small class="block m-t-xs"> Vacinnations : <b>{{strtoupper($history->vaccinations_history)}} </b> </small> </li> @endif
                              
                               @endforeach
                               </ol>
                               
                           </p>
                           </div>
                           </div>

                           <br>
                           <br>
                 
            <div class="row">
                    <div class="col-xs-12">
                  <p style="font-size:12px">
                    <span><strong style="font-size:12px">Vitals</strong></span>
                              <table>
                               @foreach($myvitals as $vital)
                               <tr>
                               <td>
                                @if($vital->weight == '') @else <li style="font-size:12px"> Weight <label class="badge bg-info"> {{strtoupper($vital->weight)}}  </label></li> @endif
                                </td>
                                <td>
                                @if($vital->height == '') @else <li style="font-size:12px"> Height <label class="badge bg-info"> {{strtoupper($vital->height)}}  </label></li> @endif
                                </td>
                                <td>
                                 @if($vital->bmi == '') @else <li style="font-size:12px"> BMI <label class="badge bg-info"> {{strtoupper($vital->bmi)}}  </label></li> @endif
                                 </td>
                                 <td>
                                @if($vital->temperature == '') @else <li style="font-size:12px"> Temperature <label class="badge bg-info"> {{strtoupper($vital->temperature)}} ° </label></li> @endif
                                </td>
                                <td>
                                @if($vital->pulse_rate == '') @else <li style="font-size:12px"> Pulse Rate <label class="badge bg-info"> {{strtoupper($vital->pulse_rate)}}  </label></li> @endif
                                </td>
                                <td>
                                @if($vital->sbp == '') @else <li style="font-size:12px"> Blood Pressure <label class="badge bg-info"> {{strtoupper($vital->sbp)}} / {{$vital->dbp}}  </label></li> @endif
                                </td>
                                 </tr>
                               @endforeach
                               </table>
                  </p>
                  </div>
                  </div>

                  <br>
                  <br>

                  <div class="row">
                  <div class="col-xs-12">
                  <p style="font-size:12px">
                     <span><strong>General Examination</strong></span>
                             <br> {!! strtoupper($myoralassessment[0]->assessment) !!}  
                  </p>
                  </div>
                  </div>

                  <br>
                  <br>

              
              <div class="row">
              <div class="col-xs-12">
                  <p style="font-size:12px">
                      <span><strong>Investigations</strong></span>
                       
{{--                       

                               @foreach($mylabs as $lab)
                                
                               <div class="col-lg-4 col-sm-6 thumb-lg">
                              
                                 <a><p style="font-size:9px"> {{$lab->investigation}}...<label class="badge bg-default col-lg-4 col-sm-6 thumb-lg"> {{$lab->remark}}  </label></p></a>
                                 
                            
                               </div>
                               @endforeach --}}
                            <div>
                            <ul class="checkbox-grid">
                             @foreach($mylabs as $key => $lab)
                              <li><span style="font-size:14px">{{ ++$key }}. {{$lab->investigation}}</span> - <b style="font-size:11px">{{ strtoupper($lab->remark)}} </b></li>
                            
                               @endforeach
                          </ul>
                          </div>

                        
                  </p>
                  </div>
                  </div>

                  <br>
                  <br>


            
                  
                  <p style="font-size:14px">
                    <span><strong>Diagnosis</strong></span>
                     <p> @foreach($mydiagnosis as $diagnosis) <label > {{ strtoupper($diagnosis->diagnosis) }}, </label> @endforeach </p> 
                  </p> 
                  <br>
                  <br>
                 
                 

                  <div class="row">
                  <div class="col-xs-12">
                  <p style="font-size:14px">
                    <span><strong>Conclusion</strong></span>
                   
                    <p> @foreach($myprocedures as $myplan) <label > {!! strtoupper($myplan->content) !!}, </label> @endforeach.....................................................................................................................................................................................................................................................................................................................................................<br>........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................ </p>      
                  </p> 
                  </div>
                  </div>
                  <br>
                  <br>
                    <br>
                    <br>

                 
                  <br>
                  <br>
                  <br>
                  <p class="pull-right"> ............................................................................. <br> Medical Practitioner's Name : {{ $admission->referal_doctor  }} </p>
                  
                  </section>
                  
                  </section>

             
@stop



