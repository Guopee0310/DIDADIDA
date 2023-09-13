<template></template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>
<style scoped lang="scss">
.quizAll {
  width: 80%;
  margin: 20px auto;
  border: 1px red solid;
  padding: 20px;
  display: flex;
  flex-direction: column;
  .showMsg {
    width: 50%;
    height: 50vh;
    position: fixed;
    font-size: 100px;
  }
  .singleQuestion {
    width: 100%;
    border: 1px black solid;
    margin: 20px 0px;
    .theAns {
      display: flex;

      div {
        border: 1px black solid;
        padding: 5px;
        &:hover {
          background-color: black;
          color: white;
          cursor: pointer;
        }
      }
    }
  }
  .alreadyClick {
    background-color: gray;
  }
  .alreadyBtn {
    border: 1px black solid;
    &:hover {
      background-color: black;
      color: white;
      cursor: pointer;
    }
  }
}
</style>
