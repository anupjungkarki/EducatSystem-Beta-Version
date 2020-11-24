@extends('layouts.admin.app')
@section('content')
@php
$session_role=session('UserAccess');
@endphp
<section class="content">
    @include('layouts.alert')
    <div class="box">
        <div class="row md-10">
            <div class="col-md-12 size ">
                <div class="float-left   ">
                    <p><strong><span>Faculty:</span></strong> {{$CourseDetails->faculty->faculty_name}}</p>
                </div>
                <div class="float-right">
                    <p><strong><span>Program:<span></strong>{{$CourseDetails->program->program_name}}</p>
                </div>
            </div>
        </div>
        <HR>
        {{-- First Semester Insertion for Subject --}}
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">First Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button">ADD</button>
                    <input type="text" id="number" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($FirstSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="fn" hidden>
                                        <input type="hidden" name="semester_id" value="1">
                                        <input type="hidden" name="year_id" value="1">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="fn2" hidden="">
                                        <center><input type="submit" value="InsertSubject" class="btn btn-success"></center>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Second Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button1">ADD</button>
                    <input type="text" id="number1" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($SecondSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="second" hidden>
                                        <input type="hidden" name="semester_id" value="2">
                                        <input type="hidden" name="year_id" value="1">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="second2" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Third Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button3">ADD</button>
                    <input type="text" id="number3" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ThirdSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="third" hidden>
                                        <input type="hidden" name="semester_id" value="3">
                                        <input type="hidden" name="year_id" value="2">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="third3" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Fourth semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button4">ADD</button>
                    <input type="text" id="number4" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    HTML-CSS-JS Prottify
                    <tbody>
                        @foreach($FourthSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="fourth" hidden>
                                        <input type="hidden" name="semester_id" value="4">
                                        <input type="hidden" name="year_id" value="2">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="fourth4" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Fifth semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button5">ADD</button>
                    <input type="text" id="number5" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($FifthSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="fifth" hidden>
                                        <input type="hidden" name="semester_id" value="5">
                                        <input type="hidden" name="year_id" value="3">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="fifth5" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Sixth Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button6">ADD</button>
                    <input type="text" id="number6" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($SixthSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="sixth" hidden>
                                        <input type="hidden" name="semester_id" value="6">
                                        <input type="hidden" name="year_id" value="3">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="sixth6" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Seventh Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button7">ADD</button>
                    <input type="text" id="number7" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($SeventhSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="seventh" hidden>
                                        <input type="hidden" name="semester_id" value="7">
                                        <input type="hidden" name="year_id" value="4">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="seventh7" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <button class="btn btn-info float-left">Eight Semester</button>
                    @if(array_key_exists('6_add',$session_role))
                    @if($session_role['6_add']==1 )
                    <button type="button" value="click" class=" btn  btn-info float-right" id="button8">ADD</button>
                    <input type="text" id="number8" class="btn-success add">
                    @endif
                    @endif
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Subject code</th>
                            <th>Subject</th>
                            <th style="width: 15px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($EightSemester as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td><a href="{{route('admin.courses.destroy',$data->id)}}"><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <form method="post" action="{{route('admin.courses.storesubject')}}" onsubmit="return validateform()">
                                    @csrf
                                    <div id="eight" hidden>
                                        <input type="hidden" name="semester_id" value="8">
                                        <input type="hidden" name="year_id" value="4">
                                        <input type="hidden" name="course_catogery_id" value="{{$course_catogery_id}}">
                                    </div>
                                    <div id="eight8" hidden="">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <HR>
</section>
@endsection
@section('css')
<style type="text/css">
.test-file span {
    font-size: 16px;
    font-weight: lighter;
}

.margin-style {
    margin-top: 40px;
}

.profile_student {
    height: 120px;
    width: 120px;
}

.title-s-data {
    text-decoration: underline;
}

.hidden {
    display: none;
    display: block;
}

.unhidden {
    display: block;
}

.float-left {

    float: left;
}

.float-right {


    float: right;
}

.add {
    width: 8%;
    height: 34px;
    float: right;
    margin-right: 2px;
}

.size span {

    font-size: 18px;
}

</style>
@endsection
@section('script')
<script type="text/javascript">
$("#button").click(function() {

    var number = $('#number').val();

    var op = '';
    var div = $('#fn').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter Subject name"> <br><br>';
    }

    div.find('#fn').append(op);


    $("#fn").show();


    if (number) {
        if (!isNaN(number)) {
            $("#fn2").show();
        }
    }

});


/// second semester

$("#button1").click(function() {

    var number = $('#number1').val();

    var op = '';
    var div = $('#second').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#second').append(op);


    $("#second").show();


    if (number) {
        if (!isNaN(number)) {
            $("#second2").show();
        }
    }

});

//third semester 
$("#button3").click(function() {

    var number = $('#number3').val();

    var op = '';
    var div = $('#third').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#third').append(op);


    $("#third").show();


    if (number) {
        if (!isNaN(number)) {
            $("#third3").show();
        }
    }

});

//fourth semester

$("#button4").click(function() {

    var number = $('#number4').val();

    var op = '';
    var div = $('#fourth').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#fourth').append(op);


    $("#fourth").show();


    if (number) {
        if (!isNaN(number)) {
            $("#fourth4").show();
        }
    }

});


// fifth semester


$("#button5").click(function() {

    var number = $('#number5').val();

    var op = '';
    var div = $('#fifth').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#fifth').append(op);


    $("#fifth").show();


    if (number) {
        if (!isNaN(number)) {
            $("#fifth5").show();
        }
    }

});

// six semester

$("#button6").click(function() {


    var number = $('#number6').val();

    var op = '';
    var div = $('#sixth').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#sixth').append(op);


    $("#sixth").show();


    if (number) {
        if (!isNaN(number)) {
            $("#sixth6").show();
        }
    }

});
//seventh semester

$("#button7").click(function() {

    var number = $('#number7').val();

    var op = '';
    var div = $('#seventh').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#seventh').append(op);


    $("#seventh").show();


    if (number) {
        if (!isNaN(number)) {
            $("#seventh7").show();
        }
    }

});


// eight semeste4
$("#button8").click(function() {

    var number = $('#number8').val();

    var op = '';
    var div = $('#eight').parent().parent();


    for (var i = 0; i < number; i++) {

        op += '<input type="text" name=" ' + i + '[subject_code] " placeholder="Subject code"> <input type="text" name="' + i + '[subject_name]" size="40" placeholder="Enter  Subject name"> <br> <br>';
    }

    div.find('#eight').append(op);


    $("#eight").show();


    if (number) {
        if (!isNaN(number)) {
            $("#eight8").show();
        }
    }

});

</script>
@endsection
