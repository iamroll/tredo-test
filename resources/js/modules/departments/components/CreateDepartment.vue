<template>
    <div>
        <b-button v-b-modal.modal-prevent-closing>Создать отдел</b-button>

        <b-modal
            id="modal-prevent-closing"
            ref="modal"
            title="Создать отдел"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                    label="Название отдела"
                    label-for="name-input"
                    invalid-feedback="Name is required"
                >
                    <b-form-input
                        id="name-input"
                        v-model="name"
                        required
                    ></b-form-input>
                </b-form-group>
            </form>
        </b-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
            }
        },
        methods: {
            checkFormValidity() {
                if (this.name !== '') {
                    return true
                }
            },
            resetModal() {
                this.name = ''
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.handleSubmit()
            },
            handleSubmit() {
                // Exit when the form isn't valid
                if (!this.checkFormValidity()) {
                    return
                }
                this.$store.dispatch('saveDepartment', {name: this.name})
                    .then(() => {
                        this.$store.dispatch('fetchDepartmentsList');
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
