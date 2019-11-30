import router from  './../../router'
import DepartmentsList from './pages/DepartmentsList'

router.addRoutes([
    {
        path: '/departments',
        name: 'departments',
        component: DepartmentsList
    }
])
