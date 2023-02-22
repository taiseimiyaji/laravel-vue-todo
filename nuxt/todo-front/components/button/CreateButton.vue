<template>
  <button
  @click="$emit('click')"
  class="btn btn-info create-button"
  :class="buttonClass"
  >
    <slot />
  </button>

</template>

<script>
export default {
  name: 'CreateButton',
  props: {
    buttonClass: {
      type: String,
      default: ''
    },
    disabled: {
      type: Boolean,
      default: false,
    }
  },
}
</script>

<style scoped>

</style>
