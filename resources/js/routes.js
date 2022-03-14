import Home from './components/Home';
import Users from './components/User/List';
import AddUser from './components/User/Add';
import EditUser from './components/User/Edit';
import Companies from './components/Company/List';
import AddCompany from './components/Company/Add';
//New component to stepper create user and companies
import Stepper from './components/User/Stepper/Stepper';

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

    //STEPPER
    {
      name: 'stepper',
      path: '/user/new',
      component: Stepper
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
