<template>
    <div>
      <h2>Bookings Calendar</h2>
      <button @click="prevYear">Previous Year</button>
      <button @click="nextYear">Next Year</button>
      <div id="calendar">
        <FullCalendar
          :plugins="calendarPlugins"
          :initialView="'dayGridMonth'"
          :events="events"
          @dateClick="handleDateClick"
        />
      </div>
      <div v-if="selectedDate">
        <h3>Bookings for {{ selectedDate }}</h3>
        <ul>
          <li v-for="booking in bookingsForDate" :key="booking.id">
            {{ booking.user.name }} - {{ booking.tutor.name }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue'
  import FullCalendar from '@fullcalendar/vue'
  import dayGridPlugin from '@fullcalendar/daygrid'
  import axios from 'axios'
  
  export default {
    components: {
      FullCalendar
    },
    data() {
      return {
        calendarPlugins: [dayGridPlugin],
        events: [],
        selectedDate: null,
        bookingsForDate: []
      }
    },
    methods: {
      prevYear() {
        // Implement logic to load previous year's bookings
        this.fetchBookings()
      },
      nextYear() {
        // Implement logic to load next year's bookings
        this.fetchBookings()
      },
      fetchBookings() {
        axios.get('/api/bookings', {
          params: {
            year: this.currentYear // Pass current year or selected year
          }
        }).then(response => {
          this.events = response.data.map(booking => ({
            title: 'Booking',
            start: booking.date // Assuming 'date' is a field in your Booking model
          }))
        }).catch(error => {
          console.error('Error fetching bookings', error)
        })
      },
      handleDateClick(info) {
        this.selectedDate = info.dateStr
        this.fetchBookingsForDate(info.dateStr)
      },
      fetchBookingsForDate(date) {
        axios.get('/api/bookings/date', {
          params: {
            date: date
          }
        }).then(response => {
          this.bookingsForDate = response.data
        }).catch(error => {
          console.error('Error fetching bookings for date', error)
        })
      }
    },
    mounted() {
      this.fetchBookings()
    }
  }
  </script>
  
  <style scoped>
  #calendar {
    margin-bottom: 20px;
  }
  </style>
