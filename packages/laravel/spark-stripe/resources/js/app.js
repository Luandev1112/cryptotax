window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import BaseMixin from './Mixins/Base';
import Vue from 'vue'

Vue.use(InertiaPlugin);
Vue.mixin(BaseMixin);

const app = document.getElementById('app')

new Vue({
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(app)
