import Vue from 'vue'
import App from './App.vue'

import './style.css'

import VueRouter from 'vue-router'

import Home from '@/components/Home.vue'
import BookDetails from '@/components/BookDetails.vue'
import CreateBook from '@/components/CreateBook.vue'

Vue.use(VueRouter)

Vue.config.productionTip = false

const routes = [
  {
    path: '',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'home',
    component: Home
  },
  {
    path: '/home/books/:id',
    name: 'BookDetails',
    component: BookDetails
  },
  {
    path: '/home/books/create',
    name: 'CreateBook',
    component: CreateBook
  },
  {
    path: '/home/books/edit/:id',
    name: 'EditBook',
    component: CreateBook
  },
]

const router = new VueRouter({
  mode: 'history',
  routes
})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
