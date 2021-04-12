var vm = new Vue({
    prop: ["id"],
    el: "#product-detail",
    data: {
        // products: [{
        //     id: 1,
        //     product_name: 'Makeroni'
        // }, {
        //     id: 2,
        //     product_name: 'Makeroni'
        // }, {
        //     id: 3,
        //     product_name: 'Makeroni'
        // }, {
        //     id: 4,
        //     product_name: 'Makeroni'
        // }, {
        //     id: 5,
        //     product_name: 'Roy'
        // }],
        products: [],
        keyword: "",
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
            });
        },
    },
});