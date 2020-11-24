@extends('layouts.admin.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.alert')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Show the all Students Marks</h3>
                    <div class="box-body">
                        <div class="col-md-12  ">
                            <div class="row  bg-danger">
                                <form method="post" action="{{route('admin.marks.searchmarks')}}">
                                    @csrf
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="faculty_id" id="faculty" class="form-control">
                                                <option disabled selected>Choose faculty</option>
                                                @foreach($faculty as $data)
                                                <option value="{{$data->faculty_id}}" {{(old('faculty_id')==$data->faculty_id)?'selected':''}} {{isset($faculty_id)?(($faculty_id==$data->faculty_id)?'selected':''):''}}>{{$data->faculty_name}} </option>
                                                @endforeach
                                            </select>
                                            @error('faculty_id')
                                            <small style="color: red">**{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select class="form-control" class="program" name="program_id" id="program">
                                                <option value="0" disabled="true" selected="true">Select Program</option>
                                            </select>
                                            @error('program_id')
                                            <small style="color: red">**{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="year_id" id="year" class="form-control">
                                                <option disabled selected>Choose Year</option>
                                                @foreach($years as $data)
                                                <option value="{{$data->id}}" {{(old('year_id')==$data->id)?'selected':''}} {{isset($year_id)?(($year_id==$data->id)?'selected':''):''}}>{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('year_id')
                                            <small style="color: red">**{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="semester_id" id="semester" class="form-control">
                                                <option disabled selected>Choose semester</option>
                                                @foreach($semesters as $data)
                                                <option value="{{$data->id}}" {{(old('semester_id')==$data->id)?'selected':''}} {{isset($semester_id)?(($semester_id==$data->id)?'selected':''):''}}>{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('semester_id')
                                            <small style="color: red">**{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="admision_year_id" id="admision_year" class="form-control">
                                                <option disabled selected>Admision year</option>
                                                @foreach($admissions as $data)
                                                <option value="{{$data->id}}" {{(old('admision_year_id')==$data->id)?'selected':''}} {{isset($admission_year_id)?(($admission_year_id==$data->id)?'selected':''):''}}>{{$data->admission_year}}</option>
                                                @endforeach
                                            </select>
                                            @error('admision_year_id')
                                            <small style="color: red">**{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-info">Show</button>
                                    </div>
                            </div>
                        </div>
                        </form>
                        <br>
                        @if(isset($flag))
                        <div class="col-md-12 size">
                            <hr>
                            <div style="float:left;" class="left">
                                <p><strong><span>Faculty:</span></strong> {{$SymbolNumberCategory->faculty->faculty_name}} </p>
                                <p><strong><span>Program:</span></strong> {{$SymbolNumberCategory->program->program_name}}</p>
                                <p><strong><span>Admision year:<span></strong>{{$SymbolNumberCategory->admissionyear->admission_year}}</p>
                            </div>
                            <div style="float:right;" class="right">
                                <p><strong><span>Year:<span></strong> {{$SymbolNumberCategory->year->name}}</p>
                                <p><strong><span>Semester:<span></strong> {{$SymbolNumberCategory->semester->name}}</p>
                                <form method="post" action="{{route('admin.marks.edit')}}">
                                    @csrf
                                    <input type="hidden" name="SymbolNumberCategory_id" value="{{$SymbolNumberCategory->id}}">
                                    <button class="btn-primary btn btn-sm" type="submit"> <i class="fa fa-edit "> Edit Marksheet</i></button>
                                </form>
                                <br>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SN</th>
                                    <th>name</th>
                                    <th>symbol_no</th>
                                    @forelse($subjects as $data)
                                    <th>{{$data->subject_name}}</th>
                                    @empty
                                    <th>no subject</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($symbolNumbers as $symbolNumber)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{$symbolNumber->student->name}}</td>
                                    <td>{{$symbolNumber->symbol_number}}</td>
                                    @forelse($subjects as $subject)
                                    <td>
                                        @forelse($marks as $mark)
                                        @if($mark->subject_id==$subject->id && $mark->symbol_number_id==$symbolNumber->id )
                                        {{ $mark->marks}}
                                        @endif
                                        @empty
                                        @endforelse
                                    </td>
                                    @empty
                                    <td>no subject</td>
                                    @endforelse
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">
                                        <center>No data found on this <strong>search</strong> </center>
                                    </td>
                                </tr>
                                @endforelse
                            <tbody>
                        </table>
                        @endif
                    </div><!-- /.box-body -->
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
</section><!-- /.content -->
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

</style>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {


    $(document).on('change', '#faculty', function() {
        var faculty_id = $(this).val();
        var op = " ";
        var div = $(this).parent().parent().parent();

        $.ajax({
            type: 'get',
            url: '{!! URL::to(' / ajax / getprogram ') !!}',
            data: { 'id': faculty_id },
            success: function(data) {
                op += '<option value="0" selected disabled>Choose Program</option>';
                for (var i = 0; i < data.length; i++) {
                    op += '<option value="' + data[i].program_id + '">' + data[i].program_name + '</option>';
                }
                div.find('#program').html(" ");
                div.find('#program').append(op);
            },
            error: function() {},
        });
    });
});

</script>
@endsection
