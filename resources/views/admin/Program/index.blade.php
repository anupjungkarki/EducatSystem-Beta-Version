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
                        <h3 class="box-title">List of Program</h3>
                        @if(array_key_exists('3_add',$session_role))
                         @if($session_role['3_add']==1)
                        <a href="{{route('admin.program.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>
                        @endif
                        @endif
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">

                    <form method="post" action="{{route('admin.search.program.from.faculty')}}">
                        @csrf
                        <div class="form-group">
                        <label>Find The Program According To Faculty </label><br>
                        <div style="width: 100%;" class="float">
                          <div style="float: left; width: 92%;" class="left">
                             <select class="form-control" name="faculty_id">
                                 <option disabled selected>--Select faculty--</option>
                                  @foreach($faculty as $data)
                                    <option value="{{$data->faculty_id}}">{{$data->faculty_name}} </option>
                                  @endforeach 
                            </select><br>
                        </div>
                        <div style="float:right; margin-right:20px;" class="right">
                            <button type="submit" class="btn btn-info btn-sm ">Search</button>
                        </div>
                      </div>
                 </div>
              </form>
                        <table class="table table-bordered table-striped">
                           <thead> 
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Program Name</th>
                                <th>Faculty Name</th>

                                @if(array_key_exists('3_view',$session_role))
                                @if($session_role['3_edit']==1 ||$session_role['3_delete']==1 )
                                <th style="width: 88px">Action</th>
                                @endif
                                @endif
                            </tr>
                          </thead>
                           <tbody>
                            @foreach($program as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->program_name}}</td>
                                    <td>{{$data->faculty->faculty_name}}</td>

                                     @if(array_key_exists('3_view',$session_role))
                                     @if($session_role['3_edit']==1 || $session_role['3_delete']==1)
                                    <td>
                                        @if($session_role['3_edit']==1 )
                                        <a href="{{route('admin.program.edit',$data->program_id)}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        @endif

                                        @if($session_role['3_delete']==1)
                                        <a href="{{route('admin.program.destroy',$data->program_id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
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
