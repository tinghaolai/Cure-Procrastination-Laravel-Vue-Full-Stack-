import Vue from 'vue';
import router from './router';
import Articleindex from './components/article/Articleindex';
import BootstrapVue from 'bootstrap-vue';
import Info from './components/article/Info';
import App from './components/App';

require('./bootstrap');

Vue.use(BootstrapVue);

const app = new Vue({
	router,
	el: '#app',
	components: {
		Articleindex,
		Info,
		App
	}
});
