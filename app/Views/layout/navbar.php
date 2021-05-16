<div id="appLogin">
    <!-- first navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-rich-black bg-dark">
        <div class="container">
            <p id="phone-number"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg> {{ phone_number }}</p>
            <p id="response-text">Fast Response : 08.00 - 12.00 WIB</p>
            <a href='mailto:makeironi@gmail.com' target='_blank' id="email" class="nav-link text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                </svg> {{ merchant_email }}</a>
        </div>
    </nav>

    <!-- second navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-grullo p-4">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/img/logo_only.png" class="logo" width="50" height="50">Make I Roni</a>
            <button class="navbar-toggler order-first" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://api.whatsapp.com/send?phone=62821-6854-0447&text=Halo%20kak%20!%20aku%20pengen%20dong%20makaroni%20make%20i%20roni%20nya%20kayaknya%20keliatan%20tasty%20banget%20nih%20:D">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/about">Tentang</a>
                    </li>
                </ul>
                <div class="dropdown" v-if='logged_in'>
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                        <img src="https://cdn1.iconfinder.com/data/icons/flat-business-icons/128/user-512.png" class='img-fluid profile_image'>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu p-2 mt-2" role="menu" aria-labelledby="menu1">
                        <li class="cart-desktop ">
                            <a href='/user/cart/view' class="btn green-custom ml-3 w-100 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg> Cart <span class="badge text-light">{{ carts }}</span></a href='/cart-view'>
                        </li>
                        <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="nav-link">{{logged_in}}</a></li> -->
                        <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="nav-link">Cart 0</a></li> -->
                        <!-- <li role="presentation" class="divider"> {{ formLogin.name }} </li> -->
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/user/order/complete" class="nav-link">Status Pemesanan</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/user/purchase/payment/view" class="nav-link">Status Pembayaran</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" @click='logout' class="nav-link">Keluar</a></li>
                    </ul>

                </div>
                <ul class="navbar-nav ml-auto" v-else>
                    <li>
                        <!-- Button trigger modal -->
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">
                            <strong>Login</strong>
                        </a>
                    </li>
                    <li class="cart-desktop">
                        <button type="button" class="btn green-custom text-light" v-on:click='carts' data-toggle="tooltip" data-placement="top" title="Login untuk melihat cart">Cart <span class="badge text-light">0</span></button>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto cart-mobile">
                <li>
                    <a href='/user/cart/view' class="btn green-custom text-light ml-3 w-100">Cart <span class="badge text-light">{{carts}}</span></a href='/user/cart/view'>
                </li>
            </ul>
        </div>

        <!-- Modal Login -->
        <div class="modal fade loginModal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if='error== true'>
                            {{ errorMessage }}
                        </div>
                        <input type=" text" placeholder="Email" class="form-control" required autofocus v-model='formLogin.email'>
                        <input :type="passwordFieldType" placeholder="Password" class="form-control mt-3 mb-3" v-model='formLogin.password'>
                        <button class="btn green-custom text-light w-100" @click='loginMethod'>Login</button>
                        <div class="text-center">
                            <p class="mt-3">Atau</p>
                            <button class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                </svg> Masuk dengan Google</button>
                        </div>
                        <div class="text-center mt-3">
                            <!-- <button class="btn btn-dark w-100 mt-2" id="show-modal-register" @click="hideLogin">Daftar</button> -->
                            <p>Belum punya akun ? <a href="#" class="login-register-btn" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Daftar</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Register -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="container">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">Registrasi</h5>
                            <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if='error == true'>
                                Harap lengkapi data
                            </div>
                            <input type=" email" placeholder="Email" class="form-control" v-model='formLogin.email'>
                            <input type="password" placeholder="Password" class="form-control mt-3 mb-3" v-model='formLogin.password'>
                            <input type=" text" placeholder="Nama" class="form-control mt-3 mb-3" v-model='formLogin.name'>
                            <input type="text-area" placeholder="Alamat" class="form-control mt-3 mb-3" v-model='formLogin.alamat'>
                            <input type="text" placeholder="No.Hp" class="form-control mt-3 mb-3" v-model='formLogin.phone_number'>
                            <input type="text" placeholder="Tanggal Lahir" class="form-control mt-3 mb-3" onfocus="(this.type='date')" v-model='formLogin.tanggal_lahir'>
                            <p>Jenis Kelamin : </p>
                            <div class="d-flex p-2">
                                <div class="form-check">
                                    <input class="form-check-input" v-model='formLogin.gender' type="radio" name="gender" id="rbMale" v-bind:value="'L'" checked>
                                    <label class="form-check-label" for="radiobutton1"> Laki-Laki </label>
                                </div>
                                <div class="form-check gender">
                                    <input class="form-check-input ml-2" v-model='formLogin.gender' type="radio" name="gender" id="rbFemail" v-bind:value="'P'">
                                    <label class="form-check-label" for="exampleRadios2"> Perempuan </label>
                                </div>
                            </div>
                            <button class="btn green-custom text-light w-100 mt-2 mb-2" @click='register'>Register</button>
                            <div class="text-center mt-3">
                                <a href="#" @click.prevent='hideRegister'></a>
                                <p>Sudah punya akun ? <a href="#" class="login-register-btn" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</nav>
</div>

<script src="/js/users/user.js"></script>