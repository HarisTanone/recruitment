@extends('layout.new_layout_admin')
@section('title', 'Kandidat')
@section('menu', 'Kandidat')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ url('/admin/exportxlx') }}" class="btn btn-sm btn-outline-primary">Export to Excel</a>
                </div>
                <div class="card-body">
                    <table id="kandidatTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Kelamin</th>
                                <th>IPK</th>
                                <th>Jurusan</th>
                                <th>Lama Bekerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kandidatList as $kandidat)
                                <tr>
                                    <td>{{ $kandidat->id }}</td>
                                    <td>{{ $kandidat->nama }}</td>
                                    <td>{{ $kandidat->usia }}</td>
                                    <td>{{ $kandidat->kelamin }}</td>
                                    <td>{{ $kandidat->ipk ?? '-' }}</td>
                                    <td>{{ $kandidat->jurusan ?? '-' }}</td>
                                    <td>{{ $kandidat->lama_bekerja ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#kandidatTable').DataTable();
        });
    </script>
@endsection
