<?php

use Illuminate\Database\Seeder;
use App\Year;
class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data['name']="First";
         Year::create($data);

         $data['name']="Second";
         Year::create($data);

         $data['name']="Third";
         Year::create($data);

         $data['name']="Fourth";
         Year::create($data);
    }
}
