<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\userRole;

class UserRoleController extends Controller
{
     public function index()
    {
    	
    	$data['userroles']=userRole::all();
    	return view('admin.userRole.index',$data);
    }




    public function create()
    {
    	return view('admin.userRole.create');	
    }



    public function store(Request $request)
    {
        $this->validate($request,[

        'name'=>'required'
        ]);
        $data['name']=$request->name;
        userRole::create($data);
       
        session()->flash('success','Role name has been added');
        return redirect(route('admin.user.role'));
    }
}
