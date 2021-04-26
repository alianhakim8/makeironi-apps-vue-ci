let car = new Vue({
  el: "#app",
  data: {
    carts: [],
  },
  mounted() {
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
        .catch(function (error) {
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
        })
        .catch(function (error) {
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
  },
});
