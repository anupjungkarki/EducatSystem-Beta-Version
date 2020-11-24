@extends('layouts.admin.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">UserRole</h3>
                        <a style="margin-left: 5px;" href="{{route('admin.create.user.role')}}" class="btn btn-primary pull-right">Add User Role</a>
                        <a href="{{route('admin.role.register.form')}}" class="btn btn-success pull-right">  Add User</a>
                    </div><!-- /.box-header -->
                    
                    <div class="box-body">
                     
                        <table class="table table-bordered">
                            <tr class="bg-blue">
                                <th style="width: 1px">SN</th>
                                <th style="width: 50px">Title</th>
                                
                                <th style="width: 40px">Action</th>
                            </tr>
                                                        
                              @foreach($userroles as $role)
                                <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$role->name}}</td>
                                     <td>

                                     
                                       <a href=""> <i class="fa fa-edit btn btn-info btn-sm"></i></a>
                                        <a href="{{route('admin.show.user.access',$role->id)}}"><i class="fa fa-eye btn-info btn btn-sm"></i></a>
                                        <a href=""><i class="fa fa-times btn btn-danger btn-sm"></i></a>

                                     </td>
                                    
                                </tr>
                                @endforeach
                             
                         

                        </table>
                    </div><!-- /.box-body -->

                    <div align="center">
                                           </div>
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->



@endsection
