<!--**********************************
            Sidebar start
        ***********************************66CED6-->
        <div class="nk-sidebar" style="background:#B6DCFE">           
            <div class="nk-nav-scroll" >
                <ul class="metismenu" id="menu" style="background:#B6DCFE">
                    <li class="nav-label">Menu</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/">Home </a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li>
                        @if(Auth::user()->usertype == 2 )
                        <a href="{{ route('interaksi.dosen') }}" aria-expanded="false">
                            <i class="fa fa-group menu-icon"></i><span class="nav-text">Graph Interaksi</span>
                        </a>
                        @endif
                        @if(Auth::user()->usertype == 3 )
                        <a href="{{ route('interaksi.mahasiswa') }}" aria-expanded="false">
                            <i class="fa fa-group menu-icon"></i><span class="nav-text">Graph Interaksi</span>
                        </a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::user()->usertype == 2 )
                        <a href="{{ route('infogayabelajar.dosen') }}" aria-expanded="false">
                            <i class="fa fa-info-circle menu-icon"></i><span class="nav-text">Informasi Gaya Belajar</span>
                        </a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::user()->usertype == 2 )
                        <a href="{{ route('inbox.dosen') }}" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Email</span>
                        </a>
                        @endif
                        @if(Auth::user()->usertype == 3 )
                        <a href="{{ route('inbox.mahasiswa') }}" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Email</span>
                        </a>
                        @endif
                    </li>
                @auth
                    @if(Auth::user()->usertype == 1 )
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('list.user') }}">User</a></li>
                            
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Analisis</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('list.gayabelajar') }}">Gaya Belajar</a></li>
                            
                        </ul>
                    </li>
                    @endif
                @endauth
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Matakuliah</span>
                        </a>
                        <ul aria-expanded="false">
                            @auth
                            @if(Auth::user()->usertype == 2 )
                            <li><a href="{{ route('list.courses') }}">Buat Matakuliah</a></li>
                            <li><a href="{{ route('schedulelec.course') }}">Matakuliah Saya</a></li>
                            @endif

                            @if(Auth::user()->usertype == 3 )
                            <li><a href="{{ route('enroll.course') }}">Rencana Studi</a></li>
                            <li><a href="{{ route('schedule.course') }}">Matakuliah Saya</a></li>
                            @endif
                            @endauth
                            
                        </ul>
                    </li>
                    <li>
                        @if(Auth::user()->usertype == 2 )
                        <a href="{{ route('forum.dosen') }}" aria-expanded="false">
                            <i class="fa fa-group menu-icon"></i><span class="nav-text">Forum</span>
                        </a>
                        @endif
                        @if(Auth::user()->usertype == 3 )
                        <a href="{{ route('forum.mahasiswa') }}" aria-expanded="false">
                            <i class="fa fa-group menu-icon"></i><span class="nav-text">Forum</span>
                        </a>
                        @endif
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Penilaian</span>
                        </a>
                        <ul aria-expanded="false">
                            @if(Auth::user()->usertype == 2 )
                            <li><a href="{{ route('listcourse.score') }}">Nilai</a></li>
                            @endif
                            @if(Auth::user()->usertype == 3 )
                            <li><a href="{{ route('listcoursescore.mahasiswa') }}">Lihat Nilai</a></li>
                            @endif
                        </ul>
                    </li>
                    @if(Auth::user()->usertype == 2 )
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Feedback</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('listcourse.feedback') }}">Input Feedback</a></li>
                        </ul>
                    </li>
                    @endif
                    
                    <!-- <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                            <li><a href="./email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a href="./app-calender.html">Calender</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-cards.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./uc-nestedable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->