<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use Auth;
use App\UserAccess;

class LoginController extends Controller
{
    public function showloginform()
    {
       return view('admin.login.login');
    }


    public function login(Request $request)
    {
    	
        $this->validate($request, ['email' => 'required|email',
                                    'password' => 'required']);


        if(auth()->attempt(['email' => $request->email,
                            'password' => $request->password])){

           $userAccess=UserAccess::where('user_role_id', auth()->user()->user_role_id)->get();
          $role=[];
   
           foreach ($userAccess as $access) 
           {
                   $role[$access->module_id."_view"]=$access->view;
                   $role[$access->module_id."_add"]=$access->add;
                   $role[$access->module_id."_edit"]=$access->edit;
                   $role[$access->module_id."_delete"]=$access->delete;
                 
           }
            
         

           session()->put('UserAccess',$role);
          
         


            return redirect('/home');
        }else{
            return redirect()->back();
//            return redirect('admin/login');
        }

    } 


    public  function logout()
    {
      Auth::logout();
      return redirect('/');
    }


}
