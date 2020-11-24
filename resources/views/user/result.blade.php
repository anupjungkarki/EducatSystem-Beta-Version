@extends('layouts.user.app')
@section('content')
<!--  result section  -->
<div class="result-page-section section-gaps ">
    <div class="container">
        <div class="content-wrapper">
            <div class="main-title">
                <h3 class="title txt-black">Result</h3>
            @include('Layouts.alert')
            </div>
            <form class="result-form"  method="post" action="{{route('user.marksheet')}}">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                                Faculty
                            </label>
                            <div class="select-icon">
                                <select name="faculty_id" id="faculty">
                                    <option value="">--- Select the Faculty ---</option>
                                    @foreach($faculty as $data)
                                    <option value="{{$data->faculty_id}}">{{$data->faculty_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                                Program :
                            </label>


                            <div class="select-icon">
                                <select name="program_id" id="program">
                                    <option value="0" disabled="true" selected="true">Select Program</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                               Year
                            </label>


                            <div class="select-icon">
                                <select name="year_id">
                                    <option value="0">--- Select the Year ---</option>
                                    @foreach($years as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                                Semester
                            </label>


                            <div class="select-icon">
                                <select name="semester_id">
                                    <option value="0">--- Select the Semester ---</option>
                                    @foreach($semesters as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                                Admission Year :
                            </label>


                            <div class="select-icon">
                                <select name="admission_year_id">
                                    <option value="0">--- Select the AdmissionYear ---</option>
                                    @foreach($admissionyear as $data)
                                    <option value="{{$data->id}}">{{$data->admission_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label for="">
                                SymbolNo
                            </label>


                            <div class="input-field">
                                <input type="text" name="symbol_number" placeholder="--- Enter your Roll no ---">
                            </div>
                        </div>

                    </div>

                </div>
                 <div>
                    <button type="submit" value="#"  class="btn btn-info">Check Result</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  result section  -->
@endsection



   @section('script')
   <script type="text/javascript">
    $(document).ready(function(){

     $(document).on('change','#faculty',function(){
      var faculty_id=$(this).val();
      var op=" ";
      var div=$(this).parent().parent().parent().parent();

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