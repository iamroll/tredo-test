export default {
    methods: {
        makeToast(message, append = false) {
            this.$bvToast.toast(message, {
                title: 'BootstrapVue Toast',
                autoHideDelay: 5000,
                appendToast: append
            })
        }
    }
}
