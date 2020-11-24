<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']="jitu";
        $data['email']='jitbdrrana8@gmail.com';
        $data['password']=Hash::make('password');
        $data['user_role_id']=1;

        User::create($data);

        $data['name']="Anup Jung Karki";
        $data['email']='anupkarki2012@gmail.com';
        $data['password']=Hash::make('Simkharka5');
        $data['user_role_id']=1;
        User::create($data);

        $data['name']="Anup Jung Karki";
        $data['email']='admin@anupkarki.com.np';
        $data['password']=Hash::make('Simkharka5');
        $data['user_role_id']=2;
        User::create($data);
    }
}
