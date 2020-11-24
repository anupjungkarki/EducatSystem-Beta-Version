<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data['program_name']='BIT';
          $data['faculty_id']=1;
          Program::create($data);


          $data['program_name']='BCA';
          $data['faculty_id']=1;
          Program::create($data);



          $data['program_name']='B.Arch';
          $data['faculty_id']=1;
          Program::create($data);




          $data['program_name']='Computer Engineering';
          $data['faculty_id']=1;
          Program::create($data);



          $data['program_name']='Civil Engineering';
          $data['faculty_id']=1;
          Program::create($data);


          $data['program_name']='Electrical Engineering';
          $data['faculty_id']=1;
          Program::create($data);


           $data['program_name']='Electronic Engineering';
          $data['faculty_id']=1;
          Program::create($data);


   // managment


          $data['program_name']='BBS';
          $data['faculty_id']=2;
          Program::create($data);


          $data['program_name']='BBA';
          $data['faculty_id']=2;
          Program::create($data);




          $data['program_name']='BHM';
          $data['faculty_id']=2;
          Program::create($data);





          $data['program_name']='BTTM';
          $data['faculty_id']=2;
          Program::create($data);



  //arts
    
          $data['program_name']='BID';
          $data['faculty_id']=3;
          Program::create($data);


           $data['program_name']='BMT';
          $data['faculty_id']=3;
          Program::create($data);



           $data['program_name']='BJMC';
          $data['faculty_id']=3;
          Program::create($data);



          ///law



           $data['program_name']='BALLB';
          $data['faculty_id']=4;
          Program::create($data);



           $data['program_name']='LLB';
          $data['faculty_id']=4;
          Program::create($data);
    }
}
