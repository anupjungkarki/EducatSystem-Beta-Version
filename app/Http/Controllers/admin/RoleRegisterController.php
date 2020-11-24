<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\User;
use Illuminate\Support\Facades\Hash;
class RoleRegisterController extends Controller
{
    public function roleregisterform()
    {
    	$data['roles']=UserRole::all();
    	return view('admin.register.register',$data);
    }

    public function store()
    {
    	$data=request()->validate([
         'name'=>'required',
         'email'=>'required|email|unique:users,email',
         'password'=>'required|min:5|confirmed',
         'user_role'=>'required'


    	]);

    	$obj=new User();
    	 $obj->name=$data['name'];
    	 $obj->email=$data['email'];
    	 $obj->password=Hash::make($data['password']);
    	 $obj->user_role_id=$data['user_role'];
    	 $obj->save();

        session()->flash('success','New User has been registered');
    	 return redirect(route('admin.role.register.form'));


    }
}
