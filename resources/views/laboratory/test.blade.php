
@extends('layouts.default')
@section('content')
         <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- users edit start -->
              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="haematology-tab" data-toggle="tab" href="#haematology" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block"> Haematology </span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="biochemistry-tab" data-toggle="tab" href="#biochemistry" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block">Biochemistry</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="pathology-tab" data-toggle="tab" href="#pathology" aria-controls="information" role="tab" aria-selected="false">
                                        <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block">Pathology</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link d-flex align-items-center" id="serology-tab" data-toggle="tab" href="#serology" aria-controls="information" role="tab" aria-selected="false">
                                      <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block">Serology</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="microbiology-tab" data-toggle="tab" href="#microbiology" aria-controls="information" role="tab" aria-selected="false">
                                    <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block">Microbiology</span>
                                </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="information" role="tab" aria-selected="false">
                                  <i class="feather icon-upload mr-25"></i><span class="d-none d-sm-block">Uploaded Results</span>
                              </a>
                          </li>
                                  {{-- <p>
                                    <input type="text" class="btn mr-1 mb-1 btn-danger btn-sm" readonly="true" value="{{ Request::old('outstanding') ?: '' }}" id="outstanding" name="outstanding">     
                                  </p> --}}
                                  
                              </ul>
                              @role(['System Admin']) 
                              <a href="#attach_document" class="bootstrap-modal-form-open btn btn-primary mb-2 pull-right" data-toggle="modal"><span><i class="feather icon-upload"> </i> Quick Upload </span></a>
                              @endrole

                              <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                     
                                     
                                      <h2 class="content-header-title float-left mb-0">{{ $patients->fullname }}</h2>
                                        
                                         
                                        <div class="breadcrumb-wrapper col-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->gender }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->date_of_birth->age }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#"> {{ $visitdetails->care_provider }}</a>
                                                </li>
                                                <li class="breadcrumb-item active"><i class="feather icon-phone-call"></i> {{ $patients->mobile_number }}
                                                </li>
                                            </ol>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                             
                           
                            <div class="alert alert-warning mt-1 p-1">
                              <p> @foreach($tests as $val)  <label class="badge @if($val->status=="Ready") badge-pill badge-glow badge-success mr-1 mb-1 @else badge-pill badge-glow badge-danger mr-1 mb-1 @endif"> {{ $val->investigation }} </label> <a href="#" class="bootstrap-modal-form-open" onclick="removeinvestigation('{{  $val->id }}','{{ $val->investigation }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-trash"></i></a>  @endforeach </p>
                              Diagnosis : @foreach($mydiagnosis as $val) <code> {{ $val->diagnosis }} </code>  @endforeach 
                            </div> 
                          


                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="haematology" aria-labelledby="haematology-tab" role="tabpanel">
                                   
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                      <form  method="post" action="/test-save" >
                                                        <table id="parameterTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                          <thead>
                                                            <tr>
                                                              <th>#</th>
                                                              <th>Parameter</th>
                                                              <th>Result</th>
                                                              <th>Normal Range</th>
                                                              <th>Impression</th>
                                                             
                                  
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                  
                                                            @if($myheamatologylabs->count() > 1)
                                                            @foreach( $myheamatologylabs as $key => $haematologyresult )
                                                            <tr>
                                                              <td>{{ ++$key }}</td>
                                                              <td><input name="test_name[]" id="test_name" value="{{ $haematologyresult->test }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              <td><input type="text" id="test_result" name="test_result[]" value="{{ $haematologyresult->result }}" class="form-control form-control-sm"></td>
                                                              <td><input name="test_range[]" id="test_range" value="{{ $haematologyresult->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              <td><input name="test_interpretation[]" id="test_interpretation" value="{{ $haematologyresult->interpretation }}" class="form-control form-control-sm"></td> 
                                                            </tr>
                                                           @endforeach
                                  
                                                            @else
                                                           @foreach( $haematology as $key => $haematology )
                                                            <tr>
                                                                  <td>{{ ++$key }}</td>
                                                                  <td><input name="test_name[]" id="test_name" value="{{ $haematology->type }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                       @if($haematology->input == 'textbox')
                                                                  <td><input type="text" id="test_result" name="test_result[]" value="" class="form-control form-control-sm"></td>
                                                                       @else
                                                             <td> 
                                                                  <select id="test_result" name="test_result[]" value="" rows="3" tabindex="1" data-placeholder="Select here.."  class="form-control m-b">
                                                                   <option value=""></option>
                                                                    @foreach($resultselector as $result)
                                                                    <option value="{{ $result->type }}">{{ $result->type }}</option>
                                                                    @endforeach
                                                                  </select> 
                                                            </td>
                                                               @endif   
                                                                <td><input name="test_range[]" id="test_range" value="{{ $haematology->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                <td><input name="test_interpretation[]" id="test_interpretation" value="-" class="form-control form-control-sm"></td>
                                                                
                                                             </tr>
                                                           @endforeach
                                                           @endif
                                                          </tbody>
                                                        
                                                          <footer>
                                                              <div class="btn-group pull-left">
                                                                  <div class="col-sm-12">
                                                                      
                                                                 <select name="requested_test[]" required="true" id="requested_test" style="width:100%" multiple data-placeholder="select ready labs">
                                                                   @foreach($tests as $requested)
                                                                      <option  value="{{ $requested->investigation }}">{{ $requested->investigation }}</option>
                                                                   @endforeach
                                                                     </select>    
                                                                   </div>
                                                              </div>
                                                            <div class="btn-group pull-right">
                                                              <p>
                                                                    <button type="submit" class="btn mr-1 mb-1 btn-success btn-sm"><i class="fa fa-fw fa-download"></i>Save</button> 
                                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                      <input type="hidden" name="opd_number" id="opd_number" value="{{ $visitdetails->opd_number }}">
                                                                      <input type="hidden" name="template" id="template" value="haematology">
                                                                  
                                                                    <a href="/laboratory-results-master/{{ $visitdetails->opd_number }}" class="btn mr-1 mb-1 btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Print </a>
                                                              </p>
                                                              </div>
                                                          </footer> 
                                                        </table>
                                                       
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="biochemistry" aria-labelledby="biochemistry-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                      <form  method="post" action="/test-save" >
                                                        <table id="parameterTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                          <thead>
                                                            <tr>
                                                              <th>#</th>
                                                              <th>Parameter</th>
                                                              <th>Result</th>
                                                              <th>Normal Range</th>
                                                              <th>Impression</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                  
                                                              @if($mybiochemistrylabs->count() > 1)
                                                              @foreach( $mybiochemistrylabs as $key => $biochemistryresult )
                                                              <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td><input name="test_name[]" id="test_name" value="{{ $biochemistryresult->test }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                               
                                                                <td><input type="text" id="test_result" name="test_result[]" value="{{ $biochemistryresult->result }}" class="form-control form-control-sm"></td>
                                                                
                                                                  <td><input name="test_range[]" id="test_range" value="{{ $biochemistryresult->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                  <td><input name="test_interpretation[]" id="test_interpretation" value="{{ $biochemistryresult->interpretation }}" class="form-control form-control-sm"></td>
                                                                  
                                                              </tr>
                                                             @endforeach
                                    
                                                              @else
                                  
                                                           @foreach( $biochemistry as $key => $biochemistry )
                                                            <tr>
                                                              <td>{{ ++$key }}</td>
                                                              <td><input name="test_name[]" id="test_name" value="{{ $biochemistry->type }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              @if($biochemistry->input == 'textbox')
                                                              <td><input type="text" id="test_result" name="test_result[]" value="" class="form-control form-control-sm"></td>
                                                              @else
                                                             <td> <select id="test_result" name="test_result[]" value="" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                                <option value=""></option>
                                                                @foreach($resultselector as $result)
                                                                  <option value="{{ $result->type }}">{{ $result->type }}</option>
                                                                @endforeach
                                                              </select> </td>
                                                               @endif   
                                                                <td><input name="test_range[]" id="test_range" value="{{ $biochemistry->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                <td><input name="test_interpretation[]" id="test_interpretation" value="-" class="form-control form-control-sm"></td>
                                                                {{-- <td><input name="test_impression[]" id="test_impression" value="" style="width:150px; border: 1px solid #ABADB3; text-align: center;"></td>  --}}
                                                            </tr>
                                                           @endforeach
                                                           @endif
                                                          </tbody>
                                                          <br>
                                                          <footer>
                                                            <div class="btn-group pull-left">
                                                                <div class="col-sm-12">
                                                                    
                                                               <select name="requested_test1[]" required="true" id="requested_test1" style="width:100%" multiple data-placeholder="select ready labs">
                                                                 @foreach($tests as $requested)
                                                                    <option  value="{{ $requested->investigation }}">{{ $requested->investigation }}</option>
                                                                 @endforeach
                                                                   </select>    
                                                                 </div>
                                                            </div>
                                                          <div class="btn-group pull-right">
                                                            <p>
                                                                  <button type="submit" class="btn mr-1 mb-1 btn-success btn-sm"><i class="fa fa-fw fa-download"></i>Save</button> 
                                                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                    <input type="hidden" name="opd_number" id="opd_number" value="{{ $visitdetails->opd_number }}">
                                                                    <input type="hidden" name="template" id="template" value="biochemistry">
                                                                
                                                                  <a href="/laboratory-results-master/{{ $visitdetails->opd_number }}" class="btn mr-1 mb-1 btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Print </a>
                                                            </p>
                                                            </div>
                                                        </footer> 
                                                        </table>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     
                                      <!-- users edit Info form ends -->
                                  </div>
                                  <div class="tab-pane" id="pathology" aria-labelledby="pathology-tab" role="tabpanel">
                                      <!-- users edit socail form start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                      <form  method="post" action="/test-save" >
                                                        <table id="parameterTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                          <thead>
                                                            <tr>
                                                              <th>#</th>
                                                              <th>Parameter</th>
                                                              <th>Result</th>
                                                              <th>Normal Range</th>
                                                              <th>Impression</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            
                                                              @if($mypathologylabs->count() > 1)
                                                              @foreach( $mypathologylabs as $key => $pathologyresult )
                                                              <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td><input name="test_name[]" id="test_name" value="{{ $pathologyresult->test }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                               
                                                                <td><input type="text" id="test_result" name="test_result[]" value="{{ $pathologyresult->result }}" class="form-control form-control-sm"></td>
                                                                
                                                                  <td><input name="test_range[]" id="test_range" value="{{ $pathologyresult->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                  <td><input name="test_interpretation[]" id="test_interpretation" value="{{ $pathologyresult->interpretation }}" class="form-control form-control-sm"></td>
                                                                  
                                                              </tr>
                                                             @endforeach
                                    
                                                              @else
                                                           @foreach($pathology as $key => $pathology)
                                                            <tr>
                                                              <td>{{ ++$key }}</td>
                                                              <td><input name="test_name[]" id="test_name" value="{{ $pathology->type }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              @if($pathology->input == 'textbox')
                                                              <td><input type="text" id="test_result" name="test_result[]" value="" class="form-control form-control-sm"></td>
                                                              @else
                                                             <td> <select id="test_result" name="test_result[]" value="" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                                <option value=""></option>
                                                                @foreach($resultselector as $result)
                                                                  <option value="{{ $result->type }}">{{ $result->type }}</option>
                                                                @endforeach
                                                              </select> </td>
                                                               @endif   
                                                                <td><input name="test_range[]" id="test_range" value="{{ $pathology->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                <td><input name="test_interpretation[]" id="test_impression" value="-" class="form-control form-control-sm"></td>
                                                               
                                                            </tr>
                                                           @endforeach
                                                           @endif
                                  
                                                          </tbody>
                                                          <br>
                                                          <footer>
                                                            <div class="btn-group pull-left">
                                                                <div class="col-sm-12">
                                                                    
                                                               <select name="requested_test2[]" required="true" id="requested_test2" style="width:100%" multiple data-placeholder="select ready labs">
                                                                 @foreach($tests as $requested)
                                                                    <option  value="{{ $requested->investigation }}">{{ $requested->investigation }}</option>
                                                                 @endforeach
                                                                   </select>    
                                                                 </div>
                                                            </div>
                                                          <div class="btn-group pull-right">
                                                            <p>
                                                                  <button type="submit" class="btn mr-1 mb-1 btn-success btn-sm"><i class="fa fa-fw fa-download"></i>Save</button> 
                                                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                    <input type="hidden" name="opd_number" id="opd_number" value="{{ $visitdetails->opd_number }}">
                                                                    <input type="hidden" name="template" id="template" value="pathology">
                                                                
                                                                  <a href="/laboratory-results-master/{{ $visitdetails->opd_number }}" class="btn mr-1 mb-1 btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Print </a>
                                                            </p>
                                                            </div>
                                                        </footer> 
                                                        </table>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <!-- users edit socail form ends -->
                                  </div>

                                  <div class="tab-pane" id="serology" aria-labelledby="serology-tab" role="tabpanel">
                                    <!-- users edit socail form start -->
                                    <div class="row" id="table-hover-animation">
                                      <div class="col-12">
                                          <div class="card">
                                           
                                              <div class="card-content">
                                                  <div class="card-body">
                                                     
                                                    <form  method="post" action="/test-save" >
                                                      <table id="parameterTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>Parameter</th>
                                                            <th>Result</th>
                                                            <th>Normal Range</th>
                                                            <th>Impression</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                
                                                            @if($myserologylabs->count() > 1)
                                                            @foreach( $myserologylabs as $key => $serologyresult )
                                                            <tr>
                                                              <td>{{ ++$key }}</td>
                                                              <td><input name="test_name[]" id="test_name" value="{{ $serologyresult->test }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                             
                                                              <td><input type="text" id="test_result" name="test_result[]" value="{{ $serologyresult->result }}" class="form-control form-control-sm"></td>
                                                              
                                                                <td><input name="test_range[]" id="test_range" value="{{ $serologyresult->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                                <td><input name="test_interpretation[]" id="test_interpretation" value="{{ $serologyresult->interpretation }}" class="form-control form-control-sm"></td>
                                                                
                                                            </tr>
                                                           @endforeach
                                  
                                                            @else
                                                         @foreach($serology as $key => $serology)
                                                          <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input name="test_name[]" id="test_name" value="{{ $serology->type }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                            @if($serology->input == 'textbox')
                                                            <td><input type="text" id="test_result" name="test_result[]" value="" class="form-control form-control-sm"></td>
                                                            @else
                                                           <td> <select id="test_result" name="test_result[]" value="" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                              <option value=""></option>
                                                              @foreach($resultselector as $result)
                                                                <option value="{{ $result->type }}">{{ $result->type }}</option>
                                                              @endforeach
                                                            </select> </td>
                                                             @endif   
                                                              <td><input name="test_range[]" id="test_range" value="{{ $serology->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              <td><input name="test_interpretation[]" id="test_impression" value="-" class="form-control form-control-sm"></td>
                                                            
                                                          </tr>
                                                         @endforeach
                                                         @endif
                                                        </tbody>
                                                        <br>
                                                        <footer>
                                                          <div class="btn-group pull-left">
                                                              <div class="col-sm-12">
                                                                  
                                                             <select name="requested_test3[]" required="true" id="requested_test3" style="width:100%" multiple data-placeholder="select ready labs">
                                                               @foreach($tests as $requested)
                                                                  <option  value="{{ $requested->investigation }}">{{ $requested->investigation }}</option>
                                                               @endforeach
                                                                 </select>    
                                                               </div>
                                                          </div>
                                                        <div class="btn-group pull-right">
                                                          <p>
                                                                <button type="submit" class="btn mr-1 mb-1 btn-success btn-sm"><i class="fa fa-fw fa-download"></i>Save</button> 
                                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                  <input type="hidden" name="opd_number" id="opd_number" value="{{ $visitdetails->opd_number }}">
                                                                  <input type="hidden" name="template" id="template" value="serology">
                                                              
                                                                <a href="/laboratory-results-master/{{ $visitdetails->opd_number }}" class="btn mr-1 mb-1 btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Print </a>
                                                          </p>
                                                          </div>
                                                      </footer> 
                                                      </table>
                                                      </form>
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <!-- users edit socail form ends -->
                                </div>

                                <div class="tab-pane" id="microbiology" aria-labelledby="microbiology-tab" role="tabpanel">
                                  <!-- users edit socail form start -->
                                  <div class="row" id="table-hover-animation">
                                    <div class="col-12">
                                        <div class="card">
                                         
                                            <div class="card-content">
                                                <div class="card-body">
                                                   
                                                  <form  method="post" action="/test-save" >
                                                    <table id="parameterTable" class="table table-hover-animation table-striped mb-0 font-small-3">
                                                      <thead>
                                                        <tr>
                                                          <th>#</th>
                                                          <th>Parameter</th>
                                                          <th>Result</th>
                                                          <th>Normal Range</th>
                                                          <th>Impression</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                      
                                                          @if($mymicrobiologylabs->count() > 1)
                                                          @foreach( $mymicrobiologylabs as $key => $microbiologyresult )
                                                          <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input name="test_name[]" id="test_name" value="{{ $microbiologyresult->test }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                           
                                                            <td><input type="text" id="test_result" name="test_result[]" value="{{ $microbiologyresult->result }}" class="form-control form-control-sm"></td>
                                                            
                                                              <td><input name="test_range[]" id="test_range" value="{{ $microbiologyresult->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                              <td><input name="test_interpretation[]" id="test_interpretation" value="{{ $microbiologyresult->interpretation }}" class="form-control form-control-sm"></td>
                                                              
                                                          </tr>
                                                         @endforeach
                                      
                                                          @else
                                                       @foreach($microbiology as $key => $microbiology)
                                                        <tr>
                                                          <td>{{ ++$key }}</td>
                                                          <td><input name="test_name[]" id="test_name" value="{{ $microbiology->type }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                          @if($microbiology->input == 'textbox')
                                                          <td><input type="text" id="test_result" name="test_result[]" value="" class="form-control form-control-sm"></td>
                                                          @else
                                                         <td> <select id="test_result" name="test_result[]" value="" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                                                            <option value=""></option>
                                                            @foreach($resultselector as $result)
                                                              <option value="{{ $result->type }}">{{ $result->type }}</option>
                                                            @endforeach
                                                          </select> </td>
                                                           @endif   
                                                            <td><input name="test_range[]" id="test_range" value="{{ $microbiology->range }}" class="btn btn-rounded btn-sm btn-default"></td>
                                                            <td><input name="test_interpretation[]" id="test_impression" value="-" class="form-control form-control-sm"></td>
                                                          
                                                        </tr>
                                                       @endforeach
                                                       @endif
                                                      </tbody>
                                                      <br>
                                                      <footer>
                                                        <div class="btn-group pull-left">
                                                            <div class="col-sm-12">
                                                                
                                                           <select name="requested_test4[]" required="true" id="requested_test4" style="width:100%" multiple data-placeholder="select ready labs">
                                                             @foreach($tests as $requested)
                                                                <option  value="{{ $requested->investigation }}">{{ $requested->investigation }}</option>
                                                             @endforeach
                                                               </select>    
                                                             </div>
                                                        </div>
                                                      <div class="btn-group pull-right">
                                                        <p>
                                                              <button type="submit" class="btn mr-1 mb-1 btn-success btn-sm"><i class="fa fa-fw fa-download"></i>Save</button> 
                                                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                <input type="hidden" name="opd_number" id="opd_number" value="{{ $visitdetails->opd_number }}">
                                                                <input type="hidden" name="template" id="template" value="microbiology">
                                                            
                                                              <a href="/laboratory-results-master/{{ $visitdetails->opd_number }}" class="btn mr-1 mb-1 btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Print </a>
                                                        </p>
                                                        </div>
                                                    </footer> 
                                                    </table>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- users edit socail form ends -->
                              </div>

                              <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                <!-- users edit socail form start -->
                                <div class="card-body">
                                  <div class="row">
                                    @foreach($images as $keys => $image)
   

                                    <div class="col-md-4 col-6 user-latest-img">
                   
                                     @if($image->mime == 'docx')
                                    <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                               <img  class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/ms_word.png' !!}">
                                               </a>  {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a>
                                     @elseif($image->mime == 'pdf')
                                      <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                               <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/pdf.png' !!}" >
                                               </a>{{ $image->filename }} <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a> <span class="label label-default btn-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $image->created_on}}">{{ $image->created_on->diffForHumans() }}</span>
                                       @else 
                                      <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                               <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/uploads/images/'.$image->filepath !!}">
                                               </a> {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a>
                                     @endif        
                                       </div>
                                     @endforeach
                                      
                                          
                                      </div>
                                     
                                  </div>
                                <!-- users edit socail form ends -->
                            </div>


                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- users edit ends -->

          </div>
      </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>


  <div class="modal fade text-left" id="attach_document" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/uploadfiles" class="panel-body wrapper-lg">
                <input type="text" class="form-control" width="1000px" height="40px" name="filename" id="filename" placeholder="Enter file name" /><br>
            <input type="file" class="form-control dropbox" width="500px" height="40px" name="image" /><br>
            <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" />
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="selectedid" id="selectedid" value="{{ $visitdetails->patient_id }}">
            <input type="hidden" name="labid" id="labid" value="{{ $tests[0]->id }}">
            <input type="hidden" name="file_source" id="file_source" value="Laboratory">
            
                <input type="hidden" name="_token" value="{{ Session::token() }}">
              </form>
            </div>
            
          
        </div>
    </div>
  </div>



  @stop

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
     $('#requested_test').select2();  
     $('#requested_test1').select2();  
     $('#requested_test2').select2(); 
     $('#requested_test3').select2();   
     $('#requested_test4').select2();   
     //$('#test_name').select2();
    
     loadTestResults();
     totalPayable();

  });
