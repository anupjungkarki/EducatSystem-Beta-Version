@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Student Full Details</h3>
                    </div><!-- /.box-header -->
                  </div>
                  <div class="box-body table-responsive">

                  <div class="row">
                    <div class="col-md-4 test-file">
                        <h4>Name:<span>{{$student->name}}</span></h4><br>
                        <h4>Program:<span>{{$student->program->program_name}}</span></h4><br>
                        <h4>Year:<span>{{$student->year->name}}</span></h4>
                     </div>

                    <div class="col-md-4 test-file">
                      <h4>TotalFees:<span>Rs.{{$student->total_fees}} Only</span> </h4><br>
                      <h4>Faculty:<span> {{$student->faculty->faculty_name}}</span> </h4><br>
                      <h4>Semester:<span>{{$student->semester->name}}</span> </h4>
                    </div>

                    <div class="col-md-4 test-file">
                     <center><img src="{{asset('/Students/profile/img/'. $student->image)}}" class="img-thumbnail profile_student" alt="Responsive image"></center>
                     <center> <h4>Student Fresh Photo</h4></center>
                    </div>
                   </div>

                   <div class="row margin-style">
                    <div class="col-md-4 test-file">
                        <h4>Current Address: <span> {{$student->current_address}}</span></h4><br>
                        <h4>Age:<span>{{date_diff(new\DateTime($student->dob),new\DateTime())->format("%y years") }}</span> </h4><br>
                        <h4>Email:<span> {{$student->email}}</span> </h4>
                     </div>

                    <div class="col-md-4 test-file">
                      <h4>Permanent Address:<span>{{$student->permanent_address}}</span></h4><br>
                      <h4>Admission Year:<span> {{$student->admissionyear->admission_year}}</span></h4><br>
                      <h4>PhoneNo:<span>{{$student->student_phone}}</span> </h4>
                    </div>

                   <div class="col-md-4 test-file">
                      <h4>Date Of Birth:<span> {{$student->dob}}</span> </h4><br>
                      <h4>Gender:<span> {{$student->gender}}</span> </h4><br>
                      <h4>Parents Name:<span> {{$student->parents_name}}</span></h4> 
                    </div>
                  </div>


                   <div class="row margin-style">
                       <div class="col-md-4 test-file">
                        <h4>ParentsPhone:<span> {{$student->parents_phone}}</span></h4><br> 
                      </div>

                       <div class="col-md-4 test-file">
                       </div>
                   </div>
                </div>
                   <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Student Attandance:</h3>
                    </div><!-- /.box-header -->
                  </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection


@section('css')
<style type="text/css">
  .test-file span
{
  font-size: 16px; font-weight: lighter;
}
.margin-style
{
  margin-top: 40px;
}
.profile_student
{
height:120px; width: 120px;
}
.box .box-header
{
    border-bottom: 1px solid #000;
    padding-bottom: 10px;
}
</style>
@endsection
 