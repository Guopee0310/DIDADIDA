<template>
  <div class="favorites_list_main">
    <div class="favorites_list_area">
      <div class="favorites_list_group" v-for="(favo, index) in favoList" :key="favo.favoImg">
        <span class="close" @click="delSingleItem(index)">&times;</span>
        <div class="favorites_list_img">
          <img :src="favo.favoImg" alt="" />
        </div>
        <div class="favorites_list_info">
          <div>
            <h5>{{ favo.favoName }}</h5>
            <p>NT {{ favo.favoPrice }}</p>
          </div>
          <div>
            <p>{{ favo.favoIntroduction }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import memChangePage from "../components/memChangePage.vue";
export default {
  name: "favoritesList",
  components: {
    memChangePage,
  },
  data() {
    return {
      favoList: [
      ],
    };
  },
  mounted() {
    this.favoList = this.$store.state.favoList;
    console.log(this.favoList);
  },
  methods: {
    delSingleItem(idx) {
      this.favoList.splice(idx, 1);
      this.$store.commit("removeFavoItem", idx);
    },
  },
};
</script>

<style scoped lang="scss">
.favorites_list_area {
  width: 500px;
  height: 850px;
  border: 0;
  border-radius: 15px;
  margin: 0 auto;
  background-color: map-get($colors, 'memarea');
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  overflow-y: auto;

  &::-webkit-scrollbar {
    width: 10px;
  }

  &::-webkit-scrollbar-track-piece {
    background: transparent;
  }

  &::-webkit-scrollbar-thumb {
    border-radius: 4px;
    background-color: rgba(0, 0, 0, 0.2);
    // border: 1px solid slategrey;
  }

  &::-webkit-scrollbar-track {
    box-shadow: transparent;
  }

  &::-webkit-scrollbar-button {
    height: 5px;
    background: transparent;
    border-radius: 4px;
  }

  .favorites_list_group {
    width: 460px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-evenly;
    z-index: 2;
    position: relative;

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      color: map-get($colors, "dark");
    }
  }

  h5 {
    font-size: map-get($fontSizes, "div");
    color: map-get($colors, "dark");
  }

  p {
    width: 90%;
    text-align: justify;
    font-size: map-get($fontSizes, "mini");
    color: map-get($colors, "dark");
  }

  .favorites_list_group:last-child {
    border-bottom: 0;
  }

  .favorites_list_img {
    width: 50%;
    height: 150px;
    margin: 20px auto;
  }

  .favorites_list_img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .favorites_list_info {
    width: 50%;
    height: 150px;
    margin-top: 20px;
  }
}

@media screen and (max-width: 414px) {

  .favorites_list_area {
    width: 330px;
    height: 720px;

    .favorites_list_group {
      width: 300px;
      flex-direction: column;
    }

    .favorites_list_img {
      width: 100%;
    }

    .favorites_list_info {
      width: 100%;
      margin: 0 auto;
    }
  }
}
</style>
