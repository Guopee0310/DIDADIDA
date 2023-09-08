<template>




<!-- 
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav> -->
  <router-view/>


</template>

<style lang="scss" scoped>
// @import "~@/assets/scss/base/variables.scss";
//區域使用範例

.demo-logo{
  width: 50px;
  img{
    width: 100%;
  }
}
.colorcolor{
  color:$privecolor;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>

<script>
    export default {
        data () {
            return {
                breadcrumbList: [
                    {
                        title: '面包屑'
                    }
                ]
            }
        }
    }
</script>