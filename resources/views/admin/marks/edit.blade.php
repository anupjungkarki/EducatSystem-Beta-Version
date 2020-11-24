@extends('layouts.admin.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box bg-green">
                <div class="box-header">
                    <h3 class="box-title color-white">Edit Marksheet</h3>
                </div><!-- /.box-header -->
            </div>
        </div>
        <div class="col-md-12 size ">
            <div class="float-left">
                <p><strong><span>Faculty:</span></strong> {{$SymbolNumberCategory->faculty->faculty_name}} </p>
                <p><strong><span>Program:</span></strong> {{$SymbolNumberCategory->program->program_name}}</p>
                <p><strong><span>Admision year:<span></strong>{{$SymbolNumberCategory->admissionyear->admission_year}}</p>
            </div>
            <div class="float-right">
                <p><strong><span>Year:<span></strong> {{$SymbolNumberCategory->year->name}}</p>
                <p><strong><span>Semester:<span></strong> {{$SymbolNumberCategory->semester->name}}</p>
                <br>
            </div>
            <form method="post" action="{{route('admin.marks.update')}}">
                @csrf
                <table class="table table-bordered table-striped border">
                    <thead class="bg-green">
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Name</th>
                            <th>Symbol_No</th>
                            @forelse($subjects as $subject)
                            <th>{{$subject->subject_name}}</th>
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
                                <input type="text" name="{{$symbolNumber->id}}{{$subject->id}}[mark]" value="{{ $mark->marks}}">
                                <input type="hidden" name="{{$symbolNumber->id}}{{$subject->id}}[subject_id]" value="{{ $subject->id}}">
                                <input type="hidden" name="{{$symbolNumber->id}}{{$subject->id}}[symbol_id]" value="{{ $symbolNumber->id}}">
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
                <center><button type="submit" class="btn btn-success ">Update</button></center>
            </form>
        </div>
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

.profile_studentheight:120px;
width: 120px;
}

.title-s-data {
    text-decoration: underline;
}

.float-right {
    float: right;
}

.float-left {
    float: left;
}

.color-white {
    color: white;
}

.border {
    box-shadow: 0 0 10px;
    border-bottom: 10px solid green;
}

input[type=text] {
    width: 50%;
}

</style>
@endsection
