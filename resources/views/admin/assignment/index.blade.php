@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
              @include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Assignment</h3>
                        <a href="{{ route('admin.assignment.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>
                    </div><!-- /.box-header -->

                  <div class="choose-field">
                    <div class="col-md-12 " style="margin-bottom: 60px;">
                     <div class="box-body table-responsive ">
                      <form method="post" action="{{route('admin.assignment.searchassignment')}}">
                        @csrf
                      <div class="col-md-3">
                        <div class="form-group">
                           <select class="form-control" class="faculty" name="faculty_id" id="faculty">
                                 <option value="0" selected="true" disabled="true">Select Faculty</option>
                                 @foreach($faculty as $data)
                                    <option value="{{$data->faculty_id}}">{{$data->faculty_name}}</option>
                                 @endforeach
                            </select>
                       </div>
                     </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <select class="form-control" class="program" name="program_id" id="program">
                          <option value="0" disabled="true" selected="true">Select Program</option>
                        </select>
                       </div>
                     </div>

                  <div class="col-md-3">
                    <div class="form-group">
                    <select class="form-control" name="year_id" >
                      <option value="0" selected="true" disabled="true">Select Year</option>
                       @foreach($years as $year)
                         <option value="{{$year->id}}">{{$year->name}}</option>
                       @endforeach
                    </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                      <select class="form-control" name="semester_id" >
                          <option value="0" selected="true" disabled="true">Select Semester</option>
                        @foreach($semesters as $semester)
                          <option value="{{$semester->id}}">{{$semester->name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="col-md-1">
                   <div>
                       <center><button type="submit" class="btn btn-info btn-sm ">Search</button></center>
                  </div>
                </div>
              </form>
            </div>
          </div>{{-- row --}}
        </div>{{-- col-md-12 --}}

                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                          <thead>
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>SubjectName</th>
                                <th>Teacher</th>
                                <th>File</th>
                                <th style="width: 88px">Action</th>
                            </tr>
                          </thead>

                            <tbody>
                                @foreach($assignments as $assignment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$assignment->assignment_title}}</td>
                                    <td>{{$assignment->deadline}}</td>
                                    <td>{{$assignment->assignment_subject}}</td>
                                    <td>{{$assignment->teacher_name}}</td>
                                    <td>{{$assignment->upload_file}}</td>
                                    <td>
                                        <a href="{{route('admin.assignment.edit',$assignment->id)}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        <a href="{{route('admin.assignment.destroy',$assignment->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                    </td>
                                @endforeach
                                </tr>
                            <tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
    @section('script')
   <script type="text/javascript">
    $(document).ready(function(){
  

     $(document).on('change','#faculty',function(){
      var faculty_id=$(this).val();
      var op=" ";
      var div=$(this).parent().parent().parent();

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