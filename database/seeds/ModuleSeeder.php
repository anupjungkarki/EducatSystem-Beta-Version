<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']='Student';

        Module::create($data);

        $data['name']='Faculty';

        Module::create($data);

        $data['name']='Program';



        Module::create($data);

         $data['name']='year';

        Module::create($data);

        $data['name']='Symbol Number';

        Module::create($data);

        $data['name']='Course';

        Module::create($data);

        $data['name']='Teacher';

        Module::create($data);

        $data['name']='Assignment';

        Module::create($data);

        $data['name']='Marks';


        Module::create($data);

        $data['name']='Notice';

        Module::create($data);


    }
}
