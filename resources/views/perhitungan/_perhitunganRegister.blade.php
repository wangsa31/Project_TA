@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Nilai
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);">Dashboard</a></li>
        <li><a href="javascript:void(0);">Nilai</a></li>
        <li class="active">Tambah Nilai</li>
    </ol>
@endsection


@section('style_css')
<link href="{{ asset('assets/css/coustem1.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="container-fluid">
                    <form action="/karyawan/perhitungan" method="POST">
                        @csrf
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Nama Karyawan</h5>
                                     <div class="form-line">
                                        <select class="form-control show-tick" name="a1">
                                            <option value="">-- Please select --</option>
                                            @foreach ($karyawan as $data)
                                                <option value="{{ $data->id }}" >
                                                    {{ $data->nama_karyawan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('a1')<span class="text-danger">{{ $message }}</span>@enderror
                                 </div>          
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Act professionalally</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a6') is-invalid @enderror"  name="a6"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div>
                                 @error('a6')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div>     
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Think guest stifaction first</h5>
                                <div class="form-line">
                                    <input type="text" class="form-control @error('a2') is-invalid @enderror" name="a2"  placeholder="masukan nilai diantar 1 - 5" />
                                </div>
                                @error('a2')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Act in findding solutions</h5>
                                <div class="form-line">
                                    <input type="text" class="form-control  @error('a7') is-invalid @enderror" name="a7"  placeholder="masukan nilai diantar 1 - 5" />
                                </div>
                                @error('a7')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Think positive</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a3') is-invalid @enderror" name="a3"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div> 
                                 @error('a3')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Act with transparency & ethics</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a8') is-invalid @enderror" name="a8"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div> 
                                 @error('a8')<span class="text-danger">{{ $message }}</span></div>@enderror
                             </div>            
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Think of others</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a4') is-invalid @enderror" name="a4"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div> 
                                 @error('a4')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Act as good citizens at workplace and outside</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a9') is-invalid @enderror" name="a9"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div> 
                                 @error('a9')<span class="text-danger">{{ $message }}</span>@enderror
                             </div>            
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Think out of the box</h5>
                                 <div class="form-line">
                                     <input type="text" class="form-control @error('a5') is-invalid @enderror" name="a5"  placeholder="masukan nilai diantar 1 - 5" />
                                 </div>
                                 @error('a9')<span class="text-danger">{{ $message }}</span></div>@enderror 
                             </div>            
                        </div>

                        <div class="button-register text-center col-sm-12">
                            <a href="/karyawan/perhitungan" class="btn btn-danger m-r-10 font-sm waves-effect"> <i class="material-icons">chevron_left</i> Kembali</a>
                            <button  class="btn btn-primary font-sm waves-effect"><i  class="material-icons">save</i> Simpan</button>
                        </div>
                    </form>
                </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection