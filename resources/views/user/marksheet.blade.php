@extends('layouts.user.app')
@section('content')
<!--  result section  -->
<div class="result-page-section section-gaps ">
    <div class="container">
        <div class="content-wrapper">
            <div class="main-title">
                <h4 class="title text-white">You Result is display in the below table check It!!</h4>
            </div>
             <div class="result-layout">
                <div class="student-info d-flex flex-wrap">

                        <div class="form-input-info student-name d-flex  align-items-center">
                            <div class="title">
                                Name :
                            </div>
                            <div class="content">
                                {{$symbolnumber->student->name}}
                            </div>
                        </div>
                        <div class="form-input-info student-sem d-flex  align-items-center">
                            <div class="title">
                                Semester :
                            </div>
                            <div class="content">
                                {{$symbolcatogery->semester->name}}
                            </div>
                        </div>
                    <div class="form-input-info student-roll d-flex align-items-center">
                        <div class="title">
                            SymbolNo:
                        </div>
                        <div class="content">
                           {{$symbolnumber->symbol_number}}
                        </div>
                    </div>
                </div>

                <div class="table-responsive ">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Marks</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($marks as $data)
                            <tr>
                                <td><b>{{$data->programcourse->subject_name}}</b></td>
                                <td class="{{($data->marks<=32)?'Fail text-danger':'pass'}}">{{$data->marks}}</td>
                             </tr>
                        @endforeach
                            <tr>
                              <th><b>Percentage</b></th>
                              <td class="pass">{{$percentage}}%</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="pass-fail-content text-center">
                    @if($status=='Pass')
                    <p class="pass  ">
                       <b> Congratulations</b> on your well-deserved success
                    </p>
                    @endif
                    @if($status=='Fail')
                    <p class="Fail text-danger">
                       Sorry Better luck next time
                    </p>  
                    @endif 
                </div><br>


                <div class="student-info d-flex flex-wrap">

                        <div class="form-input-info student-name d-flex  align-items-center">
                            <div class="title">
                                Faculty :
                            </div>
                            <div class="content">
                                {{$symbolcatogery->faculty->faculty_name}}
                            </div>
                        </div>
                        <div class="form-input-info student-sem d-flex  align-items-center">
                            <div class="title">
                                Program :
                            </div>
                            <div class="content">
                                {{$symbolcatogery->program->program_name}}
                            </div>
                        </div>
                    <div class="form-input-info student-roll d-flex align-items-center">
                        <div class="title">
                            Year:
                        </div>
                        <div class="content">
                           {{$symbolcatogery->year->name}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!--  result section  -->
@endsection