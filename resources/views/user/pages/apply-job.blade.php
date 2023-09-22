@extends('landing')
@section('content')
    <!-- section-1 // hero -->
    <div class="container-fluid custom-section">
        <div id="section" class="container">
            <div class="row justify-content-center text-center">
                <div class="custom-spacing"></div>
                <div class="col-12">
                    <h3 class="mb-4 text-primary fw-bold" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200">
                        {{ $data->jobtitle }}</h3>
                </div>
            </div>
        </div>
        <!-- akhir section-1 // hero -->
    </div>


    <!-- section joinwitus -->
    <div id="section" class="container-fluid custom-section">
        <div class="container pt-2 pb-4">
            <div class="row align-items-center">
                <div class="col-md-6 pb-4">
                    <div class="row">
                        <?php $url = 'storage/' . $data->jobImage; ?>
                        <img src="{{ asset($url) }}" class="img-fluid rounded-5" alt="..." />
                    </div>
                </div>
                <div class="col-md-6 pt-2 pb-2" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200">
                    <h5>Job Description</h5>
                    <p>{!! $data->jobdeskripsion !!}</p>
                    <p>{!! $data->jobrecuire !!}</p>
                    {{--  --}}
                    @if ($data->jobRequirements)
                        <h5 class="mt-4">Job Requirements</h5>
                        @foreach (json_decode($data->jobRequirements, true) as $key => $value)
                            @if (in_array($key, ['jurusan', 'gender', 'last_pendidikan', 'min_pengalaman', 'umur']))
                                @if ($key === 'umur')
                                    <span class="badge bg-primary">{{ $value }} Tahun</span>
                                @elseif($key === 'min_pengalaman')
                                    @if ($value == 0)
                                        <span class="badge bg-primary">Freshgraduate</span>
                                    @else
                                        <span class="badge bg-primary">Pengalaman {{ $value }} Tahun</span>
                                    @endif
                                @else
                                    <span class="badge bg-primary">{{ $value }}</span>
                                @endif
                            @endif
                        @endforeach
                    @endif
                    {{--  --}}
                    <p class="float-end pt-4 mt-4">
                        <button class="btn btn-primary" id="apply" data-id="{{ $data->jobID }}">Apply</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section joinwithus -->
@endsection
@section('script')
    <script type="module">
        import * as helper from "/js/helper.js";
        $(document).ready(function() {
            $('#apply').click(function(e) {
                e.preventDefault();
                localStorage.setItem('last_path', window.location.pathname);
                var local_personalInfo = localStorage.getItem('personalInformation')
                var local_lastEducation = localStorage.getItem('lastEducation')
                var local_workExperience = localStorage.getItem('workExperiences')

                if (!local_personalInfo || !local_lastEducation || !local_workExperience) {
                    swal({
                        title: "Oops...",
                        text: "You Have Not Provided Complete Information.!",
                        icon: "error",
                        button: false,
                        timer: 3000
                    });

                    setTimeout(() => {
                        window.location.href = '/apply';
                        localStorage.setItem('last_path', window.location.pathname);
                    }, 3000);
                } else {
                    var data = {
                        job_id: parseInt($(this).data('id')),
                        kandidat_id: parseInt(localStorage.getItem('userID')),
                        _token: $('#token').attr('content')
                    };
                    helper.jobApplication(data);
                }
            });
        });
    </script>
@endsection
