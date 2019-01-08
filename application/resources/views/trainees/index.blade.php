@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Trainees</li>
    </ol>

    <!-- Page Content -->
    <h1>Trainees <a href="{{ route('trainees.create') }}">Add new</a></h1>
    <hr>
    @include('_partials.flash-messages')
    {{--<p> the training halls</p>--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Identity</th>
            <th>Identity type</th>
            <th>Country</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->identity }}</td>
            <td>{{ $item->identity_type }}</td>
            <td>{{ $item->country }}</td>
            <td>{{ $item->city }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('trainees.edit', $item->id) }}" role="button">Edit</a>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Identity</th>
            <th>Identity type</th>
            <th>Country</th>
            <th>City</th>
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