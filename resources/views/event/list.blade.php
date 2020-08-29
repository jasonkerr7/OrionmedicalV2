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
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Pending</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Rescheduled</span>
                                      </a>
                                  </li>
                                 
                                  
                                  <form action="/find-appointment" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>

                                 <a href="#"> <button class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Create new appointment</button></a>
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
                                                                      
                                                                      <th>Time In</th>
                                                                      <th>Patient</th>
                                                                      <th>Mobile Number</th>
                                                                      <th>Appointment</th>
                                                                      <th>Doctor to see</th>
                                                                      <th>From</th>
                                                                      <th>To</th>
                                                                      <th>Action</th>
                                                                      <th></th>
                                                                      <th></th>
                                                                      <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($events as $event)
                                                                  <tr>
                                                                  <td>{{ $event->start_time->diffForHumans() }}</td>
                                                                  <td>{{ ucwords(strtolower($event->name)) }}</td>
                                                                  <td>{{ $event->mobile_number }}</td>
                                                                  <td>{{ ucwords(strtolower($event->title)) }}</td>
                                                                  <td>{{ ucwords(strtolower($event->doctor)) }}</td>
                                                                  <td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
                                                                  <td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
                                                                  <td>
                                                                  <div class="input-group-btn">
                                                                                    
                                                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">{{ $event->status }} <span class="caret"></span>
                                                                                    </button>
                                                                                    <ul class="dropdown-menu pull-right">
                                                                                    @foreach($statuses as $status)
                                                                                    <li><a onclick="updateStatus('{{ $event->id }}','{{ $status->type }}')">{{ $status->type }}</a></li>
                                                                                    @endforeach
                                                                                    </ul>
                                                                    </div>
                                                                  </td>

                                                                  <td> <a href="http://web.whatsapp.com//send?text=Hello {{ ucwords(strtolower($event->name)) }} you have an appointment booked with {{ ucwords(strtolower($event->doctor)) }} at {{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}. Please text YES to confirm.&phone=233{{$event->mobile_number}}" target="_new" class="btn btn-s-md btn-danger btn-rounded" >Send Message</a> </td>


                                                                  <td><a href="/appointment-slip/{{ $event->id }}" id="print" name="print"><i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print App Slip"></i></a>
                                                                  </td>

                                                                  <td><a href="#edit-event" class="bootstrap-modal-form-open" id="editappointment" onclick="editAppointment('{{ $event->id }}')" name="editappointment" data-toggle="modal" alt="edit"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                                  </td>

                                                                  <td><a href="#" class="bootstrap-modal-form-open" onclick="deleteappointment('{{ $event->id }}','{{ $event->title }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
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
                                      <div> Record(s) Found : {{ $events->total() }} {{ str_plural('Appointment', $events->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$events->render()!!}
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


  <div class="modal fade" id="modal_create_event" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Appointment</h4>
        </div>
        <div class="modal-body">
          
                      <section class="vbox">
                    
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-event" class="panel-body wrapper-lg">
                          @include('event/create')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </form>
                        </div>
                        </div>
                    </section>
                  </section>
        </div>
     
    </div><!-- /.modal-dialog -->
  </div>
  </div>

  <div class="modal fade" id="edit-event" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Appointment</h4>
        </div>
        <div class="modal-body">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/update-event" class="panel-body wrapper-lg">
                              @include('event/edit')
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                        </div>
                    </section>
                  </section>
        </div>
    </div><!-- /.modal-dialog -->
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
	$('#modal_create_event input[name="time"]').daterangepicker({
		"minDate": moment('2016-06-14 0'),
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>

<script >

var account_no = null;
function editAppointment(id)
{ 
 
  $.get("/edit-appointment",
          {"id":id},
          function(json)
          {

                $('#edit-event input[name="name"]').val(json.appointmentname);
                $('#edit-event input[name="title"]').val(json.appointmenttype);
                $('#edit-event input[name="time"]').val(json.appointmenttime);
                 $('#edit-event input[name="referal_doctor"]').val(json.appointmentdoctor);
                 $('#edit-event input[name="id"]').val(json.appointmentid);
              


          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function loadRisk()
   {
         
        
        $.get('/load-account',
          {
            "patient_id": $('#patient_id').val()
          },
          function(data)
          { 

            $('#accounttype').empty();
            $.each(data, function () 
            {           
            $('#accounttype').append($('<option></option>').val(this['accounttype']).html(this['accounttype']));
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

function deleteappointment(id,name)
  {

      //alert(id);

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
          $.get('/delete-appointment',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deleted from store.", "success"); 
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


  function updateStatus(id,status)
{
if($('#appstatus').val()!= "")
{

    //alert(status);

    $.get('/update-appointment-status',
        {
          "id": id,
          "status": status,                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          location.reload(true);
           toastr.success("Appointment status changed!");
           
        }
        else
        {
          toastr.error("Error updating appointment status!");
        }
      });
                                        
        },'json');
  }
  else
    {toastr.error("Please check selecction!");}
}
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






