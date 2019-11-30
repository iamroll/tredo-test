import router from  './../../router'
import EmployeesList from './pages/EmployeesList'

router.addRoutes([
    {
        path: '/employees',
        name: 'employees',
        component: EmployeesList
    }
])
