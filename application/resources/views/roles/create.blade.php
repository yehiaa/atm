@extends('layouts.master')
@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Add Role</h1>
        <hr>

        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Assign Permissions</b></h5>
        <div class="col-md-3 ">
            Select All : <input id="checkall" class='' type="checkbox" >
        </div>
        <div class='form-group'>
            @foreach ($permissions as $permission)
                <input value={{$permission->id}} class='checkboxes' type="checkbox" name="permissions[]">
                <label>{{($permission->name) }}</label>
                <br/>
                {{--{{ Form::checkbox('permissions[]',  $permission->id ) }}--}}
                {{--{{ Form::label($permission->name, ucfirst($permission->name)) }}<br>--}}

            @endforeach
        </div>

        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

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
