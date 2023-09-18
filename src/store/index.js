import { createStore } from "vuex";

// 中央狀態管理
export default createStore({

  // 類似vue檔裡面的data
  state: {
    storeShowLogin: false,
    quizScore: 0,
  },

  // 類似vue檔裡面的computed
  getters: {},

  // 類似vue檔裡面的methods
  mutations: {},

  // fetch,計時器
  actions: {},
  modules: {},
});
