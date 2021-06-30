<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>แผนพัฒนาการศึกษาเทศบาลเมืองสิงหนคร</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- bootstrap css -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }} ">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesoeet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>
	<!-- header section start-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo " href="#"><img src="{{ asset("images/sing.png") }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth

                <li class="nav-item {{(Request::url()==route('home'))?'activebar':false}}">
                   <a class="nav-link" href="{{ route("home") }}">หน้าแรก</a>
                </li>
                <li class="nav-item {{(Request::url()==route("stategic"))?'activebar':false}}">
                   <a class="nav-link" href="{{route("stategic")  }}">ข้อมูลยุทธศาสตร์</a>
                </li>
                <li class="nav-item {{(Request::url()==route("Tactics"))?'activebar':false}}">
                   <a class="nav-link" href="{{ route("Tactics") }}">ข้อมูลกลยุทธ์</a>
                </li>
                <li class="nav-item {{(Request::url()==route("project"))?'activebar':false}}">
                   <a class="nav-link" href="{{ route("project") }}">โครงการ</a>
                </li>
                <li class="nav-item {{(Request::url()==route("summarize"))?'activebar':false}}">
                   <a class="nav-link" href="{{ route("summarize") }}">สรุปผลโครงการ</a>
                </li>
                <li class="nav-item {{(Request::url()==route("results"))?'activebar':false}}">
                   <a class="nav-link" href="{{ route("results") }}">ผลการอนุมัติ</a>
                </li>
                @endauth
            </ul>
        </div>
        @guest
                            @if (Route::has('login'))
                            <div class="login_text"><a href="login">เข้าสู่ระบบ</a></div>
                            @endif


                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </nav>
    @yield('content')
    	<!-- copyright section start-->
	<div class="copyright_section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="copyright_text">.<a href="https://html.design"> </a></p>
				</div>
				<div class="col-md-6">
					<p class="cookies_text"></p>
				</div>
			</div>
		</div>
	</div>
	<!-- copyright section end-->


    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="js/app.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
      $(document).ready(function(){
      $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         });
         </script>



</body>
</html>
