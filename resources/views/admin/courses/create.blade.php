@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
              @include('layouts.alert')
                <div class="box">
                 <div class="box-header">
                   <h3 class="box-title">Insert The Course Detail's</h3>
                    <div class="choose-field">
                       <div class="col-md-12 " style="margin-bottom: 60px;">
                          <div class="box-body table-responsive ">
                             <form method="post" action="{{route('admin.courses.store')}}">
                            @csrf
                          <div class="col-md-5">
                            <div class="form-group">
                               <select class="form-control" class="faculty" name="faculty" id="faculty">
                                <option value="0" selected="true" disabled="true">Select Faculty</option>
                                    @foreach($faculty as $data)
                                    <option value="{{$data->faculty_id}}">{{$data->faculty_name}}</option>
                                    @endforeach
                               </select> 
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
                   <div>
                       <center><button type="submit" class="btn btn-info btn-sm ">CreateCourseFaculty</button></center>
                  </div>
                </div>
               </form>
              </div>{{-- row --}}
             </div>{{-- col-md-12 --}}

          <table class="table table-bordered table-striped">
            <thead> 
              <tr>
                <th style="width: 10px">SN</th>
                 <th>Faculty</th>
                 <th>Program</th>
                 <th style="width:10px;">Action</th>
               </tr>
            </thead>
            <tbody>
              @foreach($CourseCatogery as $data)
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$data->faculty->faculty_name}}</td>
                  <td>{{$data->program->program_name}}</td>
                  <td>
                    <a class=" btn btn-success btn-sm" href=""><i class="fa fa-eye"></i></a>
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