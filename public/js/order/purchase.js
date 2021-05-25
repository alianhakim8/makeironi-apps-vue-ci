let purchase = new Vue({
    el: '#purchase',
    data: {
        bank: '',
        no_rek: '12312398',
        cart: {},
        total_tagihan: 0,
        status_: null,
        img: null,
    },
    mounted() {
        // if (this.cart.total > 0) {
        let id_customer = localStorage.getItem('id');
        axios
            .get(`/user/purchase/total/${id_customer}`)
            .then((response) => {
                this.cart = response.data;
                localStorage.setItem('id_purchase', this.cart.id_purchase);
                console.log(response.data)
                // console.info(response);
                // if (this.cart.total) {
                //     console.log('ini harus nya stay')
                // }
            })
            .catch(function (error) {
                if (error.response) {
                    // Request made and server responded
                    console.info(error.response.data);
                    console.info(error.response.status);
                    console.info(error.response.headers);
                    this.carts = response.data;

                    if (this.cart.total) {
                        console.log('ini harus nya kembali')
                    }

                } else if (error.request) {
                    // The request was made but no response was received
                    console.info(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.info("Error", error.message);
                    window.location.href = '/'
                }
            });
        // } else {
        //     window.location.href = '/';
        // }

    },
    methods: {
        cancelPayment() {
            if (confirm('Apakah Anda Yakin ?')) {
                //    handle true action
            }
        },
        // payment() {
        //     const verify_payment = 1;
        //     let id_purchase = this.cart.id_purchase;
        //     let id_customer = localStorage.getItem('id');
        //     axios
        //         .put(`/user/purchase/payment/${id_purchase}`, {
        //             verify_payment: 1,
        //             id_customer: id_customer,
        //             invoice_number: this.cart.invoice_number,
        //             file_name: this.cart.img,
        //         }, {
        //             headers: {
        //                 'Content-Type': 'multipart/form-data'
        //             }
        //         })
        //         .then((response) => {
        //             // alert(response);
        //             console.log(response)
        //             window.location.href = '/user/order/complete'
        //         })
        //         .catch(function (error) {
        //             if (error.response) {
        //                 // Request made and server responded
        //                 console.info(error.response.data);
        //                 console.info(error.response.status);
        //                 console.info(error.response.headers);
        //                 // alert('error');
        //                 // this.carts = response.data;
        //             } else if (error.request) {
        //                 // The request was made but no response was received
        //                 console.info(error.request);
        //                 alert('error');
        //             } else {
        //                 // Something happened in setting up the request that triggered an Error
        //                 console.info("Error", error.message);
        //                 alert('error');
        //             }
        //         });
        // }
    },
    handleFileObject() {
        this.images = this.$refs.file.files[0]
        this.imagesName = this.images.name
    }
});