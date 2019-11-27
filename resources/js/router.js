import Vue from 'vue';
import VueRouter from 'vue-router';
import Unimplemented from './components/Unimplemented';
import NotFound from './components/NotFound';
import Relax from './components/Relax';
import Clock from './components/Clock';
import Todo from './components/Todo';

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
			path: '/relax',
			component: Relax
		},
		{
			path: '/todo',
			component: Todo
		},
		{
			path: '/clock',
			component: Clock
		},
		{
			path: '/*',
			component: NotFound
		}
	]
});
