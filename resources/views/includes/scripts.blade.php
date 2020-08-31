

  <!-- BEGIN: Vendor JS-->
  <script src="{{ asset('/app-assets/vendors/js/vendors.min.js')}}"></script>

  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->

  <script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
  <!-- END: Page Vendor JS-->
  <!-- BEGIN: Theme JS-->
  <script src="{{ asset('/app-assets/js/core/app-menu.js')}}"></script>
  <script src="{{ asset('/app-assets/js/core/app.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/components.js')}}"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->

  {{-- <script src="{{ asset('/app-assets/js/scripts/pages/app-user.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/pages/user-profile.js')}}"></script> --}}
  <script src="{{ asset('/app-assets/js/scripts/extensions/toastr.js')}}"></script>
  {{-- <script src="{{ asset('/app-assets/js/scripts/pages/invoice.js')}}"></script> --}}
  <script src="{{ asset('/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

  <script src="{{ asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
  <script src="{{ asset('/js/toastr/toastr.js')}}"></script> 
 {{-- <script src="{{ asset('/js/sweetalert.min.js')}}"></script> --}}
 <script src="{{ asset('/js/moment.js')}}"></script>
<script src="{{ asset('/js/daterangepicker.js')}}"></script>
<script src="{{ asset('/js/libs/moment.min.js')}}"></script>
<script src="{{ asset('/js/combodate/combodate.js')}}"></script>



 <script src="{{ asset('/app-assets/vendors/js/extensions/moment.min.js')}}"></script> 
 <script src="{{ asset('/app-assets/vendors/js/calendar/fullcalendar.min.js')}}"></script> 
<script src="{{ asset('/app-assets/vendors/js/calendar/extensions/daygrid.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/calendar/extensions/timegrid.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/calendar/extensions/interactions.min.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script> 
  <script src="{{ asset('/app-assets/js/scripts/popover/popover.js')}}"></script>
  <script src="{{ asset('/app-assets/vendors/js/ui/prism.min.js')}}"></script> 
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="{{ asset('/app-assets/js/core/app-menu.js')}}"></script>
  <script src="{{ asset('/app-assets/js/core/app.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/components.js')}}"></script>
  <script src="{{ asset('/app-assets/js/scripts/forms/number-input.js')}}"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="{{ asset('/app-assets/js/scripts/extensions/fullcalendar.js')}}"></script>  

  <!-- END: Page JS-->

  <script>

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
  
    @if(Session::has('info'))
        toastr.success("{{ Session::get('info') }}");
    @endif
  
    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
  
    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
  
  </script>

  <!-- END: Page JS-->

