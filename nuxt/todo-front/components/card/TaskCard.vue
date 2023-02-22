<template>
  <div
    class="card"
    @click="$emit('click')"
  >
    <div class="card-body">
      <h6 class="card-title">{{ task.name }}</h6>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TaskCard',
  props: {
    task: {
      type: Object,
    }
  }
}
</script>

<style scoped>

</style>
