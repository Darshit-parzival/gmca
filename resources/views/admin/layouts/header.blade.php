<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <title>GMCA Admin</title>
    <link href="{{asset('assets/admin/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet"/>
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="/admin">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
              
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                GMCA ADMIN
              </span>
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/admins"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-tie"></i
                  ><span class="hide-menu">Admins</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/faculties"
                  aria-expanded="false"
                  ><i class="mdi mdi-human-male-board-poll"></i
                  ><span class="hide-menu">Faculties</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/events"
                  aria-expanded="false"
                  ><i class="mdi mdi-calendar-clock"></i
                  ><span class="hide-menu">Events</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/gallery"
                  aria-expanded="false"
                  ><i class="mdi mdi-image-multiple"></i
                  ><span class="hide-menu">Gallery</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/news"
                  aria-expanded="false"
                  ><i class="mdi mdi-newspaper"></i
                  ><span class="hide-menu">Notice</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/webportal"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-wrench-outline"></i
                  ><span class="hide-menu">Web Portal</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/students"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-school"></i
                  ><span class="hide-menu">Students</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Forms </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="form-basic.html" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Form Basic </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="form-wizard.html" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Form Wizard </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-face"></i
                  ><span class="hide-menu">Icons </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="icon-material.html" class="sidebar-link"
                      ><i class="mdi mdi-emoticon"></i
                      ><span class="hide-menu"> Material Icons </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="icon-fontawesome.html" class="sidebar-link"
                      ><i class="mdi mdi-emoticon-cool"></i
                      ><span class="hide-menu"> Font Awesome Icons </span></a
                    >
                  </li>
                </ul>
              </li>
          
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Main Content  -->
      <!-- ============================================================== -->
      <div>

      </div>
      <!-- ============================================================== -->
      <!-- End Main Content  -->
      <!-- ============================================================== -->
    </div>
    <!-- =================================
     ============================= -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   