import GetAllStatus from '~/src/Query/GetAllStatus';

export const state = () => (
  {
    status: [],
  });

export const getters = {
  status: state => {
    return state.status;
  }
};

export const mutations = {
  setStatus(state, status) {
    state.status = status;
  },
  addStatus(state, status) {
    state.status = [...state.status, status];
  }
};

export const actions = {
  async fetchStatus(context) {
    const getAllStatus = new GetAllStatus();
    const response = await getAllStatus.process();

    return context.commit('setStatus', await response.data);
  }
}
