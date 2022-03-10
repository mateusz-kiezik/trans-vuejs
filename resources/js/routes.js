import Home from './components/Home.vue';
import Users from './components/User/Users.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'users',
        path: '/users',
        component: Users
    },
];
