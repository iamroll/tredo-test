<template>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название отдела</th>
                <th scope="col">Количество сотрудников отдела</th>
                <th scope="col">Максимальная заработная плата среди сотрудников отдела</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(department, index) in departments">
                <th scope="row">{{ index + 1}}</th>
                <td>{{ department.name }}</td>
                <td>{{ department.name }}</td>
                <td>{{ department.name }}</td>
                <td><button @click="deleteDepartment(department.id)">Удалить</button></td>
            </tr>
            </tbody>
        </table>
        <create-department />
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import toastr from '../../../mixins/toastr'
    import CreateDepartment from './../components/CreateDepartment'

    export default {
        components: {
            CreateDepartment
        },
        computed: {
            ...mapGetters({
                departments: 'getDepartmentsList'
            })
        },
        mixins: [toastr],
        created() {
            this.fetchDepartmentsList()
        },
        data() {
            return {

            }
        },
        methods: {
            fetchDepartmentsList() {
                this.$store.dispatch('fetchDepartmentsList')
            },
            deleteDepartment (id) {
                this.$store.dispatch('deleteDepartment', {id: id})
                    .then(() => {
                        this.$store.dispatch('fetchDepartmentsList');
                    })
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
