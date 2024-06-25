<template>
    <div>
        <full-calendar
            :plugins="calendarPlugins"
            :events="events"
            :initial-view="'dayGridMonth'"
            @dateClick="handleDateClick"
        ></full-calendar>
    </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue';
import dayGridPlugin from '@fullcalendar/daygrid';
import axios from 'axios'; // Example for making HTTP requests

export default {
    components: {
        FullCalendar
    },
    data() {
        return {
            calendarPlugins: [dayGridPlugin],
            events: []
        };
    },
    mounted() {
        this.fetchEvents();
    },
    methods: {
        fetchEvents() {
            axios.get('/api/events') // Replace with your Laravel route
                .then(response => {
                    this.events = response.data;
                })
                .catch(error => {
                    console.error('Error fetching events', error);
                });
        },
        handleDateClick(info) {
            console.log('Date clicked', info.dateStr);
            // Handle date click event
        }
    }
};
</script>

<style scoped>
/* Optional: Add custom styles for the calendar */
</style>
