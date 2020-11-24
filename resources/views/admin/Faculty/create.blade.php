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
                                <form role="form" method="post" action="{{route('admin.faculty.store')}}"> 
                                   {{csrf_field()}}

                           @if ($errors->any())
                                 @foreach ($errors->all() as $error)
                                   <div class="alert alert-danger  no-border">
                                   {{$error}}
                                </div>
                              @endforeach
                          @endif    

                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFacultyname">Faculty Name</label>
                                            <input type="text" class="form-control" name="faculty_name" placeholder="Enter Faculty Name">
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
 