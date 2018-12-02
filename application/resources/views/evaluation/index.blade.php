@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Evaluation</li>
    </ol>

    <!-- Page Content -->
    <h1>Evaluations <a href="#">Add new</a></h1>
    <hr>

@endsection

@section('js')
@endsection