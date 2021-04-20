<script type="text/x-template" id="modal-template">
    <transition name="modal">
    <div class="modal-mask"  @click.self>
        <div class="modal-wrapper">
            <div class="modal-container">

                <!-- <div class="modal-header">
                    <slot name="header">
                        
                    </slot>
                </div> -->

                <div class="modal-body">
                    <slot name="body">
                   
                    </slot>
                </div>

                <!-- <div class="modal-footer">
                    <slot name="footer">
                        default footer
                        <button class="modal-default-button" @click="$emit('close')">
                            OK
                        </button>
                    </slot>
                </div> -->
            </div>
        </div>
    </div>
</transition>
</script>

<script type="text/x-template" id="modal-template-register">
    <transition name="modal">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">

                <!-- <div class="modal-header">
                    <slot name="header">
                        
                    </slot>
                </div> -->

                <div class="modal-body">
                    <slot name="body">
                   
                    </slot>
                </div>

                <!-- <div class="modal-footer">
                    <slot name="footer">
                        default footer
                        <button class="modal-default-button" @click="$emit('close')">
                            OK
                        </button>
                    </slot>
                </div> -->
            </div>
        </div>
    </div>
</transition>
</script>

<!-- first navbar -->

<div id="appLogin">
    <nav class="navbar navbar-expand-lg navbar-light top-nav">
        <div class="container">
            <p id="phone-number">+62 821-6854-0447</p>
            <p id="response-text">Fast Response : 08.00 - 12.00 WIB</p>
            <p id="email">makeironi.web@gmail.com</p>
        </div>
    </nav>

    <!-- second navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-green p-4">
        <div class="container">
            <a class="navbar-brand" href="/">Make I Roni</a>
            <button class="navbar-toggler order-first" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a id="show-modal" @click="showModal = true" class="nav-link login-link"><strong>Login</strong></a>
                    </li>
                    <li class="cart-desktop">
                        <button type="button" class="btn btn-yellow">Cart <span class="badge text-dark">0</span></button>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto cart-mobile">
                <li>
                    <button type="button" class="btn btn-yellow"><span class="badge badge-dark">0</span></button>
                </li>
            </ul>
        </div>
        <modal v-if="showModal" @close="showModal = false">

            <!-- Login -->
            <div slot="body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if='error== true'>
                    {{ errorMessage }}
                </div>
                <button class="modal-default-button" @click='hide'>x</button>
                <h3 class="mb-3">Login</h3>
                <hr>
                <input type=" text" placeholder="Email" class="form-control" v-model='formLogin.email'>
                <input type="password" placeholder="Password" class="form-control mt-3 mb-3" v-model='formLogin.password'>
                <button class="btn btn-warning w-100" @click='login'>Login</button>
                <div class="text-center">
                    <p class="mt-3">Atau</p>
                    <button class="btn btn-light"><i class="fa fa-google"></i> Masuk dengan Google</button>
                </div>
                <div class="text-center mt-3">
                    <!-- <button class="btn btn-dark w-100 mt-2" id="show-modal-register" @click="hideLogin">Daftar</button> -->
                    <p>Belum punya akun ? <a href="#" @click.prevent='hideLogin' class="login-register-btn">Daftar</a> </p>
                </div>
            </div>

        </modal>

        <modal v-if="showModalRegister" @close="showModalRegister = false">
            <div slot="body">
                <button class="modal-default-button" @click='hide'>X</button>

                <!-- Register -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if='error == true'>
                    Harap lengkapi data
                </div>
                <h3 class="mb-3">Register</h3>
                <hr>
                <input type=" email" placeholder="Email" class="form-control" v-model='formLogin.email'>
                <input type="password" placeholder="Password" class="form-control mt-3 mb-3" v-model='formLogin.password'>
                <input type=" text" placeholder="Nama" class="form-control mt-3 mb-3" v-model='formLogin.name'>
                <input type="text-area" placeholder="Alamat" class="form-control mt-3 mb-3" v-model='formLogin.alamat'>
                <input type="text" placeholder="No.Hp" class="form-control mt-3 mb-3" v-model='formLogin.phone_number'>
                <input type="date" placeholder="Tanggal Lahir" class="form-control mt-3 mb-3" v-model='formLogin.tanggal_lahir'>

                <p>Jenis Kelamin : </p>
                <div class="d-flex p-2">
                    <div class="form-check">
                        <input class="form-check-input" v-model='formLogin.gender' type="radio" name="gender" id="" v-bind:value="'L'" checked>
                        <label class="form-check-label" for="radiobutton1"> Laki-Laki </label>
                    </div>
                    <div class="form-check gender">
                        <input class="form-check-input ml-2" v-model='formLogin.gender' type="radio" name="gender" id="radiobutton2" v-bind:value="'P'">
                        <label class="form-check-label" for="exampleRadios2"> Perempuan </label>
                    </div>
                </div>

                <button class="btn btn-warning w-100 mt-2 mb-2" @click='register'>Register</button>
                <div class="text-center mt-3">
                    <a href="#" @click.prevent='hideRegister'></a>
                    <p>Sudah punya akun ? <a href="#" @click.prevent='hideRegister' class="login-register-btn">Login</a></p>
                </div>
            </div>
        </modal>
</div>
</nav>
</div>

<script src="/js/users/login.js"></script>