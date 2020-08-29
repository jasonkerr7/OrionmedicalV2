
@extends('layouts.default')
@section('content')


<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                  <div class="col-12">
                      <h2 class="content-header-title float-left mb-0">Register</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Forms</a>
                              </li>
                              <li class="breadcrumb-item active"> New Patient
                              </li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
              <div class="form-group breadcrum-right">
                  <div class="dropdown">
                      <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                  </div>
              </div>
          </div>
      </div>
  <!-- Form wizard with step validation section start -->
  <section id="validation">
      <div class="row">
          <div class="col-12">
              <div class="card">
                 
                  <div class="card-content">
                      <div class="card-body">
                          <form action="#" class="steps-validation wizard-circle">
                              <!-- Step 1 -->
                              <h6><i class="step-icon feather icon-home"></i> Personal </h6>
                              <fieldset>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="emailAddress5">
                                              Patient Number
                                          </label>
                                          <input type="text" class="form-control" readonly id="patient_id" name="patient_id">
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="location">
                                              Account Type
                                          </label>
                                          <select class="custom-select form-control required" onchange="notbusiness();hidewalkinfields();" id="accounttype" name="accounttype">
                                             <option value=""> -- Select Account Type -- </option>
                                                @foreach($accounttype as $accounttype)
                                                 <option value="{{ $accounttype->type }}">{{ $accounttype->type }}</option>
                                                @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="firstName">
                                                  First Name
                                              </label>
                                              <input type="text" class="form-control required" id="firstName" name="firstName">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="lastName">
                                                  Last Name
                                              </label>
                                              <input type="text" class="form-control required" id="lastName" name="lastName">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="date_of_birth">
                                                  Date Of Birth
                                              </label>
                                              <input type="text" class="form-control required" id="date_of_birth" name="date_of_birth">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="gender">
                                                  Gender
                                              </label>
                                              <select class="custom-select form-control required"  id="gender" name="gender">
                                                  <option value=""></option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                  
                                              </select>
                                          </div>
                                      </div>
                                  </div>

                                  <div id="hideifwalkin">
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="occupation">
                                                  Occupation
                                              </label>
                                              <input type="text" class="form-control required" id="occupation" name="occupation">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="civil_status">
                                                  Civil Status
                                              </label>
                                              <select class="custom-select form-control required"  id="civil_status" name="civil_status">
                                                    <option value=""> -- Select Civil Status -- </option>
                                                      @foreach($civilstatus as $civilstatus)
                                                      <option value="{{ $civilstatus->type }}">{{ $civilstatus->type }}</option>
                                                      @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                              </fieldset>

                              <!-- Step 2 -->
                              <h6><i class="step-icon feather icon-briefcase"></i> Contacts</h6>
                              <fieldset>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mobile_number">
                                                  Mobile Number
                                              </label>
                                              <input type="text" class="form-control required" id="mobile_number" name="mobile_number">
                                          </div>
                                          <div class="form-group">
                                              <label for="email">
                                                  Email
                                              </label>
                                              <input type="email" class="form-control" id="email" name="email">
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="residential_address">Address</label>
                                              <textarea name="residential_address" id="residential_address" rows="4" class="form-control required"></textarea>
                                          </div>
                                      </div>
                                      
                                  </div>


                                  <div id="hideemergencycontacts">
                                            <div class="progress progress-bar-warning">
                                              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                            </div>


                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kin_name">
                                                        Emergency Contact Name
                                                    </label>
                                                    <input type="text" class="form-control required" id="kin_name" name="kin_name">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="civil_status">
                                                        Relationship
                                                    </label>
                                                    <select class="custom-select form-control"  id="kin_relationship" name="kin_relationship">
                                                          <option value=""> -- Select Relationship -- </option>
                                                          @foreach($relationships as $relationship)
                                                          <option value="{{ $relationship->type }}">{{ $relationship->type }}</option>
                                                          @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="occupation">
                                                      Phone Number
                                                  </label>
                                                  <input type="text" class="form-control required" id="kin_phone" name="kin_phone">
                                              </div>
                                          </div>
                                        </div>
                                  </div>



                              </fieldset>




                              <!-- Step 3 -->
                              <h6><i class="step-icon feather icon-image"></i> Insurance Details</h6>
                              <fieldset>
                                <div id="insurancepane">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventName3">
                                            Insurance Number
                                        </label>
                                        <input type="text" class="form-control" id="insurance_id" name="insurance_id">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventStatus3">
                                            Insurance Provider
                                        </label>
                                        <select class="custom-select form-control" id="insurance_company" name="insurance_company">
                                            <option value=""> -- Not Set -- </option>
                                               @foreach($insurers as $insurer)
                                            <option value="{{ $insurer->name }}">{{ $insurer->name }}</option>
                                              @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>


                                <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="expiry_date">
                                          Expiry Date
                                      </label>
                                      <input type="text" class="form-control" id="expiry_date" name="expiry_date">
                                  </div>
                                </div>
                              

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="gender">
                                        Insurance Plan
                                      </label>
                                      <select style="width:100%"  id="insurance_cover" name="insurance_cover">
                                        <option value=""> -- Not Set -- </option>
                                        <option value="Comprehensive"> Comprehensive </option>
                                        <option value="Standard"> Standard </option>
                                        <option value="Platinum"> Platinum </option>
                                        <option value="Mercury"> Mercury </option>
                                        <option value="Emerald"> Emerald </option> 
                                        <option value="Diamond"> Diamond </option> 
                                          
                                      </select>
                                  </div>
                              </div>
                          </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="insurance_eligibility">Eligibility Status</label>
                                            <select class="custom-select form-control" id="insurance_eligibility" name="insurance_eligibility">
                                              <option value="Not Verified"> Not Verified </option>
                                              <option value="Verified"> Verified </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group d-flex align-items-center pt-md-2">
                                            <label class="mr-2">Communication Channel :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="d-inline-block mr-2">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" value="false">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">SMS</span>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" value="false">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Calls</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  
                                  </div>

                                  <div id="companypane">
                                    <div class="progress progress-bar-warning">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
                                    </div>


                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventName3">
                                                Staff Number
                                            </label>
                                            <input type="text" class="form-control" id="staff_id" name="staff_id">
                                        </div>
                                      </div>
    
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company">
                                                Company
                                            </label>
                                            <select style="width:100%" id="company" name="company">
                                                <option value=""> -- Not Set -- </option>
                                                   @foreach($insurers as $insurer)
                                                <option value="{{ $insurer->name }}">{{ $insurer->name }}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                  </div>

                          </div>
                                </div>
                            </fieldset>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Form wizard with step validation section end -->

