<template>
    <div class="taskcard">
      <div>タスク名 : {{ this.task.name }}</div>
      <input-text-form v-on:update="this.task.name=$event" placeholder="Enter TaskName" />
      <div>タスク詳細 : {{ this.task.detail }}</div>
      <input-text-form v-on:update="this.task.detail=$event" placeholder="Enter TaskDetail" />
      <div>期限 : {{ this.task.deadline }}</div>
      <input-text-form v-on:update="this.task.deadline=$event" placeholder="Enter Deadline" />
      <div>ラベル : {{ this.task.label }}</div>
      <input-text-form v-on:update="this.task.label=$event" placeholder="Enter Label" />
      <div>コスト : {{ this.task.costs }}</div>
      <input-text-form v-on:update="this.task.costs=$event" placeholder="Enter Costs" />
      <div>ToDo : {{ this.task.todos }}</div>
      <input-text-form v-on:update="this.task.todos.push($event)" placeholder="Enter Todo" />
      <button type="button" v-on:click="this.task.todos.pop()">ToDo削除</button>
    </div>
</template>

<script>
import InputTextForm from "./InputTextForm";


export default {
  name: "TaskCard",
  components: { InputTextForm },
  props: {
    task: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      errors: [],
      // updateTaskUseCase: new UpdateTask(),
      form: {
        // task_id,
        // task_name,
        //TODO: 追加する
      }
    }
  }
};
</script>
<style>
.taskcard {
  padding: 0.5rem;
  font-weight: bold;
  color: #000; /*文字色*/
  background: #eee;
  border: solid 3px #bbb; /*線*/
  border-radius: 10px; /*角の丸み*/
}
</style>
