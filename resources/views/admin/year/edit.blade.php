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
                                    <h3 class="box-title">Insert The Admission Year</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body">
                                <form role="form" method="post" action="{{route('admin.year.update', $year->id)}}"> 
                                   {{csrf_field()}}  
                                   @include('layouts.alert')
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputAdmissionYear">Admission Year</label>
                                            <input type="text" class="form-control" name="admission_year" placeholder="Enter Year" value="{{$year->admission_year}}">
                                        </div>
                                     </div>

                                    <div class="box-footer">
                                        <center><button type="submit" class="btn btn-primary btn-flat" name="course_data">    Update Year</button></center>
                                    </div>
                                </form>
                              </div><!-- /.box-body -->

                         </div><!-- /.box -->

                            <!-- Form Element sizes -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

@endsection
 