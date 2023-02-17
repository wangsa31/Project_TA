@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Perhitungan
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);">Dashboard</a></li>
        <li class="active">Nilai</li>
    </ol>
@endsection



@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div >
                     <a href="/karyawan/perhitungan/register" class="icon btn btn-success  waves-effect"> <i class="icon material-icons">add</i>Tambah Nilai</a>
                     {{-- <a href="/karyawan/hitung" class="icon btn btn-primary  waves-effect" style="padding:10px 20px 10px 20px; line-height: -10px;">Hitung</a> --}}
                </div>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Think guest stisfaction first</th>
                            <th>Think positive</th>
                            <th>Think of others</th>
                            <th>Think out of the box</th>
                            <th>Act professionally</th>
                            <th>Act in finding solutions</th>
                            <th>Act with transparency & ethics</th>
                            <th>act as good citizens at workplace and outside</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $nilai as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->karyawan->nama_karyawan}}</td>
                                <td>{{$data->kriteria_1}}</td>
                                <td>{{$data->kriteria_2}}</td>
                                <td>{{$data->kriteria_3}}</td>
                                <td>{{$data->kriteria_4}}</td>
                                <td>{{$data->kriteria_5}}</td>
                                <td>{{$data->kriteria_6}}</td>
                                <td>{{$data->kriteria_7}}</td>
                                <td>{{$data->kriteria_8}}</td>
                                <td>
                                    <a href="/karyawan/{{$data->id}}/hapus/perhitungan" class="btn btn-danger delete-confirm" data-name="{{$data->karyawan->nama_karyawan}}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            const name = $(this).data('name');
            Swal.fire({
                    title: 'Yakin?',
                    text: `kamu ingin menghapus Departemen ${name} ?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Hapus !'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                     }
                    })
});
    </script>
@endsection

