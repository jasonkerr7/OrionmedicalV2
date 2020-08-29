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
											<select id="name" name="name" rows="3" tabindex="1" data-required="true" data-placeholder="Select Patient.." class="select2 form-control">
												<option value="">Select Patient</option>
												@foreach($patients as $patient)
												  <option value="{{ $patient->id }}">{{ $patient->fullname }}</option>
											   @endforeach
										  </select>
											<label for="first-name-column">Name</label>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-label-group">
											<select id="title" name="title" rows="3" tabindex="1" data-required="true" data-placeholder="Select appointment type.." class="select2 form-control">
												<option value="">Select Appointment Type</option>
												 @foreach($servicetype as $servicetype)
											   <option value="{{ $servicetype->type }}">{{ $servicetype->type }}</option>
												 @endforeach
										   </select>
											<label for="last-name-column">Appointment Type</label>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-label-group">
											<select id="referal_doctor" name="referal_doctor" rows="3" data-required="true" tabindex="1" data-placeholder="Select doctor.." class="select2 form-control">
												<option value="">Select Doctor</option>
												  @foreach($doctors as $doctor)
												<option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
												  @endforeach
											</select> 
											<label for="city-column">Doctor </label>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-label-group">
											<input type="text" class="form-control" id="time" name="time" value="">
											<label for="country-floating">Time</label>
										</div>
									</div>
								
									
								   
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
			
			
			
			
			
			
                           
 
		
		