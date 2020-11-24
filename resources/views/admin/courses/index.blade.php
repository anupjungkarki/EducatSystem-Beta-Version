@extends('layouts.admin.app')
@section('content')

@php

$session_role=session('UserAccess');

@endphp

<section class="content">
        <div class="row">
         @include('layouts.alert')
          <div class="col-md-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>Course Category</strong> </h3>
                 @if(array_key_exists('6_add',$session_role))
                 @if($session_role['6_add']==1  )
                <a href="{{route('admin.courses.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> AddCatogeries</a>
                 @endif
                 @endif     
                    </div><!-- /.box-header -->
                     <div class="box-body">
                      <div class="col-md-12  "> 
                       <div class="row  bg-danger">
                        <form method="post" action="{{route('admin.courses.searchtoinsertcourse')}}">
                          @csrf

                         <div class="col-md-5">
                           <div class="form-group">
                              <select name="faculty" id="faculty" class="form-control">
                                <option disabled selected>Choose faculty</option>
                              @foreach($faculty as $data)
                                 <option value="{{$data->faculty_id}}"
                                    {{(old('faculty_id')==$data->faculty_id)?'selected':''}}
                                    {{isset($faculty_id)?(($faculty_id==$data->faculty_id)?'selected':''):''}} >{{$data->faculty_name}}</option>
                              @endforeach
                              </select>

                              @error('faculty')
                               <small style="color: red">**{{$message}}</small>
                              @enderror
                           </div>
                        </div>


                    <div class="col-md-5">
                      <div class="form-group">
                        <select class="form-control" class="program" name="program" id="program">
                          <option value="0" disabled="true" selected="true">Select Program</option>
                        </select>
                       </div>
                     </div>

                   <div class="col-md-2">
                     <button type="submit" class="btn btn-info btn-sm">SearchCourseFcaulty</button>
                  </div>

                    </form>                     
                </div>
            </div>


                    <table class="table table-bordered table-striped">
                          <thead> 
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Faculty</th>                                
                                <th>Program</th>
                                <th style="width: 15px">view</th>
                            </tr>
                          </thead>
                        <tbody>

                       @forelse($CourseCatogery as $data)                
                                <tr> 
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->faculty->faculty_name}}</td>
                                    <td>{{$data->program->program_name}}</td>
                                    <td style="width: 50px;">   
                                    <a  href="{{route('admin.courses.subject',$data->id)}}"><i class="fa fa-eye btn btn-success btn-sm"></i></a>
                                    </td>
                                </tr>
                    @empty
                        <tr>
                          <td colspan="10"><center>No data found on this <strong>search</strong> </center></td>
                        </tr>          
                    @endforelse

                           </tbody>     
                        </table>              
                    </div>
                  </div>
                </div>
            </div>
    </section>
@endsection


{{-- css files --}}
@section('css')
<style type="text/css">
.test-file span{font-size: 16px; font-weight: lighter;}
.margin-style{margin-top: 40px;}
.profile_student{height:120px; width: 120px;}
.title-s-data{text-decoration: underline;}
</style>
@endsection
{{-- css files --}}

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
 