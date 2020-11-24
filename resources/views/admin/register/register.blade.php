@extends('layouts.admin.app')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
        <div class="form-box" id="login-box">
            <div class="header">Register For Role</div>
            <form action="{{route('admin.role.register.store')}}" method="post">
                {{csrf_field()}}
                <div class="body bg-gray">
                    <div class="form-group">
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Full name"/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  placeholder="Email"/>

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}"  placeholder="Password"/>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">*{{ $message }}*</strong>
                                    </span>
                                @enderror
                    </div>
                     <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}"  placeholder="Password Confirmed"/>
                    </div>

                <div class="form-group">
                     <select class="form-control" name="user_role">
                       
                        <option disabled selected>Role</option>

                        @foreach ($roles  as $role)
                           @if($role->id!==1)
                           <option value="{{$role->id}}">{{$role->name}}</option>
                           @endif
                        @endforeach
                     </select>
                     <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{$errors->first('user_role')}}</strong>
                    </span>

                </div>
                </div>
                <div class="footer">                    
                 <button type="submit" class="btn bg-olive btn-block">Register</button>
                </div>
            </form>
        </div>


@endsection
