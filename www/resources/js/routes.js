import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/views/Home';
import View from '@/js/views/View';
import Main from '@/js/views/Main';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
            children:
            [
                //children routes for one page application
                {
                  path: '/',
                  name: 'Main',
                  component: Main,
                },
                {
                    path: '/view/:id',
                    name: 'view',
                    props: true,
                    component: View,
                }
            ]
        }
    ]
});

export default router;
