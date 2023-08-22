@extends('layout.new_layout_admin')
@section('title', 'FAQ Data')
@section('menu', 'FAQ')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <button class="btn btn-success" type="button" id="btn_insert">Insert</button>
                </div>
                <div class="card-body">
                    <table id="faqTable" class="display">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                            <input type="text" class="form-control" id="inputQuestion" placeholder="Enter question"
                                required>
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

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#faqTable').DataTable({
                responsive: true,
                ajax: {
                    url: '/admin/faq/all', // Replace with your API endpoint
                    dataSrc: ''
                },
                columns: [{
                        data: 'question',
                        render: function(data, type, row) {
                            return data.length > 20 ? data.substr(0, 20) + '...' :
                                data;
                        }
                    },
                    {
                        data: 'answer',
                        render: function(data, type, row) {
                            return data.length > 30 ? data.substr(0, 85) + '...' :
                                data;
                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data === 1) {
                                return '<span class="badge bg-success">Active</span>';
                            } else if (data === 0) {
                                return '<span class="badge bg-secondary">Draft</span>';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                        <button class="btn btn-warning btn-edit btn-sm" data-id="${row.id}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-delete btn-sm" data-id="${row.id}">
                            <i class="fas fa-trash"></i>
                        </button>`;
                        },
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#faqTable').on('click', '.btn-edit', function() {
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

            $('#faqTable').on('click', '.btn-delete', function() {
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
                            //
                            $.ajax({
                                url: '/admin/faq/delete/' + faqId,
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('#token').attr('content')
                                },
                                success: function(response) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        button: false,
                                        timer: 1350,
                                        icon: "success",
                                        title: "Success",
                                    });
                                    $('#faqTable').DataTable().ajax.reload();
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
                    $('#faqTable').DataTable().ajax.reload();
                }, "json");
            });

        });
    </script>
@endsection
