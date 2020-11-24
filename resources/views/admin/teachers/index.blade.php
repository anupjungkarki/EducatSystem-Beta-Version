@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Students</h3>
                        <a href="{{route('admin.students.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                           <thead> 
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Faculty</th>
                                <th>Subject</th>
                                <th>JoinYear</th>
                                <th>Gender</th>
                                <th>Salary</th>
                                <th style="width: 88px">Action</th>
                            </tr>
                          </thead>
                           <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        <a href="#"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        <a href="#"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                           <tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
 