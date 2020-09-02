require('./bootstrap');
window.Vue = require('vue');

import Vue2Editor from "vue2-editor";



Vue.use(Vue2Editor);
import Vuex from 'vuex'
Vue.use(Vuex)



import VueNoty from 'vuejs-noty'
Vue.use(VueNoty)
import 'vuejs-noty/dist/vuejs-noty.css'


import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';


import VueConfirmDialog from 'vue-confirm-dialog'
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)


import components from "./allComponet";


import storeData from "./components/store/index"
const store = new Vuex.Store(
    storeData
)

const app = new Vue({
    el: '#app',
    components:components,
    store: store,
});
