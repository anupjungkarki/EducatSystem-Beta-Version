@extends('layouts.admin.app')
@section('content')
{{-- @php   
$active1=session('active1');
@endphp  --}} {{-- Alternative Way to show database records --}}
               <section class="content">
               <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        {{$active1}}
                                    </h3>
                                    <p>
                                        Students
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-stalker"></i>
                                </div>
                                <a href="{{route('admin.students.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       {{$active}}
                                       {{-- {{$active1}} Alternative Way to show database records --}}
                                    </h3>
                                    <p>
                                            Results
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="{{route('admin.marks.view')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        {{$active2}}
                                    </h3>
                                    <p>
                                        Assignment
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document-text"></i>
                                </div>
                                <a href="{{route('admin.assignment.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       {{$active3}}
                                    </h3>
                                    <p>
                                        Notices
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-email"></i>
                                </div>
                                <a href="{{route('admin.notice.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                       {{$active4}}
                                    </h3>
                                    <p>
                                        Courses
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-folder"></i>
                                </div>
                                <a href="{{route('admin.courses.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        {{$active5}}
                                    </h3>
                                    <p>
                                       Faculty
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-folder"></i>
                                </div>
                                <a href="{{route('admin.faculty.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                       {{$active6}}
                                    </h3>
                                    <p>
                                        Program
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-folder"></i>
                                </div>
                                <a href="{{route('admin.program.index')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>
                                        20
                                    </h3>
                                    <p>
                                        Teachers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-folder"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
@endsection
 