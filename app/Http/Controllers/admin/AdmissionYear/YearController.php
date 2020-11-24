<?php

namespace App\Http\Controllers\admin\AdmissionYear;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdmissionYear;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $data['year']=AdmissionYear::all();
        return view('admin.year.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'admission_year'=>'required'

        ]);
      $year= new AdmissionYear([
        'admission_year' => $request->get('admission_year'),
        ]);
        $year->save();
        return redirect('/CreateYear')->with('success', 'Year Added  Sucessfully Done');
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
    $data=AdmissionYear::find($id);
    return view('admin.year.edit',['year'=>$data]);
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
      $this->validate($request,[
        'admission_year'=>'required'
     ]);

      $year=AdmissionYear::find($id);
      $year->admission_year = $request->get('admission_year');
      $year->save();
      return redirect('/CreateYear')->with('success', 'Data Updates Sucessfully Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
     AdmissionYear::where('id',$id)->delete();
     return redirect('/CreateYear')->with('success', 'Program Delete Sucessfully Done');
    }
}
