@php
$session_role=session('UserAccess');
@endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->image)
                <img class="img-circle" alt="User Image" src="{{ asset('User/profile/img/'.Auth::user()->image) }}">
                @else
                <img src="{{ asset('template/img/avatar3.png')}}" class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                <!-- Button trigger modal -->
                <p>
                    <p>{{ Auth::user()->name }}</p>
                </p>
                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Change Picture
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color:#000;" class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('editprofile',[Auth::user()->id])}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('email')}}" placeholder="image" />
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="">
                <a href="{{route('admin.dashboard.home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if(array_key_exists('1_view',$session_role))
            @if($session_role['1_view']==1)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Students</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['1_add']==1)
                    <li><a href="{{route('admin.students.create')}}"><i class="fa fa-angle-double-right"></i>New Registration</a></li>
                    @endif
                    
                    <li><a href="{{ route('admin.students.index') }}"><i class="fa fa-angle-double-right"></i>All Students Data</a></li>
                    <li><a href=""><i class="fa fa-angle-double-right"></i>Attandance</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Routine</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Fees Structure</a></li>
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('2_view',$session_role) || array_key_exists('3_view',$session_role) ||array_key_exists('4_view',$session_role))
            
            @if($session_role['2_view']==1 || $session_role['3_view']==1 || $session_role['4_view']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Program & Faculty</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(array_key_exists('2_view',$session_role))
                    @if($session_role['2_view']==1)
                    <li><a href="{{route('admin.faculty.index')}}"><i class="fa fa-angle-double-right"></i>view Faculty</a></li>
                    @endif
                    @endif
                    @if(array_key_exists('3_view',$session_role))
                    @if($session_role['3_view']==1)
                    <li><a href="{{route('admin.program.index')}}"><i class="fa fa-angle-double-right"></i>view Program</a></li>
                    @endif
                    @endif
                    @if(array_key_exists('4_view',$session_role))
                    @if($session_role['4_view']==1)
                    <li><a href="{{route('admin.year.index')}}"><i class="fa fa-angle-double-right"></i>view year</a></li>
                    @endif
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('5_view',$session_role))
            @if($session_role['5_view']==1 || $session_role['5_add']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-clipboard"></i> <span>Student Symbol</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['5_add']==1)
                    <li><a href="{{route('admin.symbol.create')}}"><i class="fa fa-angle-double-right"></i>Add Symbol</a></li>
                    @endif
                    @if($session_role['5_view']==1)
                    <li><a href="{{route('admin.symbol.index')}}"><i class="fa fa-angle-double-right"></i>View Data</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('6_view',$session_role))
            @if($session_role['6_view']==1)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Courses</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.courses.index')}}"><i class="fa fa-angle-double-right"></i>view Courses</a></li>
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('7_view',$session_role))
            @if($session_role['7_view']==1 ||$session_role['7_add']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i> <span>Teachers</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['7_add']==1)
                    <li><a href="{{route('admin.teachers.create')}}"><i class="fa fa-angle-double-right"></i>Add Teachers</a></li>
                    @endif
                    @if($session_role['7_view']==1)
                    <li><a href="{{route('admin.teachers.index')}}"><i class="fa fa-angle-double-right"></i>Teachers Data</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('8_view',$session_role))
            @if($session_role['8_view']==1 ||$session_role['8_add']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-book"></i> <span>Assignment</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['8_add']==1)
                    <li><a href="{{route('admin.assignment.create')}}"><i class="fa fa-angle-double-right"></i>Add Assignment</a></li>
                    @endif
                    @if($session_role['8_view']==1)
                    <li><a href="{{route('admin.assignment.index')}}"><i class="fa fa-angle-double-right"></i>Assignment Data</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('9_view',$session_role))
            @if($session_role['9_view']==1 ||$session_role['8_add']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hdd-o"></i> <span>Marks</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['9_add']==1)
                    <li><a href="{{route('admin.marks.index')}}"><i class="fa fa-angle-double-right"></i>Create Marks</a></li>
                    @endif
                    @if($session_role['9_view']==1)
                    <li><a href="{{route('admin.marks.view')}}"><i class="fa fa-angle-double-right"></i>View Marks</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(array_key_exists('10_view',$session_role))
            @if($session_role['10_view']==1 ||$session_role['10_add']==1 )
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Notice</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($session_role['10_add']==1)
                    <li><a href="{{route('admin.notice.create')}}"><i class="fa fa-angle-double-right"></i>Post Notices</a></li>
                    @endif
                    @if($session_role['10_view']==1)
                    <li><a href="{{route('admin.notice.index')}}"><i class="fa fa-angle-double-right"></i>View Notices</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if(Auth::user()->id==2 || Auth::user()->id==1)
            <li class="">
                <a href="{{route('admin.user.role')}}">
                    <i class="fa fa-gear"></i> <span>User Role</span>
                </a>
            </li>
            @endif

            <li class="">
                <a href="#">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <span>About Us</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
