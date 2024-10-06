<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <title>GMCA Admin</title>
    <link href="{{asset('assets/admin/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/static/logo.png') }}">


  </head>

  <body>
    {{-- <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div> --}}
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="/admin">
              <b class="logo-icon ps-2">
              </b>
              <span class="logo-text ms-2">
                GMCA ADMIN
              </span>
            </a>
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
              </li>
              
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <li class="me-4"><a href="/admin/profile">profile</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
    
                    @if(session('role') === 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/admins" aria-expanded="false">
                            <i class="mdi mdi-account-tie"></i>
                            <span class="hide-menu">Admins</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/faculties" aria-expanded="false">
                          <i class="mdi mdi-human-male-board-poll"></i>
                          <span class="hide-menu">Faculties</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/news" aria-expanded="false">
                            <i class="mdi mdi-newspaper"></i>
                            <span class="hide-menu">Notice</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/webportal" aria-expanded="false">
                            <i class="mdi mdi-account-wrench-outline"></i>
                            <span class="hide-menu">Web Portal</span>
                        </a>
                    </li>
                    @endif
    
                    
    
                    @if(session('role') === 'admin' || session('role') === 'faculty' || session('role') === 'clubco')
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/students" aria-expanded="false">
                          <i class="mdi mdi-account-school"></i>
                          <span class="hide-menu">Students</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/events" aria-expanded="false">
                            <i class="mdi mdi-calendar-clock"></i>
                            <span class="hide-menu">Events</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/gallery" aria-expanded="false">
                          <i class="mdi mdi-image-multiple"></i>
                          <span class="hide-menu">Gallery</span>
                      </a>
                    </li>
                    
                    @endif
                    @if(session('role') === 'faculty')
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/experience" aria-expanded="false">
                          <i class="mdi mdi-image-multiple"></i>
                          <span class="hide-menu">Work Experience</span>
                      </a>
                    </li>
                   
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/education" aria-expanded="false">
                          <i class="mdi mdi-image-multiple"></i>
                          <span class="hide-menu">Education Qualification</span>
                      </a>
                    </li>
                    
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/training" aria-expanded="false">
                          <i class="mdi mdi-image-multiple"></i>
                          <span class="hide-menu">Training Workshop</span>
                      </a>
                    </li>
                   
                    <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/expert-lecture" aria-expanded="false">
                          <i class="mdi mdi-image-multiple"></i>
                          <span class="hide-menu">Expert Lecture</span>
                      </a>
                    </li>
                    
                    @endif
    
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/logout" aria-expanded="false">
                            <i class="mdi mdi-logout"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
      <div>
      </div>
    </div>
  