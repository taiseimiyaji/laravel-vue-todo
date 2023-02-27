export const mutations = {
    setTasks(state, tasks) {
        const updateSort = new UpdateSort();
        updateSort.process(tasks);
        state.tasks = tasks;
    },
    async addTask(state, task) {
        const createTask = new CreateTask();
        await createTask.process(this.task);
        state.tasks = [...state.tasks, task];
    }
};