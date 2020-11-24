@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
                        @if(session()->has('success'))
                          <div class="alert alert-success  no-border">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
                            </button>
                             <h4><i class="icon fa fa-check"></i> Success:</h4>
                        {{ session('success')  }}
                          </div>
                        @endif
                        
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Student's Marksheet</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">

                                        <div style="width: 100%;" class="float">
                                            <div style="float: left;" class="left">
                                            <p>Name:{{$items->name}}</p>
                                            <p>SymbolNo:{{$items->symbol_no}}</p>
                                            </div>
                                           <div style="float:right;" class="right">
                                            <p>Faculty:{{$items->faculty}}</p>
                                            <p>Programm:{{$items->program}}</p>
                                           </div>
                                        </div>

                        <table class="table table-bordered table-striped">
                           <thead> 
                            <tr>
                                <th colspan="3">Subject/Marks</th>
                                <th>Remarks</th>
                                <th style="width: 89px">Action</th>
                            </tr>
                          </thead>
                           <tbody>
                                <tr>
                                    <th>Subject</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks</th>
                                    <td rowspan="7"></td>
                                    <td rowspan="7"></td>
                                </tr>

                                <tr>
                                    <td>1.{{$items->sub1_name}}</td>
                                    <td>100</td>
                                    <td>{{$items->sub1_marks}}</td>
                               </tr>
                                <tr>
                                <td>2.{{$items->sub2_name}}</td>
                                <td>100</td>
                                <td>{{$items->sub2_marks}}</td>
                            </tr>
                             <tr>
                                <td>3.{{$items->sub3_name}}</td>
                                <td>100</td>
                                <td>{{$items->sub3_marks}}</td>
                            </tr>                               
                             <tr>
                                <td>4.{{$items->sub4_name}}</td>
                                <td>100</td>
                                <td>{{$items->sub4_marks}}</td>
                            </tr>
                             <tr>
                                <td>5.{{$items->sub5_name}}</td>
                                <td>100</td>
                                <td>{{$items->sub5_marks}}</td>
                            </tr>
                             <tr>                         
                                <td>6.{{$items->sub6_name}}</td>
                                <td>100</td>
                                <td>{{$items->sub6_marks}}</td>
                            </tr>
                            <tr>
                              <th>TOTAL</th>
                              <td>600</td>
                              <td>{{$items->total_marks}}</td>
                              <td>{{$items->remarks}}</td>
                              <td> <a href="#"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                   <a href="#"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                           </tr>

                           <tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            <div style="width: 100%;" class="float">
             <div style="float: left;" class="left">
               <h4>Note</h4>
               <p>*-Failed/A-Absent</p>
            </div>

            <div style="float:right;" class="right">
              <h4>To pass the Examination Candidate must</h4>
              <h4>Secure 35% in the examination!!!!</h4>
            </div>

           </div>
          </div><!-- /.col -->
         </div><!-- /.row -->
      </section><!-- /.content -->

@endsection
 