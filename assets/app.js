/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

import {Calendar} from "@fullcalendar/core";
import dayGridPlugin from '@fullcalendar/daygrid';


document.addEventListener('DOMContentLoaded', function() {

    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl,{
        plugins: [dayGridPlugin]
    });

    calendar.render();
});
