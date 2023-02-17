@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    DETAIL KARYAWAN
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);">Dashboard</a></li>
        <li><a href="javascript:void(0);">Karyawan</a></li>
        <li class="active">Detail Karyawan</li>
    </ol>
@endsection

@section('content')
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                    <form action="/karyawan/register" method="POST">
                        @csrf
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Nama</h5>
                                     <div class="form-line">
                                         <input type="text" class="form-control" name="name" value="{{ $karyawan->nama_karyawan}}" placeholder="Nama karyawan" disabled />
                                     </div>               
                                 </div>          
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Tempat lahir</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="tmp_lahir" value="{{ $karyawan->tempat_lahir }}" placeholder="Tempat lahir" disabled />
                                 </div>
                             </div>            
                        </div>     
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Departemen</h5>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="tmp_lahir" value="{{ $karyawan->departemen->nama_departemen }}" placeholder="Departemen" disabled />
                                </div>                     
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Tanggal lahir</h5>
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" class="form-control" value="{{ $karyawan->tanggal_lahir }}" name="dates" disabled>
                                </div>
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Alamat</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="almt" value="{{ $karyawan->alamat_karyawan }}" disabled />
                                 </div>
                             </div>            
                        </div> 

                        <div class="button-register text-center col-sm-12">
                            <a href="/karyawan" class="btn btn-danger m-r-10 font-sm waves-effect"> <i class="material-icons">chevron_left</i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection