let cart_vue = new Vue({
    el: "#app",
    props: ["content"],
    data: {
        carts: [],
        stock_from_db: 0,
        total: 0,
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
                    console.log(response);
                    this.cart();
                })
                .catch(function(error) {
                    if (error.response) {
                        // Request made and server responded
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                        this.carts = response.data;
                    } else if (error.request) {
                        // The request was made but no response was received
                        console.log(error.request);
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log("Error", error.message);
                    }
                });
        },
        cart() {
            const customer_id = localStorage.getItem("id");
            axios
                .get("/cart-detail-json/" + customer_id)
                .then((response) => {
                    this.carts = response.data;
                    console.log(response.data.sub_total);
                })
                .catch(function(error) {
                    if (error.response) {
                        // Request made and server responded
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                        this.carts = response.data;
                    } else if (error.request) {
                        // The request was made but no response was received
                        console.log(error.request);
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log("Error", error.message);
                    }
                });
        },
        increase(content) {
            this.stock_from_db = content.stock;

            if (content.quantity < this.stock_from_db) {
                content.quantity++;
                // console.log(this.stock_from_db);
                content.sub_total = content.price * content.quantity;
                axios
                    .put("cart-quantity-update/" + content.id_cart, {
                        price: content.price * content.quantity,
                        quantity: content.quantity,
                    })
                    .then((response) => {
                        console.log(response);
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
                        console.log(response);
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
    },
});