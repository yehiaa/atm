@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('users.index') }}">Users</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>User</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" value="{{old('name')}}" placeholder="name" class="form-control here" type="text" required="required">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" value="{{old('email')}}" class="form-control here" type="text" required="required">
        </div>

        {{--<div class="form-group">--}}
            {{--@foreach ($roles as $role)--}}
            {{--<input type="checkbox" value="{{$role->id}}" checked id="role" name="role">--}}
            {{--<label for="remember_me">Remember me</label>--}}
            {{--@endforeach--}}
        {{--</div>--}}

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" class="form-control here" type="password" required="required">
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection

@section('js')
@endsection
