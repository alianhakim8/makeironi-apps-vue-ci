let loginAdmin = new Vue({
    el: '#login',
    data: {
        email: '',
        password: ''
    },
    methods: {
        login() {
            axios.post('/admin/login', {
                email: this.email,
                password: this.password
            }).then((response) => {
                console.log(response);
            });
        }
    }
});