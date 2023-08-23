@extends('landing')
@section('content')
  <!-- section-1 // hero -->
  <div class="container-fluid custom-section">
    <div id="section" class="container">
      <div class="row justify-content-center text-center">
        <div class="custom-spacing"></div>
        <div class="col-12">
          <h1 class="mb-4 text-primary fw-bold" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200">ABOUT US</h1>
        </div>
      </div>
    </div>
    <!-- akhir section-1 // hero -->
  </div>

  <!-- Section Our mision -->
  <div id="section" class="container-fluid custom-section">
    <div class="container pt-4 pb-4">
      <div class="row align-items-center">
        <div class="col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="300">
          <h2>Our Mission</h2>
          <p>
            Our mission is simple yet profound: to empower individuals to discover their potential and find their perfect career path. We strive to provide a seamless and efficient platform where job seekers and employers can meet,
            interact, and forge meaningful connections. Through innovation and dedication, we aim to redefine the way recruitment is experienced.
          </p>
        </div>
        <div class="col-md-6 d-none d-md-block">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <img src="{{ asset('access_user/public/images/p-about1.png')}}" class="img-fluid" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="400" alt="" />
              <img src="{{ asset('access_user/public/images/p-about2.png')}}" class="img-fluid" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" alt="" />
              <img src="{{ asset('access_user/public/images/p-about3.png')}}" class="img-fluid" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="600" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir section our mision -->

  <div class="custom-spacing"></div>

  <!-- section joinwitus -->
  <div id="section" class="container-fluid custom-section">
    <div class="container pt-4 pb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="row">
            <div class="col-6 pb-2">
              <img src="{{ asset('access_user/public/images/p-about4.png')}}" class="img-fluid rounded" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="400" alt="" />
            </div>
            <div class="col-6 pb-2">
              <img src="{{ asset('access_user/public/images/p-about5.png')}}" class="img-fluid" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="400" alt="" />
            </div>
            <div class="col-12">
              <img src="{{ asset('access_user/public/images/p-about6.png')}}" class="img-fluid" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="400" alt="" />
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-2 pb-2" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200">
          <h2>Join Us on the Journey</h2>
          <p>
            Whether you're a recent graduate stepping into the workforce or a seasoned professional seeking new horizons, TalentFinders is here to guide you. We invite you to explore our platform, discover new possibilities, and embark on
            a journey towards realizing your full potential. Join us in shaping the future of recruitment, where dreams are nurtured, and success stories are created.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir section joinwithus -->
@endsection