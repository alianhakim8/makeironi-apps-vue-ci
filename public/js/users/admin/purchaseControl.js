let purchaseControl = new Vue({
    el: '#purchaseControl',
    data: {
        purchase: [],
        status: '',
        status_button: ''
    },
    // props: [
    //     'purchase'
    // ],
    mounted() {
        this.status_button = 'Konfirmasi'
        setInterval(() => {
            this.getPurchase();
        }, 1000)
    },
    methods: {
        getPurchase() {
            axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
            axios.get('/api/admin/purchase-control-json').then((response) => {
                this.purchase = response.data;
                console.log(this.purchase)
            }).catch(function (error) {
                // window.location.href = '/purchase-view';
                // console.log(response)
            });
        },
        action(purchase) {
            let status_payment = purchase.status_payment;
            axios.put(`/api/admin/update-status-purchase/${purchase.id_purchase}`, {
                status_payment: status_payment
            }).then((response) => {
                console.log(response);
                this.getPurchase();
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
});