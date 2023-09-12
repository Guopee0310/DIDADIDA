<template>
  <div v-if="loading">
    <LoadingBox />
  </div>
  <div v-else>
    <visual v-if="!loading" />
  </div>
</template>

<script>
// @ is an alias to /src
import visual from "../components/visualGame.vue";
import LoadingBox from "../components/loading.vue";
export default {
  name: "HomeView",
  data() {
    return {
      loading: true,
      animationDuration: 4200,
    };
  },
  methods: {
    fetchProd() {
      fetch("https://fakestoreapi.com/products")
        .then((res) => res.json())
        // .then(json => {
        //   this.loading = false
        // })
        .catch((error) => {
          console.error(error);
          this.loading = false;
        });
    },
  },
  components: {
    visual,
    LoadingBox: LoadingBox,
  },
  mounted() {
    this.fetchProd();
    setTimeout(() => {
      this.loading = false;
    }, this.animationDuration);
  },
};
</script>
