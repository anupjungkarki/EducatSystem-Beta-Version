@extends('layouts.admin.app')
@section('content')

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            @include('layouts.alert')
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Assignment</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                            <div class="box-body pad">
                                <form role="form" method="post" action="{{route('admin.assignment.update',$assignments->id)}}">
                                    @csrf
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <select class="form-control" class="faculty" name="faculty_id" id="faculty">
                                                <option value="0" selected="true" disabled="true">Select Faculty</option>
                                                @foreach($faculty as $data)
                                                <option value="{{$data->faculty_id}}"
                                                  @if($assignments->faculty_id==$data->faculty_id) selected 
                                                  @else
                                                  @endif
                                                  >{{$data->faculty_name}}</option>
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
                                            <input type="hidden" name="program_id" id="program_id" value="{{$assignments->program_id}}">
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
                                              <option value="{{$year->id}}" @if($assignments->year_id==$year->id) selected @else @endif>{{$year->name}}</option>
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
                                                 <option value="{{$semester->id}}" @if($assignments->semester_id==$semester->id)selected @else @endif>{{$semester->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     @error('semester_id')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputAssignmentTitle">Assignment Title</label>
                                            <input type="text" class="form-control" name="assignment_title" placeholder="Assignment Title" value="{{$assignments->assignment_title}}">
                                        </div>
                                     @error('assignment_title')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputdob"> Deadline To Submit</label>
                                            <input type="date" class="form-control" name="deadline" placeholder="Enter Assign Deadline" value="{{$assignments->deadline}}">
                                        </div>
                                     </div>
                                     @error('deadline')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror


                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputAssignmentdes">Message To Student</label>
                                            <textarea style="width: 100%; height: 182px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" type="text" class="form-control" name="message_to_student" placeholder="Message for students" value="{{$assignments->message_to_student}}"></textarea>
                                       </div>
                                     @error('message_to_student')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputadmission">Assignment Subject Name</label>
                                            <input type="text" class="form-control" name="assignment_subject" placeholder="Assignment Subject" value="{{$assignments->assignment_subject}}">
                                        </div>
                                      @error('assignment_subject')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputTeachername">Teacher Name</label>
                                            <input type="text" class="form-control" name="teacher_name" placeholder="Assignment Teacher Name" value="{{$assignments->teacher_name}}">
                                        </div>
                                     @error('teacher_name')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Assignment Files</label>
                                            <input type="file" class="form-control" name="upload_file" value="{{$assignments->upload_file}}">
                                        </div>
                                      @error('upload_file')
                                       <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                       </span>
                                      @enderror
                                     </div>
                                    <div class="box-footer">
                                      <center><button type="submit" class="btn btn-primary btn-flat">Post Assignment</button></center>
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

  var program_id=$('#program_id').val();
  var old_faculty_id=$('#faculty').val();

    var op=" ";
      var div=$('#program').parent().parent();

       $.ajax({
            type:'get',
             url: '{!! URL::to('/ajax/getprogram') !!}',
            data:{'id':old_faculty_id},
            success:function(data){

                  op+='<option value="0" selected disabled>Choose Program</option>';
                  for(var i=0; i<data.length; i++)
                   {
                    op+='<option value="'+data[i].program_id+'" '+((data[i].program_id==program_id)?'selected':'')+'  >'+data[i].program_name+'</option>';
                   }
                  div.find('#program').html(" ");
                   div.find('#program').append(op);     
            },
            error:function(){
           },
        });
    

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