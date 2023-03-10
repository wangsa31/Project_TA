@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Karyawan
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);">Dashboard</a></li>
        <li><a href="javascript:void(0);">Karyawan</a></li>
        <li class="active">Ubah Karyawan</li>
    </ol>
@endsection

@section('content')
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                    <form action="/karyawan/ubah" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $karyawan->id}}">
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Nama</h5>
                                     <div class="form-line">
                                         <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $karyawan->nama_karyawan }}" placeholder="Nama karyawan" />
                                     </div>
                                     @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                   
                                 </div>          
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Tempat lahir</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror" name="tmp_lahir" value="{{ $karyawan->tempat_lahir }}" placeholder="Tempat lahir" />
                                 </div>
                                 @error('tmp_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                               
                             </div>            
                        </div>     
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Departemen</h5>
                                <select class="form-control show-tick" name="depart">                                
                                    @foreach ($departemen as $data)
                                    {{-- <option value="">-- Please select --</option> --}}
                                        <option value="{{ $data->id }}" @selected(old('depart') == $data->id)>
                                            {{ $data->nama_departemen }}
                                        </option>
                                        
                                    @endforeach

                                    
                                </select>
                                 @error('depart')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                               
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Tanggal lahir</h5>
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="date" class="form-control" value="{{ $karyawan->tanggal_lahir }}" name="dates">
                                </div>
                                 @error('dates')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                               
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Alamat</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('almt') is-invalid @enderror" name="almt" value="{{ $karyawan->alamat_karyawan }}" placeholder="Departemen" />
                                 </div>
                                 @error('almt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                               
                             </div>            
                        </div> 

                        <div class="button-register text-center col-sm-12">
                            <a href="/karyawan" class="btn btn-danger m-r-10 font-sm waves-effect"> <i class="material-icons">chevron_left</i> Kembali</a>
                            <button  class="btn btn-primary font-sm waves-effect"><i  class="material-icons">save</i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection