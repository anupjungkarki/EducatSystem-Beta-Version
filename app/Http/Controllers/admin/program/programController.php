<?php

namespace App\Http\Controllers\admin\program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Program;
use Illuminate\Validation\Rule;


class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

       $data['program']=Program::all();
       $data['faculty']=Faculty::all();
       return view('admin.program.index',$data);
    }

    public function searchprogram(Request $request)
    {
      $this->validate($request,[
        'faculty_id'=>'required',
      ]);

    $data['program']=Program::where('faculty_id',$request->faculty_id)->get();
    $data['faculty']=Faculty::all();
    return view('admin.program.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['faculty']=Faculty::all();
       return view('admin.program.create',$data);
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
            'program_name'=>'required',
            'faculty_id'=>'required',

        ]);
            Program::create([
            'program_name' => $request->program_name,
            'faculty_id' => $request->faculty_id
            ]);
        return redirect('/ShowProgram')->with('success', 'Program Added  Sucessfully Done');
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
    public function edit($program_id)
    {  
       $data['program']=Program::where('program_id',$program_id)->first();
       $data['faculty']=Faculty::all();
       return view('admin.program.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program_id)
    {
        $this->validate($request,[
            'program_name'=>['required' ,Rule::unique('programs','program_name')->ignore($request->program_id, 'program_id')],
            ],

          [
            'program_name.unique'=>'Program Name Must Be unique Name',
          ]);

        // $this->validate($data,$rule,$message);//to validate Form Message By Own Custome Error Message

        $data['program_name']=$request->program_name;
        $data['faculty_id']=$request->faculty_id;
        Program::where('program_id',$request->program_id)->update($data);
        return redirect('/ShowProgram')->with('success', 'Program Update Sucessfully Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_id)
    {
     Program::where('program_id',$program_id)->delete();
     return redirect('/ShowProgram')->with('success', 'Program Delete Sucessfully Done');
    }
}
