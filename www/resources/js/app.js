import Vue from 'vue';
import Routes from '@/js/routes.js';
import App from '@/js/views/App';
import Loader from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';


Vue.use(Loader, {
    backgroundColor: '#f8f9fc',
    opacity: 1,
    color: '#00ad5f'
});

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App),
});

export default app;

