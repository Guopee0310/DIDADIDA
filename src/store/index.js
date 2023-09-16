import { createStore } from "vuex";

// 中央狀態管理
export default createStore({
  state: {
    storeShowLogin: false,
    quizScore: 0,
    loginToogle: false,
    loading: false,
    loginURL: "https://tibamef2e.com/cgd103/g1/api",
  },
  getters: {},
  mutations: {
    // 拿api
    updateSiteLoad(state, val) {
      state.siteLoading = val;
    },
  },
  actions: {},
  modules: {},
});
