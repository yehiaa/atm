@extends('layouts.master')
@section('content')

    <div class='col-lg-4 col-lg-offset-4'>
        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
        <hr>

        {{ Form::model($role, array('route' => array('roles.update', $role->id))) }}
        @method('patch')
        @csrf
        <div class="form-group">
            {{ Form::label('name', 'Role Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Assign Permissions</b></h5>
        <div class="col-md-3 ">
            Select All : <input id="checkall" class='' type="checkbox" >
        </div>
        @foreach ($permissions as $permission)
            {{Form::checkbox('permissions[]',  $permission->id, $role->hasPermissionTo($permission->name), array('class' => 'checkboxes')) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
        @endforeach
        <br>
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script>
        $("#checkall").click(function (){
            if ($("#checkall").is(':checked')){
                $(".checkboxes").each(function (){
                    $(this).prop("checked", true);
                });
            }else{
                $(".checkboxes").each(function (){
                    $(this).prop("checked", false);
                });
            }
        });
    </script>
@endsection
