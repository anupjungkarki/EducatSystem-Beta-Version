<?php

namespace App\Http\Controllers\admin\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Program;

class facultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty=Faculty::all();
        return view('admin.faculty.index',['faculty'=>$faculty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
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
            'faculty_name'=>'required'

        ]);
        $faculty = new Faculty([
        'faculty_name' => $request->get('faculty_name'),
        ]);
        $faculty->save();
        return redirect('/ShowFaculty')->with('success', 'Faculty Added  Sucessfully Done');
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
    public function edit($faculty_id)
    {
     $data=Faculty::find($faculty_id);
     return view('admin.faculty.edit',['faculty'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faculty_id)
    {
      $this->validate($request,[
        'faculty_name'=>'required'
     ]);

      $faculty=Faculty::find($faculty_id);
      $faculty->faculty_name = $request->get('faculty_name');
      $faculty->save();
      return redirect('/ShowFaculty')->with('success', 'Data Updates Sucessfully Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($faculty_id)
    {

         $data=Program::where('faculty_id',$faculty_id)->get();
               
            if($data->count()>0)
            {
                return redirect()->back()->with('error','Faculty is Associated With Some Program cannot be deleted');
            }

            else{
                     $faculty=Faculty::find($faculty_id);
                     $faculty->delete();
                     return redirect('/ShowFaculty')->with('success', 'Deletion Sucessfully Done');
                }
      
     
    }
}
