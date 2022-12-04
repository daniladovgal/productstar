import { createRouter, createWebHistory } from 'vue-router';
import Weather from './views/Weather.vue';
import Users from './views/Users.vue';
import Lessons from './views/Lessons.vue';

const routes = [
    {
        path: '/',
        name: Weather,
        component: Weather
    },
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
    {
        path: '/lessons',
        name: Lessons,
        component: Lessons
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;