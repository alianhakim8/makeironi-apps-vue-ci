// start app
let login = new Vue({
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
        passwordFieldType: "password",
        carts: 0,
        phone_number: '+62 821-6854-0447',
        merchant_email: 'makeironie@gmail.com'
    },
    mounted() {
        this.logged_in = localStorage.getItem("email");
        axios
            .get("/user/auth/check_user/" + this.logged_in)
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
        this.cart_count();
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
        loginMethod() {
            if (this.formLogin.email == "" || this.formLogin.password == "") {
                this._data.error = true;
                this._data.errorMessage = "Harap lengkapi data";
            } else {
                axios
                    .post("/user/auth/login", {
                        email: this.formLogin.email,
                        password: this.formLogin.password,
                    })
                    .then(function (response) {
                        if (response.data.message) {
                            login._data.showModal = false;
                            localStorage.setItem("id", response.data.id);
                            localStorage.setItem("email", response.data.email);
                            localStorage.setItem("name", response.data.name);
                            localStorage.setItem('token', response.data.token);
                            login.reloadPage();
                        }
                    })
                    .catch(function (error) {
                        if (error.response) {
                            // Request made and server responded
                            //   console.log(error.response.data);
                            //   console.log(error.response.status);
                            //   console.log(error.response.headers);
                            login._data.error = true;
                            login._data.errorMessage = error.response.data.message;
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
                    .post("/user/auth/register", {
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
                        login._data.showModalRegister = false;
                        login._data.showModal = true;
                    })
                    .catch(function (error) {
                        if (error.response) {
                            // // Request made and server responded
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                            // alert("Email sudah terdaftar");
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
            Swal.fire({
                title: "Keluar ?",
                confirmButtonText: `Ya`,
                showDenyButton: true,
                denyButtonText: `Tidak`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    localStorage.removeItem("email");
                    localStorage.removeItem("id");
                    localStorage.removeItem("name");
                    this.reloadPage();
                    window.location.href = "/";
                }
            });
        },
        reloadPage() {
            window.location.reload();
        },
        switchVisibility() {
            this.passwordFieldType =
                this.passwordFieldType === "password" ? "text" : "password";
        },
        cart_count() {
            const id_customer = localStorage.getItem("id");
            axios.get("/user/cart/count/" + id_customer).then((response) => {
                this.carts = response.data;
            });
        },
    },
});