@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Calendar</li>
    </ol>
    <p>Lectures calendar Demo (Example data )</p>
    <!-- Page Content -->
    <hr>

    <div id="calendar"></div>
@endsection

@section('js')
    <script>
        $('#calendar').fullCalendar({
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            defaultView: 'agendaDay',
            resourceColumns: [
                {
                    text: function(resource) {
                        return resource.name;
                    },
                }
            ],
            resources: @json($resources),
            events: @json($lectures),
        });
    </script>
@endsection