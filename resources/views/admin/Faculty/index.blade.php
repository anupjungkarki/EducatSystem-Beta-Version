@extends('layouts.admin.app')
@section('content')


@php

$session_role=session('UserAccess');

@endphp

<section class="content">
        <div class="row">
            <div class="col-md-12">
             @include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Faculty</h3>
                           @if(array_key_exists('2_add',$session_role))
                          
                           @if($session_role['2_add']==1)
                        <a href="{{route('admin.faculty.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>

                          @endif
                          @endif
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                           <thead> 
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Faculty Name</th>

                                  @if(array_key_exists('1_view',$session_role))
                                   @if($session_role['2_edit']==1 ||$session_role['2_delete']==1 )
                                  <th style="width: 88px">Action</th>
                                  @endif
                                  @endif
                            </tr>
                          </thead>
                           <tbody>
                            @foreach($faculty as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->faculty_name}}</td>
                                    @if(array_key_exists('2_view',$session_role))
                                     @if($session_role['2_edit']==1 ||$session_role['2_delete']==1 )
                                        <td>
                                         @if($session_role['2_edit']==1)
                                         
                                        <a href="{{route('admin.faculty.edit',[$data->faculty_id])}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        @endif
                                         @if($session_role['2_delete']==1)
                                          <a href="{{route('admin.faculty.destroy',[$data->faculty_id])}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                       
                                        @endif
                                       </td>
                                        
                                        @endif
                                        @endif
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
