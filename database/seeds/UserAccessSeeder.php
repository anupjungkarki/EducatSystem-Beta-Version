<?php

use Illuminate\Database\Seeder;
use App\UserAccess;
class UserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data['user_role_id']=1;
       $data['module_id']=1;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

       $data['user_role_id']=1;
       $data['module_id']=2;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);


       $data['user_role_id']=1;
       $data['module_id']=3;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);


       $data['user_role_id']=1;
       $data['module_id']=4;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

       $data['user_role_id']=1;
       $data['module_id']=5;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

       $data['user_role_id']=1;
       $data['module_id']=6;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

       $data['user_role_id']=1;
       $data['module_id']=7;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

       $data['user_role_id']=1;
       $data['module_id']=8;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

        $data['user_role_id']=1;
       $data['module_id']=9;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);
        $data['user_role_id']=1;
       $data['module_id']=10;
       $data['view']=1;
       $data['add']=1;
       $data['edit']=1;
       $data['delete']=1;
       UserAccess::create($data);

    }
}
