<template>
  <div>
    <div class="content">
      <column-task-column
        v-for="column in columns"
        :key="column.id"
        :id="column.id"
        :title="column.name"
        :value="columns.filter(function(item){ return column.id === item.id; })[0].tasks"
        @input="setColumnTasks(column.id, $event)"
        v-on:saveTask="fetchTask"
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
    tasks() {
      return this.$store.getters["tasks/tasks"];
    },
    columns() {
      return this.$store.getters["status/status"].map((value: { [x: string]: any; id: any; }, index: any) => {
        value.tasks = this.tasks.filter(function(item: any){
          return value.id === item.statusId;
        });
        return value;
      });
    }
  },
  data() {
    return {
      sendTaskSort: [
        {
          id:'',
          column: '',
          sort: '',
        },
      ]
    }
  },
  methods: {
    async fetchTask () {
      await this.$store.dispatch('tasks/fetchTasks');
    },
    setColumnTasks (columnId: any, tasks: any) {
      // this.columns.map(function (value, index){
      //   if(columnId === value.id) {
      //     value.tasks = tasks;
      //   }
      //   return value;
      // })
    }
  },
})
</script>
