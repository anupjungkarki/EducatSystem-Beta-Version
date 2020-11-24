<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\schema;
use App\results;
use App\Student;
use App\Assignment;
use App\Notice;
use App\ProgramCourse;
use App\Faculty;
Use App\Program;
use App\Marks;use View;
use App\User;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       schema::defaultStringLength(150);
     // session()->put('active1',$data);//Alternative Way to show database records//

        $data=Marks::count();
        view::Share('active',$data);

        $data=Student::count();
        view::Share('active1',$data);

        $data=Assignment::count();
        view::Share('active2',$data);

        $data=Notice::count();
        view::Share('active3',$data);

        $data=ProgramCourse::count();
        view::Share('active4',$data);

        $data=Faculty::count();
        view::Share('active5',$data);

        $data=Program::count();
        view::Share('active6',$data);

        $data=Auth::id();
        
    }
}
