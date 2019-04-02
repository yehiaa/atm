@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href= "{{ route('course_evaluation.index', [$course->id]) }}"> Course Evaluation</a>

        </li>
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Evaluation <a href="{{ route('course_evaluation.create', [$course->id]) }}">Add new</a></h1>
    {{--<hr>--}}

    @include('_partials.flash-messages')
    <div class="row">
        <div class="col-md-12">
            <form>
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">course</th>
                        <th scope="col">trainee</th>
                        <th scope="col">Organization</th>
                        <th scope="col">Educational tools</th>
                        <th scope="col">Coffee break</th>
                        <th scope="col">Overall evaluation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($items as $item)
                    <tr>
                        <td scope="col">{{$course->name}}</td>
                        <td scope="col">{{$item->trainee_name }}</td>
                        <td scope="col">{{$item->organization}}</td>
                        <td scope="col">{{$item->educational_tools}}</td>
                        <td scope="col">{{$item->cofee_break}}</td>
                        <td scope="col">{{$item->overall_evaluation}}</td>
                    <td>
                        <form action="{{ route('course_evaluation.destroy',[$item->course_id,$item->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">Delete</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
