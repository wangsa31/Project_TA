@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Departemen
@endsection

@section('content')
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                    <form action="/departemen/ubah" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$departemen->id}}">
                        <div class="text-center">Ubah Data Admin</div>
                        <div class="form-group">
                            <h5>Name</h5>
                             <div class="form-line">
                                 <input type="text" class="form-control  @error('depart_name') is-invalid @enderror" name="depart_name" placeholder="Departemen" value="{{$departemen->nama_departemen}}" />
                             </div>
                             @error('depart_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                        
                            <div class="button-register text-center">
                                <a  href="/admin" class="btn btn-danger m-r-10 font-sm waves-effect"> <i class="material-icons">chevron_left</i> Kembali</a>
                                <button class="btn btn-primary font-sm  waves-effect"><i  class="material-icons wafe-effect">save</i> Simpan</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection