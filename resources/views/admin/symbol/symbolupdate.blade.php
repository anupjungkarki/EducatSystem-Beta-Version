@extends('layouts.admin.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.alert')
            <div class="box">
                <div class="box-header">
                    <center>
                        <h3 class="box-title">Student symbol number in detail</h3>
                    </center>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div style="width: 99%;" class="float">
                        <div style="float: left;margin-left: 10px;" class="left">
                            <p><strong>Faculty:</strong> {{$category_titles->faculty->faculty_name}}</p>
                            <p><strong>Program:</strong>{{$category_titles->program->program_name}}</p>
                            <p><strong>Admision Year:</strong>{{$category_titles->admissionyear->admission_year}} </p>
                        </div>
                        <div style="float:right;" class="right">
                            <p><strong>Year:</strong>{{$category_titles->year->name}} </p>
                            <p><strong>Semester:</strong>{{$category_titles->semester->name}}</p>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Student ID</th>
                            <th>Student name</th>
                            <th>Symbol number</th>
                        </tr>
                    </thead>
                    <form method="post" action="{{route('admin.symbol.symbolupdatestore')}}">
                        @csrf
                        <input type="hidden" name="symbol_number_category_id" value="{{$symbol_number_category_id}}">
                        <tbody>
                            @foreach($symbolnumber as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->student->id}} </td>
                                <td>{{$data->student->name}}</td>
                                <td>
                                    <input type="hidden" name="{{$data->id}}[student_id]" value="{{$data->student->id}}">
                                    <input class="form-control" type="text" name="{{$data->id}}[symbol_number]" value="{{$data->symbol_number}}">
                                </td>
                            </tr>
                            @endforeach
                        <tbody>
                </table>
                <center><button type="submit" class="btn btn-info btn-sm ">Update Symbol Number</button></center>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
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
