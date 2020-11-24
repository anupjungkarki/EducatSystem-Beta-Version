<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
   {
     
      $this->call(FacultySeeder::class);
      $this->call(ProgramSeeder::class);
      $this->call(AdmissionYearSeeder::class);
      $this->call(SemesterSeeder::class);
      $this->call(YearSeeder::class);
      $this->call(Students::class);
      $this->call(ModuleSeeder::class);
      $this->call(UserRoleSeeder::class);
      $this->call(UserAccessSeeder::class);
       $this->call(UserSeeder::class);
    }
}
