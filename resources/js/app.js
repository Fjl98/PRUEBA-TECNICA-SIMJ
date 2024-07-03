import './bootstrap';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import bootstrapPlugin from '@fullcalendar/bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin, bootstrapPlugin, timeGridPlugin],
            initialView: 'dayGridMonth',
            events: '/api/holidays',
            themeSystem: 'bootstrap',
            
            dateClick: function(info) {
                const modal = new bootstrap.Modal(document.getElementById('createHolidayModal'));
                document.getElementById('nombre').value = '';
                document.getElementById('color').value = '#000000';
                document.getElementById('dia').value = info.date.getDate();
                document.getElementById('mes').value = info.date.getMonth() + 1; // getMonth() devuelve de 0 a 11
                document.getElementById('anio').value = info.date.getFullYear();
                document.getElementById('createHolidayForm').action = holidaysStoreRoute;

                modal.show();
            },

            eventClick: function(info) {
                const modal = new bootstrap.Modal(document.getElementById('editHolidayModal'));
                document.getElementById('edit_nombre').value = info.event.title || '';
                document.getElementById('edit_color').value = info.event.extendedProps.color || '#000000';
                document.getElementById('edit_dia').value = new Date(info.event.start).getDate();
                document.getElementById('edit_mes').value = new Date(info.event.start).getMonth() + 1;
                document.getElementById('edit_anio').value = new Date(info.event.start).getFullYear();
                document.getElementById('editHolidayForm').action = '/holidays/' + info.event.id;

                modal.show();
            }
        });

        calendar.render();
    } else {
        console.error('Calendar element not found');
    }
});



