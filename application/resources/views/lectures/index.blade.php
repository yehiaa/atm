@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Lectures</li>
    </ol>

    <!-- Page Content -->
    <h1>Lectures <a href="{{ route('lectures.create') }}">Add new</a></h1>
    <hr>
    @include('_partials.flash-messages')
    {{--<p> the training halls</p>--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->is_active ? 'Yes': 'No' }}</td>
            <td>
                <a class="btn btn-primary" href="#" role="button">
                    Edit</a>
                <button class="btn btn-danger">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Active</th>
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
