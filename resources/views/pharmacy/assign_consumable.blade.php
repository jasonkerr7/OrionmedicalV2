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
                                          <input type="text" class="form-control" readonly="true" id="item_requested" name="item_requested" value="{{ Request::old('item_requested') ?: '' }}">
                                          <label for="first-name-column">Item Name</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" class="form-control" readonly="true" id="stock" name="stock" value="{{ Request::old('stock') ?: '' }}">
                                          <label for="last-name-column">Quantity Available</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" class="form-control" id="quantity_requested" name="quantity_requested" value="{{ Request::old('stock_alert') ?: '' }}">
                                          <label for="city-column">Quantity Requesting </label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" class="form-control" readonly="true" id="requested_by" name="requested_by" value="{{ Auth::user()->getNameOrUsername() }}">
                                          <label for="country-floating">Requested By</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" class="form-control" name="assigned_on" data-required="true" id="assigned_on" placeholder="Select your time" value="{{ old('assigned_on') }}">
                                          <label for="company-column">Date of Requisition</label>
                                      </div>
                                  </div>
                                  <input type="hidden" id="drugid" name="drugid" value="{{ old('drugid') }}">
                                 
                                  <div class="col-12">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
               
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