<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function edit(Request $request , $id)
    {
        $rules=['image'=>'image|required'
        ];

      $this->validate($request,$rules);
      
          if($request->hasFile('image'))

                     {
                       if(Auth::user()->image)
                       {
                       unlink(public_path().'/User/profile/img/'.Auth::user()->image);
                       }
                      }

            if($request->hasFile('image'))
             {  
                $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('User/profile/img/',$filename);
                $data['image']=$filename;
             }
        User::where('id',$id)->update($data);
        return redirect()->back();
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.home');
    }
}
