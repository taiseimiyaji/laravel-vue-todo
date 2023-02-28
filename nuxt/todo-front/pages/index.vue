<template>
  <div>
    <div class="content">
      <column-task-column
        v-for="column in columns"
        :key="column.id"
        :id="column.id"
        :title="column.name"
      />
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'IndexPage',
  async fetch({ store, params }){
    await store.dispatch('tasks/fetchTasks');
    await store.dispatch('status/fetchStatus');
  },
  computed: {
    columns() {
      return this.$store.getters["status/status"];
    }
  },
})
</script>
