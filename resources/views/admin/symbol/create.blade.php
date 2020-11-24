@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
              @include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Choose The Option To Insert Student Symbol Number</h3>
                   <div class="choose-field">
                    <div class="col-md-12 " style="margin-bottom: 60px;">
                     <div class="box-body table-responsive ">
                      <form method="post" action="{{route('admin.symbol.showsymbolnumberform')}}">
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
                        <select class="form-control" name="year_id">
                          <option value="0" selected="true" disabled="true">Select Year</option>
                            @foreach($years as $data)
                              <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                        <select class="form-control" name="semester_id">
                        <option value="0" selected="true" disabled="true">Select Semester</option>
                          @foreach($semesters as $data)
                              <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-md-2">
                   <div class="form-group">
                    <select class="form-control" name="admission_year_id">
                      <option value="0" selected="true" disabled="true">Admission Year</option>
                       @foreach($admissions as $data)
                        <option value="{{$data->id}}">{{$data->admission_year}}</option>
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
      </div><!-- /.box -->
        </div><!-- /.box -->
           </div><!-- /.col -->
             </div><!-- /.row -->

           @if(isset($flag))
                    <table class="table table-bordered table-striped">
                          <div style="width: 99%;" class="float">
                              <div style="float: left;margin-left: 10px;" class="left">
                                 <p><strong>Faculty:</strong>{{$faculty_name}}</p>
                                    <p></strong>Program:</strong>{{$program_name}}</p>
                              </div>
                              <div style="float:right;" class="right">
                                  <p><strong>Year:</strong>{{$student_year}}</p>
                                  <p><strong>Semester:</strong>{{$semester_name}}</p>
                              </div>
                            </div>

                          <thead> 
                            <tr>
                                <th style="width:150px">SN</th>
                                <th>Name</th>
                                <th>Enter Symbol No</th>
                            </tr>
                          </thead>
                          <form method="post" action="{{route('admin.symbol.store')}}" >
                            @csrf
                            <input type="hidden" value="{{$faculty_id}}" name="faculty_id">
                            <input type="hidden" value="{{$program_id}}" name="program_id">
                            <input type="hidden" value="{{$year_id}}" name="year_id">
                            <input type="hidden" value="{{$semester_id}}" name="semester_id">
                            <input type="hidden" value="{{$admission_year_id}}" name="admission_year_id">
                           <tbody>
                            @foreach($students as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>
                                      <input type="text" name="{{$data->id}}[symbol_number]" placeholder="Enter The Student Symbol No" class="form-control">
                                    </td>
                                  </tr>
                              @endforeach
                           <tbody>
                          </table>
                         <div class="box-footer">
                        <center><button type="submit" class="btn btn-primary btn-flat">Insert Symbol Number</button></center>
                      </div>
                    </form>
                    @endif
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