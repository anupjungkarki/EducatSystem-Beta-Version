<?php

namespace App\Http\Controllers\admin\Marks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Year;
use App\Semester;
use App\AdmissionYear;
use App\SymbolNumberCatogery;
use App\SymbolNumber;
use App\CourseCatogery;
use App\Marks;
use App\ProgramCourse;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['admissions']=AdmissionYear::all();
        return view('admin.marks.index',$data);
    }

    public function showmarksform(Request $request)
    {        
        $symbol=SymbolNumberCatogery::where('faculty_id',$request->faculty_id)
                                                  ->where('program_id',$request->program_id)
                                                  ->where('year_id',$request->year_id)
                                                  ->where('semester_id',$request->semester_id)
                                                  ->where('admission_year_id',$request->admision_year_id)->first();
                                                 

                     if($symbol==null)
                                    {
                                     session()->flash('error','Symbol number is not assigned to this Semester Yet');
                                     return redirect()->back();
                                    }
                     else 
                     {
                       $marks=Marks::where('symbol_number_category_id',$symbol->id)->get();

                     if($marks->count()>0)
                       {
                         session()->flash('error','Marks has been already added');
                         return redirect()->back();
                      }

        else
         {
         $courseCategory=CourseCatogery::where('program_id',$request->program_id)->where('faculty_id',$request->faculty_id)->first();
                       
            if($courseCategory==null)
                 {
                    session()->flash('error','Please make the Couse Catogery First');
                    return redirect()->back();

                       }

                       else
                       {
                          $data['subjects']=ProgramCourse::where('course_catogery_id',$courseCategory->id)
                                                          ->where('semester_id',$request->semester_id)
                                                          ->where('year_id',$request->year_id)
                                                          ->get();

                          $data['symbolNumbers']=SymbolNumber::where('symbol_number_category_id',$symbol->id)->get();
                          $data['symbol_number_category_id']=$symbol->id;       
                                   
                           return view('admin.marks.addmarks',$data);
                  }   
              }
         }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchmarks()
    {
        $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['admissions']=AdmissionYear::all();
        return view('admin.marks.view',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');

        // $data=$this->validates($data);

      foreach ($data as $key => $value)
       {
           $obj=new Marks();
           $obj->subject_id=$value['subject_id'];
           $obj->symbol_number_id=$value['symbolNumber_id'];
           $obj->symbol_number_category_id=$value['symbol_number_category_id'];
           $obj->marks=$value['mark'];
           $obj->save();
      }
       session()->flash('success','marks has been added to this category');
       return redirect(route('admin.marks.index'));
    }

    // public function validates($data)
    // {
    //     foreach ($variable as $key => $value) {
    //         # code...
    //     }
    // }
    public function viewmarks(Request $request)
    {
        
        $symbol=SymbolNumberCatogery::where('faculty_id',$request->faculty_id)
                                    ->where('program_id',$request->program_id)
                                    ->where('year_id',$request->year_id)
                                    ->where('semester_id',$request->semester_id)
                                    ->where('admission_year_id',$request->admision_year_id)->first();

        $data['SymbolNumberCategory']=$symbol;


          if($symbol==null)

        {
                  
       session()->flash('error','Marks is Not Inserted in this Faculty');
       return redirect()->back();

       }
       else
       {
         $courseCategory=CourseCatogery::where('faculty_id',$request->faculty_id)
                                       ->where('program_id',$request->program_id)
                                       ->first();

         $data['subjects']=ProgramCourse::where('course_catogery_id',$courseCategory->id)
                                        ->where('semester_id',$request->semester_id)
                                        ->where('year_id',$request->year_id)
                                        ->get();
        $data['symbolNumbers']=SymbolNumber::where('symbol_number_category_id',$symbol->id)->get();
        $marks=Marks::where('symbol_number_category_id',$symbol->id)->get();
        $data['marks']=$marks;

              if($marks->count()>0)
              {
                  $flag=1;
    
             $data['faculty']=Faculty::all();
             $data['years']=Year::all();
             $data['semesters']=Semester::all();
             $data['admissions']=AdmissionYear::all();
             return view('admin.marks.view',$data)->with('flag',$flag);
              }

             else
              {
                session()->flash('error','marks has not been assigned yet');
                return redirect()->back();
              }

    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $SymbolNumberCategory_id=$request->SymbolNumberCategory_id;
        $SymbolNumberCategory=SymbolNumberCatogery::where('id',$SymbolNumberCategory_id)->first();

        $courseCategory=courseCatogery::where('faculty_id',$SymbolNumberCategory->faculty_id)
                                      ->where('program_id',$SymbolNumberCategory->program_id)->first();

         $data['subjects']=ProgramCourse::where('course_catogery_id',$courseCategory->id)
                                        ->where('semester_id',$SymbolNumberCategory->semester_id)
                                        ->where('year_id',$SymbolNumberCategory->year_id)
                                        ->get();
         $data['symbolNumbers']=SymbolNumber::where('symbol_number_category_id',$SymbolNumberCategory_id)->get();

         $data['marks']=Marks::where('symbol_number_category_id',$SymbolNumberCategory_id)->get();

         $data['SymbolNumberCategory']=$SymbolNumberCategory;

         return view('admin.marks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemarks(Request $request)
    {
         $data=$request->except('_token');


         foreach ($data as $key => $value) 

         {
               $obj['marks']=$value['mark'];
               Marks::where('subject_id',$value['subject_id'])->where('symbol_number_id',$value['symbol_id'])->update($obj);
         }

         session()->flash('success','Record has been updated successfully');


         return redirect(route('admin.marks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
