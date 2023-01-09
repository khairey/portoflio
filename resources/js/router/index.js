import { createRouter, createWebHistory } from "vue-router";

//admin
import homeAdminIndex from '../components/admin/home/index.vue'
//about 
import adminAboutIndex from '../components/admin/about/index.vue'
//services 
import adminServiceIndex from '../components/admin/services/index.vue'
//Skills 
import adminSkillIndex from '../components/admin/skills/index.vue'



//pages
import homePageIndex from '../components/pages/home/index.vue'

//notFound
import notFound from '../components/notFound.vue'

//login
import login from '../components/auth/login.vue'


const routes = [
    //admin
    {
        path: '/admin/home',
        name: 'adminHome',
        component: homeAdminIndex,
        meta:{
            requiresAuth:true
        }
    },
    //about
    {
        path: '/admin/about',
        name: 'adminAbout',
        component: adminAboutIndex,
        meta:{
            requiresAuth:true
        }
    },
    //services
    {
        path: '/admin/services',
        name: 'adminService',
        component: adminServiceIndex,
        meta:{
            requiresAuth:true
        }
    },
    //skills
    {
        path: '/admin/skills',
        name: 'adminSkill',
        component: adminSkillIndex,
        meta:{
            requiresAuth:true
        }
    },
    //pages
    {
        path: '/',
        name: 'Home',
        component: homePageIndex,
        meta:{
            requiresAuth:false
        }
    },
    //notfound
    {
        path: '/:pathMatch(.*)*',
        name: 'Not Found',
        component: notFound,
        meta:{
            requiresAuth:false
        }
    },
    //login
    {
        path: '/login',
        name: 'Login',
        component: login,
        meta:{
            requiresAuth:false
        }
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to,from)=>{
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return {name:"Login"} ;
    }
    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return {name:"adminHome"} ;
    }
})
export default router;