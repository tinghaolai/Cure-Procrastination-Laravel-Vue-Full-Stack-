import Vue from 'vue';
import router from './router';
import Articleindex from './components/article/Articleindex';
import BootstrapVue from 'bootstrap-vue';
import Info from './components/article/Info';
import App from './components/App';

import vuefooter from './components/layout/vuefooter';
import Navigation from './components/layout/Navigation';
import Sidebar from './components/layout/Sidebar';
import Scrollup from './components/layout/Scrollup';

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
		App,
		Sidebar,
		Scrollup
	}
});
