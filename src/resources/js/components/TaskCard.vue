<template>
  <div class="taskcard">
    <div>タスク名 : {{ name }}</div>
    <input-text-form v-on:update='name=$event' placeholder="Enter TaskName"/>
    <div>タスク詳細 : {{ detail }}</div>
    <input-text-form v-on:update='detail=$event' placeholder="Enter TaskDetail"/>
    <div>期限 : {{ deadline }}</div>
    <input-text-form v-on:update='deadline=$event' placeholder="Enter Deadline"/>
    <div>ラベル : {{ label }}</div>
    <input-text-form v-on:update='label=$event' placeholder="Enter Label"/>
    <div>コスト : {{ costs }}</div>
    <input-text-form v-on:update='costs=$event' placeholder="Enter Costs"/>
    <div>ToDo : {{ todos }}</div>
    <input-text-form v-on:update='todos.push($event)' placeholder="Enter Todo"/>
    <button type="button" v-on:click='todos.pop()'>ToDo削除</button>
  </div>
</template>

<script>
import InputTextForm from './InputTextForm';

export default {
  name: 'TaskCard',
  components: { InputTextForm },
  data: function () {
    return {
      id: 1,
      category_id: 1,
      name: '',
      detail: "",
      deadline: "",
      label: "",
      costs: '',
      todos: [],
    };
  },
};
</script>
<style>
.taskcard{
    padding: 0.5em 1em;
    margin: 2em 0;
    font-weight: bold;
    color: #000;/*文字色*/
    background: #CCC;
    border: solid 3px #000;/*線*/
    border-radius: 10px;/*角の丸み*/
}
</style>