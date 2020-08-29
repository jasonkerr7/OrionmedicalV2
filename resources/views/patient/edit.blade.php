 <!-- // Basic multiple Column Form section start -->

 <section id="multiple-column-form">
  <div class="row match-height">
      <div class="col-12">
          <div class="card">
             
              <div class="card-content">
                  <div class="card-body">
                      <form class="form">
                          <div class="form-body">
                              <div class="row">
                                <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <input type="text" id="patient_id" readonly="true" class="form-control" placeholder="Patient #" name="patient_id">
                                      <label for="first-name-column">Patient #</label>
                                  </div>
                              </div>
                              <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <select class="custom-select form-control required" onchange="notbusiness();hidewalkinfields();" id="accounttype" name="accounttype">
                                        <option value=""> -- Select Account Type -- </option>
                                           @foreach($accounttype as $accounttype)
                                            <option value="{{ $accounttype->type }}">{{ $accounttype->type }}</option>
                                           @endforeach
                                     </select>
                                      <label for="last-name-column">Account Type</label>
                                  </div>
                              </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="fullname" name="fullname" data-required="true" value="{{ Request::old('fullname') ?: '' }}"   class="form-control" placeholder="First Name" name="fname-column">
                                          <label for="first-name-column">Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="date_of_birth" class="form-control" placeholder="Date of Birth" name="date_of_birth">
                                          <label for="last-name-column">Date of Birth</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <select class="custom-select form-control"  id="gender" name="gender">
                                            <option value=""></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                          <label for="city-column">Gender</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Occupation">
                                          <label for="country-floating">Occupation</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                          <label for="company-column">Email</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="mobile_number" class="form-control" name="mobile_number" placeholder="Contact #">
                                          <label for="mobile_number">Mobile Number</label>
                                      </div>
                                  </div>


                                  <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                      <textarea class="form-control" id="residential_address" name="residential_address" rows="3" placeholder="Residential Address"></textarea>
                                        <label for="company-column">Residential Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                      <textarea class="form-control" id="postal_address" name="postal_address" rows="3" placeholder="Postal Address"></textarea>
                                        <label for="mobile_number">Office Address </label>
                                    </div>
                                </div>
                              
                                {{-- <div class="col-md-12 col-12">
                                  <div class="form-label-group">
                                    <textarea class="form-control" id="postal_address" name="postal_address" rows="3" placeholder="Postal Address"></textarea>
                                      <label for="company-column">Postal Address </label>
                                  </div>
                              </div> --}}
                              <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <select class="custom-select form-control"  id="civil_status" name="civil_status">
                                        <option value=""> -- Select Civil Status -- </option>
                                          @foreach($civilstatus as $civilstatus)
                                          <option value="{{ $civilstatus->type }}">{{ $civilstatus->type }}</option>
                                          @endforeach
                                  </select>
                                      <label for="mobile_number">Civil Status</label>
                                  </div>
                              </div>
                               <div class="col-md-6 col-12">
                                <div class="form-label-group">
                                    <select id="nationality" name="nationality" class="custom-select form-control">
                                      <option value="Ghanaian">Ghanaian</option>
                                    @foreach($nationalities as $nationality)
                                  <option value="{{ $nationality->nationality }}">{{ $nationality->nationality }}</option>
                                    @endforeach
                                  </select>   
                                    <label for="mobile_number">Nationality</label>
                                </div>
                            </div> 



                            <hr>
                           
                            <div class="col-md-6 col-12">
                              <div class="form-label-group">
                                <input type="text" id="kin_name" class="form-control" name="kin_name" placeholder="Contact Name"">
                                  <label for="company-column">Contact's Name</label>
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                              <div class="form-label-group">
                                <select id="kin_relationship" name="kin_relationship" class="custom-select form-control">
                                  <option value="">-- Not set --</option>
                                  @foreach($relationships as $relationship)
                                    <option value="{{ $relationship->type }}">{{ $relationship->type }}</option>
                                  @endforeach
                                </select> 
                                  <label for="mobile_number">Contact's Relationship </label>
                              </div>
                          </div>
                           
                          <div class="col-md-6 col-12">
                            <div class="form-label-group">
                              <input type="text" id="kin_phone" class="form-control" name="kin_phone" placeholder="Contact Phone #"">
                                <label for="company-column">Contact's Phone #</label>
                            </div>
                         </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                              <input type="email" id="kin_email" class="form-control" name="kin_email" placeholder="Email">
                                <label for="mobile_number">Contact's Email </label>
                            </div>
                        </div>

                        <hr>

                        <div class="col-md-6 col-12">
                          <div class="form-label-group">
                            <select id="insurance_company" name="insurance_company" class="custom-select form-control">
                              <option value=""> -- Not Set -- </option>
                             @foreach($insurers as $insurer)
                           <option value="{{ $insurer->name }}">{{ $insurer->name }}</option>
                             @endforeach
                           </select> 
                              <label for="company-column">Insurance Company</label>
                          </div>
                       </div>

                      <div class="col-md-6 col-12">
                          <div class="form-label-group">
                            <input type="text" id="insurance_id" class="form-control" name="insurance_id" placeholder="Insurance Number">
                              <label for="mobile_number">Insurance Number </label>
                          </div>
                      </div>

                      
                      <div class="col-md-6 col-12">
                        <div class="form-label-group">
                          <select id="insurance_cover" name="insurance_cover" class="custom-select form-control">
                            <option value=""> -- Not Set -- </option>
                            <option value="Comprehensive"> Comprehensive </option>
                            <option value="Standard"> Standard </option>   
                             <option value="Platinum"> Platinum </option> 
                             <option value="Emerald"> Emerald </option> 
                             <option value="Diamond"> Diamond </option>          
                            </select> 
                            <label for="company-column">Insurance Plan</label>
                        </div>
                     </div>
                    <div class="col-md-6 col-12">
                        <div class="form-label-group">
                          <select id="insurance_eligibility" name="insurance_eligibility" class="custom-select form-control">
                            <option value="Not Verified"> Not Verified </option>
                            <option value="Verified"> Verified </option>
                         </select>
                            <label for="mobile_number">Eligibility</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-label-group">
                        <input type="text" id="expiry_date" class="form-control" name="expiry_date" placeholder="Expiry date"">
                          <label for="company-column">Expiry Date</label>
                      </div>
                   </div>
                  <div class="col-md-6 col-12">
                      <div class="form-label-group">
                        <input type="file" id="auth_letter" class="form-control" name="auth_letter" placeholder="Authorization Letter">
                          <label for="mobile_number">Authorization Letter </label>
                      </div>
                  </div>


                  <div class="col-md-6 col-12">
                    <div class="form-label-group">
                      <select id="company" name="company" class="custom-select form-control">
                        <option value=""> -- Not Set -- </option>
                          @foreach($companies as $company)
                          <option value="{{ $company->name }}">{{ $company->name }}</option>
                          @endforeach
                       </select>
                      <label for="company-column">Employer</label>
                    </div>
                 </div>
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                      <input type="text" id="staff_id" class="form-control" name="staff_id" placeholder="Staff #"">
                        <label for="mobile_number">Employee #</label>
                    </div>
                </div>

                <div class="modal-footer">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <button type="submit" class="btn btn-primary pull-right">Update</button>
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
                    
                    {{-- <section class="panel panel-default">
                      <div class="panel-body">
                       
                        <div class="clearfix m-b">

                          <a href="#" class="thumb-lg">
                            <img src="" name="imagePreview" id="imagePreview"  class="img-circle">
                             
                             <input type="hidden"  name="imagename" id="imagename" value="{{ Request::old('imagename') ?: '' }}">
                             <input type="file" height="40px" name="image" id="image" enctype="multipart/form-data">
                          </a>
                                
                        </div>
                        
                       

                     
                     
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : ''}}">
                          <label>Date of Birth  <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" value="{{ Request::old('dateofbirth') ?: '' }}"   id="date_of_birth" name="date_of_birth" placeholder="dd/mm/YYYY"> 
                                        
                          @if ($errors->has('date_of_birth'))
                          <span class="help-block">{{ $errors->first('date_of_birth') }}</span>
                           @endif           
                        </div>
                        </div>
                        </div>
                        

                        

                         






                          
                   
                    <div id="contactperson" name="contactperson">
                     <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Incase of Emergency (Contact Person Details)
                    </header>
                      <div class="panel-body">
                       <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Name<span class="text-danger">*</span></label> 
                            <input type="text" rows="3" class="form-control" data-required="true" id="kin_name" name="kin_name" value="{{ Request::old('kin_name') ?: '' }}">   
                          </div>
                         
                            
                           
                       


                    </div>
                   </section> 
                  </div>
                    

                       <div id="insurancetab" name="insurancetab">
                     <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Insurance Details
                    </header>
                      <div class="panel-body">
                        
                           <div class="form-group pull-in clearfix">
                              <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('insurance_company') ? ' has-error' : ''}}">
                              <label>Company</label>
                               <select id="insurance_company" name="insurance_company" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control sm-3">
                               <option value=""> -- Not Set -- </option>
                              @foreach($insurers as $insurer)
                            <option value="{{ $insurer->name }}">{{ $insurer->name }}</option>
                              @endforeach
                            </select>                         
                              @if ($errors->has('insurance_company'))
                              <span class="help-block">{{ $errors->first('insurance_company') }}</span>
                               @endif           
                            </div>
                             </div>
                              <div class="col-sm-6">
                                <label>Policy Number</label>
                                <input type="text" rows="3" class="form-control" id="insurance_id" name="insurance_id" value="{{ Request::old('insurance_id') ?: '' }}">      
                              </div> 
                              </div> 
                    </div>
                   </section> 
                  </div>

                     <div id="corporatetab" name="corporatetab">
                     <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Employer Details
                    </header>
                      <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                              <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('company') ? ' has-error' : ''}}">
                              <label>Employer</label>
                               <select id="company" name="company" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control sm-3">
                               <option value=""> -- Not Set -- </option>
                              @foreach($companies as $company)
                            <option value="{{ $company->name }}">{{ $company->name }}</option>
                              @endforeach
                            </select>                         
                              @if ($errors->has('company'))
                              <span class="help-block">{{ $errors->first('company') }}</span>
                               @endif           
                            </div>
                             </div>
                              <div class="col-sm-6">
                                <label>Staff #</label>
                                <input type="text" rows="3" class="form-control" id="staff_id" name="staff_id" value="{{ Request::old('staff_id') ?: '' }}">      
                              </div> 
                              </div>  
                    </div>
                   </section> 
                  </div>
                       
                     
                     </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Update Record</button>
                      </footer>
                    </section> --}}