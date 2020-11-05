import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


const routes = [
    {
      path: '/Admin/Home',
      name: 'Home',
      component: () => import( './views/home.vue')
    },
    {
        path: '/Admin/Estudiantes',
        name: 'Estudiantes',
        component: () => import( './views/Admin/Estudiantes.vue')
      },
      {
        path: '/Admin/teacher',
        name: 'teacher',
        component: () => import( './views/Admin/Profesor.vue')
      },
      {
        path: '/Admin/Cursos',
        name: 'Cursos',
        component: () => import( './views/Admin/VerCursos.vue')
      },
      {
        path: '*',
        component: () => import( './views/404.vue')
      }
  ]

  const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })

  export default router
