import Vue from 'vue';
import VueRouter from 'vue-router';
import Unimplemented from './components/Unimplemented';
import NotFound from './components/NotFound';

Vue.use(VueRouter);

export default new VueRouter({
	base: '/',
	mode: 'history',
	routes: [
		{
			path: '/',
			component: Unimplemented
		},
		{
			path: '/home',
			component: Unimplemented
		},
		{
			path: '/tomato',
			component: Unimplemented
		},
		{
			path: '/todo',
			component: Unimplemented
		},
		{
			path: '/clock',
			component: Unimplemented
		},
		{
			path: '/about',
			component: Unimplemented
		},
		{
			path: '/*',
			component: NotFound
		}
	]
});
