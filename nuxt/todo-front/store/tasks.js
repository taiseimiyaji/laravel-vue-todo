import UpdateSort from '~/src/Command/UpdateSort';
import CreateTask from '~/src/Command/CreateTask';
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
    const updateSort = new UpdateSort();
    updateSort.process(tasks);
    state.tasks = tasks;
  }
};

export const actions = {
  async fetchTasks(context) {
    const getAllTask = new GetAllTask();
    const response = await getAllTask.process();
    return context.commit('setTasks', await response.json());
  },
  async addTask(state, task) {
    const createTask = new CreateTask();
    await createTask.process(task);
  }
}
