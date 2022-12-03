import { createRouter, createWebHistory } from 'vue-router';
import Weather from './views/layouts/Weather.vue';
import Users from './views/layouts/Users.vue';

const routes = [
    {
        path: '/weather',
        name: Weather,
        component: Weather
    },
    {
        path: '/users/:id?',
        name: Users,
        component: Users
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;