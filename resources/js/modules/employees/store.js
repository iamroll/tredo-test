import store from './../../store'
import toastr from '../../mixins/toastr'
const state = {
    employeesList: []
}

const getters = {
    getEmployeesList(state) {
        return state.employeesList
    }
}

const mutations = {
    SET_EMPLOYEES_LIST(state, employeesList) {
        state.employeesList = employeesList
    }
}

const actions = {
    fetchEmployeesList ({commit}, payload) {
        return axios.get('/employees/list')
            .then((response) => {
                    commit('SET_EMPLOYEES_LIST', response.data.data)
                    this.makeToast()
            })
            .catch((error) => {

            })
    },
    saveEmployee ({commit}, payload) {
        return axios.post('/employees/save', payload)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {

            })
    }
}

store.registerModule('employees', {
    state, getters, mutations, actions
})
