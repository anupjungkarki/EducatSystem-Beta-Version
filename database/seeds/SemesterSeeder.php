<?php

use Illuminate\Database\Seeder;
use App\Semester;
class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data['name']="1st";
        Semester::create($data);

        $data['name']="2nd";
        Semester::create($data);

        $data['name']="3rd";
        Semester::create($data);

        $data['name']="4th";
        Semester::create($data);

        $data['name']="5th";
        Semester::create($data);

        $data['name']="6th";
        Semester::create($data);

        $data['name']="7th";
        Semester::create($data);

        $data['name']="8th";
        Semester::create($data);
    }
}
