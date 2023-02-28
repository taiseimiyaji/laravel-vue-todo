<template>
  <div class="column">
    <div class="category-title">
      <h2>{{ title }}</h2>
    </div>
    <button-create-button
      button-class="create-button"
      @click="create()"
    >タスク作成
    </button-create-button>
    <div>
      <draggable v-model="tasks" tag="div" :options="{group:'tasks'}">
        <card-task-card
          v-for="task in tasks"
          :key="task.id"
          :task="task"
          @click="edit(task.id)"
        >
        </card-task-card>
      </draggable>
    </div>
    <div class="modal fade" tabindex="-1" ref="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-if="isEdit">タスクを編集</h5>
            <h5 class="modal-title" v-else>タスクを新規作成</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="modal-title mt-2">タスク名</h6>
            <input type="text" class="form-control" v-model="task.name">
            <h6 class="modal-title mt-2">予定工数</h6>
            <input type="text" class="form-control" v-model="task.cost">
            <h6 class="modal-title mt-2">終了予定日時</h6>
            <datepicker v-model="task.deadline"></datepicker>
            <h6 class="modal-title mt-2">タスク説明</h6>
            <input type="text" class="form-control" v-model="task.detail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-del" data-bs-dismiss="modal" v-if="isEdit" @click="del()">削除</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            <button type="button" class="btn btn-primary" v-if="isEdit" @click="updateTask()">更新</button>
            <button type="button" class="btn btn-primary" v-else @click="createTask()">作成</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Modal } from 'bootstrap';
import Datepicker from 'vuejs-datepicker';
import draggable from 'vuedraggable';

export default {
  name: 'TaskColumn',
  components: {
    Datepicker,
    draggable
  },
  props: {
    id: {
      type: String,
    },
    title: {
      type: String,
    },
  },
  data() {
    return {
      isEdit: false,
      hoverIndex: -1,
      task: {
        id: '',
        name: '',
        cost: '',
        deadline: new Date(),
        detail: '',
        statusId: this.id,
        sort: '',
      },
      modal: null,
    };
  },
  mounted() {
    this.modal = new Modal(this.$refs.modal, {keyboard: true});
  },
  computed: {
    tasks: {
      get: function () {
        const id = this.id;
        if (!this.$store.getters["tasks/tasks"]) {
          return [];
        }
        return this.$store.getters["tasks/tasks"].filter(function (item) {
          return id === item.statusId;
        });
      },
      set: function(value) {
        let tasks = value.map((obj) => Object.assign({}, obj));
        for (const [index, item] of tasks.entries()) {
          item.statusId = this.id;
          item.sort = index;
        }
        this.$store.dispatch('tasks/updateSort', tasks);
      }
    },
  },
  methods: {
    create: function () {
      this.isEdit = false;
      this.task = {};
      this.modal.show();
    },
    edit: function (id) {
      this.isEdit = true;
      this.task = Object.assign({}, this.tasks.find(e => e.id === id));
      this.modal.show();
    },
    async createTask() {
      this.task.statusId = this.id;
      this.task.sort = this.findTaskIndex(this.task);
      this.$store.dispatch('tasks/addTask', this.task);
      this.modal.hide();
    },
    async updateTask() {
      this.task.statusId = this.id;
      this.$store.dispatch('tasks/updateTask', this.task);
      this.modal.hide();
    },
    del: function () {
      this.modal.hide();
    },
    async movedCard() {
      const array = this.tasks.map(function(value){
        value.statusId = this.id;
        value.sort = array.indexOf(value);
        return value;
      }, this);
      this.$store.dispatch('tasks/updateSort', array);
    },
    async updateSort() {
      const array = this.tasks.map(function(value){
        value.statusId = this.id;
        value.sort = array.indexOf(value);
        return value;
      }, this);
      this.$store.dispatch('tasks/updateSort', array);
    },
    findTaskIndex(task) {
      return this.tasks.findIndex(({ id }) => id === task.id) === -1
        ? this.tasks.length
        : this.tasks.findIndex(({ id }) => id === task.id);
    }
  }
}
</script>

