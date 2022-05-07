<template>
  <div class="taskcolumn">
    <div class="center">
      <div>{{ this.name }}</div>
      <input-text-form v-on:update="this.name=$event" placeholder="Enter ColumnName" />
      <button type="button" v-on:click="addTask">カード追加</button>
      <button type="button" v-on:click="deleteTask">カード削除</button>
    </div>
    <task-card v-for="task in tasks" :key="task.id" :task="task"></task-card>
  </div>
</template>

<script>

//Composition APIっていうのがあるらしい。小規模な場合は必要ないかも。
//コンポーネントを直接配列にもつんじゃなくて、オブジェクトを配列に持ってv-forで回すらしい
import TaskCard from "./TaskCard.vue";
import InputTextForm from './InputTextForm'
export default {
  name: "Column",
  components: {
    TaskCard,
    InputTextForm
  },
  data: function () {
    return {
      id: 1,
      name: "columnname",
      tasks: [],
    };
  },
  methods: {
    addTask: function () {
      this.tasks.push({
        id: "",
        name: "",
        detail: "",
        deadline: "",
        label: "",
        costs: "",
        todos: [],
      });
    },
    deleteTask: function () {
      this.tasks.pop();
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
