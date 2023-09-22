@extends('landing')
@section('content')
    <!-- section-1 // hero -->
    <div id="section" class="container-fluid custom-section">
        <div class="container pt-4 mt-5">
            <div class="row d-flex">
                <div class="col-lg-6 align-self-center">
                    <h2 class="text-primary fw-bold">JOB VACANCY</h2>
                    <p class="text-muted">
                        Explore job opportunities that are suitable and aligned with you, discover job prospects tailored
                        to your unique profile. Let us assist you in finding a career that matches your potential. Start
                        exploring today!
                    </p>
                    <form action="{{ route('search') }}#sectionJob" method="GET">
                        <div class="input-group mb-3 shadow">
                            <input type="text" class="form-control" name="query"
                                placeholder="Job Search that Fits You">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('access_user/public/images/01_undraw_job_hunt_re_q203.svg') }}"
                        class="img-fluid d-none d-md-block" alt="..." data-aos="fade-in" />
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section-1 // hero FIX-->

    <div class="custom-spacing"></div>

    <!-- section 2 // JOBS -->
    <section id="sectionJob" class="container-fluid custom-section">
        <div class="container pt-4 pb-4">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 text-center border-bottom" data-aos="fade-in">
                    <h2 class="fw-bold">Career for the Future</h2>
                    <p>Find it here</p>
                </div>
                <div class="col-2 boreder-bottom"></div>
            </div>
            <div class="row mb-2 justify-content-center">
                {{--  --}}
                @if (isset($searchResults) && count($searchResults) >= 1)
                    @foreach ($searchResults as $job)
                        <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                            <div class="card d-flex flex-column h-100 border-0 shadow" data-jobid="{{ $job->jobID }}">
                                <?php $url = 'storage/' . $job->jobImage; ?>
                                <img src="{{ asset($url) }}" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5>{!! $job->jobtitle !!}</h5>
                                    <p class="fw-lighter fs-6">{!! $job->jobdeskripsion !!}</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif(isset($searchResults) && count($searchResults) == 0)
                    <div class="alert alert-primary text-center" role="alert">
                        No job search results found.
                    </div>
                @else
                    @foreach ($jobs as $job)
                        <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                            <div class="card d-flex flex-column h-100 border-0 shadow" data-jobid="{{ $job->jobID }}">
                                <?php $url = 'storage/' . $job->jobImage; ?>
                                <img src="{{ asset($url) }}" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5>{!! $job->jobtitle !!}</h5>
                                    <p class="fw-lighter fs-6">{!! $job->jobdeskripsion !!}</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{--  --}}
                <template id="job-template">
                    <div class="pb-4 col-lg-3" data-aos="zoom-in-down">
                        <div class="card d-flex flex-column h-100 border-0 shadow mycart">
                            <img src="" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5></h5>
                                <p class="fw-lighter fs-6"></p>
                                <a href="" data-bs-toggle="modal" data-bs-target="#detail-job"
                                    class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            @if ((count($jobs) >= 8 && !isset($searchResults)) || (isset($searchResults) && count($searchResults) >= 8))
                <div class="row justify-content-center text-center" data-aos="zoom-in-down">
                    <div class="col-lg-4">
                        <button id="loadMore" data-offset="8" class="btn btn-primary mt-2" href="#"
                            role="button">Load More</button>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <div class="custom-spacing"></div>

    <!-- section 3 -->
    <section id="section" class="container-fluid custom-section">
        <div class="container pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h2 class="fw-bold" data-aos="fade-in">Reasons for choosing to work with TalentFinder</h2>
                    <p data-aos="fade-in">We are determined to build a safe and satisfying work climate professionalism for
                        our employees.</p>
                    <button type="button" class="btn btn-primary mb-5">More</button>
                </div>
                <div class="col-md-7 text-center" data-aos="fade-in">
                    <img src="{{ asset('access_user/public/images/02_undraw_career_progress_ivdb.png') }}"
                        class="img-fluid rounded mx-auto d-block mb-2" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- akhir section 3 -->
    {{-- <div class="custom-spacing"></div> --}}
@endsection
@section('script')
    <script>
        // Function to handle hash URL scrolling
        function scrollToHash() {
            if (window.location.hash === "#sectionJob") {
                var section = document.querySelector(window.location.hash);
                if (section) {
                    window.scrollTo(0, section.offsetTop);
                }
            }
        }

        // Scroll to hash on page load
        window.addEventListener("load", scrollToHash);

        // Scroll to hash when tautan with hash URL is clicked
        document.addEventListener("click", function(event) {
            if (event.target.tagName === "A" && event.target.hash === "#sectionJob") {
                event.preventDefault();
                var section = document.querySelector(event.target.hash);
                if (section) {
                    window.scrollTo({
                        top: section.offsetTop,
                        behavior: "smooth"
                    });
                }
            }
        });
    </script>


    <script>
        var offset = 8; // Awal offset data yang akan diambil
        var loadMoreButton = document.getElementById('loadMore');

        loadMoreButton.addEventListener('click', function() {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var jobs = JSON.parse(xhr.responseText);
                        appendJobs(jobs);

                        offset += jobs.length;
                        if (jobs.length === 0) {
                            loadMoreButton.style.display =
                                'none'; // Sembunyikan tombol jika tidak ada data lagi
                        }
                    } else {
                        console.error('Error loading more data');
                    }
                }
            };

            xhr.open('GET', '/load-more?offset=' + offset);
            xhr.send();
        });

        function appendJobs(jobs) {
            var jobTemplate = document.getElementById('job-template').content;
            var jobContainer = document.querySelector('.row.mb-2.justify-content-center');

            jobs.forEach(function(job) {
                var clonedTemplate = document.importNode(jobTemplate, true);
                clonedTemplate.querySelector('.card-img-top').src = "{{ asset('storage/') }}" + '/' + job.jobImage;
                clonedTemplate.querySelector('h5').textContent = job.jobtitle;
                clonedTemplate.querySelector('.fw-lighter.fs-6').textContent = job.jobdeskripsion;
                clonedTemplate.querySelector('.mycart').setAttribute('data-jobid', job.jobID);
                jobContainer.appendChild(clonedTemplate);
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.row.mb-2.justify-content-center').on('click', '.card', function() {
                var jobID = $(this).data('jobid');
                window.location.href = "/apply/" + jobID;
            });
        });
    </script>
@endsection
