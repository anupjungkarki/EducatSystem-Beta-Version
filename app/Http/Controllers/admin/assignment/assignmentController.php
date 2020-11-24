<?php

namespace App\Http\Controllers\admin\assignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SymbolNumberCatogery;
use App\Faculty;
use App\Year;
use App\Semester;
use App\Assignment;

class assignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['assignments']=Assignment::all();
        return view('admin.assignment.index',$data);
    }

    public function searchassignment(Request $request)
    {
        $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        $data['assignments']=Assignment::where('faculty_id',$request->faculty_id)->where('program_id',$request->program_id)->where('year_id',$request->year_id)->where('semester_id',$request->semester_id)->get();
        return view('admin.assignment.index',$data);
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
        return view('admin.assignment.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'program_id'=>'required',
        'faculty_id'=>'required',
        'year_id'=>'required',
        'semester_id'=>'required',
        'assignment_title'=>'required',
        'deadline'=>'required',
        'message_to_student'=>'required',
        'assignment_subject'=>'required',
        'teacher_name'=>'required',
        'upload_file'=>'required'
      ]);
            if($request->hasFile('upload_file'))
             { 
                $file=$request->file('upload_file');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('Assignment/files/pdf/',$filename);
              
             }
             Assignment::Create($request->only(['program_id','faculty_id','year_id','semester_id','assignment_title','deadline','message_to_student','assignment_subject','teacher_name','upload_file']));
                session()->flash('success','Assignment has been Sucessfully Sent');
                return redirect(route('admin.assignment.index'));
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
        $data['assignments']=Assignment::where('id',$id)->first();
        $data['faculty']=Faculty::all();
        $data['years']=Year::all();
        $data['semesters']=Semester::all();
        return view('admin.assignment.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    $data=$request->only(['program_id','faculty_id','year_id','semester_id','assignment_title','deadline','message_to_student','assignment_subject','teacher_name','upload_file']);

            if($request->hasFile('upload_file'))
             { 
                $file=$request->file('upload_file');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('Assignment/files/pdf/',$filename);
              
             }
        Assignment::where('id',$request->id)->update($data);
        return redirect(route('admin.assignment.index'))->with('success', 'Assignment Update Sucessfully Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assignment::where('id',$id)->delete();
        return redirect(route('admin.assignment.index'))->with('success', 'Assignment Delete Sucessfully Done');
    }
}
