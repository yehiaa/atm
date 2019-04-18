@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Affiliations</li>
    </ol>

    <!-- Page Content -->
    @can('affiliation add')
    <h1>Affiliations <a href="{{ route('affiliations.create') }}">Add new</a></h1>
    @endcan
    <hr>
    @include('_partials.flash-messages')
    {{--<p> the training halls</p>--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>
                <form method="post" action="{{ route('affiliations.destroy',$item->id) }}" >
                    @can('affiliation edit')
                    <a class="btn btn-primary" href="{{ route('affiliations.edit', $item->id) }}" >Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('affiliation remove')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')" >
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
