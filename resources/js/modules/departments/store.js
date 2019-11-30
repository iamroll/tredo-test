import store from './../../store'

const state = {
    departmentsList: []
}

const getters = {
    getDepartmentsList(state) {
        return state.departmentsList
    }
}

const mutations = {
    SET_DEPARTMENTS_LIST(state, departmentsList) {
        state.departmentsList = departmentsList
    }
}

const actions = {
    fetchDepartmentsList({commit}) {
        return axios.get('departments/list')
            .then((response) => {
                commit('SET_DEPARTMENTS_LIST', response.data.data)
            })
            .catch((errors) => {

            })
    },
    saveDepartment({commit}, payload) {
        return axios.post('departments/save', payload)
            .then((response) => {
                console.log(response);
            })
    },
    deleteDepartment({commit}, payload) {
        return axios.post(`departments/delete/${payload.id}`)
            .then((response) => {
                console.log(response);
            })
    }
}

store.registerModule('main', {
    state, getters, mutations, actions
})
