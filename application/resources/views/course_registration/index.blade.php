@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Course registration</li>
    </ol>

    <!-- Page Content -->
    <h1>{{ $course->name }}</h1>
    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">courses</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Lectures</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Trainers</a>
                    <a class="nav-link active"  href="{{ route('course_registration.index',[$course->id]) }}" >Registrants</a>
                    <a class="nav-link" href="{{ route('course_evaluation.index',$course->id) }}">Course Evaluation</a>
                    <a class="nav-link"  href="{{ route('trainer_evaluation.index',$course->id) }}">Trainer Evaluation</a>
                    <a class="nav-link"  href="{{ route('trainee_assessment.index',$course->id) }}">Trainee Assessment</a>
                </div>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Course</th>
            <th>Trainee</th>
            <th>Affiliation</th>
            <th>Is Paid</th>
            <th>Reference Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->course_name }}</td>
            <td>{{ $item->trainee_name }}</td>
            <td>{{ $item->affiliation_name }}</td>
            <td>{{ $item->is_paid }}</td>
            <td>{{ $item->reference }}</td>
            <td>
                <form method="post" action="{{ route('course_registration.destroy',[$course->id,$item->id]) }}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')" >
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#example').DataTable();
    </script>
@endsection
