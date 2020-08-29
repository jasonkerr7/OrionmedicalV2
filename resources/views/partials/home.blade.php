 <!-- BEGIN: Content-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
          <!-- Dashboard Analytics Start -->
          <section id="dashboard-analytics">
              <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="card bg-analytics text-white">
                          <div class="card-content">
                              <div class="card-body text-center">
                                  <img src="../../../app-assets/images/elements/decore-left.png" class="img-left" alt="
      card-img-left">
                                  <img src="../../../app-assets/images/elements/decore-right.png" class="img-right" alt="
      card-img-right">
                                  <div class="avatar avatar-xl bg-primary shadow mt-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-award white font-large-1"></i>
                                      </div>
                                  </div>
                                  <div class="text-center">
                                      <h1 class="mb-2 text-white">Welcome {{ Auth::user()->getNameOrUsername() }},</h1>
                                      <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex flex-column align-items-start pb-0">
                              <div class="avatar bg-rgba-primary p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="feather icon-users text-primary font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="text-bold-700 mt-1 mb-25">{{ $customercount }}</h2>
                              <p class="mb-0">Registered Patients</p>
                          </div>
                          <div class="card-content">
                              <div id="subscribe-gain-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex flex-column align-items-start pb-0">
                              <div class="avatar bg-rgba-warning p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="feather icon-package text-warning font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="text-bold-700 mt-1 mb-25">{{ $visits }}</h2>
                              <p class="mb-0">Today's Visits</p>
                          </div>
                          <div class="card-content">
                              <div id="orders-received-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              

              <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="card-title">Account Type Revenue</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        <p class="mb-50 text-bold-600">Payments Made Today</p>
                                        <h2 class="text-bold-400">
                                            <sup class="font-medium-1">GHS</sup>
                                            <span class="text-success">{{ $payments }}</span>
                                        </h2>
                                    </div>
                                    <div>
                                        <p class="mb-50 text-bold-600">Bills Generated Today</p>
                                        <h2 class="text-bold-400">
                                            <sup class="font-medium-1">GHS</sup>
                                            <span>{{ $bills}}</span>
                                        </h2>
                                    </div>

                                </div>
                                @include('charts/bills') 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="mb-0">Goal Overview</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0 pb-0">
                                <div id="goal-overview-chart" class="mt-75"></div>
                                <div class="row text-center mx-0">
                                    <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">Completed</p>
                                        <p class="font-large-1 text-bold-700">786,617</p>
                                    </div>
                                    <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">In Progress</p>
                                        <p class="font-large-1 text-bold-700">13,561</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="card-title">Account Revenue</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0">
                               
                                @include('charts/businesssource')  
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="mb-0">Goal Overview</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0 pb-0">
                                <div id="goal-overview-chart" class="mt-75"></div>
                                <div class="row text-center mx-0">
                                    <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">Completed</p>
                                        <p class="font-large-1 text-bold-700">786,617</p>
                                    </div>
                                    <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">In Progress</p>
                                        <p class="font-large-1 text-bold-700">13,561</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>


            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="card-title">Department Revenue</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0">
                               
                                @include('charts/utilization')  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Department Statistics</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Dental</p>
                                        <h4>73%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>800 <i class="feather icon-arrow-up text-success"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Pharmacy</p>
                                        <h4>8%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">OPD</p>
                                        <h4>19%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>100 <i class="feather icon-arrow-up text-success"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="19" aria-valuemin="19" aria-valuemax="100" style="width:19%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">IPD</p>
                                        <h4>27%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-450 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-50">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="27" aria-valuemax="100" style="width:27%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Eye</p>
                                        <h4>8%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Labs</p>
                                        <h4>8%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Procedures</p>
                                        <h4>8%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
             

              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="mb-0">Upcoming Appointments</h4>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive mt-1">
                                  <table class="table table-hover-animation mb-0">
                                      <thead>
                                          <tr>
                                              <th>ORDER</th>
                                              <th>STATUS</th>
                                              <th>OPERATORS</th>
                                              <th>LOCATION</th>
                                              <th>DISTANCE</th>
                                              <th>START DATE</th>
                                              <th>EST DEL. DT</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>#879985</td>
                                              <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                                              <td class="p-1">
                                                  <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Julee Rossignol" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Darcey Nooner" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                  </ul>
                                              </td>
                                              <td>Anniston, Alabama</td>
                                              <td>
                                                  <span>130 km</span>
                                                  <div class="progress progress-bar-success mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                              </td>
                                              <td>14:58 26/07/2018</td>
                                              <td>28/07/2018</td>
                                          </tr>
                                          <tr>
                                              <td>#156897</td>
                                              <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>Pending</td>
                                              <td class="p-1">
                                                  <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Trina Lynes" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lilian Nenez" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Alberto Glotzbach" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                  </ul>
                                              </td>
                                              <td>Cordova, Alaska</td>
                                              <td>
                                                  <span>234 km</span>
                                                  <div class="progress progress-bar-warning mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                              </td>
                                              <td>14:58 26/07/2018</td>
                                              <td>28/07/2018</td>
                                          </tr>
                                          <tr>
                                              <td>#568975</td>
                                              <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                                              <td class="p-1">
                                                  <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lai Lewandowski" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Darcey Nooner" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Julee Rossignol" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Jeffrey Gerondale" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                  </ul>
                                              </td>
                                              <td>Florence, Alabama</td>
                                              <td>
                                                  <span>168 km</span>
                                                  <div class="progress progress-bar-success mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                              </td>
                                              <td>14:58 26/07/2018</td>
                                              <td>28/07/2018</td>
                                          </tr>
                                          <tr>
                                              <td>#245689</td>
                                              <td><i class="fa fa-circle font-small-3 text-danger mr-50"></i>Canceled</td>
                                              <td class="p-1">
                                                  <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                          <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                      </li>
                                                  </ul>
                                              </td>
                                              <td>Clifton, Arizona</td>
                                              <td>
                                                  <span>125 km</span>
                                                  <div class="progress progress-bar-danger mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                              </td>
                                              <td>14:58 26/07/2018</td>
                                              <td>28/07/2018</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- Dashboard Analytics end -->

      </div>
  </div>
</div>
<!-- END: Content-->