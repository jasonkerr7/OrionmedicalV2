<html lang="en" class="app">
@include('includes.head')
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  menu-collapsed blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
          <section class="row flexbox-container">
              <div class="col-xl-8 col-11 d-flex justify-content-center">
                  <div class="card bg-authentication rounded-0 mb-0">
                      <div class="row m-0">
                          <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                              <img src="/images/glogo.png"  width="400px" height="300px" alt="branding logo">
                          </div>
                          <div class="col-lg-6 col-12 p-0">
                              <div class="card rounded-0 mb-0 px-2">
                                  <div class="card-header pb-1">
                                      <div class="card-title">
                                          <h4 class="mb-0"> Login - {{ $mycompany->name }}</h4>
                                      </div>
                                  </div>
                                  <p class="px-2">Welcome back, please login to your account.</p>
                                  <div class="card-content">
                                      <div class="card-body pt-1">
                                          <form method="post" action="{{ route('auth.signin') }}">
                                              <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                                  <div class="form-control-position">
                                                      <i class="feather icon-user"></i>
                                                  </div>
                                                  <label for="username">Username</label>
                                              </fieldset>

                                              <fieldset class="form-label-group position-relative has-icon-left">
                                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                  <div class="form-control-position">
                                                      <i class="feather icon-lock"></i>
                                                  </div>
                                                  <label for="password">Password</label>
                                              </fieldset>
                                              <div class="form-group d-flex justify-content-between align-items-center">
                                                  <div class="text-left">
                                                      <fieldset class="checkbox">
                                                          <div class="vs-checkbox-con vs-checkbox-primary">
                                                              <input type="checkbox">
                                                              <span class="vs-checkbox">
                                                                  <span class="vs-checkbox--check">
                                                                      <i class="vs-icon feather icon-check"></i>
                                                                  </span>
                                                              </span>
                                                              <span class="">Remember me</span>
                                                          </div>
                                                      </fieldset>
                                                  </div>
                                                  <div class="text-right"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                              </div>
                                              <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                                              <button type="submit" id="login" name="login" class="btn btn-primary float-right btn-inline">Login</button>
                                          </form>
                                      </div>
                                  </div>
                                  <div class="login-footer">
                                      <div class="divider">
                                          <div class="divider-text">OR</div>
                                      </div>
                                      <div class="footer-btn d-inline">
                                          <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                          <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                          <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                          <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      </div>
  </div>
</div>

<!-- END: Content-->
@include('includes.scripts')

</body>
</html>


