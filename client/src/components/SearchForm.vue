<template>
  <div class="search-container">
    <div class="search-inputs">
      <search-input
        label="Departure"
        :options="airports"
        v-model="flight.departure"
      />
      <search-input
        label="Arrival"
        :options="airports"
        v-model="flight.arrival"
      />
    </div>

    <div class="search-submit">
      <button type="submit" @click="searchFlight" :disabled="!canSearch">{{ buttonLabel }}</button>
    </div>
  </div>
</template>

<script>
import SearchInput from './SearchInput.vue';

export default {
  name: 'SearchForm',
  components: { SearchInput },
  props: {
    airports: {
      type: Array,
      required: true,
    },
    searching: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      flight: {
        departure: '',
        arrival: '',
      },
    };
  },
  computed: {
    canSearch() {
      if (this.searching) {
        return false;
      }
      if (!this.flight.departure || !this.flight.arrival) {
        return false;
      }

      if (this.flight.arrival === this.flight.departure) {
        return false;
      }

      return true;
    },
    buttonLabel() {
      return this.searching ? 'Searching...' : 'Search';
    },
  },
  methods: {
    searchFlight() {
      this.$emit('search-flight', {
        start: this.flight.departure,
        end: this.flight.arrival,
      });
    },
  },
};
</script>

<style scoped>
.search-container {
  margin: 0 auto;
}

.search-inputs {
  display: flex;
  justify-content: center;
}

.search-submit {
  padding: 20px 0;
}

.search-submit button {
  padding: 10px;
  border: 0;
  border-radius: 5px;
  background-color: lightgreen;
}
.search-submit button:disabled {
  background-color: rgb(184, 181, 181);
  cursor: not-allowed;
}
</style>
