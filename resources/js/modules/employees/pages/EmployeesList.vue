<template>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Зарплата</th>
                    <th scope="col">Отделы</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(employee, index) in employees">
                    <th scope="row">{{ index + 1}}</th>
                    <td>{{ employee.name }}</td>
                    <td>{{ employee.surname }}</td>
                    <td>{{ employee.father }}</td>
                    <td>{{ employee.gender }}</td>
                    <td>{{ employee.salary }}</td>
                    <td>{{ employee.departments_count }}</td>
                    <td><button>delete</button></td>
                </tr>
            </tbody>
        </table>
        <create-employee />
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import toastr from '../../../mixins/toastr'
    import CreateEmployee from './../components/CreateEmployee'

    export default {
        components: {
            CreateEmployee
        },
        computed: {
            ...mapGetters({
                employees: 'getEmployeesList'
            })
        },
        mixins: [toastr],
        created() {
            this.fetchEmployeesList()
        },
        data() {
            return {

            }
        },
        methods: {
            fetchEmployeesList() {
                this.$store.dispatch('fetchEmployeesList')
            }
        }
    }
</script>
