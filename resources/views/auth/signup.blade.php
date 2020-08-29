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
              <div class="col-xl-8 col-10 d-flex justify-content-center">
                  <div class="card bg-authentication rounded-0 mb-0">
                      <div class="row m-0">
                          <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                              <img src="/images/glogo.png" width="400px" height="300px" alt="branding logo">
                          </div>
                          <div class="col-lg-6 col-12 p-0">
                              <div class="card rounded-0 mb-0 p-2">
                                  <div class="card-header pt-50 pb-1">
                                      <div class="card-title">
                                          <h4 class="mb-0">Create Account</h4>
                                      </div>
                                  </div>
                                  <p class="px-2">Fill the below form to create a new account.</p>
                                  <div class="card-content">
                                      <div class="card-body pt-0">
                                          <form method="post" action="{{ route('auth.signup') }}">
                                              <div class="form-label-group">
                                                  <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Name" required>
                                                  <label for="inputName">Name</label>
                                              </div>
                                              <div class="form-label-group">
                                                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                                  <label for="inputEmail">Email</label>
                                              </div>
                                              <div class="form-label-group">
                                                <input type="text" id="location" name="location" class="form-control" placeholder="Location" required>
                                                <label for="inputName">Location</label>
                                            </div>
                                             <div class="form-label-group">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                                <label for="inputName">Username</label>
                                            </div>
                                              <div class="form-label-group">
                                                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                                  <label for="inputPassword">Password</label>
                                              </div>
                                              <div class="form-label-group">
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                                <label for="inputConfPassword">Confirm Password</label>
                                            </div>
                                              <div class="form-label-group">
                                                <select id="usertype" name="usertype" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control input-lg">
                                                  @foreach($roles as $role)
                                                   <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                   @endforeach
                                                 </select>
                                                <label for="inputPassword">Role</label>
                                            </div>
                                             
                                              <div class="form-group row">
                                                  <div class="col-12">
                                                      <fieldset class="checkbox">
                                                          <div class="vs-checkbox-con vs-checkbox-primary">
                                                              <input type="checkbox" checked>
                                                              <span class="vs-checkbox">
                                                                  <span class="vs-checkbox--check">
                                                                      <i class="vs-icon feather icon-check"></i>
                                                                  </span>
                                                              </span>
                                                              <span class=""> I accept the terms & conditions.</span>
                                                          </div>
                                                      </fieldset>
                                                  </div>
                                              </div>
                                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                                              <a href="/signin" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                              <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                          </form>
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


{{-- <!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>{{ $mycompany->name }} | Account Manager</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/animate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/js/toastr/toastr.css')}}" type="text/css" />
</head>

<body>

  <section id="content" class="m-t-lg wrapper-md animated fadeInDown" >
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="{{ route('auth.signin') }}">{{ $mycompany->name }} </a>
      <section class="panel panel-default m-t-lg bg-white">
        <header class="panel-heading text-center">
          <strong>Account Management</strong>
        </header>


        <form method="post" action="{{ route('auth.signup') }}" class="panel-body wrapper-lg">
          <div class="form-group">
           <div class="form-group{{ $errors->has('fullname') ? ' has-error' : ''}}">
            <label class="control-label">Name</label> 
            <input type="text" placeholder="eg. Your name or company" class="form-control input-lg" id="fullname" name="fullname">
             @if ($errors->has('fullname'))
          <span class="help-block">{{ $errors->first('fullname') }}</span>
            @endif
          </div>

           <div class="form-group">
           <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
            <label class="control-label">Email</label>
            <input type="email" placeholder="test@example.com" id="email" name="email" value="{{ Request::old('email') ?: '' }}" class="form-control input-lg">
              @if ($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="form-group">
          <div class="form-group{{ $errors->has('location') ? ' has-error' : ''}}">
            <label class="control-label">Location</label>
            <input type="text" placeholder="" class="form-control input-lg" id="location" name="location">
              @if ($errors->has('location'))
          <span class="help-block">{{ $errors->first('location') }}</span>
            @endif
          </div>


           <div class="form-group">
           <div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
            <label class="control-label">Username</label>
            <input type="text" placeholder="" class="form-control input-lg" id="username" name="username">
              @if ($errors->has('username'))
          <span class="help-block">{{ $errors->first('username') }}</span>
            @endif
          </div>

          <div class="form-group">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
            <label class="control-label">Password</label>
            <input type="password" placeholder="Type a password" class="form-control input-lg" id="password" name="password">
            @if ($errors->has('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
          </div>

           <div class="form-group">
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}}">
            <label class="control-label">Retype Password</label>
            <input type="password" placeholder="Retype password" class="form-control input-lg" id="password_confirmation" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
          <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
            @endif
          </div>
          
          

          <div class="form-group">
                            <div class="form-group{{ $errors->has('department') ? ' has-error' : ''}}">
                            <label>Role</label>
                            <select id="usertype" name="usertype" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control input-lg">
                          @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('usertype'))
                          <span class="help-block">{{ $errors->first('usertype') }}</span>
                           @endif    
                          </div>   
                          </div>

         
            <label class="checkbox">
                <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
            </label>
            <button class="btn btn-lg btn-login btn-block" class="btn btn-primary" type="submit">Submit</button>
            <div class="registration">
                Already Registered.
                <a class="" href="{{ route('auth.signin') }}">
                    Login
                </a>
            </div>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
       <small>@include('includes.appversion')</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="{{ asset('/js/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('/js/bootstrap.js')}}"></script>
  <!-- App -->
  <script src="{{ asset('/js/app.js')}}"></script>
  <script src="{{ asset('/js/app.plugin.js')}}"></script>
  <script src="{{ asset('/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.backstretch.min.js')}}"></script>
   <script>
          $.backstretch("{{ asset('images/download.png')}}", {speed: 500});
      </script>

  <script src="{{ asset('/js/toastr/toastr.js')}}"></script> 
  
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
</body>
</html> --}}