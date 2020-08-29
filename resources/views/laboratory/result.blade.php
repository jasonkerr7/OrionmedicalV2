@extends('layouts.default')
@section('content')
          <section class="vbox bg-white">
            <header class="header b-b b-light hidden-print">
              <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
             <div class="h3 m-t-xs m-b-xs btn btn-rounded btn-sm btn-info">Lab Result Slip</div>
            </header>
            <section class="scrollable wrapper">
                <div class="row">
                    <div class="col-xs-6">
             <img src="/images/{{ $mycompany->logo }}" width="15%">
              <h4>{{$mycompany->legal_name }}</h4>
                  <p><a href="#">{{ $mycompany->email }}</a></p>
                   <p><a href="#">{{ $mycompany->address }}</a></p>
                   <p><a href="#">{{ $mycompany->phone }}</a></p>
                   <p><a href="#">{{ $mycompany->website }}</a></p>
                    </div>

                    <div class="col-xs-6 text-right">

                        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($labrequest->patientid.$labrequest->visitid, 'QRCODE')}}" alt="barcode" /> 
                    </div>
                  </div>
                    <div class="line"></div>

                
              <div class="row">
                <div class="col-xs-6">
                 
                 
                <p><strong> Lab Reference :</strong> {{ $labrequest->patientid }}</p>
                <p><strong>Patient Name:    </strong> {{ $labrequest->patient_name }}</p>
                <p><strong>Gender / Age:</strong> {{ $patients->gender }} / {{ $patients->date_of_birth->age }}</p>
                 <p><strong>Consulting Doctor:</strong> {{ $labrequest->created_by }} </p>
                </div>
                




                
               <div class="col-xs-6 text-right">
               
             
                   
                    <p><strong> Sample Date : </strong> {{ $labrequest->created_on }}</p>
                    <p><strong> Sample No : </strong> {{ $labrequest->visitid  }}</p>
                    <p> <strong>Result Date :</strong> {{ $labrequest->created_on }}</p>
                    <p><strong> Printed By : </strong> {{ Auth::user()->getNameOrUsername() }}</p>
                    <p><strong> Printed On : </strong> {{ Carbon\Carbon::now() }}</p>


                   
                </div>
              </div>     
              {{-- <p align="center">DEPARTMENT OF {{ strtoupper($labresults[0]->category) }}</p>
              <div class="line"></div>
               <br>
               <p class="h5 text-dark"><strong>Investigation :  <label class="badge bg-success"> {{  $labresults[0]->type }} </label> </strong></p>
               <br> --}}

              <div class="line"></div>
              <section class="panel panel-info">
                  {{-- <p class="h4 text-dark"><strong><br> <br> @foreach($mylabs as $val)  <label class="badge @if($val->status=="Ready") bg-success @else bg-danger @endif"> {{ $val->investigation }} </label> <a href="/laboratory-results-master/{{ $val->result_id }}" target="_blank"><i class="fa fa-folder"></i></a>  @endforeach </strong></p> --}}
                      <header class="panel-heading font-bold">Investigation Results </header>
                      <div class="panel-body">
                            <div class="table-responsive">
             <table id="investigationsResultsTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                <thead>
                  <tr>
                    {{--
                    <th>Parameters</th>
                    <th>Result</th>
                    <th>Reference</th>
                    <th>Interpretation</th>
                      <th>Remarks</th>
                     <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th> --}}
                  </tr>
                </thead>
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
                              <span class="label bg-danger">{{ $parameter->interpretation }}</span>
                              @elseif($parameter->interpretation=='L' || $parameter->interpretation=='-L')
                              <span class="label bg-dark">{{ $parameter->interpretation }}</span>
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
          </section>
              <div class="line"></div> 
               <p align="center">*** END OF REPORT ***</p>
          

            <div class="line"></div>
            Remarks
            <footer>
              <p>Key: L - Abnormal Low, H - Abnormal High.
All reports need Clinical correlation.  Please discuss if needed.  Test results relate only to the item tested.  No part of the report can be reproduce without permission of the Laboratory.
</p>
            </footer>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop