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
          <!-- Full calendar start -->
          <section id="basic-examples">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="cal-category-bullets d-none">
                                      <div class="bullets-group-1 mt-2">
                                          <div class="category-business mr-1">
                                              <span class="bullet bullet-success bullet-sm mr-25"></span>
                                              Arrived
                                          </div>
                                          <div class="category-work mr-1">
                                              <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                              Resheduled
                                          </div>
                                          <div class="category-personal mr-1">
                                              <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                              Pending
                                          </div>
                                          <div class="category-others">
                                              <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                              Others
                                          </div>
                                      </div>
                                  </div>
                                  <a href="#new-appointment-request" data-toggle="modal"> <button class="btn btn-primary mb-2 float-left"><i class="feather icon-plus"></i>&nbsp; Create new appointment</button></a>
                                  <a href="/event-list"> <button class="btn btn-success mb-2 float-left"><i class="feather icon-file"></i>&nbsp; List </button></a>
                                 
                                  <div id="fc-default" name="calendar"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              
             
          </section>
          <!-- // Full calendar end -->

      </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<div class="modal fade text-left" id="new-appointment-request" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel17">New Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/create-event" class="panel-body wrapper-lg">
              @include('event/create')
            </form>
          </div>
      </div>
  </div>
</div>

  @stop



  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>
  <script src="{{ asset('/event_components/moment.min.js')}}"></script> 
  <script src="{{ asset('/js/daterangepicker.js')}}"></script>






<script type="text/javascript">
$(function () {
  $('#time').daterangepicker({
     "daysOfWeek": ['Mo', 'Tu', 'We', 'Th', 'Fr'],
    "singleDatePicker":true,
    "autoApply": true,
    "showISOWeekNumbers": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "locale": {
     "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script> 




  