let payment = new Vue({
    el: '#payment',
    data: {
        list: []
    },
    mounted() {
        this.check_payment();
    },
    methods: {
        check_payment() {
            axios.get('/api/user/payment/list-json').then((response) => {
                this.list = response.data;
            })
        }
    }
});