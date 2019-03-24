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
    <h1>Courses <a href="{{ route('course_registration.create') }}" >New Registre</a></h1>
    <hr/>
    @include('_partials.flash-messages')
    <hr>
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
                <a class="btn btn-primary" href="#" role="button">Edit</a>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $('#example').DataTable();
    </script>
@endsection
