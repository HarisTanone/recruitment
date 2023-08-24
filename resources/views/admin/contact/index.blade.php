@extends('layout.new_layout_admin')
@section('title', 'Contact Data')
@section('menu', 'Contact')
@section('konten')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search..."
                            aria-label="Search..." aria-describedby="button-addon2">
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" id="tampilContact">
                        {{-- data tampil sini --}}
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="mytitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="myform">
                                        @csrf
                                        <input type="hidden" name="firstname" id="firstname" value="">
                                        <input type="hidden" name="lastname" id="lastname" value="">
                                        <input type="hidden" name="email" id="email" value="">
                                        <div class="form-group">
                                            <label id="hi_name">Hi, Haris Tanone</label>
                                            <p class="text-muted" id="hi_email">
                                                Tanoneharis@Gmail.com
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Reply Message" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-lg-left">
                                            </div>
                                            <div class="col-6 text-lg-right">
                                                <button type="submit" class="btn btn-primary">Mail</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var dataContact;
            getContact()

            function getContact() {
                $.getJSON("/admin/contact/all",
                    function(data) {
                        dataContact = data; // Store the data for searching
                        renderContact(data);
                    }
                );
            }

            function renderContact(data) {
                var html = '';
                $.each(data, function(idx, val) {
                    html += `
                        <div class="col-lg-6 col-md-12 col-sm-12 pb-3" id="accordion${val.id}">
                            <div class="card card-primary card-outline d-flex flex-column h-100 shadow">
                                <div class="card-header" data-target="#collapse${val.id}" data-toggle="collapse">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">${val.firstname} - ${val.lastname}</h4>
                                        <h4 class="card-title">${val.email}</h4>
                                    </div>
                                </div>
                                <div id="collapse${val.id}" class="collapse" data-parent="#accordion${val.id}">
                                    <div class="card-body">${val.message}</div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button class="btn btn-sm btn-info mr-2" id="btn_update"
                                                data-id="${val.id}">Reply</button>
                                            <button class="btn btn-sm btn-danger" id="btn_delete"
                                                data-id="${val.id}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#tampilContact').html(html);
            }

            $('#searchInput').on('input', function() {
                var searchTerm = $("#searchInput").val().toLowerCase();
                var filteredData = dataContact.filter(function(cont) {
                    return (
                        (
                            cont.firstname.toLowerCase().includes(searchTerm) ||
                            cont.lastname.toLowerCase().includes(searchTerm) ||
                            cont.email.toLowerCase().includes(searchTerm) ||
                            cont.message.toLowerCase().includes(searchTerm)
                        )
                    );
                });

                if (filteredData.length === 0) {
                    $('#tampilContact').html('<p>No results found.</p>');
                } else {
                    renderContact(filteredData);
                }
            });

            $(document).on('click', '#btn_update', function(e) {
                var contID = $(this).data('id');
                $('#mymodal').modal('show')
                $('#mymodal').data('action', 'edit');
                $('#mymodal').data('faqid', contID);
                $('.mytitle').text('Reply Message')
                $.getJSON("/admin/contact-us/" + contID,
                    function(data) {
                        $('#firstname').val(data.firstname)
                        $('#lastname').val(data.lastname)
                        $('#email').val(data.email)
                        $('#hi_name').text('Hi, ' + data.firstname + ' ' + data.lastname);
                        $('#hi_email').text(data.email)
                    }
                );
            });

            $('#myform').submit(function(e) {
                e.preventDefault();
                $.post("/admin/contact-us/send-email", $(this).serialize(),
                    function(data) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: false,
                            timer: 1350
                        })
                        $('#mymodal').modal('hide')
                        getContact()
                    },
                    "json"
                );
            });

            $(document).on('click', '#btn_delete', function(e) {
                e.preventDefault();
                var contID = $(this).data('id');
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/contact-us/' + contID,
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('#token').attr('content')
                                },
                                success: function(response) {
                                    swal({
                                        title: "Success",
                                        text: response.message,
                                        icon: "success",
                                        button: false,
                                        timer: 1350
                                    })
                                    getContact();
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
        });
    </script>
@endsection
