// register modal component
Vue.component("modal", {
  template: "#modal-template",
});
Vue.component("modal", {
  template: "#modal-template-register",
});

// start app
var login = new Vue({
  el: "#appLogin",
  data: {
    showModal: false,
    showModalRegister: false,
    formLogin: {
      name: "",
      email: "",
      password: "",
      alamat: "",
      phone_number: "",
      tanggal_lahir: "",
      gender: "",
      email: "",
    },
    logged_in: false,
    error: false,
    errorMessage: "",
  },
  mounted() {
    this.logged_in = localStorage.getItem("email");
    axios
      .get("/check_user/" + this.logged_in)
      .then((response) => {
        // console.log(response.data);
        console.log(response.data.logged_in);
      })
      .catch(function (error) {
        if (error.response) {
          // Request made and server responded
          // console.log(error.response.data);
          // console.log(error.response.status);
          // console.log(error.response.headers);
          console.log(error.response.data.logged_in);
        } else if (error.request) {
          // The request was made but no response was received
          console.log(error.request);
        } else {
          // Something happened in setting up the request that triggered an Error
          console.log("Error", error.message);
        }
      });
  },
  created() {
    axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
  },
  methods: {
    hideLogin() {
      this.error = false;
      this.errorMessage = "";
      this.showModal = false;
      this.showModalRegister = true;
    },
    hideRegister() {
      this.showModal = true;
      this.showModalRegister = false;
    },
    hide() {
      this.showModal = false;
      this.showModalRegister = false;
      this.formLogin.email = "";
      this.formLogin.password = "";
      this.error = false;
      this.errorMessage = "";
    },
    login() {
      if (this.formLogin.email == "" || this.formLogin.password == "") {
        this._data.error = true;
        this._data.errorMessage = "Harap lengkapi data";
      } else {
        axios
          .post("/auth/login", {
            email: this.formLogin.email,
            password: this.formLogin.password,
          })
          .then(function (response) {
            if (response.data.message) {
              this.login._data.showModal = false;
              localStorage.setItem("id", response.data.id);
              localStorage.setItem("email", response.data.email);
              localStorage.setItem("name", response.data.name);
              this.login.reloadPage();
            }
          })
          .catch(function (error) {
            if (error.response) {
              // Request made and server responded
              //   console.log(error.response.data);
              //   console.log(error.response.status);
              //   console.log(error.response.headers);
              this.login._data.error = true;
              this.login._data.errorMessage = error.response.data.message;
            } else if (error.request) {
              // The request was made but no response was received
              console.log(error.request);
            } else {
              // Something happened in setting up the request that triggered an Error
              console.log("Error", error.message);
            }
          });
      }
    },
    register: function () {
      if (
        this.formLogin.name == "" ||
        this.formLogin.email == "" ||
        this.formLogin.password == "" ||
        this.formLogin.alamat == "" ||
        this.formLogin.phone_number == "" ||
        this.formLogin.tanggal_lahir == "" ||
        this.formLogin.gender == ""
      ) {
        this.error = true;
        this.errorMessage = "Harap lengkapi data";
      } else {
        axios
          .post("/auth/register", {
            name: this.formLogin.name,
            email: this.formLogin.email,
            password: this.formLogin.password,
            alamat: this.formLogin.alamat,
            no_hp: this.formLogin.phone_number,
            tanggal_lahir: this.formLogin.tanggal_lahir,
            gender: this.formLogin.gender,
          })
          .then(function (response) {
            Swal.fire({
              icon: "success",
              title: response.data.message,
            });
            this.login._data.showModalRegister = false;
          })
          .catch(function (error) {
            if (error.response) {
              // // Request made and server responded
              // console.log(error.response.data);
              // console.log(error.response.status);
              // console.log(error.response.headers);
              alert("Email sudah terdaftar");
            } else if (error.request) {
              // The request was made but no response was received
              console.log(error.request);
            } else {
              // Something happened in setting up the request that triggered an Error
              console.log("Error", error.message);
            }
          });
      }
    },
    logout: function () {
      localStorage.removeItem("email");
      this.reloadPage();
    },
    reloadPage() {
      window.location.reload();
    },
  },
});
