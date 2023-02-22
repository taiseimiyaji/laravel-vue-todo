import GetAllTask from '~/src/Query/GetAllTask';

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
  },
  addTask(state, task) {
    state.tasks = [...state.tasks, task];
  }
};

export const actions = {
  async fetchTasks(context) {
    const getAllTask = new GetAllTask();
    const response = await getAllTask.process();
    return context.commit('setTasks', await response.json());
  }
}