</script>


  <script type="text/javascript">
  function deleteresult(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the result list?",   
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
          $.get('/delete-lab-result',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from result list.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from result list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from prescription.", "error");   
        } });

    
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
            
          $('#outstanding').val('OUT. - GHS '+ data.outstanding);
          $('#payable').val('BILL - GHS '+ thousands_separators(data.payables));
          $('#receivable').val('PAID - GHS '+ thousands_separators(data.receivables));

           });
                                        
        },'json'); 
}


   function removeinvestigation(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the result list?",   
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
             swal("Deleted!", name +" was removed from result list.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');
            } 
        else {     
          swal("Cancelled", name +" failed to be removed from prescription.", "error");   
        } });       
    
   }
   

  
   function loadTestResults()
   {
  
        $.get('/load-test-results',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#testResult tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#testResult tbody').append('<tr><td>'+ value['test'] +'</td><td>'+ value['result'] +'</td><td>'+ value['range'] +'</td><td><a a href="#"><i onclick="deleteresult(\''+value['id']+'\',\''+value['test']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');     


   }



    function saveresult()
    {

        alert($('#test_name').val());
          $.get('/save-test-results',
          {
            "labid": $('#opd_number').val(),
             "test_name": $('#test_name').val() ,
             "test_result": $('#test_result').val(),
             "comment": $('#comment').val()
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
             alert("success");
            }
            else
            { 
              alert("fail");
            }
           
        });
                                          
          },'json');    
           
    }





  </script>

      <script type="text/javascript">

 function deleteImage(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the file list?",   
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
          $.get('/delete-image-request',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from file list.", "success"); 
               location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }



      </script>


      
     



