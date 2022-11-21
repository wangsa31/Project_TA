@extends('master')

@section('account')
    {{Auth::user()->name}}
@endsection

@section('email')
    {{Auth::user()->email}}
@endsection

@section('title')
    Data Admin
@endsection

@section('content')
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                    <form action="/admin/register" method="POST">
                        @csrf
                        <div class="text-center">Tambah Data Admin</div>
                        <div class="form-group">
                            <h5>Name</h5>
                             <div class="form-line">
                                 <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Username" />
                             </div>
                             @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                        <div class="form-group">
                           <h5>Email</h5>
                            <div class="form-line">
                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Username" />
                            </div>
                            @error('email')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Password</h5>
                            <div class="form-line">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" />
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="button-register text-center">
                                <a href="/admin" class="btn btn-danger m-r-10 font-sm waves-effect"> <i class="material-icons">chevron_left</i> Kembali</a>
                                <button  class="btn btn-primary font-sm waves-effect"><i  class="material-icons">save</i> Simpan</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection