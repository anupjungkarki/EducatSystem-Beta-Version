<?php

use Illuminate\Database\Seeder;
use App\Student;
class Students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //science faculty

        $data['name']='anup';
        $data['email']='anup@gmail.com';
        $data['permanent_address']='pepsi';
        $data['current_address']='pepsi';
        $data['gender']='male';
        $data['dob']='1997-1-8';
        
        $data['year_id']=1;
        $data['semester_id']=2;
       
        $data['admission_year_id']=1;
        $data['parents_name']='xyz';
        $data['total_fees']='125632';
        $data['parents_phone']='9807590188';
        $data['faculty_id']=1;
        $data['program_id']=1;
        $data['image']='1589695017.jpg';
        $data['student_phone']='1256895214';


        Student::create($data);


        $data['name']='anup1';
        $data['email']='anup1@gmail.com';
        $data['permanent_address']='pepsi';
        $data['current_address']='pepsi';
        $data['gender']='male';
        $data['dob']='1997-1-8';
       
        $data['year_id']=1;
        $data['semester_id']=2;

        $data['admission_year_id']=1;
        $data['parents_name']='xyz';
        $data['total_fees']='125632';
        $data['parents_phone']='9807590188';
        $data['faculty_id']=1;
        $data['program_id']=2;
        $data['image']='1589695017.jpg';
        $data['student_phone']='1256895214';


        Student::create($data);

        $data['name']='anup2';
        $data['email']='anup2@gmail.com';
        $data['permanent_address']='pepsi';
        $data['current_address']='pepsi';
        $data['gender']='male';
        $data['dob']='1997-1-8';
        
        $data['year_id']=1;
        $data['semester_id']=2;
         $data['admission_year_id']=1;
        $data['parents_name']='xyz';
        $data['total_fees']='125632';
        $data['parents_phone']='9807590188';
        $data['faculty_id']=1;
        $data['program_id']=1;
        $data['image']='1589695017.jpg';
        $data['student_phone']='1256895214';


        Student::create($data);



         $data['name']='anup23';
        $data['email']='anup23@gmail.com';
        $data['permanent_address']='pepsi';
        $data['current_address']='pepsi';
        $data['gender']='male';
        $data['dob']='1997-1-8';
        
        $data['year_id']=1;
        $data['semester_id']=2;
         $data['admission_year_id']=1;
        $data['parents_name']='xyz';
        $data['total_fees']='125632';
        $data['parents_phone']='9807590188';
        $data['faculty_id']=1;
        $data['program_id']=2;
        $data['image']='1589695017.jpg';
        $data['student_phone']='1256895214';


        Student::create($data);

    }
}
