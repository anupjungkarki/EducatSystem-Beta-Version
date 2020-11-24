@extends('layouts.admin.app')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create user type</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                   
                    <form role="form" method="post" action="{{ route('admin.store.user.role') }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user role name" value="{{ old('name') }}">
                              @error('name')
                                <small style="color: red">**{{$message}}</small>
                              @enderror
                            </div>
                           

                        </div><!-- /.box-body -->

                        {{ csrf_field() }}

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->


            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->

@endsection
