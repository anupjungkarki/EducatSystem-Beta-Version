<?php

namespace App\Http\Controllers\admin\courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\CourseCatogery;
use App\ProgramCourse;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['faculty']=Faculty::all();
       $data['CourseCatogery']=CourseCatogery::all();
       return view('admin.courses.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['CourseCatogery']=CourseCatogery::all();
        $data['faculty']=Faculty::all();
        return view('admin.courses.create',$data);
    }
    
     public function searchtoinsertcourse(Request $request)
      {
      $data['faculty']=Faculty::all();            //Databasecolumn       form name//
      $data['CourseCatogery']=CourseCatogery::where('faculty_id',$request->faculty)->where('program_id',$request->program)->get();
      return  view('admin.courses.index',$data);
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // $this->validate($request,[
     //    'faculty_id'=>'required',
     //    'program_id'=>'required'
     //  ]);
     // CourseCatogery::create([
     //    'faculty_id' => $request->faculty_id,
     //    'program_id' => $request->program_id
     //    ]);
      

      $this->validate($request,[
        'faculty'=>'required',
        'program'=>'required'
      ]);

     $data=CourseCatogery::where('faculty_id',$request->faculty)->where('program_id',$request->program)->get();
     if($data->count()>0)
     {
        session()->flash('error' ,'Course category has been already added');
        return redirect()->back();
     }

    else
    {
    $CourseCategory=new CourseCatogery(); //If We have Different Name in the Form than the database colume name the use this method//
    $CourseCategory->faculty_id=$request->faculty;
    $CourseCategory->program_id=$request->program;
    $CourseCategory->save();

     session()->flash('success' ,'Course category has been  added');
     return redirect(route('admin.courses.create'));
      }
   }

   public function showsubject($id)
   {
      $data['FirstSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',1)
                                         ->where('semester_id',1)->get();

      $data['SecondSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',1)
                                         ->where('semester_id',2)->get();

      $data['ThirdSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',2)
                                         ->where('semester_id',3)->get();

      $data['FourthSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',2)
                                         ->where('semester_id',4)->get();

      $data['FifthSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',3)
                                         ->where('semester_id',5)->get();

      $data['SixthSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',3)
                                         ->where('semester_id',6)->get();

      $data['SeventhSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',4)
                                         ->where('semester_id',7)->get();

      $data['EightSemester']=ProgramCourse::where('course_catogery_id',$id)
                                         ->where('year_id',4)
                                         ->where('semester_id',8)->get();


     $data['CourseDetails']=CourseCatogery::where('id',$id)->first();
     $data['course_catogery_id']=$id;
     return view('admin.courses.subject',$data);
   }

   public function storesubject(Request $request)
   {
    $data=$request->except('_token',"semester_id",'year_id','course_catogery_id');
    $Subject=$request->only('semester_id','year_id','course_catogery_id');

    foreach ($data as $key => $value) {
                       
                       $obj=new ProgramCourse();

                       $obj->subject_code=$value['subject_code'];
                       $obj->subject_name=$value['subject_name'];
                       $obj->year_id=$request->year_id;
                       $obj->semester_id=$request->semester_id;
                       $obj->course_catogery_id=$request->course_catogery_id;
                       $obj->save();
          
             }
             session()->flash('success' ,'Subject is added in the chhosen Semester');
             return redirect('/ShowSubjectFields/'.$request->course_catogery_id);
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
           ProgramCourse::where('id',$id)->delete();
           session()->flash('success','Subject has been Sucessfully deleted');
           return redirect()->back();
    }
}
