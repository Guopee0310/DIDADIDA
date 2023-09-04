import { createApp } from 'vue'
import ViewUIPlus from 'view-ui-plus'
import App from './App.vue'
import router from './router'
import store from './store'
import 'view-ui-plus/dist/styles/viewuiplus.css';


const vueApp = createApp(App)
vueApp.use(store)
vueApp.use(router)
vueApp.use(ViewUIPlus) //套件也要宣告
vueApp.mount('#app')

