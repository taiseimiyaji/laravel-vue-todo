<template>
  <!-- <column v-for="column in columns" :key="column.id" :column="column" class="" /> -->

  <div class="flex">
    <button @click="counter+=1">カラム追加</button>
    <button @click="counter-=1">カラム削除</button>
    <div style="display: flex;">
      <column v-for="i in counter" :key="i"></column>
    </div>
  </div>
</template>

<script lang="ts">
import Column from "./components/Column.vue";

export default {
  components: { Column },
  setup() {},
  data: function () {
    return {
      counter: 1,
    };
  },
};
</script>
