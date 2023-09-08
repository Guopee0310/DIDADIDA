<template>
  <div class="home">
    <login></login>
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import login from '../components/login.vue'
export default {
  name: 'HomeView',
  data(){
    return {
      
    }
  },
  components: {
    HelloWorld,
    login
  },

}
</script>
