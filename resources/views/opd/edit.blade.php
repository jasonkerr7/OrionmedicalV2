<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row match-height">
      <div class="col-12">
          <div class="card">
           
              <div class="card-content">
                  <div class="card-body">
                      
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" rows="3" class="form-control" id="patient_id" readonly="true" name="patient_id" value="{{ Request::old('patient_id') ?: '' }}">   
                                          <label for="first-name-column">Patient ID</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <select id="accounttype" name="accounttype" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%" >
                                          @foreach($billingaccounts as $account)
                                             <option value="{{ $account->type }}">{{ $account->type }}</option>
                                         @endforeach
                                        </select> 
                                          <label for="last-name-column">Billing Account</label>
                                      </div>
                                  </div>
                                  <div class="col-md-12 col-12">
                                      <div class="form-label-group">
                                        <input type="text" class="form-control"  id="fullname" value="{{ Request::old('fullname') ?: '' }}"  name="fullname">
                                          <label for="city-column">Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" rows="3" class="form-control" id="opd_number" name="opd_number" readonly="true" value="{{ Request::old('opd_number') ?: '' }}">   
                                          <label for="country-floating">Visit/OPD Number</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <select id="referal_doctor" name="referal_doctor" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%" >
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select> 
                                          <label for="company-column">Doctor</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <select id="visit_type" name="visit_type" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                                          @foreach($visittypes as $visittypes)
                                        <option value="{{ $visittypes->type }}">{{ $visittypes->type }}</option>
                                          @endforeach
                                        </select>
                                          <label for="email-id-column">Visit Type</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                      <select id="consultation_type" name="consultation_type" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                                        <option value=""> -- Select Consultation -- </option>
                                         @foreach($servicetype as $servicetype)
                                          <option value="{{ $servicetype->type }}">{{ $servicetype->type }} </option>
                                        @endforeach
                                        </select>
                                        <label for="email-id-column">Consultation Type</label>
                                    </div>
                                </div>

                                      <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                          <input type="text" rows="3" class="form-control" readonly="true" id="last_visit_date" name="last_visit_date" value="{{ Request::old('last_visit_date') ?: '' }}">
                                            <label for="country-floating">Last Visit Date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" class="form-control" name="visit_date" data-required="true" id="visit_date" placeholder="Select your time" value="{{ old('visit_date') }}">  
                                          <label for="country-floating">Visit Date</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                      <select id="location" name="location" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                                        @foreach($branches as $branch)
                                      <option value="{{ $branch->location }}">{{ $branch->location }}</option>
                                        @endforeach 
                                      </select> 
                                        <label for="country-floating">Location</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                    <input type="text" rows="3" class="form-control" id="authorization_code" name="authorization_code" value="{{ Request::old('authorization_code') ?: '' }}">    
                                      <label for="country-floating">Authorization Code</label>
                                  </div>
                              </div>
                                 
                              </div>
                          </div>
                     
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>