<?php

use Illuminate\Database\Seeder;
use App\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data['faculty_name']='Science and technology';

         Faculty::create($data);

          $data['faculty_name']='Managment';

         Faculty::create($data);

          $data['faculty_name']='Arts';

         Faculty::create($data);

          $data['faculty_name']='Law';

         Faculty::create($data);
    }
}
