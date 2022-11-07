<aside class="left-sidebar" data-sidebarbg="skin6">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard.index') }}" aria-expanded="false">
                    <i class="fas fa-gauge"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Dasbor</span></a>
                </li>
                {{-- <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Master Data</span>
                </li> --}}
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark @if(Request::routeIs('master-data.*')) active @endif"
                      href="javascript:void(0)"
                      aria-expanded="false"
                    >
                        <i class="fa fa-database"></i>&nbsp;&nbsp;
                        <span class="hide-menu">Master Data </span>&nbsp;&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level mt-1 @if(Request::routeIs('web-config.*')) in @endif">
                        <li class="sidebar-item @if(Request::routeIs('master-data.pendidikan.*')) active @endif">
                            <a href="{{ route('master-data.pendidikan.index') }}" class="sidebar-link">
                                <i class="fas fa-graduation-cap"></i> &nbsp;&nbsp;
                                <span class="hide-menu"> Pendidikan </span>
                            </a>
                        </li>

                        <li class="sidebar-item @if(Request::routeIs('master-data.kemampuan.*')) active @endif">
                            <a href="{{ route('master-data.kemampuan.index') }}" class="sidebar-link">
                                <i class="fas fa-user-cog"></i> &nbsp;&nbsp;
                                <span class="hide-menu"> Kemampuan </span>
                            </a>
                        </li>

                        <li class="sidebar-item @if(Request::routeIs('master-data.hobi.*')) active @endif">
                            <a href="{{ route('master-data.hobi.index') }}" class="sidebar-link">
                                <i class="fas fa-user-cog"></i> &nbsp;&nbsp;
                                <span class="hide-menu"> Hobi </span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark @if(Request::routeIs('master-data.*')) active @endif"
                      href="javascript:void(0)"
                      aria-expanded="false"
                    >
                        <i class="fa fa-database"></i>&nbsp;&nbsp;
                        <span class="hide-menu">Master Data </span>&nbsp;&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level @if(Request::routeIs('master-data.*')) in @endif">
                        <li class="sidebar-item">
                            <a href="{{ route('master-data.admin.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Admin </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('master-data.peran.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Peran </span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(Request::routeIs('master-data.kategori-berita.*')) active @endif">
                            <a href="{{ route('master-data.kategori-berita.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Kategori Berita </span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(Request::routeIs('master-data.spesialis-dokter.*')) active @endif">
                            <a href="{{ route('master-data.spesialis-dokter.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Spesialis Dokter </span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(Request::routeIs('master-data.jam-layanan.*')) active @endif">
                            <a href="{{ route('master-data.jam-layanan.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Jam Layanan </span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(Request::routeIs('master-data.chat.*')) active @endif">
                            <a href="{{ route('master-data.chat.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Obrolan </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark @if(Request::routeIs('menu.*')) active @endif"
                      href="javascript:void(0)"
                      aria-expanded="false"
                    >
                        <i class="fa fa-database"></i>&nbsp;&nbsp;
                        <span class="hide-menu">Menu </span>&nbsp;&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level @if(Request::routeIs('menu.*')) in @endif">
                        <li class="sidebar-item @if(Request::routeIs('menu.master-menu.*')) active @endif">
                            <a href="{{ route('menu.master-menu.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Master Menu </span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(Request::routeIs('menu.list-menu.*')) active @endif">
                            <a href="{{ route('menu.list-menu.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> List Menu </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item @if(Request::routeIs('liveChat')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('liveChat')) active @endif"
                    href="{{ route('liveChat') }}" aria-expanded="false">
                    @if ($getNotif > 0)
                        <div class="notify" style="margin-top: 35px;">
                            <span class="heartbit"></span> <span class="point"></span>
                        </div>
                    @endif
                    <i class="fas fa-comments"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Obrolan</span></a>
                </li>
                <li class="sidebar-item @if(Request::routeIs('dokter.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('dokter.*')) active @endif"
                    href="{{ route('dokter.index') }}" aria-expanded="false"><i class="fa fa-user-md"></i>&nbsp;&nbsp;  
                    <span class="hide-menu">Dokter</span></a></li>
                <li class="sidebar-item @if(Request::routeIs('pasien.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('pasien.*')) active @endif"
                    href="{{ route('pasien.index') }}" aria-expanded="false"><i class="fa fa-users"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Pasien</span></a></li>
                <li class="sidebar-item @if(Request::routeIs('berita.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('berita.*')) active @endif"
                    href="{{ route('berita.index') }}" aria-expanded="false"><i class="fa fa-newspaper"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Berita</span></a></li>
                <li class="sidebar-item @if(Request::routeIs('janji.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('janji.*')) active @endif"
                    href="{{ route('janji.index') }}" aria-expanded="false"><i class="fas fa-book"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Janji</span></a></li>
                <li class="sidebar-item @if(Request::routeIs('rumah-sakit.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('rumah-sakit.*')) active @endif"
                    href="{{ route('rumah-sakit.index') }}" aria-expanded="false"><i class="fa fa-hospital"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Rumah Sakit</span></a>
                </li>
                <li class="sidebar-item @if(Request::routeIs('testimoni.*')) selected @endif"> <a class="sidebar-link waves-effect waves-dark @if(Request::routeIs('testimoni.*')) active @endif"
                    href="{{ route('testimoni.index') }}" aria-expanded="false"><i class="fas fa-circle-question"></i>&nbsp;&nbsp;
                    <span class="hide-menu">Testimoni Pasien</span></a>
                </li> --}}
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
     <div class="sidebar-footer">
         <div class="row">
             <div class="col-4 link-wrap">
                 <!-- item-->
                 <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                    class="mdi mdi-power"></i></a>
             </div>
         </div>
     </div>
</aside>