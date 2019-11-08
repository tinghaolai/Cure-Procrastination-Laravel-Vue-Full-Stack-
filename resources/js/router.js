import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
	base: '/',
	mode: 'history'
	/*
	routes: [
		{
			path: '/',
			component: App
		},
		{
			path: '/blog',
			component: ArticlePost
		}
    ]
    */
});
