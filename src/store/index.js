import { createStore } from "vuex";

const publicURL =
  process.env.NODE_ENV === "development"
    ? ""
    : "https://tibamef2e.com/chd103/g4/DIDA";
// 中央狀態管理
export default createStore({
  // 類似vue檔裡面的data
  state: {
    storeShowLogin: false,
    quizScore: 0,
    loginToogle: false,
    loading: false,
    loginURL: "https://tibamef2e.com/cgd103/g1/api",
    mem_account: "charmy101@gmail.com",
    mem_psw: "charmy101",
    userName: "",
    shoppingCart: [],
    chooseImgSrc: publicURL,
  },

  // 類似vue檔裡面的computed
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
