import Vue from 'vue';
import router from './router';
import Articleindex from './components/article/Articleindex';
import Info from './components/article/Info';

require('./bootstrap');

const app = new Vue({
	el: '#app',
	components: {
		Articleindex,
		Info
	},
	router
});
