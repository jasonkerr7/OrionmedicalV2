<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Gilead Medical</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="{{ asset('/register/css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/register/css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/register/css/component.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/register/css/cs-select.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/register/css/cs-skin-boxes.css')}}" />
		<link rel="stylesheet" href="{{ asset('/js/toastr/toastr.css')}}" type="text/css" />
		<link rel="stylesheet" href="{{ asset('/js/sweetalert.css')}}" type="text/css"/>
		<script src="{{ asset('/register/js/modernizr.custom.js')}}"></script>
	</head>
	<body>



		
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>Welcome to Gilead Medical & Dental Centre </h1> 
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-prev" href="#"><span>Restart</span></a>
						<a class="codrops-icon codrops-icon-drop" href="#"><span>View our rates</span></a>
						<a class="codrops-icon codrops-icon-info" href="#"><span>This is a patient registration form </span></a>
					</div>
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="off">
					<ol class="fs-fields">

						
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">Who is paying ?</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span><input id="accounttyped" name="accounttype" type="radio" value="Walkin"/><label for="accounttyped" class="radio-single">Free Registration</label></span>
								<span><input id="accounttypea" name="accounttype" type="radio" value="Private"/><label for="accounttypea" class="radio-mobile">Myself</label></span>
								<span><input id="accounttypeb" name="accounttype" type="radio" value="Health Insurance"/><label for="accounttypeb" class="radio-conversion">My Health Insurance Provider</label></span>
								<span><input id="accounttypec" name="accounttype" type="radio" value="Corporate"/><label for="accounttypec" class="radio-social">My Company</label></span>
							</div>
						</li>


					

						
						<li>
							<label class="fs-field-label fs-anim-upper" for="fullname">What's your name?</label>
							<input class="fs-anim-lower" id="fullname" name="fullname" type="text" placeholder="Dean Moriarty" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="email" data-info="We won't send you spam, we promise...">What's your email address?</label>
							<input class="fs-anim-lower" id="email" name="email" type="email" placeholder="dean@road.us" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="mobile_number" data-info="We won't send you spam, we promise...">What's your mobile number?</label>
							<input class="fs-anim-lower" id="mobile_number" name="mobile_number" type="number" placeholder="024XXXXXXXX" required/>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="postal_address" data-info="We won't send you spam, we promise...">What's your postal address or residential location ?</label>
							<input class="fs-anim-lower" id="postal_address" name="postal_address" type="text" placeholder="Ridge" required/>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="company" data-info="We won't send you spam, we promise...">Please tell us where you work </label>
							<input class="fs-anim-lower" id="company" name="company" type="text" placeholder="eg. Barclays" />
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="occupation" data-info="We won't send you spam, we promise...">Tell us what you do (Occupation) </label>
							<input class="fs-anim-lower" id="occupation" name="occupation" type="text" placeholder="e.g Accountant" />
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="date_of_birth" data-info="We won't send you spam, we promise...">When were you born ?</label>
							<input class="fs-anim-lower" id="date_of_birth" name="date_of_birth" type="date" value="" required/>
						</li>

						{{-- <li>
							<label class="fs-field-label fs-anim-upper" for="gender" data-info="We won't send you spam, we promise...">What's your gender ?</label>
							<input class="fs-anim-lower" id="gender" name="gender" type="text" placeholder="Male or Female" required/>
						</li>  --}}

						<li data-input-trigger>
								<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">What's your gender ?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="gendera" name="gender" type="radio" value="Male"/><label for="gendera" class="radio-male">Male</label></span>
									<span><input id="genderb" name="gender" type="radio" value="Female"/><label for="genderb" class="radio-female">Female</label></span>
									
								</div>
						</li>

						<li data-input-trigger>
								<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">What's your marital status?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="civil_statusa" name="civil_status" type="radio" value="Single"/><label for="civil_statusa" class="radio-single">Single</label></span>
									<span><input id="civil_statusb" name="civil_status" type="radio" value="Married"/><label for="civil_statusb" class="radio-married">Married</label></span>
									<span><input id="civil_statusc" name="civil_status" type="radio" value="Separated"/><label for="civil_statusc" class="radio-separated">Separated</label></span>
								</div>
							</li>
	


						{{-- <li>
							<label class="fs-field-label fs-anim-upper" for="civil_status" data-info="We won't send you spam, we promise...">What's your marital status?</label>
							<input class="fs-anim-lower" id="civil_status" name="civil_status" type="text" placeholder="Single" required/>
						</li> --}}

						<li>
							<label class="fs-field-label fs-anim-upper" for="kin_name" data-info="We won't send you spam, we promise...">Give a name of someone we can call incase of emergency ?</label>
							<input class="fs-anim-lower" id="kin_name" name="kin_name" type="text" placeholder="Kofi Manu" required/>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="kin_phone" data-info="We won't send you spam, we promise...">Enter your emergency contact's phone number here </label>
							<input class="fs-anim-lower" id="kin_phone" name="kin_phone" type="number" placeholder="024XXXXXXXX" required/>
						</li>


						<li>
								<label class="fs-field-label fs-anim-upper" for="kin_relationship" data-info="We won't send you spam, we promise...">Who is the person to you (Relationship) ? </label>
								<input class="fs-anim-lower" id="kin_relationship" name="kin_relationship" type="text" placeholder="Mother" required/>
							</li>




						
						<!-- <li>
							<label class="fs-field-label fs-anim-upper" for="q4">Describe how you imagine your new website</label>
							<textarea class="fs-anim-lower" id="q4" name="q4" placeholder="Describe here"></textarea>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="q5">What's your budget?</label>
							<input class="fs-mark fs-anim-lower" id="q5" name="q5" type="number" placeholder="1000" step="100" min="100"/>
						</li>
 -->
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="button" onclick="addPatient();">Send us your answers</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

		</div><!-- /container -->
		<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
		<script type="text/javascript">
			$(function () {
			  $('#date_of_birth').daterangepicker({
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
		<script src="{{ asset('/register/js/classie.js')}}"></script>
		<script src="{{ asset('/register/js/selectFx.js')}}"></script>
		<script src="{{ asset('/register/js/fullscreenForm.js')}}"></script>
		<script src="{{ asset('/js/toastr/toastr.js')}}"></script> 
		<script src="{{ asset('/js/sweetalert.min.js')}}"></script>

		
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>

  
		<script type="text/javascript">

function showinsurance()
{
	    var myaccountshow =$("input[name=accounttype]:checked").val();
		$('#insure').hide();

		if(myaccountshow == "Health Insurance")
		{
		$('#insure').show();
		}
		else
		{
			$('#insure').hide();	
		}

}



function addPatient()
{
	var myaccount =$("input[name=accounttype]:checked").val();
	var mygender =$("input[name=gender]:checked").val();
	var mycivilstatus =$("input[name=civil_status]:checked").val();

	//alert(mycivilstatus);
	//toastr.success("Thank you! We will be in touch. Kindly sit :)");
	//swal("Success", "Thank you! We will be in touch. Kindly sit :)", "info");
    $.get('/create-patient-tab',
        {
         "fullname"                    :$('#fullname').val(),
          "accounttype"                :myaccount,
          "blood_group"                :$('#blood_group').val(),
          "postal_address"             :'',
          "residential_address"        :$('#postal_address').val(),
          "email"                      :$('#email').val(),
          "mobile_number"              :$('#mobile_number').val(),
          "date_of_birth"              :$('#date_of_birth').val(),
          "occupation"                 :$('#occupation').val(),
          "place_of_birth"             :$('#place_of_birth').val(),
          "gender"                     :mygender,
          "insurance_company"          :'',
          "company"                    :$('#company').val(),
          "nationality"                :$('#nationality').val(),
          "insurance_id"               :$('#insurance_id').val(),
          "civil_status"               :mycivilstatus,

          "id_type"                    :$('#id_type').val(),
          "kin_name"                   :$('#kin_name').val(),    
          "kin_phone"                  :$('#kin_phone').val(),    
          "kin_relationship"           :$('#kin_relationship').val(),
          "insurance_cover"            :$('#insurance_cover').val(),    
          "insurance_eligibility"      :$('#insurance_eligibility').val(),
          "parent_id"                  :$('#parent_id').val(),    
          "link_type"                  :$('#link_type').val(),
          //"expiry_date"                :$('#date_of_birth').val()

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
         
		  //alert('Thank you! We will be in touch. Kindly sit :)');
		  swal("Success", "Thank you! We will be in touch. Kindly sit :)", "info");
		  window.location = "/register-quick";
		  
        
        }
        else
        {
          toastr.error("Customer failed to save!");
          
        }
      });
                                        
        },'json');
  
 
}

		</script>
	</body>
</html>