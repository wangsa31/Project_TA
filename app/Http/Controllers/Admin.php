<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Alert;
class Admin extends Controller
{
    //

    public function Admins(){
        $admin = User::all();
        return view('admin.admin',['data'=>$admin]);
    }
    
    
    public function Register(){
        return view('admin.register');
    }

    public function RegisterPost(Request $request){
        
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','min:6'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->save();
        
        return redirect('/dashboard')->with('success','Data berhasil dimasukan');
        
    }

    public function Edit($id){
        $admin = User::Where('id',$id)->first();
        return view('admin.edit',['data'=>$admin]);
    }

    public function EditPost(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','min:6'],
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/dashboard')->with('success','Data berhasil diubah');

    }

    Public function DeletePost($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/dashboard')->with('success','Data berhasil Dihapus');
    }



    // add departmen (karyawan) controller

    public function Departemen(){
        $departemen = Departemen::all();
        return view('departemen._depart',['departemen'=>$departemen]);
    }

    public function DepartRegister(){
      
        return view('departemen._departRegister');
    }

    public function DepartPost(Request $request){
        $credentials = $request->validate(
            [
            'depart_name' => ['required','regex:/^[a-zA-Z\s]+$/']
            ],
            [
                'depart_name.required' => 'the field is required',
                'depart_name.regex' => 'Invalid format the value',
            ]
        );

        
        $deparrtemen = new Departemen;
        $deparrtemen->nama_departemen = $request->depart_name;
        $deparrtemen->save();
        return redirect('/dashboard')->with('success','Data berhasil ditambahkan');
    }

    public function DepartEdit($id){
        $departemen = Departemen::Where('id',$id)->first();
        return view('departemen._departEdit',['departemen'=> $departemen]);
    }

    Public function DepartEditPost(Request $request){
        $credentials = $request->validate(
            [
            'depart_name' => ['required','regex:/^[a-zA-Z\s]+$/']
            ],
            [
                'depart_name.required' => 'the field is required',
                'depart_name.regex' => 'Invalid format the value',
            ]
        );

        $departemen = Departemen::find($request->id);
        $departemen->nama_departemen = $request->depart_name;
        $departemen->save();

        return redirect('/dashboard')->with('success','Data berhasil diubah');
    }

    public function DepartDeletePost($id){
        $departemen = Departemen::find($id);
        $departemen->delete();
        return redirect('/dashboard')->with('success','Data berhasil Dihapus');
    }

}
