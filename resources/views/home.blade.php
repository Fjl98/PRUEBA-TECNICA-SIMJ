@extends('layouts.app')

@section('content')
<div class="container">
    <div id="calendar"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/js-year-calendar@latest/js-year-calendar.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/js-year-calendar@latest/css/js-year-calendar.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendar = new Calendar('#calendar', {
        style: 'background',
        dataSource: function(year) {
            return fetch(`/api/holidays`)
                .then(response => response.json())
                .then(data => data.map(holiday => ({
                    startDate: new Date(year, holiday.mes - 1, holiday.dia),
                    endDate: new Date(year, holiday.mes - 1, holiday.dia),
                    color: holiday.color,
                    title: holiday.nombre
                })));
        },
        mouseOnDay: function(e) {
            if(e.events.length > 0) {
                let content = '';
                for(let i in e.events) {
                    content += '<div class="event-tooltip-content">'
                        + '<div class="event-title" style="color:' + e.events[i].color + ';">' + e.events[i].title + '</div>'
                        + '</div>';
                }

                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.innerHTML = content;
                document.body.appendChild(tooltip);

                tooltip.style.left = (e.element.getBoundingClientRect().left + e.element.offsetWidth / 2) + 'px';
                tooltip.style.top = (e.element.getBoundingClientRect().top - tooltip.offsetHeight) + 'px';
            }
        },
        mouseOutDay: function(e) {
            if(document.querySelector('.tooltip')) {
                document.querySelector('.tooltip').remove();
            }
        }
    });
});
</script>

<style>
.tooltip {
    position: absolute;
    background: rgba(0, 0, 0, 0.75);
    color: #fff;
    padding: 5px;
    border-radius: 3px;
    font-size: 12px;
    z-index: 1000;
}
</style>
@endsection
