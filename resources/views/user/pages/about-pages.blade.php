@extends('landing')
@section('content')
    <!-- section-1 // hero -->
    <div class="container-fluid custom-section">
        <div id="section" class="container">
            <div class="row justify-content-center text-center">
                <div class="custom-spacing"></div>
                <div class="col-12">
                    <h1 class="mb-4 text-primary fw-bold" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200">
                        ABOUT US</h1>
                </div>
            </div>
        </div>
        <!-- akhir section-1 // hero -->
    </div>

    <!-- Section Our mision -->
    <div id="section" class="container-fluid custom-section">
        <div class="container pt-4 pb-4">
            <div class="row d-flex">
                <div class="col-lg-6 align-self-center">
                    <h2>Our Mission</h2>
                    <p>
                        Our mission is simple yet profound: to empower individuals to discover their potential and find
                        their perfect career path. We strive to provide a seamless and efficient platform where job seekers
                        and employers can meet,
                        interact, and forge meaningful connections. Through innovation and dedication, we aim to redefine
                        the way recruitment is experienced.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('access_user/public/images/03_undraw_Social_bio_re_0t9u.png') }}"
                        class="img-fluid d-none d-md-block" alt="..." data-aos="fade-in" />
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section our mision -->

    <div class="custom-spacing"></div>

    <!-- section joinwitus -->
    <div id="section" class="container-fluid custom-section">
        <div class="container pt-4 pb-4">
            <div class="row d-flex">
                <div class="col-lg-6">
                  <img src="{{ asset('access_user/public/images/08_undraw_Interview_re_e5jn.png') }}"
                        class="img-fluid d-none d-md-block" alt="..." data-aos="fade-in" />
                </div>
                <div class="col-lg-6 align-self-center">
                    <h2>Join Us on the Journey</h2>
                    <p>
                        Whether you're a recent graduate stepping into the workforce or a seasoned professional seeking new
                        horizons, TalentFinders is here to guide you. We invite you to explore our platform, discover new
                        possibilities, and embark on
                        a journey towards realizing your full potential. Join us in shaping the future of recruitment, where
                        dreams are nurtured, and success stories are created.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section joinwithus -->
@endsection
