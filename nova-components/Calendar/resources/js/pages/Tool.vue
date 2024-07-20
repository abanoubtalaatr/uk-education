<template>
  <div class="container mx-auto p-4">
    <Head title="Calendar" />

    <Heading class="text-center mb-8 text-3xl font-semibold">Calendar</Heading>

    <Card class="flex flex-col items-center justify-center min-h-screen bg-gray-100 rounded-lg shadow-md">
      <div v-if="loading" class="flex items-center justify-center">
        <svg
          class="animate-spin fill-80 mb-6"
          width="69"
          height="72"
          viewBox="0 0 23 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M20.12 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c3.881-3.834 10.174-3.834 14.055 0a9.734 9.734 0 0 1 .03 13.855zM4.472 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319C16.06.386 8.953.632 4.473 5.057z"
            fill-rule="evenodd"
          />
        </svg>
      </div>
      <div v-else class="w-full">
        <div class="flex justify-between mb-8 w-full">
          <button
            @click="prevYear"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300"
          >
            Previous Year
          </button>
          <span class="text-xl font-bold">{{ year }}</span>
          <button
            @click="nextYear"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300"
          >
            Next Year
          </button>
        </div>
        <div class="d-flex grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
          <div
            v-for="month in months"
            :key="month"
            class="p-6 bg-white border rounded-lg shadow-md text-center flex flex-col items-center justify-center"
          >
            <h2 class="text-lg font-bold mb-2">{{ monthNames[month - 1] }}</h2>
            <p class="text-xl">{{ bookings[month] || 0 }} bookings</p>
          </div>
        </div>
      </div>
    </Card>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      year: new Date().getFullYear(),
      bookings: {},
      loading: true,
      months: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
      monthNames: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
    };
  },
  mounted() {
    this.fetchBookings();
  },
  methods: {
    fetchBookings() {
      this.loading = true;
      axios
        .get(`/api/bookings/monthly?year=${this.year}`)
        .then((response) => {
          this.bookings = response.data;
          this.loading = false;
        })
        .catch((error) => {
          console.error(error);
          this.loading = false;
        });
    },
    nextYear() {
      this.year++;
      this.fetchBookings();
    },
    prevYear() {
      this.year--;
      this.fetchBookings();
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 1200px;
}
.Card {
  padding: 2rem;
}
.button {
  transition: background-color 0.3s;
}
</style>
