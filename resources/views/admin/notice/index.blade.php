@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
            	@include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Assignment</h3>
                        <a href="{{ route('admin.notice.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More Notices</a>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                          <thead>
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>NoticeSubject</th>
                                <th>Description</th>
                                <th style="width: 88px">Action</th>
                            </tr>
                          </thead>

                            <tbody>
                            	@foreach($notices as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->notice_title}}</td>
                                    <td>{{$row->date_of_notice}}</td>
                                    <td>{{$row->notice_subject}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>
                                        <a href="{{route('admin.notice.edit',$row->id)}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        <a href="{{route('admin.notice.destroy',$row->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
 