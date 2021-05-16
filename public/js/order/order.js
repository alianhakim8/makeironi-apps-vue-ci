let purchase = new Vue({
    el: '#order',
    data: {
        bank: '',
        no_rek: '12312398',
        cart: [],
        total_tagihan: 0,
        status: 0,
        total_konfirmasi: 0,
        total_kemas: 0,
        total_kirim: 0,
        total_selesai: 0,
    },
    mounted() {
        setInterval(() => {
            let id_customer = localStorage.getItem('id');
            axios
                .get(`/user/purchase/detail/${id_customer}`)
                .then((response) => {
                    this.cart = response.data;
                    localStorage.setItem('id_purchase', this.cart.id_purchase);
                    let totalNotif = response.data, count_konfirmasi = 0, count_kemas = 0, count_kirim = 0, count_selesai = 0;
                    for (let i = 0; i < totalNotif.length; i++) {
                        if (totalNotif[i].status_payment == 'konfirmasi') {
                            count_konfirmasi++;
                        } else if (totalNotif[i].status_payment == 'kemas') {
                            count_kemas++;
                        } else if (totalNotif[i].status_payment == 'kirim') {
                            count_kirim++;
                        } else if (totalNotif[i].status_payment == 'selesai') {
                            count_selesai++;
                        }
                    }
                    purchase._data.total_konfirmasi = count_konfirmasi;
                    purchase._data.total_kemas = count_kemas;
                    purchase._data.total_kirim = count_kirim;
                    purchase._data.total_selesai = count_selesai;

                })
                .catch(function (error) {
                    if (error.response) {
                        // Request made and server responded
                        console.info(error.response.data);
                        console.info(error.response.status);
                        console.info(error.response.headers);
                        this.carts = response.data;
                    } else if (error.request) {
                        // The request was made but no response was received
                        console.info(error.request);
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.info("Error", error.message);
                    }
                });
        }, 1000);

        // location.reload();
    },
    methods: {
    }
});