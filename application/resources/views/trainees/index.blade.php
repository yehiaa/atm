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
    @can('trainee add')
    <h1>Trainees <a href="{{ route('trainees.create') }}">Add new</a></h1>
    <hr>
    @endcan
    @include('_partials.flash-messages')

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
            <th>Attachment</th>
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
            <td scope="col">
                @if($item->attachment)
                    <a target="_blank" href="{{asset("/storage/$item->attachment")}}">Attachment</a>
                @endif
            </td>
            <td>
                <form action="{{ route('trainees.destroy',['id'=> $item->id]) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('trainees.edit', $item->id) }}" role="button">Edit</a>
                    @method('delete')
                    @csrf
                    @can('trainee remove')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">Delete</button>
                    @endcan
                </form>
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
