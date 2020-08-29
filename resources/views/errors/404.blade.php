@extends('layouts.default')
@section('content')
<!-- BEGIN: Body-->
  <!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- error 404 -->
              <section class="row flexbox-container">
                  <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                      <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                          <div class="card-content">
                              <div class="card-body text-center">
                                  <img src="/images/broken.png" class="img-fluid align-self-center" alt="branding logo">
                                  <h1 class="font-large-2 my-1">404 - Page Not Found!</h1>
                                  
                                  <a class="btn btn-primary btn-lg mt-2" href="dashboard">Back to Home</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- error 404 end -->

          </div>
      </div>
  </div>
  <!-- END: Content-->
  @stop