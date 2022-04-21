<template>
  <div>{{ hello }}</div>
  <TaskCard/>
</template>

<script lang="ts">
import { ref } from "vue";
import TaskCard from "./components/TaskCard";

export default {
  components: {TaskCard},
  setup() {
      const hello = ref(
          "Hello From TypeScript!"
      )

      return {
          hello
      }
  },
};
</script>