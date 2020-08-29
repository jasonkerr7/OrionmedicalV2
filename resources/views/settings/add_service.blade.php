<section id="multiple-column-form">
  <div class="row match-height">
      <div class="col-12">
          <div class="card">
           
              <div class="card-content">
                  <div class="card-body">
                     
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-md-12 col-12">
                                      <div class="form-label-group">
                                        <input type="text" id="service" name="service" data-required="true" class="form-control" placeholder="">
                                          <label for="first-name-column">Service Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-12 col-12">
                                      <div class="form-label-group">
                                        <input type="text" id="description" name="description"  class="form-control" placeholder="">
                                          <label for="last-name-column">Description</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" id="charge" name="charge" data-required="true" class="form-control" placeholder="">
                                          <label for="city-column">Default Charge</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" class="form-control" class="text-success" data-required="true" id="walk_margin" name="walk_margin" value="{{ Request::old('walk_margin') ?: '' }}" > 
                                          <label for="country-floating">Walk-In Charge</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" rows="3" data-required="true" class="form-control" data-required="true" id="corporate_margin" name="corporate_margin" value="{{ Request::old('corporate_margin') ?: '' }}">      
                                          <label for="company-column">Corporate Charge</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                        <input type="text" rows="3" data-required="true" class="form-control" data-required="true" id="insurance_margin" name="insurance_margin" value="{{ Request::old('insurance_margin') ?: '' }}">      
                                          <label for="email-id-column">Phoenix Insurance</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                      <input type="text" class="form-control" class="text-success" data-required="true" id="cosmopolitan_margin" name="cosmopolitan_margin" value="{{ Request::old('cosmopolitan_margin') ?: '' }}">      
                                        <label for="email-id-column">Cosmopolitan Insurance</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                    <input type="text" rows="3" data-required="true" class="form-control" data-required="true" id="premier_margin" name="premier_margin" value="{{ Request::old('premier_margin') ?: '' }}">      
                                      <label for="email-id-column">Premier Insurance</label>
                                  </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-label-group">
                                  <input type="text" rows="3" data-required="true" class="form-control" id="glico_margin" name="glico_margin" value="{{ Request::old('glico_margin') ?: '' }}">        
                                    <label for="email-id-column">Glico Insurance</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="form-label-group">
                                <input type="text" class="form-control" class="text-success" data-required="true" id="nationwide_margin" name="nationwide_margin" value="{{ Request::old('nationwide_margin') ?: '' }}"  >          
                                  <label for="email-id-column">Nationwide Insurance</label>
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-label-group">
                              <input type="text" rows="3" data-required="true" class="form-control" id="universal_margin" name="universal_margin" value="{{ Request::old('universal_margin') ?: '' }}">        
                                <label for="email-id-column">Universal Insurance</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-label-group">
                            <input type="text" rows="3" data-required="true" class="form-control" id="apex_margin" name="apex_margin" value="{{ Request::old('apex_margin') ?: '' }}">        
                              <label for="email-id-column">Apex Insurance</label>
                          </div>
                        </div>

                        <div class="col-md-6 col-12">
                          <div class="form-label-group">
                            <input type="text" class="form-control" class="text-success" data-required="true" id="metropolitan_margin" name="metropolitan_margin" value="{{ Request::old('metropolitan_margin') ?: '' }}"  >        
                              <label for="email-id-column">Metropolitan Insurance</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-label-group">
                          <input type="text" rows="3" data-required="true" class="form-control" id="acacia_margin" name="acacia_margin" value="{{ Request::old('acacia_margin') ?: '' }}">            
                            <label for="email-id-column">Acacia Insurance</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-label-group">
                        <select id="department" name="department" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                          @foreach($departments as $value)
                            <option value="{{ $value->name }}">{{ $value->name  }}</option>
                        @endforeach 
                       </select>            
                          <label for="email-id-column">Department</label>
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
