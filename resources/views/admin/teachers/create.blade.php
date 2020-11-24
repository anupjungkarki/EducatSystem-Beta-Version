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
                                    <h3 class="box-title">Create Teachers Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body">
                                <form role="form" method="post" action="{{route('admin.teachers.store')}}">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputname">Teacher Name</label>
                                            <input type="text" class="form-control" name="teacher_name" placeholder="Teacher Name">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="teacher_status">
                                                <option value="0" disabled="yes" selected="yes">Choose The Position</option>
                                                <option value="UnMarried">Professior</option>
                                                <option value="Married">Lectural</option>
                                                <option value="UnMarried">Co-Lectural</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Address</label>
                                            <input type="email" class="form-control" name="teacher_email" placeholder="Enter email">
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleInputAddress">Current Address</label>
                                            <input type="text" class="form-control" name="teacher_address" placeholder="Enter Address">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputage">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" placeholder="Enter Contact Number">
                                        </div>

                                       <div class="form-group">
                                            <label>Faculty</label>
                                            <select class="form-control" class="faculty" name="faculty_id" id="faculty">
                                                <option value="0" selected="true" disabled="true">Select Faculty</option>
                                                @foreach($faculty as $data)
                                                <option value="{{$data->faculty_id}}">{{$data->faculty_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      @error('faculty_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputsubject">Subject</label>
                                            <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputyear">Join Year </label>
                                            <input type="date" class="form-control" name="join_year" placeholder="Enter Subject">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputgender">Gender</label><br>
                                            <input type="radio" class="form-control" name="gender" value="Male"> Male
                                            <input type="radio" class="form-control" name="gender" value="Female"> Female
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputsalary">Salary</label>
                                            <input type="text" class="form-control" name="salary" placeholder="Enter Salary">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputdes">Description</label>
                                            <textarea style="height: 52px;" type="text" class="form-control" name="t_description" placeholder="Enter Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Photo</label>
                                            <input type="file" name="upload_image">
                                            <p class="help-block">Insert Your Latest Photo here.</p>
                                        </div>
                                     </div>
                                    <div class="box-footer">
                                        <center><button type="submit" class="btn btn-primary btn-flat">Insert Teacher Data</button></center>
                                    </div>
                                </form>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- Form Element sizes -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

@endsection
 