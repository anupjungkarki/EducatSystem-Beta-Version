<?php

namespace App\Http\Controllers\admin\notice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;

class noticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['notices']=Notice::all();
      return view('admin.notice.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.notice.create');
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
            'notice_title'=>'required',
            'date_of_notice'=>'required',
            'notice_subject'=>'required',
            'description'=>'required',
        ]);

        Notice::Create($request->only(['notice_title','date_of_notice','notice_subject','description']));
        session()->flash('success','Notice has been sucessfully Published');
        return redirect('/AddNotice');
                    
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
    public function edit(Notice $id)
    {
      $data['notice']=$id;
      return view('admin.notice.create',$data);
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
     $this->validate($request,[
            'notice_title'=>'required',
            'date_of_notice'=>'required',
            'notice_subject'=>'required',
            'description'=>'required',
        ]);
    $data=$request->only(['notice_title','date_of_notice','notice_subject','description']);
    Notice::where('id',$request->id)->update($data);
    session()->flash('success','Notice has been sucessfully Updated');
    return redirect('/ViewNotices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::where('id',$id)->delete();
        session()->flash('success','Notice has been sucessfully Deleted');
        return redirect('/ViewNotices');
    }
}
