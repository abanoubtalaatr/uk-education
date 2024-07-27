<template>
  <div class="container mx-auto p-4">
    <Head title="Calendar" />
    <Heading class="text-center mb-8 text-3xl font-semibold">Calendar</Heading>
    <Card class="flex flex-col items-center justify-center min-h-screen bg-gray-100 rounded-lg shadow-md p-8">
      <div v-if="loading" class="flex items-center justify-center">
        <svg
          class="animate-spin fill-current text-blue-500 mb-6"
          width="69"
          height="72"
          viewBox="0 0 23 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M20.12 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1 .03 13.855zM4.472 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319C16.06.386 8.953.632 4.473 5.057z"
            fill-rule="evenodd"
          />
        </svg>
      </div>
      <div v-else class="w-full">
        <div class="flex justify-between mb-8 w-full">
          <button
            @click="prevYear"
            class="px-4 py-2 border rounded hover:bg-blue-600 transition duration-300"
          >
            Previous Year
          </button>
          <span class="text-xl font-bold">{{ year }}</span>
          <button
            @click="nextYear"
            class="px-4 py-2 border rounded hover:bg-blue-600 transition duration-300"
          >
            Next Year
          </button>
          
        </div>
        <div class="overflow-x-auto pb-4">
          <div class="flex grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
            <div
              v-for="month in months"
              :key="month"
              class="p-6 bg-white border rounded-lg shadow-md text-center flex flex-col items-center justify-center"
            >
              <h2 class="text-lg font-bold mb-2">{{ monthNames[month - 1] }}</h2>
              <p class="text-xl">{{ bookings[month]?.total || 0 }} bookings</p>
              <button
                @click="showDetails(month)"
                class="mt-4 px-4 py-2 bg-blue-500 bg-dark rounded hover:bg-blue-600 transition duration-300"
              >
                View Details
              </button>
            </div>
          </div>
        </div>
        <div v-if="selectedMonth" class="mt-8 w-full">
          <h2 class="text-2xl font-semibold mb-4">
            Bookings for {{ monthNames[selectedMonth - 1] }}:
          </h2>
          <div v-if="bookings[selectedMonth]?.list.length" class="bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full bg-white border-collapse border">
              <thead>
                <tr>
                  <th class="px-4 py-2 border">Date</th>
                  <th class="px-4 py-2 border">Start At</th>
                  <th class="px-4 py-2 border">End At</th>
                  <th class="px-4 py-2 border">Type</th>
                  <th class="px-4 py-2 border">Tutor</th>
                  <th class="px-4 py-2 border">User</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="booking in bookings[selectedMonth].list"
                  :key="booking.id"
                  class="border-t"
                >
                  <td class="px-4 py-2 border">{{ booking.date }}</td>
                  <td class="px-4 py-2 border">{{ booking.start_at }}</td>
                  <td class="px-4 py-2 border">{{ booking.end_at }}</td>
                  <td class="px-4 py-2 border">{{ booking.type }}</td>
                  
                  <td class="px-4 py-2 border">
                    <template v-if="booking.tutor">
                      <a :href="`/nova/resources/tutors/${booking.tutor.id}`" class="text-blue-600 hover:underline">
                        {{ booking.tutor.name }}
                      </a>
                    </template>
                    <template v-else>
                      No Tutor
                    </template>
                  </td>
                  <td class="px-4 py-2 border">
                    <template v-if="booking.user">
                      <a :href="`/nova/resources/tutors/${booking.user.id}`" class="text-blue-600 hover:underline">
                        {{ booking.user.name }}
                      </a>
                    </template>
                    <template v-else>
                      No Student
                    </template>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div v-else class="bg-white p-6 rounded-lg shadow-md">
            <p>No bookings available for this month.</p>
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
      selectedMonth: null,
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
          console.log(this.bookings)
          this.loading = false;
        })
        .catch((error) => {
          console.error(error);
          this.loading = false;
        });
    },
    prevYear() {
      this.year--;
      this.fetchBookings();
    },
    nextYear() {
      this.year++;
      this.fetchBookings();
    },
    showDetails(month) {
      this.selectedMonth = month;
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 1rem;
}

.overflow-x-auto {
  overflow-x: auto;
}

.flex {
  display: flex;
}

.grid-cols-1 {
  grid-template-columns: repeat(1, minmax(0, 1fr));
}

.sm\:grid-cols-2 {
  @media (min-width: 640px) {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

.lg\:grid-cols-3 {
  @media (min-width: 1024px) {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
}

.gap-6 {
  gap: 1.5rem;
}

.text-blue-600 {
  color: #2563eb;
}

.hover\:underline:hover {
  text-decoration: underline;
}
</style>
