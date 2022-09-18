<template>
  <div class="taskcolumn">
    <div class="center">
      <div>{{ this.name }}</div>
      <input-text-form v-on:update="this.name=$event" placeholder="Enter ColumnName" />
      <button type="button" v-on:click="addTask">カード追加</button>
      <button type="button" v-on:click="deleteTask">カード削除</button>
      <button type="button" v-on:click="createTask">カード登録</button>
    </div>
    <task-card v-for="task in tasks" :key="task.id" :task="task"></task-card>
  </div>
</template>

<script>

import TaskCard from "./TaskCard.vue";
import InputTextForm from './InputTextForm';
import CreateTask from '../src/Task/CreateTask/CreateTask';

export default {
  name: "Column",
  components: {
    TaskCard,
    InputTextForm
  },
  data: function () {
    return {
        createTask: new CreateTask(),
      id: 1,
      name: "columnname",
      tasks: [],
    };
  },
  methods: {
    async addTask() {
      this.tasks.push({
        id: "",
        name: "",
        detail: "",
        deadline: "",
        label: "",
        costs: "",
        todos: [],
      });
      try {
          await this.createTask.process();
      }catch (e){
        this.errors = e[0];
        console.log("error!!!");
          return false
      }
    },
    deleteTask: function () {
      this.tasks.pop();
    },
    createTask(){
      this.createTask.process();
      console.log('send_end');
    },
  },
};
</script>
<style>
.taskcolumn {
  color: #000; /*文字色*/
  background-color: #ccc;
  width: 250px;
  margin: 2em;
  height: 100%;
}
.taskcolumn .center {
  text-align: center;
}
</style>
