<?php

namespace App\Http\Controllers\admin\results;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\results;

class resultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = results::paginate(2);
        return view('admin.results.index',['results'=>$results]);
    }
    

    public function marks($result_id)
    {
        $items = results::find($result_id);
        return view('admin.results.marks',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = results::all();
        return view('admin.results.create');
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
            'faculty_id'=>'required',
            'faculty'=>'required',
            'year'=>'required',
            'semester'=>'required',
            'program_id'=>'required',
            'program'=>'required',
            'symbol_no'=>'required',
            'name'=>'required',
            'email'=>'required',
            'total_marks'=>'required',
            'total_percentage'=>'required',
            'remarks'=>'required',
            'sub1_name'=>'required',
            'sub1_marks'=>'required',
            'sub2_name'=>'required',
            'sub2_marks'=>'required',
            'sub3_name'=>'required',
            'sub3_marks'=>'required',
            'sub4_name'=>'required',
            'sub4_marks'=>'required',
            'sub5_name'=>'required',
            'sub5_marks'=>'required',
            'sub6_name'=>'required',
            'sub6_marks'=>'required'

        ]);
        $results = new results([
            'faculty_id' => $request->get('faculty_id'),
            'faculty' => $request->get('faculty'),
            'year' => $request->get('year'),
            'semester' => $request->get('semester'),
            'program_id' => $request->get('program_id'),
            'program' => $request->get('program'),
            'symbol_no' => $request->get('symbol_no'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'total_marks' => $request->get('total_marks'),
            'total_percentage' => $request->get('total_percentage'),
            'remarks' => $request->get('remarks'),
            'sub1_name' => $request->get('sub1_name'),
            'sub1_marks' => $request->get('sub1_marks'),
            'sub2_name' => $request->get('sub2_name'),
            'sub2_marks' => $request->get('sub2_marks'),
            'sub3_name' => $request->get('sub3_name'),
            'sub3_marks' => $request->get('sub3_marks'),
            'sub4_name' => $request->get('sub4_name'),
            'sub4_marks' => $request->get('sub4_marks'),
            'sub5_name' => $request->get('sub5_name'),
            'sub5_marks' => $request->get('sub5_marks'),
            'sub6_name' => $request->get('sub6_name'),
            'sub6_marks' => $request->get('sub6_marks'),
            'sub7_name' => $request->get('sub7_name'),
            'sub7_marks' => $request->get('sub7_marks')
        ]);
        $results->save();
        return redirect('ShowResult')->with('success', 'Sudent Result is Sucessfully Added');
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
