@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('roles.index') }}">Roles</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('permissions.index') }}">Permissions</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    {{--<h1><i class="fa fa-users"></i>--}}
        {{--User Administration--}}
    {{--</h1>--}}
    <hr>

    <!-- Page Content -->
    <h1>Users <a href="{{ route('users.create') }}">Add new</a></h1>

    <hr>
    @include('_partials.flash-messages')
    {{--<p> the training halls</p>--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Roles</th>
            <th>Actions</th>
            {{--<th>Operations</th>--}}
            {{--<th>Active</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{  $item->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                <td>
                    <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{route('users.edit',$item->id) }}" role="button">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Roles</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
@endsection

@section('js')
    <script>
        $('#example').DataTable();
    </script>
@endsection
