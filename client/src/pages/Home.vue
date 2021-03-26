<template>
  <div class="container">
    <h1>Search Flights</h1>

    <div v-if="loading">
      Loading airports
    </div>

    <search-form v-else
      :airports="airports"
      @search-flight="searchFlights"
      :searching="searching"
    />

    <div v-show="noResults">
      <h4>No results</h4>
    </div>
    <results-list v-show="completed" :results="flights" />
  </div>
</template>

<script>
import ResultsList from '../components/ResultsList.vue';
import SearchForm from '../components/SearchForm.vue';
import AirportService from '../services/AirportService';
import FlightService from '../services/FlightService';

const STATUS = {
  INIT: 'INIT',
  SEARCHING: 'SEARCHING',
  NORESULTS: 'NORESULTS',
  COMPLETED: 'COMPLETED',
};

export default {
  components: { SearchForm, ResultsList },
  name: 'Home',
  data() {
    return {
      loading: false,
      airports: [],
      status: STATUS.INIT,
      flights: [],
    };
  },
  async mounted() {
    this.loading = true;
    await this.loadAirports();
    this.loading = false;
  },
  computed: {
    searching() {
      return this.status === STATUS.SEARCHING;
    },
    noResults() {
      return this.status === STATUS.NORESULTS;
    },
    completed() {
      return this.status === STATUS.COMPLETED;
    },
  },
  methods: {
    setStatus(status) {
      this.status = status;
    },
    async loadAirports() {
      const data = await AirportService.getAirports();
      this.airports.push(...data);
    },
    async searchFlights(flight) {
      this.setStatus(STATUS.SEARCHING);

      await this.doSearch(flight);

      this.setStatus(STATUS.COMPLETED);

      if (!this.flights.length) {
        this.setStatus(STATUS.NORESULTS);
      }
    },
    async doSearch(flight) {
      const { start, end } = flight;
      const data = await FlightService.search({ start, end });
      this.$set(this, 'flights', data);
    },
  },
};
</script>

<style scoped>
.container {
  padding: 40px;
}

</style>
