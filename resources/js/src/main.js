import Vue from 'vue'
import App from './App.vue'

import vuetify from './plugins/vuetify'
import router from './router/index'

// axios
import axios from 'axios'
Vue.prototype.$http = axios


new Vue({
     router,
    /*store,
    i18n,
    acl, */
    vuetify,
    render: h => h(App)
  }).$mount('#app')
