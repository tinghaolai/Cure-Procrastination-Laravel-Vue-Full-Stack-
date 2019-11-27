import Vue from 'vue';
import router from './router';
import Articleindex from './components/article/Articleindex';
import BootstrapVue from 'bootstrap-vue';
import Info from './components/article/Info';
import App from './components/App';

import vuefooter from './components/layout/vuefooter';
import Navigation from './components/layout/Navigation';

require('./bootstrap');

Vue.use(BootstrapVue);

window.axios = require('axios');

const app = new Vue({
	router,
	el: '#app',
	components: {
		Articleindex,
		Info,
		vuefooter,
		Navigation,
		App
	}
});
