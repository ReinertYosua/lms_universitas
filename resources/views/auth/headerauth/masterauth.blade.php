
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Elearning - @yield('titleauth')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images')}}/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('css')}}/style.css" rel="stylesheet">
    <link href="{{asset('plugins')}}/jquery-steps/css/jquery.steps.css" rel="stylesheet">

</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!-- Header Login -->

    <nav class="navbar sticky-top navbar-expand-md navbar-light" style="background-color: #ffffff;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><h3>E-Learning (Student Personalization)</h3></span>
                </li>
                
            </ul>
        </div>
        <div class="mx-auto order-0">
            <!-- <a class="navbar-brand mx-auto" href="#">Navbar 2</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><h3>Universitas Katolik Widya Mandira</h3></span>
                </li>
                
            </ul>
        </div>
    </nav>

    <!-- Akhir Header Login -->



    @yield('contenauth')
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins')}}/common/common.min.js"></script>
    <script src="{{asset('js')}}/custom.min.js"></script>
    <script src="{{asset('js')}}/settings.js"></script>
    <script src="{{asset('js')}}/gleek.js"></script>
    <script src="{{asset('js')}}/styleSwitcher.js"></script>

    <!-- step -->
    <script src="{{asset('plugins')}}/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="{{asset('plugins')}}/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/plugins-init/jquery-steps-init.js"></script>
</body>
</html>





