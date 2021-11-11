<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="example-content"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แผนพัฒนาการศึกษาเทศบาลเมืองสิงหนคร</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
            Array.prototype.remove = function(index) {
                return this.filter(function(element, ine) {
                return ine != index;
            })
        }
    </script>
    @yield('style')
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">รายงาน</li>
                    <li class="{{(Request::url()==route('dashboad'))?'active':false}}">
                        <a href="{{ route("dashboad") }}"><i class="menu-icon fa fa-laptop"></i>รายงานผลโครงการ</a>


                    </li>
                    {{-- <li class="menu-title">จัดการข้อมูลผู้ใช้</li>
                    <li class="{{(Request::url()==route('dashboad'))?'acกหฟtive':false}}">
                        <a href="{{ route("dashboad") }}"><i class="menu-icon ti ti-user"></i>ผู้บริหาร</a>
                    </li>
                    <li class="{{(Request::url()==route('dashboad'))?'acกหฟtive':false}}">
                        <a href="{{ route("dashboad") }}"><i class="menu-icon ti  ti-user"></i>เจ้าหน้าที่กองการศึกษา</a>
                    </li>
                    <li class="{{(Request::url()==route('table'))?'active':false}}">
                        <a href="{{ route("table") }}"><i class="menu-icon ti ti-user"></i>สถานศึกษา</a>
                    </li>
                    </li> --}}

                    {{-- <li class="menu-title">จัดการข้อมูลแผนพัฒนาการศึกษา</li>
                    <li class="{{(Request::url()==route('dashboad'))?'acกหฟtive':false}}">
                        <a href="{{ route("dashboad") }}"><i class="menu-icon ti ti-user"></i>ปีงบประมาณ</a>
                    </li>
                    <li class="{{(Request::url()==route('dashboad'))?'acกหฟtive':false}}">
                        <a href="{{ route("dashboad") }}"><i class="menu-icon ti  ti-user"></i>ยุทธศาสตร์</a>
                    </li>
                    <li class="{{(Request::url()==route('table'))?'active':false}}">
                        <a href="{{ route("table") }}"><i class="menu-icon ti ti-user"></i>กลยุทธ์</a>
                    </li>
                    </li> --}}

                    <li class="menu-title">จัดการข้อมูลพื้นฐาน</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown {{(Request::url()==route('table_Executive')||Request::url()==route('table_Staff')||Request::url()==route('table_Personnel')||Request::url()==route('add_personnel'))?'active':false}}">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>จัดการข้อมูลผู้ใช้</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-puzzle-piece"></i><a href="{{ route("table_Executive") }}" style="left: 0px">ผู้บริหาร</a></li>
                                <li><i class="fa fa-id-badge"></i><a href="{{ route("table_Staff") }}">เจ้าหน้าที่กองการศึกษา</a></li>
                                <li><i class="fa fa-bars"></i><a href="{{ route("table_Personnel") }}">สถานศึกษา</a></li>
                            </ul>
                    </li>

                    <li class="menu-item-has-children dropdown {{(Request::url()==route('table_Year')||Request::url()==route('table_Tactics')||Request::url()==route('table_Strategic')||Request::url()==route('table_Personnel')||Request::url()==route('add_personnel'))?'active':false}}">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>จัดการยุทธศาสตร์และกลยุทธ์</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-puzzle-piece"></i><a href="{{ route("table_Year") }}" style="left: 0px">แผนพัฒนาท้องถิ่นและกองการศึกษา</a></li>
                                <li><i class="fa fa-id-badge"></i><a href="{{ route("table_Strategic") }}">ยุทธศาสตร์</a></li>
                                <li><i class="fa fa-bars"></i><a href="{{ route("table_Tactics") }}">กลยุทธ์</a></li>
                            </ul>
                    </li>
                    <li class="menu-title">จัดการข้อมูลโครงการ</li>
                    <li class="{{(Request::url()==route('table_Offer'))?'active':false}}">
                        <a href="{{ route("table_Offer") }}"><i class="menu-icon fa fa-id-badge"></i>ข้อมูลโครงการ</a>
                    </li>
                    <li class="{{(Request::url()==route('table_approve'))?'active':false}}">
                        <a href="{{ route("table_approve") }}"><i class="menu-icon fa fa-id-badge"></i>พิจารณาอนุมัติโครงการ</a>
                    </li>
                    <li class="{{(Request::url()==route('table_saveresult'))?'active':false}}">
                        <a href="{{ route("table_saveresult") }}"><i class="menu-icon fa fa-id-badge"></i>บันทึกผลโครงการ</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        {{-- <button class="search-trigger"><i class="fa fa-search"></i></button> --}}
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button> --}}
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button> --}}
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset("images/ad.jpg")}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>{{ auth()->user()->username }}</a>

                            {{-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> --}}

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>ระดับ : @auth{{($rosle = auth()->user()->rolse)?($rosle=="executive"?'ผู้บริหาร':($rosle=="staff"?'กองการศึกษา':($rosle=="personnel"?'สถานศึกษา':''))):'' }}@endauth</a>
                            {{-- <a class="nav-link" href="#"><i class="fa fa -cog"></i> </a> --}}


                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power -off"></i>ออกจากระบบ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        @yield('headcontent')
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6 text-right">
                        แผนพัฒนาการศึกษาเทศบาลเมืองสิงหนคร จังหวัดสงขลา
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{asset('assets/js/init/weather-init.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{asset('assets/js/init/fullcalendar-init.js')}}"></script>
    <script src="{{asset('assets/js/init/chartjs-init.js')}}"></script>

    <!--Local Stuff-->
    @yield('script')
</body>
</html>
