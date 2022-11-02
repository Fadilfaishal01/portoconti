<header class="topbar" data-navbarbg="skin6">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
         <div class="navbar-header" data-logobg="skin6">
             <!-- ============================================================== -->
             <!-- Logo -->
             <!-- ============================================================== -->
             <a class="navbar-brand ms-4" href="index.html">
                 <!-- Logo icon -->
                 <b class="logo-icon">
                     <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                     <!-- Dark Logo icon -->
                     <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" />

                 </b>
                 <!--End Logo icon -->
                 <!-- Logo text -->
                 <span class="logo-text">
                     <!-- dark Logo text -->
                     <img src="{{ asset('assets/images/logo-siarsi.png') }}" alt="homepage" class="dark-logo" width="80px" />
                 </span>
             </a>
             <!-- ============================================================== -->
             <!-- End Logo -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- toggle and nav items -->
             <!-- ============================================================== -->
             <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                 href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
             <ul class="navbar-nav d-lg-none d-md-block ">
                 <li class="nav-item">
                     <a class="nav-toggler nav-link waves-effect waves-light text-white "
                         href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                 </li>
             </ul>
             <!-- ============================================================== -->
             <!-- toggle and nav items -->
             <!-- ============================================================== -->
             <ul class="navbar-nav me-auto mt-md-0 ">
                 <!-- ============================================================== -->
                 <!-- Search -->
                 <!-- ============================================================== -->
             </ul>

             <!-- ============================================================== -->
             <!-- Right side toggle and nav items -->
             <!-- ============================================================== -->
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle waves-effect waves-dark"
                  href="#"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <img
                    src="{{ asset('assets/images/users') }}/default.png"
                    alt="user"
                    width="30"
                    class="profile-pic rounded-circle"
                  />
                </a>
                <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                  <div class="d-flex no-block align-items-center p-3 bg-info text-white mb-2">
                    <div class="">
                      <img
                        src="{{ asset('assets/images/users') }}/default.png"
                        alt="user"
                        class="rounded-circle"
                        width="50"
                      />
                    </div>
                    <div class="ms-2">
                      <h4 class="mb-0 text-white">{{ Auth::user()->getProfile->pNama }}</h4>
                      <p class="mb-0">{{ Auth::user()->email }}</p>
                    </div>
                  </div>
                  <a class="dropdown-item" href="{{ route('logout') }}">
                    <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
         </div>
     </nav>
 </header>