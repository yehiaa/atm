@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Specialities</li>
    </ol>

    <!-- Page Content -->
    @can('speciality add')
    <h1>Specialities <a href="{{ route('specialities.create') }}">Add new</a></h1>
    <hr>
    @endcan
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

                <form action="{{ route('specialities.destroy',$item->id) }}" method="POST">
                    @can('speciality edit')
                    <a class="btn btn-primary" href="{{ route('specialities.edit', $item->id) }}" role="button">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('speciality remove')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">
                        Delete
                    </button>
                    @endcan
                </form>
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
