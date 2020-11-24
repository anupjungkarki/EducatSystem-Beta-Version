<?php

namespace App\Http\Controllers\admin\symbol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\faculty;
use App\Program;
use App\Year;
use App\Semester;
use App\AdmissionYear;
use App\SymbolNumber;
use App\SymbolNumberCatogery;
use DB;

class SymbolController extends Controller
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
        $data['SymbolNumberCategory']=SymbolNumberCatogery::all();
        return view('admin.symbol.index',$data);
    }

    public function SearhSymbolFaculty( Request $request)
    {
        $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['admissions']=AdmissionYear::all();
        $data['SymbolNumberCategory']=SymbolNumberCatogery::where('faculty_id',$request->faculty_id)->where('program_id',$request->program_id)->where('year_id',$request->year_id)->where('semester_id',$request->semester_id)->where('admission_year_id',$request->admission_year_id)->get();
        return view('admin.symbol.index',$data);
    }

     public function symbolview($symbol_number_category_id)
    {
     $data['symbolnumber']=SymbolNumber::where('symbol_number_category_id',$symbol_number_category_id)->get();
     $data['category_titles']=SymbolNumberCatogery::where('id',$symbol_number_category_id)->first();
     return view('admin.symbol.viewsymbol',$data);
    }

     public function symbolupdate($symbol_number_category_id)
     {
     $data['category_titles']=SymbolNumberCatogery::where('id',$symbol_number_category_id)->first();
     $data['symbolnumber']=SymbolNumber::where('symbol_number_category_id',$symbol_number_category_id)->get();
     $data['symbol_number_category_id']=$symbol_number_category_id;
     return view('admin.symbol.symbolupdate',$data);
     }


    public function symbolupdatestore(Request $request)
    {
          $data=$request->except('_token','symbol_number_category_id');
          $symbol_number_category_id=$request->symbol_number_category_id;

          foreach ($data as $key => $value) 
          {
          $obj['symbol_number']=$value['symbol_number'];  
          SymbolNumber::where('student_id',$value['student_id'])->where('symbol_number_category_id',$request->symbol_number_category_id)->update($obj);  
           }
          session()->flash('success','Symbol number is updated  Sucessfully');
          return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['student']=Student::all();
         $data['faculty']=Faculty::all();
         $data['years']=Year::all();
         $data['semesters']=Semester::all();
         $data['admissions']=AdmissionYear::all();
         return view('admin.symbol.create',$data);
    }

     public function findprogram(Request $request)
     { 
      $data=Program::where('faculty_id',$request->id)->get();
      return response()->json($data);
     }


    public function symbolnumberform(Request $request)
    {
      $this->validate($request,[
        'faculty_id'=>'required',
        'program_id'=>'required',
        'year_id'=>'required',
        'semester_id'=>'required',
        'admission_year_id'=>'required'
      ]);

      $data['faculty']=Faculty::all();
      $data['program']=Program::all();
      $data['years']=Year::all();
      $data['semesters']=Semester::all();
      $data['admissions']=AdmissionYear::all();

      $symbol=SymbolNumberCatogery::where('faculty_id',$request->faculty_id)
                                   ->where('program_id',$request->program_id)
                                   ->where('year_id',$request->year_id)
                                   ->where('semester_id',$request->semester_id)
                                   ->where('admission_year_id',$request->admission_year_id)->get();

            if($symbol->count()>0){
            session()->flash('error','Already Assigned the Particular Semester Symbol');
            return redirect()->back();
           }

        else{
           $data['faculty_id']=$request->faculty_id;
           $data['program_id']=$request->program_id;
           $data['year_id']=$request->year_id;
           $data['semester_id']=$request->semester_id;
           $data['admission_year_id']=$request->admission_year_id;
     

           $flag=1;

            $data['semester_name']=DB::table('semesters')->where('id',$request->semester_id)->value('name');
            $data['faculty_name']=DB::table('faculties')->where('faculty_id',$request->faculty_id)->value('faculty_name');
            $data['program_name']=DB::table('programs')->where('program_id',$request->program_id)->value('program_name');
            $data['student_year']=DB::table('years')->where('id',$request->year_id)->value('name');
            $data['admision_year']=DB::table('admission_years')->where('id',$request->admission_year_id)->value('admission_year');
                        

           $students=Student::where('program_id',$request->program_id)
                         ->where('faculty_id',$request->faculty_id)
                         ->where('admission_year_id',$request->admission_year_id)
                         ->get();

                         $data['students']=$students;

                         if($students->count()>0)
                         { 

                            return view('admin.symbol.create',$data)->with('flag',$flag);
                         }

                         else
                         { 
                           session()->flash('error','Sorry!! Student are not Admitted in this Semester');
                           return view('admin.symbol.create',$data);
                         }
                      }
                   }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->except('_token','faculty_id','program_id','year_id','semester_id','admission_year_id');
        $SymbolNumberCatogery=$request->only('faculty_id','program_id','year_id','semester_id','admission_year_id');
        $SymbolNumberCatogeryobj=SymbolNumberCatogery::create($SymbolNumberCatogery);
        $SymbolNumberCatogeryobj_id=$SymbolNumberCatogeryobj->id;
         
         foreach ($data as $key => $value) {
                                
                 $obj= new SymbolNumber();

                 $obj->student_id=$key;
                 $obj->symbol_number=$value['symbol_number'];
                 $obj->symbol_number_category_id=$SymbolNumberCatogeryobj_id;
                 $obj->save();
             
         }
        session()->flash('success','Symbol Number is Inserted');
        return redirect(route('admin.symbol.create'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
