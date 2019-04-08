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
    @include('_partials.flash-messages')
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Alternative name</th>
            <th>Logo</th>
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
            <td scope="col">

                @if($item->logo)

                    <a target="_blank" href="{{asset("/storage/$item->logo")}}">
                        <img src="{{ asset("storage/$item->logo") }}"
                             alt="course logo" class="img-thumbnail" style="max-width:30px">
                    </a>
                @endif
            </td>
            {{--<td>--}}
                {{--<img src="{{ asset("storage/$item->logo") }}"--}}
                     {{--alt="course logo" class="img-thumbnail" style="max-width:30px">--}}
            {{--</td>--}}
            <td>{{ str_limit($item->description, 30) }}</td>
            <td>{{ $item->start_datetime }}</td>
            <td>{{ $item->end_datetime }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('courses.show', ['id'=> $item->id]) }}">Show</a>
                        <a class="dropdown-item" href="{{ route('courses.lectures.create', ['course_id'=>$item->id]) }}">Add lecture</a>
                        <a class="dropdown-item" href="{{ route('courses.trainers.create', ['course_id'=>$item->id]) }}">Add trainer</a>
                        <a class="dropdown-item" href="{{ route('courses.edit', ['course_id'=>$item->id]) }}">Edit Course</a>
                        <form action="{{ route('courses.destroy', ['id'=> $item->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                        <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">Delete</button>
                        </form>
                    </div>
                </div>
                {{--<a class="btn btn-primary" href="#" role="button">Show</a>--}}
            </td>
        </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Alternative name</th>
            <th>Logo</th>
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
