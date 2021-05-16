<div id="login">
    <nav class="navbar navbar-expand-lg navbar-light bg-grullo p-4">
        <div class="container">
            <a href="/admin/dashboard" class="navbar-brand">Make I Roni Admin</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/admin/purchase-control">Pembelian</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
            </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/produk">Produk</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <!-- Button trigger modal -->
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">
                            <strong>Login</strong>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                    <input type=" text" placeholder="Email" class="form-control" required autofocus v-model='email'>
                    <input type="password" placeholder="Password" class="form-control mt-3 mb-3" v-model='password'>
                    <button class="btn green-custom text-light w-100" @click='login'>Login</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/admin/login.js"></script>