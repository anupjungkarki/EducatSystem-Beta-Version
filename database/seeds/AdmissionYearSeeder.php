<?php

use Illuminate\Database\Seeder;
use App\AdmissionYear;
class AdmissionYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         $data['admission_year']="2017";
         AdmissionYear::create($data);

         $data['admission_year']="2018";
         AdmissionYear::create($data);

         $data['admission_year']="2019";
         AdmissionYear::create($data);

         $data['admission_year']="2020";
         AdmissionYear::create($data);
    }
}
