
<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{asset('images')}}/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('images')}}/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img style="margin-top: -20px;" class="rounded mx-auto d-block" src="{{asset('images')}}/logo-utama2.png" alt="">
                        <!-- <img src="images/logo-text.png" alt=""> -->
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><h3>E-Learning (Student Personalization)</h3></span>
                        </div>
                        <!-- <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div> -->
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">{{ session('totalnotif') }}</span>
                            </a>
                            
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">{{ (session('totalnotif')!="")? session('totalnotif'): '0' }} New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">{{ (session('totalnotif')!="")? session('totalnotif'): '0' }}</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    @if(Auth::user()->usertype == 2 )
                                    <ul>
                                        @if(session('inbox')!="")
                                        @foreach(session('inbox') as $ibx)
                                        <li class="notification-unread">
                                            <a href="{{ route('inbox.dosen') }}">
                                                <!-- <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt=""> -->
                                                <div class="notification-content">
                                                    <div class="notification-heading">{{ $ibx->sender }}</div>
                                                    <div class="notification-timestamp">{{ date('d/m/Y', strtotime($ibx->created_at)) }}</div>
                                                    <div class="notification-text">{!! Illuminate\Support\Str::limit(strip_tags($ibx->body), $limit = 60, $end = '...') !!}</div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    @endif
                                    @if(Auth::user()->usertype == 3 )
                                    <ul>
                                        @if(session('inbox')!="")
                                        @foreach(session('inbox') as $ibx)
                                        <li class="notification-unread">
                                            <a href="{{ route('inbox.mahasiswa') }}">
                                                <!-- <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt=""> -->
                                                <div class="notification-content">
                                                    <div class="notification-heading">{{ $ibx->sender }}</div>
                                                    <div class="notification-timestamp">{{ date('d/m/Y', strtotime($ibx->created_at)) }}</div>
                                                    <div class="notification-text">{!! Illuminate\Support\Str::limit(strip_tags($ibx->body), $limit = 60, $end = '...') !!}</div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    @endif
                                    
                                </div> 
                            </div>
                        </li>
                        <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <!-- <img src="images/user/1.png" height="40" width="40" alt=""> -->
                                <img src="{{asset('storage')}}/foto/{{ session('fotouser') }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            @if(Auth::user()->usertype == 2 )
                                            <a href="{{ route('profil.dosen') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                            @endif
                                            @if(Auth::user()->usertype == 3 )
                                            <a href="{{ route('profil.dosen') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                            @endif
                                        </li>
                                        <!-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li> -->
                                        
                                        <hr class="my-2">
                                        <!-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> -->
                                        <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Content" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
