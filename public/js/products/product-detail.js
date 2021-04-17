var vm = new Vue({
    prop: ["id"],
    el: "#product-detail",
    data: {
        products: [],
        keyword: "",
        stock: 0,
        stockFromDb: 0,
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
    created: function() {
        axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
        this.getProductDetail();
    },
    methods: {
        // get from database
        getProductDetail() {
            const id = location.pathname.split("/")[3];
            axios.get("/product-detail-json/" + id).then((response) => {
                console.log(response.data);
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
    },
});