@extends('layout.new_layout_admin')
@section('title', 'FAQ Data')
@section('menu', 'FAQ')
@section('konten')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <select class="form-control" id="statusFilter">
                                <option value="all">All</option>
                                <option value="1">Active</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search..."
                            aria-label="Search..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" id="btn_insert">Insert</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" id="tampilFAQ">
                        {{-- tampilFAQ --}}
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
                                        <div class="form-group">
                                            <label for="inputQuestion">Question</label>
                                            <input type="text" class="form-control" id="inputQuestion"
                                                placeholder="Enter question" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAnswer">Answer</label>
                                            <textarea class="form-control" id="inputAnswer" rows="3" placeholder="Enter answer" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-lg-left">
                                                <div class="form-group">
                                                    {{-- <label for="inputAnswer">Status</label> --}}
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Draft</option>
                                                    </select>
                                                </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var faqData;

            function renderFAQ(data) {
                var html = '';
                $.each(data, function(idx, val) {
                    html += `
                        <div class="col-lg-6 col-md-12 col-sm-12 pb-3" id="accordion${val.id}">
                            <div class="card card-primary card-outline d-flex flex-column h-100 shadow">
                                <div class="card-header" data-target="#collapse${val.id}" data-toggle="collapse">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">${val.question}</h4>
                                        <span class="badge ${val.status === 1 ? 'bg-success' : 'bg-secondary'}">
                                            ${val.status === 1 ? 'Active' : 'Draft'}
                                        </span>
                                    </div>
                                </div>
                                <div id="collapse${val.id}" class="collapse" data-parent="#accordion${val.id}">
                                    <div class="card-body">${val.answer}</div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button class="btn btn-sm btn-info mr-2" id="btn_update" data-id="${val.id}">Update</button>
                                            <button class="btn btn-sm btn-danger" id="btn_delete" data-id="${val.id}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#tampilFAQ').html(html);
            }

            function getFAQ() {
                $.getJSON("/admin/faq/all",
                    function(data) {
                        faqData = data; // Store the data for searching
                        renderFAQ(data);
                    }
                );
            }
            getFAQ();

            $('#btn_insert').click(function(e) {
                e.preventDefault();
                $('#mymodal').modal('show')
                $('#mymodal').data('action', 'insert');
                $('#mymodal').data('faqid', '');
                $('#inputQuestion').val('')
                $('#inputAnswer').val('')
                $('#status').val('1')
                $('.mytitle').text('Insert FAQ')
            });

            $(document).on('click', '#btn_update', function(e) {
                var faqId = $(this).data('id');
                $('#mymodal').modal('show')
                $('#mymodal').data('action', 'edit');
                $('#mymodal').data('faqid', faqId);
                $('.mytitle').text('Update FAQ')
                $.getJSON("/admin/faq/" + faqId,
                    function(data, textStatus, jqXHR) {
                        $('#inputQuestion').val(data.question)
                        $('#inputAnswer').val(data.answer)
                        $('#status').val(data.status)
                    }
                );
            });

            $('#myform').submit(function(e) {
                e.preventDefault();
                var action = $('#mymodal').data('action');
                var faqid = $('#mymodal').data('faqid');

                const url = action === 'insert' ? "/admin/faq/insert" : "/admin/faq/update/" + faqid
                var data = {
                    question: $('#inputQuestion').val(),
                    answer: $('#inputAnswer').val(),
                    status: $('#status').val(),
                    _token: $('#token').attr('content')
                };
                $.post(url, data, function(response) {
                    $('#mymodal').modal('hide');
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        button: false,
                        timer: 1350
                    })
                    getFAQ();
                }, "json");
            });

            $('#statusFilter, #searchInput').on('change input', function() {
                var searchTerm = $("#searchInput").val().toLowerCase();
                var statusFilter = $("#statusFilter").val();
                var filteredData = faqData.filter(function(faq) {
                    return (
                        (faq.question.toLowerCase().includes(searchTerm) ||
                            faq.answer.toLowerCase().includes(searchTerm)) &&
                        (statusFilter === 'all' || faq.status.toString() === statusFilter)
                    );
                });

                if (filteredData.length === 0) {
                    $('#tampilFAQ').html('<p>No results found.</p>');
                } else {
                    renderFAQ(filteredData);
                }
            });

            $(document).on('click', '#btn_delete', function(e) {
                e.preventDefault();
                var faqId = $(this).data('id');
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
                                url: '/admin/faq/delete/' + faqId,
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
                                    getFAQ();
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
