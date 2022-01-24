import { createWebHistory, createRouter } from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';



import Books from '../components/Books';
import AddBook from '../components/AddBook';
import EditBook from '../components/EditBook';




// NEWLY EDITED FOR ADMIN DASHBOARD
import AdminDashboard from '../admin/AdminDashboard';
import SettingForm from '../admin/setting/SettingForm';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'user-home',
        path: '/user/home',
        component: Dashboard
    },
    {
        name: 'books',
        path: '/books',
        component: Books
    },
    {
        name: 'addbook',
        path: '/books/add',
        component: AddBook
    },
    {
        name: 'editbook',
        path: '/books/edit/:id',
        component: EditBook
    },
    {
        name: 'admin-home',
        path: '/admin/home',
        component: AdminDashboard,
    },
    {
        name: 'admin-setting',
        path: '/admin/setting',
        component: SettingForm,

    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;