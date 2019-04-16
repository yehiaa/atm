@extends('layouts.master')
@section('content')

    <div class='col-lg-4 col-lg-offset-4'>
        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
        <hr>

        {{ Form::model($role, array('route' => array('roles.update', $role->id))) }}
        @method('patch')
        @csrf
        {{--<form method="post" action="{{ route('roles.update',[$role->id]) }}">--}}
        {{--@csrf--}}
        {{--@method('patch')--}}
            {{--<div class="form-group">--}}
                {{--<label for="name">Role Name</label>--}}
                {{--<input id="name" name="name" placeholder="name" class="form-control here" value="{{ $role->name }}" type="text">--}}
            {{--</div>--}}
        <div class="form-group">
            {{ Form::label('name', 'Role Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Assign Permissions</b></h5>
        @foreach ($permissions as $permission)
            {{Form::checkbox('permissions[]',  $permission->id, $role->hasPermissionTo($permission->name) ) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
        @endforeach
        <br>
            {{--<div class="form-group">--}}
                {{--<button name="submit" type="submit" class="btn btn-primary">Edit</button>--}}
            {{--</div>--}}
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection
