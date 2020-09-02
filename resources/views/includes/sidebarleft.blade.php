  @role(['Receptionist','System Admin','Billing','Doctor','Imaging','Nurse','Medical Records Manager','Medical Records Assistant','Medical Assistant','Cashier','Marketing','Purchases','Laboratory','Pharmacy Technician','Pharmacist','Dentist','Ophthalmologist','Dietian','Specialist','Dental Nurse','Dental Receptionist','Nurse Assistant','Special Admin','Claims Manager'])
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
              <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-collapsed-menu-template/index.html">
                      {{-- <div class="brand-logo"></div> --}}
                      {{-- <img src="/images/glogo.png"  width="50px" height="50px" alt="branding logo"> --}}
                      <h2 class="brand-text mb-0">{{ $mycompany->name }}</h2>
                  </a></li>
              <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
          </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item"><a href="/dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                  <ul class="menu-content">
                      <li class="active"><a href="/dashboard"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                      </li>
                  </ul>
              </li>
              <li class=" navigation-header"><span>OPD</span>
              </li>
              <li class=" nav-item"><a href="/active-patients"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Email">Search</span></a>
              </li>
              <li class=" nav-item"><a href="/active-patients"><i class="feather icon-user-plus"></i><span class="menu-title" data-i18n="Email">Registration</span></a>
              </li>
              <li class=" nav-item"><a href="/waiting-opd"><i class="feather icon-share-2"></i><span class="menu-title" data-i18n="Email">Waiting List</span></a>
              </li>
              <li class=" nav-item"><a href="/event-calendar"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Calender">Appointments</span></a>
              </li>
              <li class=" nav-item"><a href="app-calender.html"><i class="feather icon-copy"></i><span class="menu-title" data-i18n="Calender">Insights</span></a>
              </li>
              <li class=" nav-item"><a href="/medical-reports"><i class="feather icon-activity"></i><span class="menu-title" data-i18n="Calender">Reports</span></a>
              </li>
              <li class=" nav-item"><a href="/manage-users"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Calender">Users</span></a>
              </li>
             
            
             
             
              <li class=" navigation-header"><span>Manage</span>
              </li>
              <li class=" nav-item"><a href="/opd-consultation"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Patients</span></a>
              </li>

              @role(['Pharmacist','Pharmacy Assistant','System Admin'])
              <li class=" nav-item"><a href="/prescriptions-pending"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Pharmacy</span></a>
              </li>
              @endrole

              <li class=" nav-item"><a href="/consumables-list"><i class="feather icon-help-circle"></i><span class="menu-title" data-i18n="FAQ">Stores</span></a>
              </li>

              @role(['Laboratory','System Admin'])
              <li class=" nav-item"><a href="/laboratory"><i class="feather icon-info"></i><span class="menu-title" data-i18n="Knowledge Base">Lab Orders</span></a>
              </li>
              @endrole
              
              @role(['Imaging','System Admin'])
              <li class=" nav-item"><a href="/imaging"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Search">Imaging Orders</span></a>
              </li>
              @endrole

              <li class=" nav-item"><a href="page-invoice.html"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Invoice">Tasks</span></a>
              </li>

              @role(['Billing','System Admin'])
              <li class=" nav-item"><a href="/billing-index"><i class="feather icon-layers"></i><span class="menu-title" data-i18n="Invoice">Manage Bills</span></a>
              </li>
              <li class=" nav-item"><a href="/service-charges"><i class="feather icon-command"></i><span class="menu-title" data-i18n="Invoice">Tariff and Scheme Management</span></a>
              </li>
              
              @endrole

              @role(['Claims Manager','System Admin'])
              <li class=" nav-item"><a href="/insurance-claims-portal"><i class="feather icon-umbrella"></i><span class="menu-title" data-i18n="Invoice">Claims</span></a>
              </li>
              @endrole
              
              
             
       
             
              <li class="disabled nav-item"><a href="#"><i class="feather icon-eye-off"></i><span class="menu-title" data-i18n="Disabled Menu">Disabled Menu</span></a>
              </li>
              <li class=" navigation-header"><span>Support</span>
              </li>
              <li class=" nav-item"><a href="#"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
              </li>
              <li class=" nav-item"><a href="#"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">Raise Support</span></a>
              </li>
          </ul>
      </div>
  </div>
  <!-- END: Main Menu-->

@endrole  