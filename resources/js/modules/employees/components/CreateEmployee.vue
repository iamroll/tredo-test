<template>
    <div>
        <b-button v-b-modal.modal-prevent-closing>Создать сотрудника</b-button>

        <b-modal
            id="modal-prevent-closing"
            ref="modal"
            title="Создать сотрудника"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                    label="Имя сотрудника"
                    label-for="name-input"
                    invalid-feedback="Name is required"
                >
                    <b-form-input
                        id="name-input"
                        v-model="name"
                        required
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                    label="Фамилия сотрудника"
                    label-for="surname-input"
                    invalid-feedback="Surname is required"
                >
                    <b-form-input
                        id="surname-input"
                        v-model="surname"
                        required
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                    label="Отчество сотрудника"
                    label-for="father-input"
                >
                    <b-form-input
                        id="father-input"
                        v-model="father"
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                    label="Пол сотрудника"
                    label-for="gender-input"
                    invalid-feedback="Gender is required"
                >
                    <b-form-select v-model="gender" :options="options"></b-form-select>
                </b-form-group>
                <b-form-group
                    label="Заработная плата"
                    label-for="salary-input"
                >
                    <b-form-input
                        id="salary-input"
                        v-model="salary"
                        type="number"
                        required
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                    label="Отделы"
                    label-for="name-input"
                    invalid-feedback="Name is required"
                >
                <treeselect v-model="selectedDepartments" :multiple="true" :options="departmentsOption" />
                </b-form-group>
            </form>
        </b-modal>
    </div>
</template>

<script>
    import Treeselect from '@riophae/vue-treeselect'
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'
    import {mapGetters} from 'vuex'
    import toastr from '../../../mixins/toastr'

    export default {
        components: {
            Treeselect
        },
        mixins: [toastr],
        computed: {
            ...mapGetters({
                departments: 'getDepartmentsList'
            })
        },
        data() {
            return {
                name: null,
                surname: null,
                gender: null,
                salary: null,
                father: null,
                options: [
                    { value: 'male', text: 'Мужской'},
                    { value: 'female', text: 'Женский'},
                ],
                selectedDepartments: null,
                departmentsOption: []
            }
        },
        created() {
            this.$store.dispatch('fetchDepartmentsList')
                .then(() => {
                    this.normalizeDepartments()
                })
        },
        methods: {
            normalizeDepartments() {
                let arr = []
                this.departments.forEach((department) => {
                    arr.push({
                        id: department.id,
                        label: department.name
                    })
                });
                this.departmentsOption = arr
            },
            checkFormValidity() {
                let data = {}
                if (this.name === ''
                        || this.surname === ''
                        || !this.selectedDepartments
                        || this.selectedDepartments.length === 0){
                    this.makeToast('Ошибка данных')
                    return
                }

                if (this.name !== '') {
                    data['name'] = this.name
                }
                if (this.surname !== '') {
                    data['surname'] = this.surname
                }
                if (this.father !== '') {
                    data['father'] = this.father
                }
                if (this.salary) {
                    data['salary'] = parseInt(this.salary)
                }
                if (this.gender === 'male' || this.gender === 'female') {
                    data['gender'] = this.gender
                }
                if (this.selectedDepartments.length !== 0) {
                    data['departments'] = this.selectedDepartments
                }
                console.log('dasdada', data);
                return data;
            },
            resetModal() {
                this.name = ''
                this.father = null
                this.surname = null
                this.gender = null
                this.selectedDepartments = []
                this.salary = null
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.handleSubmit()
            },
            handleSubmit() {
                // Exit when the form isn't valid
                let data = this.checkFormValidity();

                this.$store.dispatch('saveEmployee', data)
                    .then(() => {
                        this.$store.dispatch('fetchEmployeesList');
                    })
                this.$nextTick(() => {
                    this.$refs.modal.hide()
                })
            }
        }
    }
</script>

<style scoped>

</style>
