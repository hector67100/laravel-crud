import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProductoView from '../views/ProductoView.vue'
import UsuarioView from '../views/UsuarioView.vue'
import CompraView from '../views/CompraView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/producto',
    name: 'productos',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component:ProductoView
  },
  {
    path: '/user',
    name: 'users',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component:UsuarioView
  },
  {
    path: '/compra',
    name: 'compra',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component:CompraView
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
