import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Upload from '../views/UploadExcel.vue'
import Contracts from '../views/Contracts.vue'
import Test from '../views/Test.vue'
import Welcome from '../views/Welcome.vue'
import Rates from '../views/Rates.vue'


Vue.use(VueRouter)

const routes = [
    {
    path: '/',
    name: 'Welcome',
    component: Welcome
    },
  {
    path: '/upload',
    name: 'Upload',
    component: Upload
  },
  /* {
    path: '/rates',
    name: 'Rates',
    component: Rates
  }, */
  {
    path: '/contracts',
    name: 'Contracts',
    component: Contracts
  },
  {
    path: '/test',
    name: 'Test',
    component: Test
  },
  {
    path: '/rates/edit/:id',
    name: 'Rates-edit',
    component: Rates
  }
  //{
   // path: '/about',
    //name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    //component: function () {
    //  return import(/* webpackChunkName: "about" */ '../views/About.vue')
    //}
  //},
  //{
  //  path: '/calendar',
  //  name: 'Calendar',
  //  component: Calendar
 //},
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
