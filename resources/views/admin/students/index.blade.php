@extends('layouts.admin.app')
@section('content')


@php

$session_role=session('UserAccess');

@endphp

<section class="content">
        <div class="row">
            <div class="col-md-12">
              @include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Choose The Option To find Student Data</h3>
                        <a href="{{route('admin.students.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create More</a>
                    </div><!-- /.box-header -->
                 <div class="choose-field">
                    <div class="col-md-12 " style="margin-bottom: 60px;">
                     <div class="box-body table-responsive ">
                      <form method="post" action="{{route('admin.students.search')}}">
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

                    <div class="col-md-2">
                      <div class="form-group">
                        <select class="form-control" class="program" name="program_id" id="program">
                          <option value="0" disabled="true" selected="true">Select Program</option>
                        </select>
                       </div>
                     </div>

                  <div class="col-md-2">
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

              <div class="col-md-2">
                <div class="form-group">
                <select class="form-control" name="admission_year_id" >
                   <option value="0" selected="true" disabled="true">Admission Year</option>
                  @foreach($admissions as $admission)
                    <option value="{{$admission->id}}">{{$admission->admission_year}}</option>
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

                    <table class="table table-bordered table-striped">
                          <thead> 
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Program</th>
                                <th>Year</th>
                                <th>Semster</th>
                                <th style="width: 15px">Action</th>
                            </tr>
                          </thead>
                           <tbody>
                            @foreach($student as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->faculty->faculty_name}}</td>
                                    <td>{{$data->program->program_name}}</td>
                                    <td>{{$data->year->name}}</td>
                                    <td>{{$data->semester->name}}</td>
                                    <td style="width: 150px;">
                                        @if(array_key_exists('1_view',$session_role))
                                        @if($session_role['1_view']==1)
                                        <a href="{{route('admin.students.view',$data->id)}}"> <i class="fa fa-eye btn btn-success btn-sm"></i></a>
                                        @endif

                                        @if($session_role['1_edit']==1)
                                        <a href="{{route('admin.students.edit',$data->id)}}"> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        @endif

                                        @if($session_role['1_delete']==1)
                                        <a href="{{route('admin.students.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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