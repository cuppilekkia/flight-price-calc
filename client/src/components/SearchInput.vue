<template>
  <div class="search-input">

    <label :for="label">
      {{label}}
    </label>

    <select :name="label" :id="label" @change="select" v-model="selection">
      <option value="" selected>Select airport</option>
      <option v-for="airport in options" :key="airport.id" :value="airport.code">
        {{ airport.name }}
      </option>
    </select>

  </div>
</template>

<script>
export default {
  name: 'SearchInput',
  props: {
    value: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      required: true,
    },
    options: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      selection: '',
    };
  },
  methods: {
    select() {
      this.$emit('input', this.selection);
    },
  },
};
</script>

<style scoped>
.search-input {
  margin: 0 20px;
}

.search-input select {
  min-width: 100px;
  padding: 5px;
}
</style>
