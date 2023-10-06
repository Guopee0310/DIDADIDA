import { createStore } from "vuex";

const publicURL =
  process.env.NODE_ENV === "development"
    ? ""
    : "https://tibamef2e.com/chd103/g4/DIDA";
// 中央狀態管理
export default createStore({
  // 類似vue檔裡面的data
  state: {
    chooseFrontBack: false, //記得改回來
    storeShowLogin: false,
    quizScore: 0,
    labaScore: 0,
    loginToogle: false,
    loading: false,
    loginURL: "https://tibamef2e.com/cgd103/g1/api",
    mem_account: "charmy101@gmail.com",
    mem_psw: "charmy101",
    userName: "",
    shoppingCart: [],
    showCartPopup: false, // 控制购物车弹出窗口的显示状态
    chooseImgSrc: publicURL,
    favoList: [],
    ticketList: [],
    totalScorePoint: 0,
    prodOrderArr: [],
    memberBtn: "mem_account_settings",
    visitCount: 0,
    activeIndexes: [],
    questionPic: true,
    showLoadingOnce: true,
    APIurl: "http://localhost/dida_project/public/php/",
    checkLogin: false,
  },

  // 類似vue檔裡面的computed
  getters: {
    remainingTodos: (state) => {
      return (state.totalScorePoint =
        state.quizScore + state.labaScore + state.totalScorePoint);
    },
  },
  mutations: {
    setUserName(state, userName) {
      state.userName = userName;
    },
    removeFavoItem(state, idx) {
      // 通过索引删除 favoList 中的项
      state.favoList.splice(idx, 1);
    },
    // 拿api
    updateSiteLoad(state, val) {
      state.siteLoading = val;
    },
    toggleCartPopup(state) {
      // 切换购物车弹出视图的显示状态
      state.showCartPopup = !state.showCartPopup;
    },
    closeCartPopup() {
      // 延迟一秒后关闭购物车弹出视图
      setTimeout(() => {
        this.toggleCartPopup();
      }, 500); // 500毫秒（1秒）后关闭
    },
  },
  modules: {},
});
