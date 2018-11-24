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
            events: [
                // { id: '1', resourceId: '1', start: '2018-11-24', end: '2018-11-24', title: 'Course - lecture 1' },
                { id: '2', resourceId: '2', start: '2018-11-24T05:00:00', end: '2018-11-24T09:00:00', title: 'ex : Course - lecture 2' },
                { id: '2', resourceId: '2', start: '2018-11-24T09:00:00', end: '2018-11-24T14:00:00', title: 'ex : Course - lecture 2' },
                { id: '3', resourceId: '3', start: '2018-11-24T12:00:00', end: '2018-04-08T06:00:00', title: 'ex : Course - lecture 3' },
                { id: '4', resourceId: '4', start: '2018-11-24T07:30:00', end: '2018-11-24T09:30:00', title: 'ex : Course - lecture 4' },
                { id: '5', resourceId: '5', start: '2018-11-24T10:00:00', end: '2018-11-24T15:00:00', title: 'ex : Course - lecture 5' },

                { id: '2', resourceId: '2', start: '2018-11-25T09:00:00', end: '2018-11-25T14:00:00', title: 'ex : Course - lecture 2' },
                { id: '2', resourceId: '4', start: '2018-11-25T15:00:00', end: '2018-11-25T20:00:00', title: 'ex : Course - lecture 2' },
            ],
        });
    </script>
@endsection