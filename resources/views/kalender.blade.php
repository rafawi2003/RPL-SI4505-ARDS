<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kalender Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <style>
                #calendar {
                    max-width: 900px;
                    margin: 0 auto;
                }
                #event-details {
                    max-width: 900px;
                    margin: 20px auto;
                    padding: 10px;
                    border: 1px solid #ccc;
                    background-color: #f9f9f9;
                    display: none;
                    position: absolute;
                    z-index: 1000;
                    background-color: white;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                }
            </style>

            <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.css' rel='stylesheet' />
            <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.css' rel='stylesheet' />
            <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js'></script>

            <div id="calendar"></div>
            <div id="event-details">
                <h3 id="event-title"></h3>
                <p id="event-description"></p>
                <p><strong>Mulai:</strong> <span id="event-start"></span></p>
                <p><strong>Selesai:</strong> <span id="event-end"></span></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventDetailsEl = document.getElementById('event-details');
            var eventTitleEl = document.getElementById('event-title');
            var eventDescriptionEl = document.getElementById('event-description');
            var eventStartEl = document.getElementById('event-start');
            var eventEndEl = document.getElementById('event-end');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid', 'interaction' ],
                initialView: 'dayGridMonth',
                editable: false,
                events: '/api/events', 
                eventMouseEnter: function(info) {
                    eventTitleEl.innerText = info.event.title;
                    eventDescriptionEl.innerText = info.event.extendedProps.description;
                    eventStartEl.innerText = info.event.start ? info.event.start.toLocaleString() : 'N/A';
                    eventEndEl.innerText = info.event.end ? info.event.end.toLocaleString() : 'N/A';
                    eventDetailsEl.style.display = 'block';
                    eventDetailsEl.style.top = (info.jsEvent.pageY + 10) + 'px';
                    eventDetailsEl.style.left = (info.jsEvent.pageX + 10) + 'px';
                },
                eventMouseLeave: function(info) {
                    eventDetailsEl.style.display = 'none';
                }
            });

            calendar.render();
        });
    </script>
</x-app-layout>
