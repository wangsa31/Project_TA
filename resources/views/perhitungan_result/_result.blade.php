@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Perhitungan
@endsection



@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    Data Hasil Perhitungan
                </h4>

                <div >
                     <a href="/karyawan/perhitungan/register" class="icon btn btn-success  waves-effect"> <i class="icon material-icons">add</i>Tambah Nilai</a>
                     <a href="/karyawan/hitung" class="icon btn btn-primary  waves-effect" style="padding:10px 20px 10px 20px; line-height: -10px;">Hitung</a>
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
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $nilai as $datas => $value)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->karyawan->nama_karyawan }}</td>
                                <td>{{$data[$datas+0]}}</td>
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

