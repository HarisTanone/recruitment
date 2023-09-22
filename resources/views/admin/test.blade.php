@extends('layout.new_layout_admin')
@section('title', 'Dashboard')
@section('menu', 'Dashboard')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $total_kandidat }}</h3>
                                    <p>Total Candidates</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="/admin/kandidat" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $total_job }}</h3>
                                    <p>Total Jobs</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/admin/job" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $total_contact }}</h3>
                                    <p>Total Contact Us</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-email-outline"></i>
                                </div>
                                <a href="/admin/contact-us" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $total_faq }}</h3>
                                    <p>Total FAQ</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-information"></i>
                                </div>
                                <a href="/admin/faq" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <h4>Top Job</h4>
                    <div class="row">
                        @foreach ($topJobs as $job)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                                <div class="card border-0 shadow d-flex flex-column h-100">
                                    <?php $url = 'storage/' . $job->jobImage; ?>
                                    <img class="card-img-top" src="{{ asset($url) }}" alt="Job Image" />
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $job->jobtitle }}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($job->jobdeskripsion, 60) }}
                                        </p>

                                        @if (!empty($job->jobRequirements))
                                            <span class="small text-bold text-muted">Requirements</span>
                                            <p>
                                                @foreach (json_decode($job->jobRequirements, true) as $key => $value)
                                                    @if (in_array($key, ['jurusan', 'gender', 'last_pendidikan', 'min_pengalaman', 'umur']))
                                                        @if ($key === 'umur')
                                                            <span class="badge bg-primary">{{ $value }} Tahun</span>
                                                        @elseif($key === 'min_pengalaman')
                                                            @if ($value == 0)
                                                                <span class="badge bg-primary">Freshgraduate</span>
                                                            @else
                                                                <span class="badge bg-primary">Pengalaman
                                                                    {{ $value }} Tahun</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-primary">{{ $value }}</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
