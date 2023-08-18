@extends('landing')
@section('content')
    <!-- section-1 // hero -->
    <div id="section" class="container-fluid">
        <div class="container pt-4 mt-5">
            <div class="row text-center align-items-center">
                <div class="col-md-4 col-lg-4">
                    <img src="{{ asset('home/public/images/jonas-kakaroto-KIPqvvTOC1s-unsplash.png') }}" class="img-fluid d-none d-md-block"
                        alt="..." data-aos="fade-in" />
                </div>
                <div class="col-md-4 col-lg-4" data-aos="fade-in">
                    <h1 class="mb-4 text-primary fw-bold">JOB VACANCY</h1>
                    <input class="form-control form-control-lg" type="text" placeholder="Search"
                        aria-label="default input example" />
                    <button type="button" class="btn mt-2 mb-4 btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section-1 // hero FIX-->

    <div class="custom-spacing"></div>

    <!-- section 2 // JOBS -->
    <section id="section" class="container-fluid">
        <div class="container pt-4 pb-4">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 text-center border-bottom" data-aos="fade-in">
                    <h2 class="fw-bold">Karir untuk Masa depan</h2>
                    <p>Temukan Disini</p>
                </div>
                <div class="col-2 boreder-bottom"></div>
            </div>
            <div class="row mb-2 justify-content-center">
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j1.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Software Engineer</h5>
                            <p class="fw-lighter fs-6">Information Technology, Software/Programming</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j2.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Registered Nurse</h5>
                            <p class="fw-lighter fs-6">Healthcare</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j3.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Financial Analyst</h5>
                            <p class="fw-lighter fs-6">Finance</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j4.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Web Developer</h5>
                            <p class="fw-lighter fs-6">Information Technology</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2 justify-content-center">
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j5.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Marketing Manager</h5>
                            <p class="fw-lighter fs-6">Marketing</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j6.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Graphic Designer</h5>
                            <p class="fw-lighter fs-6">Design</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j7.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Architecture</h5>
                            <p class="fw-lighter fs-6">Architect</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                    <div class="card d-flex flex-column h-100 border-0 shadow">
                        <img src="{{ asset('home/public/images/j8.png') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5>Content Writer</h5>
                            <p class="fw-lighter fs-6">Writing</p>
                            <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center" data-aos="zoom-in-down">
                <div class="col-lg-4">
                    <a class="btn btn-primary mt-2" href="#" role="button">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir section 2 // JOBS FIX-->

    <!-- Modal -->
    <div class="modal" id="detail-job" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detail-jobLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="detail-jobLabel">Lorem, ipsum.</h5>
                </div>
                <div class="modal-body">
                    <h6>Job Description :</h6>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                    </ol>
                    <h6>Job Requirements :</h6>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo,
                            autem!</li>
                        <li class="list-group-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Reprehenderit non beatae facere ratione ullam nesciunt!.</li>
                        <li class="list-group-item">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam
                            harum libero reiciendis.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal  FIX -->

    <div class="custom-spacing"></div>

    <!-- section 3 -->
    <section id="section" class="container-fluid">
        <div class="container pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h2 class="fw-bold" data-aos="fade-in">Alasan Memilih Berkerja bersama TalentFinder</h2>
                    <p data-aos="fade-in">Kami bertekad membangun iklim kerja yang aman dan memuaskan secara
                        professional bagi karyawan kami.</p>
                    <button type="button" class="btn btn-primary mb-5">Selengkapnya</button>
                </div>
                <div class="col-md-7 text-center" data-aos="fade-in">
                    <img src="{{ asset('home/public/images/sec3.png') }}" class="img-fluid rounded mx-auto d-block mb-2"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- akhir section 3 -->
    {{-- <div class="custom-spacing"></div> --}}
@endsection
@section('script')
    <script>
        console.log('ok mantap')
    </script>
@endsection
