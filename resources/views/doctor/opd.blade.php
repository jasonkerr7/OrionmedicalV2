
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
                                          <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Recently Seen</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Seen By Me</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                          <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Inpatient</span>
                                      </a>
                                  </li>

                                    <!-- Inputs Group with Buttons -->
                                   
                                  <div class="col-md-6 col-12 mb-1">
                                    <form action="/find-patient-folder" method="GET">
                                      <fieldset>
                                          <div class="input-group">
                                            
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                              
                                              <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary" type="button"><i class="feather icon-search"></i></button>
                                              </div>
                                              &nbsp;&nbsp;&nbsp;&nbsp;
                                              <input type="text" name='review_period' id='review_period' class="input-sm form-control round" placeholder="Search by patient, test, status">
                                          </div>
                                          
                                      </fieldset>
                                      
                                    </form> 
                                  </div>
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
                                                                        <th scope="col">Visit Number</th>
                                                                        <th scope="col">Check In Time</th>
                                                                        <th scope="col">Patient</th>
                                                                        <th scope="col">Complaint</th>
                                                                        <th scope="col">Consultation Type</th>
                                                                        <th scope="col">Doctor</th>
                                                                        <th scope="col">Care Provider</th>
                                                                        <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach( $patients as $patient )
                                                                  <tr>
                                                                      <td><a href="/patient-profile/{{ $patient->patient_id }}"  id="edit" name="edit" data-toggle="modal" alt="edit">{{ $patient->opd_number }}</a></td>
                                                                      <td>{{ $patient->created_on->format('H:i:s - jS M Y') }}</td>
                                                                      <td>{{ ucwords(strtolower($patient->name)) }}</td>
                                                                      <td>{{ $patient->chief_complaint }}</td>
                                                                      <td>{{ $patient->consultation_type }}</td>
                                                                      <td>{{ $patient->referal_doctor }}</td>
                                                                      <td>{{$patient->payercode }} , {{ $patient->care_provider }}</td>
                                                                      <td><a href="/consultation/{{ $patient->opd_number }}" class="badge badge-pill badge-glow badge-success mr-1 mb-1"> Review </a></td>
                                                                   
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

@stop



<script src="{{ asset('/event_components/jquery.min.js')}}"></script>



 <script type="text/javascript">
// setTimeout(function() {
//   location.reload();
// }, 30000);
 </script>



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




   
 <script>

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
           $('#accounttype').val(data.accounttype);
       
      });
                                        
        },'json');
  
}

