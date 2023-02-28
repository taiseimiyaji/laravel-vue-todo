import UpdateSort from '~/src/Command/UpdateSort';
import CreateTask from '~/src/Command/CreateTask';
import GetAllTask from '~/src/Query/GetAllTask';
import UpdateTask from '~/src/Command/UpdateTask';

export const state = () => (
{
  tasks: [],
});

export const getters = {
  tasks: state => {
    return state.tasks;
  }
};

export const mutations = {
  setTasks(state, tasks) {
    state.tasks = tasks;
  }
};

export const actions = {
  async fetchTasks(context) {
    const getAllTask = new GetAllTask();
    const response = await getAllTask.process();
    return context.commit('setTasks', await response.json());
  },
  async updateTask(state, task) {
    const updateTask = new UpdateTask();
    await updateTask.process(task);
    state.dispatch('fetchTasks');
  },
  async addTask(state, task) {
    const createTask = new CreateTask();
    await createTask.process(task);
    state.dispatch('fetchTasks');
  },
  async updateSort(state, tasks) {
    const updateSort = new UpdateSort();
    await updateSort.process(tasks);
    state.dispatch('fetchTasks');
  }
}
