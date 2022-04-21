<template>
  <div class="taskcard">
    <div>タスク名 : {{ name }}</div>
    <div>タスク詳細 : {{ detail }}</div>
    <div>期限 : {{ deadline }}</div>
    <div>ラベル : {{ label }}</div>
    <div>コスト : {{ costs }}</div>
    <div>ToDo : {{ todos }}</div>
  </div>
</template>
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

<script>
export default {
  name: 'TaskCard',
  components: {},
  data: function () {
    return {
      name: "sampletask",
      detail: "taskdetail",
      deadline: "1/1",
      label: "test",
      costs: 10,
      todos: [],
    };
  },
};
</script>