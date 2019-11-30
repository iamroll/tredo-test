import router from  './../../router'
import MainPage from './pages/MainPage'

router.addRoutes([
    {
        path: '/',
        name: 'main',
        component: MainPage
    }
])
