import Home from './components/Home';
import Users from './components/User/List';
import AddUser from './components/User/Add';
import EditUser from './components/User/Edit';
import Companies from './components/Company/List';
import AddCompany from './components/Company/Add';

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
    {
        name: 'editUser',
        path: '/users/edit/:id',
        component: EditUser
    },

    //COMPANY
    {
        name: 'companies',
        path: '/companies',
        component: Companies
    },
    {
        name: 'addCompany',
        path: '/companies/add',
        component: AddCompany
    },
];
