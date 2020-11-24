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
                                    <h3 class="box-title">Create A Student's Result</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body">
                                <form role="form" method="post" action="{{route('admin.results.store')}}">                
                                    {{csrf_field()}}
                                @if ($errors->any())
                                 @foreach ($errors->all() as $error)
                                   <div class="alert alert-danger  no-border">
                                   {{$error}}
                                </div>
                              @endforeach
                            @endif                     
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputFacultyID">Faculty ID</label>
                                            <input type="text" class="form-control" name="faculty_id" placeholder="Enter Faculty Id">
                                        </div>
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <select class="form-control" name="faculty">
                                                <option>Science And Technology</option>
                                                <option>Computer Science and Engineering</option>
                                                <option>Management Studies</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <select class="form-control" name="year">
                                                <option>First</option>
                                                <option>Second</option>
                                                <option>Third</option>
                                                <option>Fourth</option>
                                            </select>
                                        </div>

                                         <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control" name="semester">
                                                <option>1st</option>
                                                <option>2nd</option>
                                                <option>3rd</option>
                                                <option>4th</option>
                                                <option>5th</option>
                                                <option>6th</option>
                                                <option>7th</option>
                                                <option>8th</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProgramId">Program ID</label>
                                            <input type="text" class="form-control" name="program_id" placeholder="Enter Program Id">
                                        </div>
                                        <div class="form-group">
                                            <label>Program</label>
                                            <select class="form-control" name="program">
                                                <option>Bachelor In Information Technology(BIT)</option>
                                                <option>Civil Engineering</option>
                                                <option>Computer Engineering</option>
                                                <option>Computer Science</option>
                                                <option>Bachelor In Computer Application(BCA)</option>
                                                <option>Bachelor In Business Studies(BBS)</option>
                                                <option>Bachelor In Information Management(BIM)</option>
                                                <option>Bachelor In Business Administration(BBA)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputSymbolNo">SymbolNo/RollNo</label>
                                            <input type="text" class="form-control" name="symbol_no" placeholder="Enter Symbol Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName">Student Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Student Name">
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleInputEmail">Student Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Student Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTotalMarks">Total Marks</label>
                                            <input type="text" class="form-control" name="total_marks" placeholder="Enter Total Marks">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPercentage">Total Percentage</label>
                                            <input type="text" class="form-control" name="total_percentage" placeholder="Enter Total Percentage">
                                        </div>
                                    <div class="form-group">
                                            <label>Remarks</label>
                                            <select class="form-control" name="remarks">
                                                <option style="color: green;">Pass</option>
                                                <option style="color: red;">Failed</option>
                                                <option style="color: purple;">Expelled</option>
                                            </select>
                                    </div>
                                 </div>

                                    <div class="col-md-4">
                                        <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject1Name</label>
                                            <input type="text" class="form-control" name="sub1_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub1_marks" placeholder="Marks" >
                                        </div>
                                    </div>

                                   <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject2Name</label>
                                            <input type="text" class="form-control" name="sub2_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub2_marks" placeholder="Marks" >
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject3Name</label>
                                            <input type="text" class="form-control" name="sub3_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub3_marks" placeholder="Marks" >
                                        </div>
                                    </div>

                                       <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject4Name</label>
                                            <input type="text" class="form-control" name="sub4_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub4_marks" placeholder="Marks" >
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject5Name</label>
                                            <input type="text" class="form-control" name="sub5_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub5_marks" placeholder="Marks" >
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputName">#Subject6Name</label>
                                            <input type="text" class="form-control" name="sub6_name" placeholder="Enter Subject Name" >
                                          </div>  
                                        </div> 
                                        <div class="col-md-4">                                 
                                        <div class="form-group">
                                            <label for="exampleInputmarks">Marks</label>
                                            <input type="number" class="form-control" name="sub6_marks" placeholder="Marks" >
                                        </div>
                                    </div>
                                </div>
                                    <div class="box-footer">
                                        <center><button type="submit" class="btn btn-primary btn-flat" name="course_data">Submit Result Data</button></center>
                                    </div>
                                </form>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- Form Element sizes -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

@endsection
 