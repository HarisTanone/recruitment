@extends('layout.new_layout_admin')
@section('title', 'Kandidat Applied')
@section('menu', 'Kandidat Applied')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <button id="downloadexcel" class="btn btn-outline-primary btn-sm">Download Excel</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kandidat ID</th>
                                <th>Nama</th>
                                <th>Persentase Kesesuaian</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data dari JSON akan ditambahkan di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal_progress" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Progress Rekruitment</h5>
                </div>
                <div class="modal-body">
                    <form id="update_progress">
                        <select name="progress" id="progress" class="form-control">
                            <option value="process">Process</option>
                            <option value="accept">Accept</option>
                            <option value="decline">Decline</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveProgress">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Mendapatkan ID dari current URL
            var currentURL = window.location.href;
            var urlParts = currentURL.split('/');
            var id = urlParts[urlParts.length - 1]; // Mengambil bagian terakhir dari URL

            // Inisialisasi DataTable
            var table = $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "columnDefs": [{
                        "targets": [2], // Kolom Persentase Kesesuaian
                        "render": function(data, type, row) {
                            var badgeClass = 'badge-danger'; // Default: danger
                            if (parseFloat(data) >= 80) {
                                badgeClass = 'badge-success'; // Jika >= 80%
                            } else if (parseFloat(data) >= 50) {
                                badgeClass = 'badge-warning'; // Jika >= 50% (dan < 80%)
                            }

                            return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                        }
                    },
                    {
                        "targets": -1, // Kolom terakhir (action column)
                        "data": null,
                        "defaultContent": '<div class="btn-group" role="group" aria-label="Basic example">' +
                            '<button type="button" class="btn btn-sm btn-outline-primary progress-button">Progress</button>' +
                            '<button type="button" class="btn btn-sm btn-outline-primary">Mail Job</button>' +
                            '</div>'
                    },
                    {
                        "targets": [3],
                        "render": function(data, type, row) {
                            var badgeClass = 'badge-primary'; // Default: danger
                            if (data == 'accept') {
                                badgeClass = 'badge-success'; // Jika >= 80%
                            } else if (data == 'decline') {
                                badgeClass = 'badge-danger'; // Jika >= 50% (dan < 80%)
                            }

                            return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                        }
                    }
                ]
            });

            function get_datatable() {
                table.clear().draw();
                $.ajax({
                    url: "/admin/cek_Kandidat/" + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data.data, function(index, item) {
                            table.row.add([item.Kandidat_ID, item.nama, item
                                    .Persentase_Kesesuaian,
                                    item.progress
                                ])
                                .draw(
                                    false);
                        });
                    }
                });
            }
            get_datatable()
            $('#datatable').on('click', '.progress-button', function() {
                // Menyimpan data kandidat ID dan job ID
                var rowData = table.row($(this).parents('tr')).data();
                var kandidatID = rowData[0];
                var jobID = id;
                $('#modal_progress').modal('show');
                $('#modal_progress').data('kandidat-id', kandidatID);
                $('#modal_progress').data('job-id', jobID);
            });

            $('#saveProgress').on('click', function() {
                var kandidatID = $('#modal_progress').data('kandidat-id');
                var jobID = $('#modal_progress').data('job-id');
                var progress = $('#progress').val(); // Mengambil nilai progress dari form modal

                $.ajax({
                    url: '/admin/updateProgress/' + kandidatID + '/' + jobID,
                    type: 'POST',
                    data: {
                        progress: progress,
                        _token: $('#token').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            swal({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                button: false,
                                timer: 1350
                            })
                            $('#modal_progress').modal('hide');
                            get_datatable()
                        }
                    }
                });
            });

            $('#downloadexcel').click(function(e) {
                e.preventDefault();
                window.location.href = '/admin/exportToExcel/' + id
            });
        });
    </script>
@endsection
