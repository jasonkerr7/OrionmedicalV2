
@extends('layouts.default')
@section('content')
<section id="content">
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
                                          <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Out Patient</span>
                                      </a>
                                  </li>
                                 
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                          <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">In Patient</span>
                                      </a>
                                  </li>
                                  
                                  <form action="/folder-history" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>
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
                                                            
                                                              <table class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                <tr>
                                                                <th></th>
                                                                  <th>Visit #</th>
                                                                  <th>Time In</th>
                                                                  <th>Patient Name</th>
                                                                  <th>Visit Type</th>
                                                                  <th>Practioner</th>
                                                                 
                                                                  <th>Care Provider</th>
                                                                   {{--  <th>Total Time</th> --}}
                                                                  <th>Check Out Time</th>
                                                                  {{-- <th>Last Updated By</th>
                                                                  <th>Status</th> --}}
                                                                  <th></th>
                                                                  <th></th>
                                                                  <th></th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              @foreach( $patients as $key => $patient )
                                                                <tr>
                                                                  <td> {{ ++$key }}</td>
                                                                  <td><a href="/patient-profile-limited/{{ $patient->patient_id }}"  id="edit" name="edit" data-toggle="modal" alt="edit">{{ $patient->opd_number }}</a></td>
                                                                  <td>{{ $patient->created_on->format('H:i:s - jS M Y') }}</td>
                                                                  <td>{{ $patient->name }}</td>
                                                                  <td>{{ $patient->consultation_type }}</td>
                                                                  <td>{{ $patient->referal_doctor }}</td>
                                                                  
                                                                  <td>{{$patient->payercode }}, {{ $patient->care_provider }}</td>
                                                                 
                                                                {{--   <td>{{ $patient->checkout_time->diffInHours($patient->created_on) }}</td> --}}
                                                                  <td>{{ $patient->checkout_time }}</td>
                                                                  {{-- <td>{{ $patient->updated_by }}</td>
                                                                  <td>{{ $patient->status }}</td>
                                                                   --}}
                                      
                                      
                                                                 <td><a href="#edit-visit" class="bootstrap-modal-form-open" onclick="getDetails('{{ $patient->opd_number }}')" id="edit" name="edit" data-toggle="modal"><i class="feather icon-edit-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Visit"></i></a></td>
                                                                  
                                                                  @if($patient->consultation_type=='WALK-IN LAB')
                                                                   <td><a href="/walkin-service/{{ $patient->opd_number }}"  class="btn btn-rounded btn-sm btn-info"><i class="feather icon-edit-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Investigation"> </i> </a></td>
                                                                  @elseif($patient->consultation_type=='WALK-IN DIAGNOSTIC')
                                                                   <td><a href="/walkin-service/{{ $patient->opd_number }}"  class="btn btn-rounded btn-sm btn-info" ><i class="fa fa-plus-square icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Investigation"> </i> </a></td>
                                                                   @elseif($patient->consultation_type=='WALK-IN PHARMACY')
                                                                   <td><a href="/walkin-service/{{ $patient->opd_number }}"  class="btn btn-rounded btn-sm btn-info"><i class="fa fa-flask" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Medication"> </i> </a></td>
                                                                  @else

                                                                  @endif
                                      
                                                                   @role(['Medical Records Manager','System Admin'])
                                                                  <td>
                                                                    <a href="#" class="active" onclick="doDelete('{{ $patient->id }}','{{ $patient->name }}')" data-toggle="class"><i class="feather icon-trash-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                                  </td>
                                                                  @endrole
                                      
                                                                   <td>
                                                                    <a href="#" class="active" onclick="doDischarge('{{ $patient->id }}','{{ $patient->name }}')" data-toggle="class"><i class="feather icon-power" data-toggle="tooltip" data-placement="top" title="" data-original-title="End Visit"></i></a>
                                                                  </td>
                                                                  
                                                                </tr>
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
                                      <div> Record(s) Found : {{ $patients->total() }} {{ str_plural('Patient', $patients->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$patients->render()!!}
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



  <div class="modal fade text-left" id="edit-visit" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Update Visit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/update-opd-detail" class="panel-body wrapper-lg">
                @include('opd/edit')
                
                <button type="submit" class="btn btn-primary mb-2 pull-right">Save</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
              </form>
            </div>
            
          
        </div>
    </div>
  </div>



@stop


<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#review_period span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#review_period').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
    
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
  



function doDelete(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to delete "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-opd',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deleted.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to delete.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

  }



  function doDischarge(id,name)
  {

         
      swal({   
        title: "Discharging " + name +"!",  
        text: "Do you want to discharge "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, discharge!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/discharge-opd',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Discharged!", name +" was successfully deleted.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to delete.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

  }


  function getAge()
{

    $.get('/patient-age-occupation',
        {

          "id": $('#patient_id').val()
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#age').val(data.age);
           $('#occupation').val(data.occupation);
          // $('#accounttype').val(data.accounttype);
       
      });
                                        
        },'json');
  
}

var account_no = null;
function getDetails(acct_no)
{ 

  //alert(acct_no);

  account_no = acct_no;
  $.get("/opd-details",
          {"opd_number":account_no},
          function(json)
          {
           

            


                $('#edit-visit input[name="patient_id"]').val(json.patient_id);
                $('#edit-visit input[name="fullname"]').val(json.fullname);
                $('#edit-visit input[name="opd_number"]').val(json.opd_number);
                $('#edit-visit select[name="accounttype"]').val(json.accounttype);
                 $('#edit-visit select[name="location"]').val(json.branch);
                $('#edit-visit img[name="imagePreview"]').attr("src", '/images/'+json.image);
                $('#edit-visit input[name="uuid"]').val(json.uuid);
                $('#edit-visit select[name="consultation_type"]').val(json.consultation_type);
                $('#edit-visit select[name="referal_doctor"]').val(json.referal_doctor);
                $('#edit-visit select[name="accounttype"]').select2();
                $('#edit-visit select[name="referal_doctor"]').select2();
                $('#edit-visit select[name="consultation_type"]').select2();
                $('#edit-visit select[name="visit_type"]').select2();
                $('#edit-visit select[name="location"]').select2();
                
                getAge();
                //loadRisk();
                loadBillState();

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
            //$('#accounttype').val(data.AccountType);
            $('#request_patient_id').val(data.PatientID);
            $('#request_name').val(data.PatientName);
            $('#request_visitid').val(data.VisitID);

            //$('#drug_quantity').val("");
       
      });
                                        
        },'json');
}




    function loadBillState()
   {
         
        
        $.get('/get-bill-state',
        {

          "patient_id": $('#patient_id').val()
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
            //sweetAlert("Employee SSF : ", data["PatientName"], "info");
            $('#last_visit_date').val(data.mylastvisit);
           $('#myoutstanding').val(data.myoutstanding);
            //$('#drug_quantity').val("");
       
      });
                                        
        },'json');
    }




</script>



