<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\UserAccess;
use DB;
use App\UserRole;

class UserAccessController extends Controller
{
    public function show($role_id)
     {
     	$data['modules']=Module::all();
     	$data['user_role_id']=$role_id;
     	$data['role_name']=UserRole::where('id',$role_id)->value('name');
     



        $user_access = UserAccess::where('user_role_id', $role_id)->get();


        $final_array = [];
      

        foreach($user_access as $module)
        {
        	
            $final_array[$module->module_id."_view"] = $module->view;
            $final_array[$module->module_id."_add"] = $module->add;
            $final_array[$module->module_id."_edit"] = $module->edit;
            $final_array[$module->module_id."_delete"] = $module->delete;
            $final_array[$module->module_id."_changeStatus"] = $module->changeStatus;
           
        }

       
        $data['final_array'] = $final_array;
       
       return view('admin.userAccess.show',$data);
     }


     public function store(Request $request)
     {
     	  $checked = $request->except('user_role_id', '_token');

         
        $user_role_id = $request->user_role_id;


          $UserAccess=UserAccess::where('user_role_id',$user_role_id)->get();

          if($UserAccess->count()>0)
          {

          $module=[];
          $i=1;
           foreach($checked as $module_id => $permissions)
            {
                $module[$i]=$module_id;


             $data['user_role_id']=$user_role_id;

            if(array_key_exists('view', $permissions))
               {
               	 $data['view']=1;
               }

             else
              {
                 $data['view']=0;
              }
                

            if(array_key_exists('add', $permissions))
               
               {
                 $data['add']=1;
               }
             else
               {
                 $data['add']=0;
               } 

            if(array_key_exists('edit', $permissions))
                
               {
                  $data['edit']=1;
               }
             else
               {
                  $data['edit']=0;
               } 

            if(array_key_exists('delete', $permissions))
               {
                 $data['delete']=1;
               }
             else
              {
                   $data['delete']=0;
              }
                 
              

           
            $data['module_id']=$module_id;

            $checkIfModuleIdIsInTable=UserAccess::where('user_role_id',$user_role_id)->where('module_id',$module_id)->get();
            if($checkIfModuleIdIsInTable->count()>0)
             {
             	UserAccess::where('user_role_id',$user_role_id)->where('module_id',$module_id)->update($data);
             }
             else
             {
             	
                UserAccess::create($data);
             }
            
            
               $i++;
         }

             $modules=Module::all();
           
                $i=1;
                foreach($modules as $module_id)
                {
                	if(!in_array($module_id->id, $module))
                	 {
                	 	 
                	  $data['add']=0;
                       $data['view']=0;
                       $data['edit']=0;
                       $data['delete']=0;
                       $data['user_role_id']=$user_role_id;
                       $data['module_id']=$module_id->id;

                       UserAccess::where('user_role_id',$user_role_id)->where('module_id',$module_id->id)->update($data);
                      
                	 }
                	
                	
                	 $i++;

                }


        }




        else 
        {
        	foreach($checked as $module_id => $permissions)
        	{
            $userAccess = new UserAccess();
                    
              
            $userAccess->user_role_id = $user_role_id;

            if(array_key_exists('view', $permissions))
                $userAccess->view = 1;

            if(array_key_exists('add', $permissions))
                $userAccess->add = 1;

            if(array_key_exists('edit', $permissions))
                $userAccess->edit = 1;

            if(array_key_exists('delete', $permissions))
                $userAccess->delete = 1;



            $userAccess->module_id = $module_id;

            $userAccess->save();


          }
        }

     

        session()->flash('success', 'Permission Updated Successfully');
        return redirect()->back();
        

     }
}
