@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Halls</li>
    </ol>

    <!-- Page Content -->
    <h1>Halls <a href="{{ route('halls.create') }}">Add new</a></h1>
    <hr>
    @include('_partials.flash-messages')
    <p> the training halls</p>
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
                <form action="{{ route('halls.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('halls.edit', $item->id) }}" role="button">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">
                        Delete
                    </button>
                </form>
            </td>
            <td>
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
