<template>
  <div>
    <button class="btn btn-primary" @click="create()">追加</button>
    <div class="modal fade" tabindex="-1" ref="modal1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">プロジェクト</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control" v-model="targetProject.name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-del" data-bs-dismiss="modal" v-if="isEidt" @click="del()">削除</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            <button type="button" class="btn btn-primary" @click="save()">保存</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Modal } from 'bootstrap';

export default {
  data() {
    return {
      isEidt: false,
      hoverIndex: -1,
      targetProject: {name: ''},
      myModal1: null,
    };
  },
  mounted() {
    this.myModal1 = new Modal(this.$refs.modal1, {keyboard: true});
  },
  props: {
    projects: null,
  },
  methods: {
    create: function () {
      this.isEidt = false;
      this.myModal1.show();
    },
    edit: function (id) {
      this.isEidt = true;
      this.targetProject = {...this.projects.find((v) => v.id === id)};
      this.myModal1.show();
    },
    save: function () {
      const self = this;
      axios.post('/api/project/set', {project: self.targetProject}).then(function (res) {
        if (res.status == 200) {
          let p = self.projects.find((v) => v.id === self.targetProject.id);
          p.name = self.targetProject.name;
        } else {
        }
      }).catch(function (err) {
      });
      this.myModal1.hide();
    },
    del: function () {
      this.myModal1.hide();
    },
  }
}
</script>

<style scoped>
.btn-del {
  position: absolute;
  left: .75rem;
}
</style>