var account_no = null;
function getDetails(visitid,patientid)
{ 

  $.get("/opd-details",
          {
            "opd_number" : visitid
            
          },
          function(json)
          {

                //alert(json.haha);
                $('#review-patient input[name="patient_id"]').val(json.patient_id);
                $('#review-patient input[name="fullname"]').val(json.fullname);
                $('#review-patient input[name="opd_number"]').val(json.opd_number);
                $('#review-patient input[name="pulse_rate"]').val(json.pulse_rate);
                $('#review-patient input[name="blood_pressure"]').val(json.blood_pressure);
                $('#review-patient input[name="respiration"]').val(json.respiration);
                $('#review-patient input[name="height"]').val(json.bmi_height);
                $('#review-patient input[name="weight"]').val(json.bmi_weight);
                $('#review-patient input[name="temperature"]').val(json.temperature);
                $('#review-patient input[name="bmi"]').val(json.bmi_weight/(json.bmi_height*json.bmi_height));
                $('#review-patient input[name="consultation_title"]').val(json.consultant_doctor);
                $('#review-patient select[name="complaint"]').select2();
                $('#review-patient select[name="investigation"]').select2();
                $('#review-patient select[name="diagnosis"]').select2();
                $('#review-patient select[name="diagnosis_category"]').select2();
                $('#review-patient select[name="procedure"]').select2();
                $('#review-patient select[name="medication"]').select2();
                $('#review-patient select[name="drug_quantity"]').select2();
                $('#review-patient select[name="history"]').select2();
                $('#review-patient select[name="drug_frequency"]').select2();
                $('#review-patient select[name="drug_dosage"]').select2();
                $('#review-patient select[name="drug_application"]').select2();
                $('#review-patient select[name="drug_days"]').select2();
                $('#review-patient select[name="drug_period"]').select2();
                $('#review-patient input[name="selectedid"]').val(json.patient_id);

                $('#review-patient img[name="imagePreview"]').attr("src", '/images/'+json.patient_id+'.jpg');
                $('#review-patient a[name="visitid"]').attr("href", '/print-prescription/'+json.opd_number);
                loadMedication();
                loadComplaints();
                loadInvestigation();
                loadDiagnosis();
                loadProcedure();
                loadHistory();
                getAge();
                loadDocumentDetail();

          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function addComplaint()
{
if($('#complaint').val()!= "")
{

    $.get('/add-complaint',
        {
          "opd_number": $('#opd_number').val(),
          "complaint": $('#complaint').val(),
          "com_period": $('#com_period').val(),
          "com_span":  $('#com_span').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Complaint has been added!");
          loadComplaints();
        }
        else
        {
          sweetAlert("Complaint failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please add a complaint!");}
}

function addDrug()
{
if($('#medication').val()!= "" && $('#drug_quantity').val()!="")
{

    $.get('/add-medication',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "medication": $('#medication').val(),
          "fullname":  $('#fullname').val(),
          "drug_quantity": $('#drug_quantity').val(),
          "drug_dosage": $('#drug_dosage').val(),
          "drug_application": $('#drug_application').val(),
          "drug_frequency": $('#drug_frequency').val(),
          "drug_days": $('#drug_days').val(),
          "drug_span": $('#drug_span').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Drug has been forwarded to pharmacy!");
          loadMedication();
        }
        else
        {
          sweetAlert("Drug failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a drug!");}
}

function addVitals()
{
if($('#weight').val()!= "" && $('#height').val()!="")
{

    $.get('/add-vitals',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "weight": $('#weight').val(),
          "height": $('#height').val(),
          "waist_circumference": $('#waist_circumference').val(),
          "hip_circumference":  $('#hip_circumference').val(),
          "frame": $('#frame').val(),
          "b_fat": $('#b_fat').val(),
          "v_fat": $('#v_fat').val(),
          "pulse_rate": $('#pulse_rate').val(),
          "blood_pressure": $('#blood_pressure').val(),
          "respiration": $('#respiration').val(),
          "temperature": $('#temperature').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Vital parameters added!");
        }
        else
        {
          sweetAlert("Vital parameters failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please enter weight and height!");}
}

function addInvestigation()
{
if($('#investigation').val()!= "")
{

    $.get('/add-investigation',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "investigation": $('#investigation').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Investigation has been forwarded to Lab!");
          loadInvestigation();
          $('#investigation').val()!= ""
        }
        else
        {
          sweetAlert("Investigation failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select an Investigation!");}
}

function addProcedure()
{
if($('#procedure').val()!= "")
{

    $.get('/add-procedure',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "procedure": $('#procedure').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Procedure has been forwarded!");
          loadProcedure();
        }
        else
        {
          sweetAlert("Procedure failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a Procedure!");}
}


function addDiagnosis()
{
if($('#diagnosis').val()!= "")
{

    $.get('/add-diagnosis',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "diagnosis": $('#diagnosis').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("Diagnosis added!");
          loadDiagnosis();
        }
        else
        {
          sweetAlert("Diagnosis failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a Diagnosis!");}
}


function addHistory()
{
if($('#history').val()!= "")
{

    $.get('/add-history',
        {
          "patient_id": $('#patient_id').val(),
          "opd_number": $('#opd_number').val(),
          "history": $('#history').val(),
          "fullname":  $('#fullname').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          sweetAlert("History added!");
          loadHistory();
        }
        else
        {
          sweetAlert("History failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select a social or family history!");}
}




function loadDocumentDetail()
   {
         
        
        $.get('/load-document-details',
          {
            "patient_id": $('#patient_id').val()
          },
          function(data)
          { 

            $('#DocumentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#DocumentTable tbody').append('<tr><td>'+ value['filename'] +'</td><td>'+ value['original_name'] +'</td><td>'+ value['size'] +'</td><td>'+ value['created_on'] +'</td><td><a a href="/uploads/images/'+ value['filepath'] +'"><i onclick="/uploads/images/'+ value['filepath'] +'" class="fa fa-eye"></i></a></td><td><a a href="#"><i onclick="deleteDocument(\''+value['id']+'\',\''+value['filename']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }




function loadMedication()
   {
         
        
        $.get('/patient-medication',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#drugTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#drugTable tbody').append('<tr><td>1</td><td>'+ value['drug_name'] +'</td><td>'+ value['drug_cost'] +'</td><td><a a href="#"><i onclick="removeMedication(\''+value['id']+'\',\''+value['drug_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



function loadComplaints()
   {
         
        
        $.get('/patient-complaint',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#complaintTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#complaintTable tbody').append('<tr><td>'+ value['complaint'] +'</td><td>'+ value['period'] +' '+ value['span'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removecomplain(\''+value['id']+'\',\''+value['complaint']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


function loadInvestigation()
   {
         
        
        $.get('/patient-investigation',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#investigationsTable tbody').empty();
            $.each(data, function (key, value) 
            {           
           $('#investigationsTable tbody').append('<tr><td>'+ value['investigation'] +'</td><td>'+ value['cost'] +'</td><td>'+ value['created_on'] +'</td><td>'+ value['status'] +'</td><td><a a href="/view-lab-request/'+value['id']+'"><i onclick="" class="fa fa-eye"></i></a></td><td><a a href="#"><i onclick="removeinvestigation(\''+value['id']+'\',\''+value['investigation']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

function loadDiagnosis()
   {
         
        
        $.get('/patient-diagnosis',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#diagnosisTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#diagnosisTable tbody').append('<tr><td>'+ value['diagnosis'] +'</td><td>'+ value['remark'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removediagnosis(\''+value['id']+'\',\''+value['diagnosis']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


      function loadDiagnosisDescription()
    {
         
        
        $.get('/load-dignosis-description',
          {
            "diagnosis_category": $('#diagnosis_category').val()
          },
          function(data)
          { 

            $('#diagnosis').empty();
            $.each(data, function () 
            {           
            $('#diagnosis').append($('<option></option>').val(this['type']).html(this['type']));
            });
                                          
         },'json');      
    }


    function loadProcedure()
   {
         
        
        $.get('/patient-procedure',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#procedureTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#procedureTable tbody').append('<tr><td>'+ value['procedure'] +'</td><td>'+ value['cost'] +'</td><td>'+ value['created_on'] +'</td><td>'+ value['status'] +'</td><td><a a href="#"><i onclick="removeprocedure(\''+value['id']+'\',\''+value['procedure']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadHistory()
   {
         
        
        $.get('/patient-history',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#historyTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#historyTable tbody').append('<tr><td>'+ value['history'] +'</td><td><a a href="#"><i onclick="removeHistory(\''+value['id']+'\',\''+value['history']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadImages()
   {
         
        
        $.get('/patient-imaging',
          {
            "opd_number": $('#opd_number').val()
          },
          function(data)
          { 

            $('#ImageTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ImageTable tbody').append('<tr><td>'+ value['diagnosis'] +'</td><td>'+ value['remark'] +'</td><td>'+ value['date'] +'</td><td><a a href="#"><i onclick="removediagnosis(\''+value['id']+'\',\''+value['diagnosis']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }




  function removeMedication(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the prescription list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-medication',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from prescription list.", "success"); 
              loadMedication();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from prescription.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from prescription.", "error");   
        } });

    
   }

    function removeHistory(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the social/family history?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-history',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from history list.", "success"); 
              loadHistory();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from history.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from history.", "error");   
        } });

    
   }




   function removediagnosis(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-diagnosis',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from list.", "success"); 
              loadDiagnosis();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });
   }
function removeinvestigation(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-investigation',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from list.", "success"); 
              loadInvestigation();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }


function removeprocedure(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-procedure',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from list.", "success"); 
              loadProcedure();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }

   function removecomplain(id,name)
   {

      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-complaint',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from list.", "success"); 
              loadComplaints();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }





</script>

<script type="text/javascript">
  
  function doDischarge(id,name)
  {

  swal({
  title: "Discharging " + name +"!",
  //text: "Enter discharge comment:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Enter discharge comment"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to enter discharge comment!");
    return false
  }
  
  else
  {
    $.get('/process-commission',
          {
             "ID": id,
             "amountpaid": inputValue  
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Discharged!", name +" was successfully processed.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Failed", name +" failed to process.", "error");
              
            }
           
        });
                                          
          },'json');    
  }
});

}


</script>






 
