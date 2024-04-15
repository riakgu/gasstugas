@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <h3>{{ $title }}</h3>
        </div>
        <div class="page-heading">
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
                eventClick: function(info) {
                    var event = info.event;
                    var task = event.extendedProps;
                    var category = event.category;

                    Swal.fire({
                        icon: 'info',
                        title: task.task_name,
                        html:
                            '<p><strong>Category:</strong> ' + category + '</p>' +
                            '<p><strong>Description:</strong> ' + task.description + '</p>' +
                            '<p><strong>Started:</strong> ' + task.started + '</p>' +
                            '<p><strong>Deadline:</strong> ' + task.deadline + '</p>' +
                            '<p><strong>Status:</strong> ' + task.status + '</p>',
                        confirmButtonText: 'Close'
                    });
                }
            });
            calendar.render();
        });
    </script>
@endsection