var vm = new Vue({
    el: "#app",
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
        feedback_customer: [],
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
        this.getProducts();
        this.getcustomers();
    },
    methods: {
        // get from database
        getProducts() {
            axios.get("/product-json").then((response) => {
                console.log(response.data);
                this.products = response.data;
            });
        },
        getcustomers() {
            axios.get("/customer/feedback-json").then((response) => {
                console.log(response.data);
                this.feedback_customer = response.data;
            });
        },
    },
});