@extends('template')
@section('content')
	<!-- header section start-->
  <!-- search jobs section start-->
  <div class="search_section layout_padding">
      <div class="container">
        <div class="logo_1"><img src="images/logo-2.png"></div>
          <div class="row box">
              <div class="col-md-6">
                  <h1 class="what_text">What</h1>
                  <p class="city_text">job title, keywords, or company</p>
                  <div class="main">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <h1 class="what_text">Where</h1>
                  <p class="city_text">city, state, or pin code</p>
                  <div>
                      <div class="main">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ahmedabad, Gujarat">
                              <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button">
                                      <i class="fa fa-map-marker"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="">
            <button class="find_bt">Find Jobs</button>
          </div>
      </div>
  </div>
  <!-- search jobs section end-->

  <!-- footer section start-->
  <div class="footer_section layout_padding">
    <div class="container">
      <h1 class="subscribr_text">Subscribe Now</h1>
      <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have </p>
      <div class="box_main_2">
          <textarea type="" class="email_bt_2" placeholder="Enter Your Email" name=""></textarea>
        </div>
        <button class="subscribe_bt_2"><a href="#">Subscribe</a></button>
    </div>
  </div>
  <!-- footer section end-->
  @endsection
