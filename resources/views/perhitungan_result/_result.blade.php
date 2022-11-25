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
                     <a href="/konversi/pdf" target="_blank" class="icon btn btn-success  waves-effect"> <i class="icon material-icons">add</i>PDF</a>
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
                <table class="table table-condensed  dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Departemen</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rank=[];?>
                        @foreach ( $nilai as $datas => $value)
                        <?php 
                            $rank[]=[
                                "name"=> $value->karyawan->nama_karyawan,
                                "value"=>$data[$datas],
                                "departemen"=> $value->karyawan->departemen->nama_departemen
                            ]
                        ?>
                        @endforeach
                        <?php 
                        
                        usort($rank,function($a,$b){
                            return $b['value'] - $a['value'];
                        })
                        ?>
                    @foreach ( $rank as $datas => $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['departemen']}}</td>
                        <td>{{$value['value']}}</td>
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
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script>
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
</script> -->
@endsection

