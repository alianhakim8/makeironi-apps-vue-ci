let cart_vue = new Vue({
    el: "#app",
    props: ["content"],
    data: {
        carts: [],
        stock_from_db: 0,
        total: 0,
        jumlah_produk:0
    },
    mounted() {
        this.total_sum();
        this.cart();
    },
    methods: {
        remove_cart(id_cart) {
            axios
                .delete("/remove-cart/" + id_cart)
                .then((response) => {
                    console.info(response);
                    this.cart();
                })
                .catch(function(error) {
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
        },
        cart() {
            const customer_id = localStorage.getItem("id");
            axios
                .get("/cart-detail-json/" + customer_id)
                .then((response) => {
                    this.carts = response.data;
                    console.info(response.data.sub_total);
                    this.jumlah_produk = response.data.length;
                })
                .catch(function(error) {
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
        },
        increase(content) {
            this.stock_from_db = content.stock;
            if (content.quantity < this.stock_from_db) {
                content.quantity++;
                // console.info(this.stock_from_db);
                content.sub_total = content.price * content.quantity;
                axios
                    .put("cart-quantity-update/" + content.id_cart, {
                        price: content.price * content.quantity,
                        quantity: content.quantity,
                    })
                    .then((response) => {
                        console.info(response);
                        this.cart();
                        this.total_sum();
                    });
            }
        },
        decrease(content) {
            if (content.quantity > 1) {
                content.quantity--;
                content.sub_total = content.price * content.quantity;
                axios
                    .put("cart-quantity-update/" + content.id_cart, {
                        price: content.price * content.quantity,
                        quantity: content.quantity,
                    })
                    .then((response) => {
                        console.info(response);
                        this.cart();
                        this.total_sum();
                    });
            }
        },
        total_sum() {
            let customer_id = localStorage.getItem("id");
            axios.get("cart-sum/" + customer_id).then((response) => {
                this._data.total = response.data[0].price;
            });
        },
        addShoping(){
            axios.post('/purchase',{
                invoice_number : "245",
                id_customer : localStorage.getItem('id'),
                total : this.total
            }).then(function(response){
                if(response.data.message){
                    window.location.href = '/purchase-view'
                }
            }).catch(function(error){
                alert('error');
                window.location.href = '/purchase-view'
            })
        }
    },
});