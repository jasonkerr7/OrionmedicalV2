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
                                          <input type="text" id="drug_number" class="form-control" placeholder="Drug Code" name="drug_number">
                                          <label for="first-name-column">Drug Code</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="generic_name" class="form-control" placeholder="Generic Name" name="generic_name">
                                          <label for="last-name-column">Generic Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="drug_name" class="form-control" placeholder="Drug Name" name="drug_name">
                                          <label for="city-column">Drug Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="brand" class="form-control" name="brand" placeholder="Brand">
                                          <label for="country-floating">Brand</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="unit_price" class="form-control" name="unit_price" placeholder="Price">
                                          <label for="company-column">Unit Price</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="quantity" id="email-id-column" class="form-control" name="quantity" placeholder="quantity">
                                          <label for="email-id-column">Quantity</label>
                                      </div>
                                  </div>

                                  <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                        <input type="text" id="unit_price" class="form-control" name="unit_price" placeholder="Price">
                                        <label for="company-column">Application</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group">
                                        <input type="quantity" id="email-id-column" class="form-control" name="quantity" placeholder="quantity">
                                        <label for="email-id-column">Stock Alert Level</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <input type="text" id="unit_price" class="form-control" name="unit_price" placeholder="Price">
                                      <label for="company-column">Pack Size</label>
                                  </div>
                               </div>

                               <div class="col-md-6 col-12">
                                  <div class="form-label-group">
                                      <input type="quantity" id="email-id-column" class="form-control" name="quantity" placeholder="quantity">
                                      <label for="email-id-column">Supplier</label>
                                  </div>
                               </div>

                                 
                                  <div class="col-12">
                                      <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                      <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
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


{{-- 




                        


                             <select id="drug_form" name="drug_form" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                            <option value=""> -- Select Unit -- </option>
                         @foreach($application as $application)
                        <option value="{{ $application->type }}">{{ $application->type }}</option>
                          @endforeach 
                        </select>              
                           @if ($errors->has('drug_form'))
                          <span class="help-block">{{ $errors->first('drug_form') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                          <div class="col-sm-6">
                            <label>Stock Alert Level</label> 
                            <div class="form-group{{ $errors->has('stock_alert') ? ' has-error' : ''}}">
                            <input type="text" rows="3" data-required="true" class="form-control" id="stock_alert" name="stock_alert" value="{{ Request::old('stock_alert') ?: '' }}">   
                           @if ($errors->has('stock_alert'))
                          <span class="help-block">{{ $errors->first('stock_alert') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('pack_size') ? ' has-error' : ''}}">
                            <label>Pack Size</label>
                             <input type="text" class="form-control" class="text-success" id="pack_size"  value="{{ Request::old('pack_size') ?: '' }}"  name="pack_size">       
                           @if ($errors->has('pack_size'))
                          <span class="help-block">{{ $errors->first('pack_size') }}</span>
                           @endif    
                          </div>   
                        </div>

                       

                         <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('walk_margin') ? ' has-error' : ''}}">
                            <label>Walk In Sale Margin</label>
                             <input type="text" class="form-control" class="text-success" data-required="true" id="walk_margin" value="{{ Request::old('walk_margin') ?: '' }}"  name="walk_margin">       
                           @if ($errors->has('walk_margin'))
                          <span class="help-block">{{ $errors->first('walk_margin') }}</span>
                           @endif    
                          </div>   
                        </div>

                           
                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('insurance_margin') ? ' has-error' : ''}}">
                            <label>Insurance Sale Margin</label>
                            <input type="text" rows="3" data-required="true" class="form-control" id="insurance_margin" name="insurance_margin" value="{{ Request::old('insurance_margin') ?: '' }}">      
                           @if ($errors->has('insurance_margin'))
                          <span class="help-block">{{ $errors->first('insurance_margin') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                    
  

                    
                        
                         <div class="form-group pull-in clearfix">
                           <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('category') ? ' has-error' : ''}}">
                            <label>Supplier</label>
                            <select id="supplier" name="supplier" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                             <option value="{{ Request::old('supplier') ?: '' }}"></option>
                            <option value=""> -- Select Supplier -- </option>
                         @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->name }}"> {{ strtoupper($supplier->name) }}</option>
                          @endforeach 
                        </select>         
                           @if ($errors->has('supplier'))
                          <span class="help-block">{{ $errors->first('supplier') }}</span>
                           @endif    
                          </div>   
                        </div>
                        

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('expiry_date')) has-error @endif">
                        <label for="expiry_date">Expiry Date</label>
                        <div class="input-group">

                        <input type="text" class="form-control" name="expiry_date" data-required="true" id="expiry_date" placeholder="dd/mm/YYYY" value="{{ old('expiry_date') ?: '' }}" >
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('expiry_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('expiry_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>

      </div>
      

                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Update Drug</button>
                        <input type="hidden" id="drugid" name="drugid" value="{{ old('drugid') }}">
                      </footer>
                    </section> --}}