@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Calendar</li>
    </ol>
    <!-- Page Content -->
    <hr>
    @include('_partials.flash-messages')
    <div id="calendar"></div>
@endsection

@section('js')
    <script>
        $('#calendar').fullCalendar({
            // now: '2018-04-07',
            // editable: true,
            // aspectRatio: 1.8,
            // scrollTime: '00:00',
            header: {
                left: 'today prev,next',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
            },
            defaultView: 'month',
            navLinks: true,
            resourceAreaWidth: '20%',
            resourceLabelText: 'Halls',
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
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