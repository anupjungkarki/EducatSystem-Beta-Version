@extends('layouts.admin.app')
@section('content')
@php
$session_role=session('UserAccess');
@endphp
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"> Admission Year</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(array_key_exists('4_add',$session_role))
                @if($session_role['4_add']==1 )
                <div class="box-body">
                    <form role="form" method="post" action="{{route('admin.year.store')}}">
                        {{csrf_field()}}
                        @include('layouts.alert')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputAdmissionYear">Admission Year</label>
                                <input type="text" class="form-control" name="admission_year" placeholder="Enter Year">
                            </div>
                        </div>
                        <div class="box-footer">
                            <center><button type="submit" class="btn btn-primary btn-flat" name="course_data"> Insert Year</button></center>
                        </div>
                    </form>
                </div><!-- /.box-body -->
                @endif
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Year</th>
                            @if(array_key_exists('4_view',$session_role))
                            @if($session_role['4_edit']==1 ||$session_role['4_delete']==1 )
                            <th style="width: 88px">Action</th>
                            @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($year as $year)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$year->admission_year}}</td>
                            @if(array_key_exists('4_view',$session_role))
                            @if($session_role['4_edit']==1 ||$session_role['4_delete']==1 )
                            <td>
                                @if($session_role['4_edit']==1 )
                                <a href="{{route('admin.year.edit',[$year->id])}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                @endif
                                @if($session_role['4_delete']==1 )
                                <a href="{{route('admin.year.destroy',[$year->id])}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                @endif
                            </td>
                            @endif
                            @endif
                        </tr>
                        @endforeach
                    <tbody>
                </table>
            </div><!-- /.box -->
            <!-- Form Element sizes -->
        </div> <!-- /.row -->
</section><!-- /.content -->
@endsection
