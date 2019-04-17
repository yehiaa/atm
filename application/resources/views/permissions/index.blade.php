@extends('layouts.master')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" >Users</a></li>
       <li class="breadcrumb-item active"> <a href="{{ route('roles.index') }}" >Roles</a></li>
        <li class="breadcrumb-item active">Permission</li>
    </ol>
    <div class="col-lg-10 col-lg-offset-1">
        {{--<i class="fa fa-key"></i>--}}
        <h1> Available Permissions

        </h1>

        <div class="table-responsive">
            <table  class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

    </div>

@endsection
