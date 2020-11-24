<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Year;
use App\Semester;
use App\AdmissionYear;
use App\SymbolNumber;
use App\SymbolNumberCatogery;
use App\Marks;
use App\Program;
use App\ProgramCourse;
use App\CourseCatogery;
use App\Notice;
class UserController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function result()
    {
    	  $data['faculty']=Faculty::all();
        $data['program']=Program::all();
    	  $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['admissionyear']=AdmissionYear::all();
    	return view('user.result',$data);
    }

    public function showmarksheet(Request $request)
    {
        $symbolcatogery=SymbolNumberCatogery::where('faculty_id',$request->faculty_id)
                                    ->where('program_id',$request->program_id)
                                    ->where('year_id',$request->year_id)
                                    ->where('semester_id',$request->semester_id)
                                    ->where('admission_year_id',$request->admission_year_id)->first();
                                    //dd($symbolcatogery);
        
        if($symbolcatogery==null)
        {
        session()->flash('error','Sorry!! Students is Not found in this Program');
        return redirect()->back();
        }

        else
        {
            $symbol=SymbolNumber::where('symbol_number',$request->symbol_number)
                                ->where('symbol_number_category_id',$symbolcatogery->id)->first();                             
        
           if($symbol==null)
           {

             session()->flash('error','Sorry!! Symbol Number is not Found');
             return redirect()->back();
           }

          else
          {
           $marks=Marks::where('symbol_number_id',$symbol->id)->where('symbol_number_category_id',$symbolcatogery->id)->get();
           $data['marks']=$marks;
           if($marks==null)
           {
            session()->flash('error','Result not Published yet');
            return redirect()->back();
           }

           else{
            $total=0;
            $count=0;
            $status='Pass';
            foreach($marks as $data)
            {
                $total+=$data->marks;
                $count++;
                if($data->marks<32)
                {
                    $status='Fail';
                }
            }
            $percentage=($total/$count);
            $data['status']=$status;
            $data['percentage']=$percentage;
            $data['marks']=Marks::where('symbol_number_id',$symbol->id)->where('symbol_number_category_id',$symbolcatogery->id)->get();
            $data['symbolnumber']=$symbol;
            $data['symbolcatogery']=$symbolcatogery;
            return view('user.marksheet',$data);
      
        }
      }
    }
  }

  public function notice()
  {
    $data['getnotices']=Notice::orderBy('created_at', 'desc')->take(3)->get();
    return view('user.notice',$data);
  }
}


