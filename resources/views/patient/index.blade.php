
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
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Active Patients</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Inactive Patient</span>
                                      </a>
                                  </li>
                                 
                                  
                                  <form action="/find-patient" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>

                                 <a href="/register-start"> <button class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add new patient</button></a>
                              </ul>

                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="investigationsTable" class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col">Patient # </th>
                                                                      <th scope="col">Name</th>
                                                                      <th scope="col">Sex</th>
                                                                      <th scope="col">Age</th>
                                                                      <th scope="col">Phone</th>
                                                                      <th scope="col">Address</th>
                                                                      <th scope="col">Account Type</th>
                                                                      <th scope="col">Copayer</th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach( $customerlists as $customerlist )
                                                                  <tr>
                                                               
                                                                    <td><a href="/patient-profile-limited/{{ $customerlist->patient_id }}">{{ $customerlist->ref_code }}</a></td>
                                                                    <td>{{  ucwords(strtolower($customerlist->fullname)) }}</td>
                                                                    <td>{{ $customerlist->gender }}</td>
                                                                    <td> {{ $customerlist->date_of_birth->age }}  </span></td>
                                                                    <td>{{ $customerlist->mobile_number }}</td>
                                                                    <td>{{  ucwords(strtolower(str_limit($customerlist->residential_address,15))) }}</td>
                                                                    <td>{{  ucwords(strtolower(str_limit($customerlist->accounttype,15))) }}</td>
                                                                   
                                                                   
                                                                    <td>@if($customerlist->accounttype=='Corporate')  {{ str_limit($customerlist->company,15) }}
                                                                      @elseif($customerlist->accounttype=='Health Insurance') {{ str_limit($customerlist->insurance_company,15) }} 
                                                                      @else 
                                                                      @endif
                                                                    </td>
                                                                    <td><a href="/patient-profile-limited/{{ $customerlist->patient_id }}" class="badge badge-pill badge-glow badge-success mr-1 mb-1"><i class="fa fa-stethoscope"> </i> Check In </a></td>
                                                                    <td><a href="/patient-profile-limited/{{ $customerlist->patient_id }}" ><i class="feather icon-folder"> </i> </a></td>

                                                                    <td>
                                                                    @if($customerlist->status == 'Active')
                                                                          {{-- <a href="#edit-patient" class="bootstrap-modal-form-open" onclick="editAccount('{{ $customerlist->id }}')"><i class="feather icon-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a> --}}
                                                                          <a href="#edit-patient" class="bootstrap-modal-form-open" onclick="editAccount('{{ $customerlist->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-edit-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                        
                                                                   
                                                                        @else
                                                                    @endif
                                                                    </td>
                                                                    
                                                                    <td>
                                                                    @if($customerlist->status == 'Active')
                                                                          <a href="#" onclick="deactivate('{{ $customerlist->id }}','{{ $customerlist->fullname }}')"><i class="feather icon-thumbs-down"></i> </a>
                                                                    @else
                                                                          <a href="#" onclick="activate('{{ $customerlist->id }}','{{ $customerlist->fullname }}')"><i class="feather icon-thumbs-up"></i></a>
                                                                    @endif
                                                                    </td>
                                                                    
                                                                    @role(['Medical Records Manager','System Admin'])
                                                                    <td>
                                                                    <a  href="#" onclick="deletePatient('{{$customerlist->id}}','{{ $customerlist->fullname }}')"><i class="feather icon-trash"></i></a>
                                                                    </td> 
                                                                    @endrole
                                                                
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 col-md-5">
                                      <div> Record(s) Found : {{ $customerlists->total() }} {{ str_plural('Patient', $customerlists->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$customerlists->render()!!}
                                      </div>
                                        </div>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                     
                                      <!-- users edit Info form ends -->
                                  </div>
                                  <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                      <!-- users edit socail form start -->
                                     
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



 <!-- Modal -->
 <div class="modal fade text-left" id="edit-patient" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel17">Update Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/update-patient" class="panel-body wrapper-lg">
               @include('patient/edit')
            
            </form>
          </div>
          
        
      </div>
  </div>
</div>

@stop



<script src="{{ asset('/event_components/jquery.min.js')}}"></script>


<script type="text/javascript">
  function gettabstatus() 
{

 // alert($('#edit-patient select[name="accounttype"]').val());

   if( $('#accounttype').val() == "Health Insurance" || $('#edit-patient select[name="accounttype"]').val() == "Health Insurance")
    {
         
      $('#insurancetab').show();
       $('#corporatetab').show();

       $('#edit-patient div[name="insurancetab"]').show();
       $('#edit-patient div[name="corporatetab"]').show();

      
    }


    else if( $('#accounttype').val() == "Corporate" || $('#edit-patient select[name="accounttype"]').val() == "Corporate")
    {
     
       $('#insurancetab').hide();
       $('#corporatetab').show();

       $('#edit-patient div[name="insurancetab"]').hide();
       $('#edit-patient div[name="corporatetab"]').show();
     }

     else if( $('#accounttype').val() == "Private" || $('#edit-patient select[name="accounttype"]').val() == "Private" )
    {
     
       $('#insurancetab').hide();
       $('#corporatetab').hide();

       $('#edit-patient div[name="insurancetab"]').hide();
       $('#edit-patient div[name="corporatetab"]').hide();
  
     }

     else if( $('#accounttype').val() == "")
    {
     
       $('#insurancetab').hide();
       $('#corporatetab').hide();

       $('#edit-patient div[name="insurancetab"]').hide();
       $('#edit-patient div[name="corporatetab"]').hide();
     }

   else
   {
       $('#insurancetab').hide();
       $('#corporatetab').hide();

       $('#edit-patient div[name="insurancetab"]').hide();
       $('#edit-patient div[name="corporatetab"]').hide();
  }
}
</script>
<script type="text/javascript">
  $(document).ready(function() {

      $('#insurancetab').hide();
      $('#corporatetab').hide();

      $('#edit-patient div[name="insurancetab"]').hide();
      $('#edit-patient div[name="corporatetab"]').hide();

     
  });
</script>

<script>

var account_no = null;
function editAccount(acct_no)
{ 
  //alert(acct_no);
  account_no = acct_no;
  $.get("/edit-patient",
          {"patient_id":account_no},
          function(json)
          {
            
                $('#edit-patient div[name="insurancetab"]').hide();
                $('#edit-patient div[name="corporatetab"]').hide();

                $('#edit-patient input[name="patient_id"]').val(json.patient_id);
                $('#edit-patient input[name="fullname"]').val(json.fullname);
                $('#edit-patient textarea[name="residential_address"]').val(json.residential_address);
                $('#edit-patient textarea[name="postal_address"]').val(json.postal_address);
                $('#edit-patient textarea[name="residential_address"]').val(json.residential_address);
                $('#edit-patient textarea[name="postal_address"]').val(json.postal_address);
                $('#edit-patient input[name="date_of_birth"]').val(json.date_of_birth);
                $('#edit-patient input[name="email"]').val(json.email);
                $('#edit-patient input[name="place_of_birth"]').val(json.place_of_birth);
                $('#edit-patient input[name="occupation"]').val(json.occupation);
                $('#edit-patient input[name="mobile_number"]').val(json.mobile_number);
                $('#edit-patient select[name="blood_group"]').val(json.blood_group);
                $('#edit-patient select[name="civil_status"]').val(json.civil_status);
                $('#edit-patient select[name="gender"]').val(json.gender);
                $('#edit-patient select[name="accounttype"]').val(json.accounttype);
                $('#edit-patient select[name="insurance_company"]').val(json.insurance_company);
                $('#edit-patient input[name="insurance_id"]').val(json.insurance_id);
                $('#edit-patient img[name="imagePreview"]').attr("src", '/images/'+json.image);
                $('#edit-patient input[name="imagename"]').val(json.image);
                $('#edit-patient select[name="company"]').val(json.company);


                $('#edit-patient input[name="kin_name"]').val(json.kin_name);
                $('#edit-patient input[name="kin_phone"]').val(json.kin_phone);
                $('#edit-patient select[name="kin_relationship"]').val(json.kin_relationship);
                $('#edit-patient input[name="parent_id"]').val(json.parent_id);
                $('#edit-patient input[name="link_type"]').val(json.link_type);


                $('#edit-patient select[name="insurance_eligibility"]').val(json.insurance_eligibility);
                $('#edit-patient input[name="expiry_date"]').val(json.expiry_date);
                $('#edit-patient select[name="insurance_cover"]').val(json.insurance_cover).select2({
                  tags: true
                  });
                 //alert('jason');
                

                 if(json.accounttype == 'Corporate')
                 {
                   $('#edit-patient div[name="corporatetab"]').show();
                   $('#edit-patient div[name="insurancetab"]').hide();
                 }
                  if(json.accounttype == 'Health Insurance')
                 {
                   $('#edit-patient div[name="insurancetab"]').show();
                   $('#edit-patient div[name="corporatetab"]').hide();

                 }
               
               
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}
</script>

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>


<script type="text/javascript">
$(document).ready(function () {
   
    $('#insurance_cover').select2({
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
</script>

<script type="text/javascript">
$(function () {
  $('#edit-patient input[name="expiry_date"]').daterangepicker({
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


</script>


<script >

  function deactivate(id,name)
  {         
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to deactivate "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deactivate it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      {
       
          $.get('/deactivate-account',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire(
                      {
                        type: "success",
                        title: 'Deactivated!',
                        text: 'The record has been deactivated.',
                        confirmButtonClass: 'btn btn-success',
                      }
                    )
              location.reload(true);
              
             }
            else
            { 
              Swal.fire("Cancelled", "Operation failed", "error");
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled", "Operation failed", "error"); 
        } });


  }

  function activate(id,name)
  {

  Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to activate "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, activate it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      {
       
          $.get('/activate-account',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire(
                      {
                        type: "success",
                        title: 'Activated!',
                        text: 'The record has been activated.',
                        confirmButtonClass: 'btn btn-success',
                      }
                    )
              location.reload(true);
              
             }
            else
            { 
              Swal.fire("Cancelled", "Operation failed", "error");
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled", "Operation failed", "error"); 
        } });

  }


    function deletePatient(id,name)
  {

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert deleting "+name+" ?", 
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      {
        $.get('/delete-patient',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
               
                    Swal.fire(
                      {
                        type: "success",
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                      }
                    )
              location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled", "Operation failed", "error");
              
            }
           
        });
                                          
          },'json'); 
       
      }
      else {     
          Swal.fire("Cancelled", "Operation failed", "error");   
        }
    });
  }


var account_no = null;
function getDetails(acct_no)
{ 
  account_no = acct_no;
  $.get("/edit-patient",
          {"patient_id":account_no},
          function(json)
          {

             
                 $('#modal_check_in input[name="patient_id"]').val(json.patient_id);
                $('#modal_check_in input[name="fullname"]').val(json.fullname);
                $('#modal_check_in select[name="accounttype"]').select2();
                $('#modal_check_in select[name="referal_doctor"]').select2();
                $('#modal_check_in select[name="consultation_type"]').select2();
                $('#modal_check_in select[name="visit_type"]').select2();
                $('#modal_check_in select[name="anaesthetist"]').select2();
                $('#modal_check_in select[name="sponsor"]').select2();
                $('#modal_check_in img[name="imagePreview"]').attr("src", '/images/'+json.image);


                getAge();
                loadRisk();
                
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

 


</script>
<script type="text/javascript">

function getVisitDetails()
{
 $.get('/get-visit-details',
        {

          "id": $('#request_visitid').val()
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
            //sweetAlert("Employee SSF : ", data["PatientName"], "info");
            $('#accounttype').val(data.AccountType);
            $('#request_patient_id').val(data.PatientID);
            $('#request_name').val(data.PatientName);
            $('#request_visitid').val(data.VisitID);

            //$('#drug_quantity').val("");
       
      });
                                        
        },'json');
}




</script>

 









