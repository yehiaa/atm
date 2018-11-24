@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Courses</li>
    </ol>

    <!-- Page Content -->
    <h1>Courses <a href="{{ route('courses.create') }}">Add new</a></h1>
    <hr>
    {{--<p> the training halls</p>--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Alternative name</th>
            <th>Description</th>
            <th>Start datetime</th>
            <th>End datetime</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->alternative_name }}</td>
            <td>{{ str_limit($item->description, 30) }}</td>
            <td>{{ $item->start_datetime }}</td>
            <td>{{ $item->end_datetime }}</td>
            <td>
                <a class="btn btn-primary" href="#" role="button">Edit</a>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Alternative name</th>
            <th>Description</th>
            <th>Start datetime</th>
            <th>End datetime</th>
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