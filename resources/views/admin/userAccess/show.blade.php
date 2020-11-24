@extends('layouts.admin.app')

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                      <h3 class="bg-green"><center>{{$role_name}}</center></h3>
                        <form method="post" action="{{ route('admin.store.user.access') }}">
                            <table class="table table-bordered">
                                <tr class="bg-green">
                                    <th style="width: 10px" >SN</th>
                                    <th>Module Name</th>
                                    <th>View</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                   
                                </tr>

                                <input type="hidden" name="user_role_id" value="{{ $user_role_id }}">
                                @foreach($modules as $module)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $module->name }}</td>
                                        <td><input name="{{ $module->id }}[view]" type="checkbox" 
                                         @if($user_role_id==1) disabled @endif
                                        {{isset($final_array[$module->id."_view"])?(($final_array[$module->id."_view"])==1?"checked":"" ): ""}}></td>

                                        <td><input name="{{ $module->id }}[add]" type="checkbox" 
                                           @if($user_role_id==1) disabled @endif
                                         {{isset($final_array[$module->id."_add"])?(($final_array[$module->id."_add"])==1?"checked":"" ): ""}}></td>

                                        <td><input name="{{ $module->id }}[edit]" type="checkbox"
                                             @if($user_role_id==1) disabled @endif
                                        	{{isset($final_array[$module->id."_edit"])?(($final_array[$module->id."_edit"])==1?"checked":"" ): ""}}></td>

                                        <td><input name="{{ $module->id }}[delete]" type="checkbox" 
                                             @if($user_role_id==1) disabled @endif
                                        {{isset($final_array[$module->id."_delete"])?(($final_array[$module->id."_delete"])==1?"checked":"" ): ""}}> </td>
                                       
                                    
                                    </tr>

                                 
                                @endforeach


                            </table>

                            <input type="submit" value="Update" class="btn btn-success">
                            @csrf
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->



@endsection
