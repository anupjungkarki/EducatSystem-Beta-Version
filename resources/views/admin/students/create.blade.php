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
                                    <h3 class="box-title">Insert Students Detail's</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body">
                                <form role="form" method="post" action="{{route('admin.students.store')}}" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputname">Student Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Student Name" value="{{old('name')}}">
                                      @error('name')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPhone">Student Phone</label>
                                            <input type="text" class="form-control @error('student_phone') is-invalid @enderror" name="student_phone" placeholder="Student Phone" value="{{old('student_phone')}}">
                                        </div>
                                      @error('student_phone')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" value="{{old('email')}}">
                                        </div>
                                      @error('email')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputgender">Gender</label><br>
                                            <input type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="Male"{{(old('gender')=='Male')?'checked':''}}>Male
                                            <input type="radio" class="form-control" name="gender" value="Female" {{(old('gender')=='Female')?'checked':''}}>Female
                                        </div>
                                      @error('gender')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                       <div class="form-group">
                                       <label for="exampleInputAddress">Current Address</label>
                                            <input type="text" class="form-control" name="current_address" placeholder="Enter CurrentAddress" value="{{old('current_address')}}">
                                        </div>
                                     @error('current_address')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputAddress">Permanent Address</label>
                                            <input type="text" class="form-control" name="permanent_address" placeholder="Enter Permanent Address" value="{{old('permanent_address')}}">
                                        </div>
                                      @error('permanent_address')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror
                                    </div>

                                     
                                     <div class="col-md-4">
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

                                       <div class="form-group">
                                            <label>Program</label>
                                            <select class="form-control" class="program" name="program_id" id="program">
                                            <option value="0" disabled="true" selected="true">Select Program</option>
                                            </select>
                                        </div>
                                      @error('program_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label>Year</label>
                                               <select class="form-control" name="year_id" >
                                                <option value="0" selected="true" disabled="true">Select Year</option>
                                                @foreach($years as $year)
                                                 <option value="{{$year->id}}">{{$year->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     @error('year_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label>Semester</label>
                                               <select class="form-control" name="semester_id" >
                                                <option value="0" selected="true" disabled="true">Select Semester</option>
                                                @foreach($semesters as $semester)
                                                 <option value="{{$semester->id}}">{{$semester->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     @error('semester_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror
                                    </div>

                                     <div class="col-md-4">
                                       <div class="form-group">
                                            <label for="exampleInputdob">DOB</label>
                                            <input type="date" class="form-control" name="dob" value="{{old('dob')}}">
                                        </div>
                                      @error('dob')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label>Admission Year</label>
                                               <select class="form-control" name="admission_year_id" >
                                                <option value="0" selected="true" disabled="true">Select Admission Year</option>
                                                @foreach($admissions as $admission)
                                                 <option value="{{$admission->id}}">{{$admission->admission_year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      @error('admissionyear_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputParentsName">Parents's Name</label>
                                            <input type="text" class="form-control" name="parents_name" placeholder="Enter Parent's Name" value="{{old('parents_name')}}">
                                        </div>
                                      @error('parents_name')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                         <div class="form-group">
                                            <label for="exampleInputParentsPhone">Parents Phone</label>
                                            <input type="text" class="form-control" name="parents_phone" placeholder="Enter Father Phone" value="{{old('parents_phone')}}">
                                        </div>
                                     @error('parents_phone')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputFees">Total Fees</label>
                                            <input type="text" class="form-control" name="total_fees" placeholder="Enter Fees Amount" value="{{old('total_fees')}}">
                                        </div>
                                     @error('total_fees')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="image">Photo</label>
                                            <input type="file" name="image" >
                                            <p class="help-block">Insert Your Latest Photo here.</p>
                                        </div>
                                      @error('image')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror
                                     </div>
                                    <div class="box-footer">
                                        <center><button type="submit" class="btn btn-primary btn-flat">Submit Student Data</button></center>
                                    </div>
                                </form>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- Form Element sizes -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
@endsection
   

   @section('script')
   <script type="text/javascript">
    $(document).ready(function(){
  

     $(document).on('change','#faculty',function(){
      var faculty_id=$(this).val();
      var op=" ";
      var div=$(this).parent().parent();

       $.ajax({
            type:'get',
             url: '{!! URL::to('/ajax/getprogram') !!}',
            data:{'id':faculty_id},
            success:function(data){
                  op+='<option value="0" selected disabled>Choose Program</option>';
                  for(var i=0; i<data.length; i++)
                   {
                    op+='<option value="'+data[i].program_id+'">'+data[i].program_name+'</option>';
                   }
                  div.find('#program').html(" ");
                   div.find('#program').append(op);     
            },
            error:function(){
           },
        });
     });
   });
 </script>
@endsection