<template>
  <form>
    <div class="form-group">
      <form @submit.prevent>
        <input type="text" v-on:keypress.enter="submit" class="form-control" v-model="input" :placeholder="placeholder" />
      </form>
    </div>
  </form>
</template>


<script>
export default {
  name: "inputTextForm",
  data: function () {
    return {
      input: "",
    };
  },
  props: {
    placeholder: {type: String},
  },
  methods: {
    submit: function () {
      this.$emit("update",
        this.input,
      );
    },
  },
};
</script>
