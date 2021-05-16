var vm = new Vue({
    prop: ["id"],
    el: "#product-detail",
    data: {
        products: [],
        keyword: "",
        stock: 0,
        stockFromDb: 0,
        warning: false,
        product_name: ''
    },
    computed: {
        filterProduct() {
            return this.products.filter((item) => {
                return this.keyword
                    .toLowerCase()
                    .split(" ")
                    .every((v) => item.product_name.toLowerCase().includes(v));
            });
        },
    },
    created: function () {
        axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
        this.getProductDetail();
    },
    methods: {
        // get from database
        getProductDetail() {
            const id = location.pathname.split("/")[4];
            axios.get(`/api/user/product/detail-json/${id}`).then((response) => {
                // console.log(response.data);
                this.products = response.data;
                this.stockFromDb = response.data.stock;
            });
        },
        increase() {
            if (this.stock != this.stockFromDb) {
                this.stock++;
            }
        },
        decrease() {
            if (this.stock != 0) {
                this.stock--;
            }
        },
        addToCart() {
            //    alert("jalan");
            console.log("id_customer : " + localStorage.getItem("id"));
            console.log("id : " + this.products.id);
            console.log("price : " + this.products.price);
            console.log("stock : " + this.stock);
            let id_customer = localStorage.getItem("id");
            let id_product = this.products.id;
            let price = this.products.price;
            let quantity = this.stock;
            vm.product_name = this.products.product_name;
            if (id_customer) {
                if (quantity == 0) {
                    this.warning = true;
                } else {
                    this.warning = false;
                    axios
                        .post("/user/cart/", {
                            id_customer,
                            id_product,
                            price,
                            quantity,
                        })
                        .then(function (response) {

                            // console.info(response)
                            // // handle success response
                            Swal.fire(
                                '',
                                `${vm.product_name} Berhasil di tambahkan ke cart`,
                                'success'
                            )
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                            console.log(vm.product_name);
                        })
                        .catch(function (error) {
                            if (error.response) {
                                // // Request made and server responded
                                console.log(error.response.data);
                                console.log(error.response.status);
                                console.log(error.response.headers);
                                Swal.fire({
                                    icon: "warning",
                                    title: `${vm.product_name} sudah ada di cart`,
                                });
                                console.log();

                            } else if (error.request) {
                                // The request was made but no response was received
                                console.log(error.request);
                            } else {
                                // Something happened in setting up the request that triggered an Error
                                console.log("Error", error.message);
                            }
                        });
                }
            } else {
                alert("Anda belum login, login terlebih dahulu");
                $('.loginModal').modal('show');
                $('.close').click(function () {
                    $('.loginModal').modal('hide');
                });
            }
        },
    },
});