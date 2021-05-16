var vm = new Vue({
  el: "#app",
  data: {
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
  created: function () {
    axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    this.getAllProduct();
  },
  methods: {
    // get from database
    getAllProduct() {
      axios.get("/api/user/product/all-json").then((response) => {
        // console.log(response.data);
        this.products = response.data;
      });
    },
  },
});
