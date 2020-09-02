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
                                          <h4 class="mb-0">Update Account Details | {{ $mycompany->name }}</h4>
                                      </div>
                                  </div>
                                  <p class="px-2">Fill the below form to create a new account.</p>
                                  <div class="card-content">
                                      <div class="card-body pt-0">
                                          <form method="post" action="/update-user">
                                              <div class="form-label-group">
                                                  <input type="text" id="fullname" name="fullname" value="{{ $user->fullname }}" class="form-control" placeholder="Name" required>
                                                  <label for="inputName">Name</label>
                                              </div>
                                              <div class="form-label-group">
                                                  <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email" required>
                                                  <label for="inputEmail">Email</label>
                                              </div>
                                              <div class="form-label-group">
                                                <input type="text" id="location" name="location" value="{{ $user->location }}" class="form-control" placeholder="Location" required>
                                                <label for="inputName">Location</label>
                                            </div>
                                             <div class="form-label-group">
                                                <input type="text" id="username" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username" required>
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
                                                  <option value="{{ $user->usertype }}">{{ $user->usertype }}</option>
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
                                              <input type="hidden" name="userid" id="userid" value="{{ $user->id }}">
                                              <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Update</a>
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