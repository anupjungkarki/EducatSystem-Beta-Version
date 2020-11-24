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
                        <h3 class="box-title"> Students Results Data</h3>
                        <a href="{{route('admin.results.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                           <thead> 
                            <tr>
                                <th style="width: 10px">SID</th>
                                <th>Faculty</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Program</th>
                                <th>SymbolNo</th>
                                <th>Name</th>
                                <th>Marks</th>
                                <th>TMarks</th>
                                <th>Percentage</th>
                                <th>Remarks</th>
                                <th style="width: 89px">Action</th>
                            </tr>
                          </thead>
                           <tbody>
                             @if(count($results)>0)
                                 @foreach($results->all() as $items)
                                <tr>
                                    <td>{{$items->result_id}}</td>
                                    <td>{{$items->faculty}}</td>
                                    <td>{{$items->year}}</td>
                                    <td>{{$items->semester}}</td>
                                    <td>{{$items->program}}</td>
                                    <td>{{$items->symbol_no}}</td>
                                    <td>{{$items->name}}</td>
                                    <td>{{$items->email}}</td>
                                    <td>{{$items->total_marks}}</td>
                                    <td>{{$items->total_percentage}}%</td>
                                    <td>{{$items->remarks}}</td>
                                    <td>
                                        <a href="{{route('admin.results.marks', $items->result_id) }}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        <a href="#"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                  @endforeach
                                 @endif
                           <tbody>
                        </table>
                         <div class="paginate">{{$results->links()}}</div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
 