</div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


                        

            @stop


           
<script src="{{ asset('/event_components/jquery.min.js')}}"></script>


<script type="text/javascript">
$(document).ready(function () {
   
    $('#insurance_cover').select2({
      tags: true
      });

    $('#company').select2({
      tags: true
      });
        

  });
</script>

<script type="text/javascript">
$(function () {
  $('#date_of_birth').daterangepicker({
     "minDate": moment('1930-06-14'),
      "maxDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});


</script>

<script type="text/javascript">
$(function () {
  $('#visit_date').daterangepicker({
     "minDate": moment('2017-02-01'),
     "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>


<script type="text/javascript">
    function notbusiness()
{
  if($('#accounttype').val() != "Private")
   {
     $('#insurancepane').show();
     $('#companypane').show();
     


   }

   else
   {
     $('#insurancepane').hide();
     $('#companypane').hide();
    
   }
}


   function hidewalkinfields()
{
  if($('#accounttype').val() == "Walkin")
   {
     $('#hideifwalkin').hide();
     $('#hidecontacts').hide();
     $('#hideemergencycontacts').hide();
     $('#insurancepane').hide();
     $('#companypane').hide();
     $('#civil_status').val("Single");
     $('#postal_address').val('NA');
     $('#residential_address').val('NA');
     $('#expiry_date').val('05/05/2025');
     $('#kin_name').val('NA'); 
     $('#kin_phone').val('NA');
     
   }

   else
   {
     $('#hidecontacts').show();
     $('#hideemergencycontacts').show();
     $('#hideifwalkin').show();
    // $('#insurancepane').show();
     
    
   }

}

</script>
<script type="text/javascript">
$(function () {
  $('#expiry_date').daterangepicker({
     "minDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});



function addPatient()
{
if($('#accounttype').val()=="Health Insurance" & $('#insurance_company').val()=="")
  {document.getElementById('insurance_company').focus();sweetAlert("Please select insurance company ",'Fill all fields', "error");}

else if($('#accounttype').val()=="Health Insurance" & $('#insurance_id').val()=="")
  {document.getElementById('insurance_id').focus(); sweetAlert("Please enter insurance number ",'Fill all fields', "error"); }

else if($('#accounttype').val()=="Health Insurance" & $('#insurance_cover').val()=="")
  {document.getElementById('insurance_cover').focus(); sweetAlert("Please enter insurance cover ",'Fill all fields', "error");  }

  else if($('#accounttype').val()=="Health Insurance" & $('#company').val()=="")
  {document.getElementById('company').focus(); sweetAlert("Please select company of insured ",'Fill all fields', "error");  }

else
  {

    $.get('/create-patient',
        {
          "fullname"                   :$('#firstName').val() + ' ' + $('#lastName').val(),
          "accounttype"                :$('#accounttype').val(),
          "blood_group"                :$('#blood_group').val(),
          "postal_address"             :$('#postal_address').val(),
          "residential_address"        :$('#residential_address').val(),
          "email"                      :$('#email').val(),
          "mobile_number"              :$('#mobile_number').val(),
          "date_of_birth"              :$('#date_of_birth').val(),
          "occupation"                 :$('#occupation').val(),
          "place_of_birth"             :$('#place_of_birth').val(),
          "gender"                     :$('#gender').val(),
          "insurance_company"          :$('#insurance_company').val(),
          "company"                    :$('#company').val(),
          "nationality"                :$('#nationality').val(),
          "insurance_id"               :$('#insurance_id').val(),
          "civil_status"               :$('#civil_status').val(),

          "id_type"                    :$('#id_type').val(),
          "kin_name"                   :$('#kin_name').val(),    
          "kin_phone"                  :$('#kin_phone').val(),    
          "kin_relationship"           :$('#kin_relationship').val(),
          "insurance_cover"            :$('#insurance_cover').val(),    
          "insurance_eligibility"      :$('#insurance_eligibility').val(),
          "parent_id"                  :$('#parent_id').val(),    
          "link_type"                  :$('#link_type').val(),
          "expiry_date"                :$('#expiry_date').val()


        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Customer successfully saved!");
          
          window.location = "/patient-profile-limited/"+data["ReferenceNumber"];
        
        }
        else
        {
          toastr.error("Customer failed to save!");
          
        }
      });
                                        
        },'json');
  }
 
}
</script>
