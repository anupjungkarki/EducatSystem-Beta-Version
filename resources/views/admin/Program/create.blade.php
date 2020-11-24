@extends('layouts.admin.app')
@section('content')

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Insert The Faculties</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body">
                                <form role="form" method="post" action="{{route('admin.program.store')}}">                    
                                    {{csrf_field()}}                 
                                     <div class="col-md-12">
                                         <div class="form-group">
                                            <label for="exampleInputProgram">Program Name</label>
                                            <input type="text" class="form-control" name="program_name" placeholder="Enter Program Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <select class="form-control" name="faculty_id">
                                            <option selected disabled>---choose faculty---</option>
                                               @foreach($faculty as $faculty)
                                                <option value="{{ $faculty->faculty_id}}">{{ $faculty->faculty_name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                     </div>

                                    <div class="box-footer">
                                        <center><button type="submit" class="btn btn-primary btn-flat" name="course_data">Submit Faculty</button></center>
                                    </div>
                                </form>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- Form Element sizes -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

@endsection
 