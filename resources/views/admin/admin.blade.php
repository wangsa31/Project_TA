@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    DATA PENGGUNA
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);">Data Pengguna</a></li>
    </ol>
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div >
                     <a href="/admin/register" class="icon btn btn-success  waves-effect"> <i class="icon material-icons">add</i>Tambah admin</a>
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
            <div class="body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $datas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$datas->name}}</td>
                                <td>{{$datas->email}}</td>
                                <td class="d-flex">
                                    <a href="/admin/{{$datas->id}}/ubah" class="btn btn-warning  waves-effect">Ubah</a>
                                    <a href="/admin/{{$datas->id}}/hapus" class="btn btn-danger delete-confirm" data-name="{{$datas->name}}">Hapus</a>
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
                    text: `kamu ingin menghapus ${name} ?`,
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
