<template>

<PageHeader :breadcrumb-list="breadcrumbList">
        <template #title><div class="demo-title">Title</div></template>
        <template #logo><div class="demo-logo"><img src="~@/assets/images/dida_logo.png" alt=""></div></template>
        <template #content><div class="demo-content">Content</div></template>
        <template #extra><div class="demo-extra">Extra</div></template>
        <template #action><div class="demo-action">Action</div></template>
</PageHeader>



  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav>
  <router-view/>

  <Button type="success" ghost>Success</Button>
  <div class="colorcolor">123</div>
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