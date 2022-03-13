import Home from './components/Home.vue';
import Users from './components/User/List.vue';
import AddUser from './components/User/Add.vue';

export const routes = [
    //HOME
    {
        name: 'home',
        path: '/',
        component: Home
    },

    //USER
    {
        name: 'users',
        path: '/users',
        component: Users
    },
    {
        name: 'addUser',
        path: '/users/add',
        component: AddUser
    },
];
