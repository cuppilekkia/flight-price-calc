<template>
  <div class="results-container">
    <div class="result-item" v-for="(result, i) in orderedResults" :key="i">
      <span class="airport">{{ makeFlightDescription(result.flights) }}</span>
      <span class="stopover" v-if="result.stopover > 0">{{ result.stopover }} stopover</span>
      <span class="price">{{ result.totalPrice }}€</span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ResultsList',
  props: {
    results: {
      type: Array,
      required: true,
    },
  },
  computed: {
    orderedResults() {
      const data = [...this.results];
      return data.sort((a, b) => a.totalPrice - b.totalPrice);
    },
  },
  methods: {
    makeFlightDescription(flights) {
      const names = flights.reduce((acc, flight) => {
        acc.push(flight.nameDeparture);
        acc.push(flight.nameArrival);
        return acc;
      }, []);

      return Array.from(new Set(names)).join(' -> ');
    },
  },
};
</script>

<style scoped>
.results-container {
  padding: 40px;
}
.result-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  margin-bottom: 20px;
  border: 1px solid lightgray;
  border-radius: 10px;
}
.airport {
  font-size: 1.3rem;
}
.stopover {
  font-size: .8rem;
}
.price {
  font-weight: bold;
  font-size: 1.5rem;
}
</style>
