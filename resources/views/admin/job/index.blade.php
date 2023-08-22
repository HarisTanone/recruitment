@extends('layout.new_layout_admin')
@section('title', 'Jobs Data')
@section('menu', 'Jobs')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search..."
                            aria-label="Search..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="testbtn">Insert</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="jobList"></div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{-- <button class="btn btn-success" id="testbtn">Insert</button> --}}
                    <ul class="pagination ml-auto" id="pagination">
                        <!-- Navigasi pagination akan ditampilkan di sini -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add data --}}
    <div class="modal fade modal-black" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalTitle">-</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="jobForm">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jobtitle">Job Title</label>
                                    <input type="text" name="jobtitle" id="jobtitle" class="form-control" required
                                        placeholder="IT Programmer">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jobspesialis">Job Specializations</label>
                                    <input type="text" name="jobspesialis" id="jobspesialis" class="form-control"
                                        required placeholder="Information Technology">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jobdeskripsion">Job Description</label>
                            <input type="text" name="jobdeskripsion" id="jobdeskripsion" class="form-control" required
                                placeholder="We are seeking a skilled Software Engineer">
                        </div>
                        <div class="form-group">
                            <label for="jobrecuire">Job Requirements</label>
                            <textarea name="jobrecuire" id="jobrecuire" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jobImage">Image</label>
                            <input type="file" name="jobImage" id="jobImage" class="form-control">
                            <br>
                            <div id="imagePreview"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-lg-left">
                            </div>
                            <div class="col-6 text-lg-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add data --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var itemsPerPage = 6; // Set the number of items per page
            var totalJobs = 0;
            var allJobs = []; // Semua data pekerjaan

            function displayJobs(page, perPage) {
                var startIndex = (page - 1) * perPage;
                var endIndex = startIndex + perPage;
                var jobListHtml = '';
                var baseUrl = '{{ asset('') }}'; // Get the base URL of your application
                var jobListHtml = '<div class="row">';
                for (var i = startIndex; i < endIndex && i < totalJobs; i++) {
                    var job = allJobs[i];
                    var cardHtml = ` <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                            <div class="card border-0 shadow d-flex flex-column h-100">
                                <img class="card-img-top"
                                    src="${job.jobImage ? baseUrl + 'storage/' + job.jobImage : 'placeholder-image.jpg'}"
                                    alt="Job Image">
                                <div class="card-body">
                                    <h4 class="card-title">${job.jobtitle}</h4>
                                    <p class="card-text">${job.jobdeskripsion.substring(0, 60)}</p>
                                </div>
                                <div class="card-footer text-lg-right">
                                    <button class="btn btn-danger btn-sm delete-job" data-job-id="${job.jobID}">
                                        delete
                                    </button>
                                    <button class="btn btn-warning btn-sm update-job" data-job-id="${job.jobID}">
                                        update
                                    </button>
                                </div>
                            </div>
                        </div>`;
                    jobListHtml += cardHtml;
                }

                $('#jobList').html(jobListHtml);
                updatePagination(page, Math.ceil(totalJobs / perPage));
            }

            var originalAllJobs = []; // Store the original unfiltered data

            function fetchJobData() {
                $.getJSON("/admin/job/getAll",
                    function(data) {
                        originalAllJobs = data; // Store the original data
                        allJobs = originalAllJobs; // Initialize allJobs with the original data
                        totalJobs = allJobs.length;
                        displayJobs(1, itemsPerPage);
                    }
                );
            }

            $('#searchInput').on('input', function() {
                var query = $(this).val().toLowerCase();
                if (query === '') {
                    allJobs = fetchJobData(); // Reset allJobs to the original data
                } else {
                    allJobs = filterJobs(query); // Update allJobs with filtered results
                }
                displayJobs(1, itemsPerPage);
            });

            $('#pagination').on('click', '.page-link', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                displayJobs(page, itemsPerPage);
            });

            function updatePagination(currentPage, totalPages) {
                var paginationHtml = '';
                for (var i = 1; i <= totalPages; i++) {
                    paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>`;
                }
                $('#pagination').html(paginationHtml);
            }
            fetchJobData();

            function filterJobs(query) {
                var filteredJobs = allJobs.filter(function(job) {
                    return (
                        job.jobtitle.toLowerCase().includes(query) ||
                        job.jobspesialis.toLowerCase().includes(query) ||
                        job.jobdeskripsion.toLowerCase().includes(query)
                    );
                });
                totalJobs = filteredJobs.length;
                return filteredJobs;
            }

            $('#testbtn').click(function(e) {
                e.preventDefault();
                $('#exampleModal').data('jobid', 0);
                $('#exampleModal').data('action', 'insert');
                $('#exampleModal').modal('show')
                $('#myModalTitle').text('Insert Job')
                //clear input value
                $('#jobtitle').val('');
                $('#jobspesialis').val('');
                $('#jobdeskripsion').val('');
                // $('#jobrecuire').val('');
                editor.setData('')
                $('#jobImagePreview').attr('src', ''); // Clear image preview
                $('#imagePreview').html(''); // Clear image preview element
            });

            $(document).on('click', '.update-job', function(e) {
                e.preventDefault();
                var jobId = $(this).data('job-id');
                $('#exampleModal').data('action', 'update');
                $('#exampleModal').data('jobid', jobId);
                $('#exampleModal').modal('show')
                $('#myModalTitle').text('Update Job')
                $.getJSON("/admin/job/" + jobId,
                    function(data, textStatus, jqXHR) {
                        $('#jobtitle').val(data.jobtitle);
                        $('#jobspesialis').val(data.jobspesialis);
                        $('#jobdeskripsion').val(data.jobdeskripsion);
                        // $('#jobrecuire').val(data.jobrecuire);
                        editor.setData(data.jobrecuire)
                        // valueCKEditor = data.jobrecuire
                        if (data.jobImage) {
                            var imageUrl = "{{ asset('storage/') }}/" + data.jobImage;
                            $('#jobImagePreview').attr('src', imageUrl);
                            $('#imagePreview').html('<img src="' + imageUrl +
                                '" alt="Image Preview" style="max-width: 100%;">');
                        }
                    }
                );
            });
            // fungsi hapus
            $(document).on('click', '.delete-job', function(e) {
                e.preventDefault(); // Prevent the default behavior of the link

                var jobId = $(this).data('job-id');
                var csrfToken = $('meta[name="csrf_token"]').attr('content');

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            //
                            $.ajax({
                                url: '/admin/job/delete/' + jobId,
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                                },
                                success: function(response) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        button: false,
                                        timer: 1350,
                                        icon: "success",
                                        title: "Success",
                                    });
                                    fetchJobData();
                                },
                                error: function(xhr, status, error) {
                                    var errorMessage = JSON.parse(xhr.responseText);
                                    console.error(errorMessage);
                                    alert('Error: ' + errorMessage.message);
                                }
                            });
                        }
                    });

            });

            $('#jobImage').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').html('<img src="' + e.target.result +
                            '" alt="Image Preview" style="max-width: 100%;">');
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#jobForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData($('#jobForm')[0]);
                var action = $('#exampleModal').data('action');
                var jobid = $('#exampleModal').data('jobid');
                var url = action === 'insert' ? '/admin/job/insert' : '/admin/job/update/' + jobid
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                console.log('formData -> ', formData);
                // return;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                    },
                    success: function(response) {
                        // Handle success
                        console.log(response);
                        swal({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            button: false,
                            timer: 1350
                        })
                        $('#exampleModal').modal('hide');
                        fetchJobData();
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = JSON.parse(xhr.responseText);
                        console.error(errorMessage);
                        alert('Error: ' + errorMessage.message);
                    }
                });
            });
        });
    </script>
    <script>
        let editor;

        ClassicEditor
            .create(document.querySelector('#jobrecuire'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
