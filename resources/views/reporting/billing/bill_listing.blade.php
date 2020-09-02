@extends('layouts.default')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    
      <div class="content-body">
          <!-- Copy to clipboard Starts -->
          <Section id="copy-to-clipboard">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Bills</h4>
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="row">
                                    <iframe height="800px" width="100%" allowTransparency="true" frameborder="0" scrolling="yes" style="width:100%;" src="http://192.168.100.10:8080/jasperserver/flow.html?_flowId=viewReportFlow&reportUnit=/orionmedical/billlisting&decorate=no&j_username=jasperadmin&j_password=jasperadmin&viewAsDashboardFrame=false  
                                    " type= "text/javascript"></iframe>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </Section>
          <!-- Copy to clipboard Starts -->

      </div>
  </div>
</div>
<!-- END: Content-->
@stop