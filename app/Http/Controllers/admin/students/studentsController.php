<?php

namespace App\Http\Controllers\admin\students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Program;
use App\Year;
use App\Semester;
use App\AdmissionYear;
use App\Student;
use App\Http\requests\StudentRequest;
use Illuminate\Support\Facades\DB;
class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $data['years']=Year::all();
    $data['semesters']=Semester::all();
    $data['student']=Student::all();
    $data['faculty']=Faculty::all();
    $data['admissions']=AdmissionYear::all();
    return view('admin.students.index',$data);
    }


     public function findprogram(Request $request)
    { 
      $data=Program::where('faculty_id',$request->id)->get();
      return response()->json($data);
    }
    
    public function view(Student $student)
    {
       $data['student']=$student;
       return view('admin.students.view',$data);
    }

    public function search(Request  $request)
    {
     $data['years']=Year::all();
     $data['semesters']=Semester::all();
     $data['faculty']=Faculty::all();
     $data['admissions']=AdmissionYear::all();
     $data['student']=Student::where('faculty_id',$request->faculty_id)->where('program_id',$request->program_id)->where('year_id',$request->year_id)->where('semester_id',$request->semester_id)->where('admission_year_id',$request->admission_year_id)->get();
     return view('admin.students.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['faculty']=Faculty::all();
      $data['years']=Year::all();
      $data['semesters']=Semester::all();
      $data['admissions']=AdmissionYear::all();
      return view('admin.students.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
         if($request->hasFile('image'))
             { 
                $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('Students/profile/img/',$filename);
              
             }
             
            $students = new Student([
            'program_id' => $request->get('program_id'),
            'faculty_id' => $request->get('faculty_id'),
            'year_id' => $request->get('year_id'),
            'semester_id' => $request->get('semester_id'),
            'admission_year_id' => $request->get('admission_year_id'),
            'name' => $request->get('name'),
            'student_phone' => $request->get('student_phone'),
            'email' => $request->get('email'),
            'permanent_address'=> $request->get('permanent_address'),
            'current_address' => $request->get('current_address'),
            'dob' => $request->get('dob'),
            'gender' => $request->get('gender'),
            'parents_name' => $request->get('parents_name'),
            'parents_phone' => $request->get('parents_phone'),
            'total_fees' => $request->get('total_fees'),
            'image' => $filename,
        ]);
        $students->save();
        return redirect('/ShowStudents')->with('success', 'New Student Is sucessfully Registered');
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
       $data['student']=Student::where('id',$id)->first();
       $data['program']=Program::all();
       $data['faculty']=Faculty::all();
       $data['years']=Year::all();
       $data['semesters']=Semester::all();
       $data['admissions']=AdmissionYear::all();
       return view('admin.students.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request)
    {
        $data=$request->only('name','email','permanent_address','current_address','gender','dob','date_of_admission','semester_id','date_of_expire','year_id','parents_name','parents_phone','total_fees','student_phone');
        $data['program_id']=$request->program_id;
        $data['faculty_id']=$request->faculty_id;

        if($request->hasFile('image'))
             {  
                $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('Students/profile/img/',$filename);
                $data['image']=$filename;
             }
        Student::where('id',$request->id)->update($data);
        return redirect(route('admin.students.index'))->with('success', 'Student Update Sucessfully Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();
        return redirect(route('admin.students.index'))->with('success', 'Student Delete Sucessfully Done');
    }
}
