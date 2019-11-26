import Vue from 'vue';
import VueRouter from 'vue-router';
import Unimplemented from './components/Unimplemented';
import NotFound from './components/NotFound';
import Courage from './components/article/Courage';
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
			path: '/tomato',
			component: Courage
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
			path: '/about',
			component: Unimplemented
		},
		{
			path: '/*',
			component: NotFound
		}
	]
});
