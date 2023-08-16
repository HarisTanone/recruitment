@extends('admin.dashboard')
@section('content')
    <style>
        #exampleModal .modal-dialog {
            -webkit-transform: translate(0, -50%);
            -o-transform: translate(0, -50%);
            transform: translate(0, -50%);
            top: 57%;
            margin: 0 auto;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-6 text-lg-left">
                            <h3>Jobs Data</h3>
                        </div>
                        <div class="col-6 text-lg-right">
                            <button class="btn btn-success" id="testbtn">Insert</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="jobList"></div>
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
            // Function to fetch and display job data
            function fetchJobData() {
                $.ajax({
                    url: '/admin/job/getAll',
                    method: 'GET',
                    success: function(response) {
                        // Handle success
                        console.log(response);
                        var baseUrl = '{{ asset('') }}'; // Get the base URL of your application
                        var jobListHtml = '<div class="row">';
                        $.each(response, function(index, job) {
                            // Create a job card using the provided template
                            var cardHtml = `
                            <div class="col-md-4 mb-4">
                                <a href="#" class="job-card myCart" data-toggle="modal" data-target="#jobModal${index}">
                                    <div class="card d-flex flex-column h-100" style="width: 20rem;">
                                        <img class="card-img-top"
                                            src="${job.jobImage ? baseUrl + 'storage/' + job.jobImage : 'placeholder-image.jpg'}"
                                            alt="Job Image">
                                        <div class="card-body">
                                            <h4 class="card-title">${job.jobtitle}</h4>
                                            <p class="card-text">${job.jobdeskripsion.substring(0, 60)}</p>
                                        </div>
                                        <div class="card-footer text-lg-right">
                                            <button class="btn btn-danger btn-sm delete-job" data-job-id="${job.jobID}">
                                                <i class="tim-icons icon-trash-simple"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm update-job" data-job-id="${job.jobID}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                            jobListHtml += cardHtml;

                            // Close row and start new row every 3 cards
                            if ((index + 1) % 3 === 0) {
                                jobListHtml += '</div><div class="row">';
                            }
                        });
                        jobListHtml += '</div>';
                        $('#jobList').html(jobListHtml);

                        // Attach click event to job cards to show details in modal
                        $('.myCart').click(function() {
                            var modalId = $(this).data('target');
                            $(modalId).modal('show');
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        var errorMessage = JSON.parse(xhr.responseText);
                        console.error(errorMessage);
                        alert('Error: ' + errorMessage.message);
                        // You can handle the error and display a message to the user
                    }
                });
            }

            // Initial fetch and display
            fetchJobData();

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
                $('#jobrecuire').val('');
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
                        $('#jobrecuire').val(data.jobrecuire);
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
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
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
                // var formData = new FormData(this);
                // var formData = $('#jobForm').serialize(); // Serialize the form data
                var formData = new FormData(this);
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
                        // You can update your UI or perform other actions here
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        var errorMessage = JSON.parse(xhr.responseText);
                        console.error(errorMessage);
                        alert('Error: ' + errorMessage.message);
                        // You can handle the error and display a message to the user
                    }
                });
            });
        });
    </script>
@endsection
