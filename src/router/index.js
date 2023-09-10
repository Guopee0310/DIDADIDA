import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import product from '../views/product.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  { path: '/news',
  name: 'news',
  component: () => import(/* webpackChunkName: "news" */ '../views/NewsView.vue') 
},
  { path: '/explore',
    name: 'explore',
    component: () => import(/* webpackChunkName: "explore" */ '../views/ExploreView.vue') 
  },
  { path: '/ticket',
  name: 'ticket',
  component: () => import(/* webpackChunkName: "ticket" */ '../views/TicketView.vue') 
},
  {
    path: '/product',
    name: 'product',
    component: product
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
