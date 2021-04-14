<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card p-5 mt-5 mb-5 bg-dark text-light">
        <div class="row">
            <div class="col-md-6">
                <h1>Make i Roni</h1>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi nostrum nihil repudiandae quisquam. Dolorum amet veritatis explicabo libero dolor asperiores? Atque beatae obcaecati similique minima quae deleniti molestiae asperiores harum.</p>
            </div>

            <div class="col-md-6">
                <h3 class="text-center mb-3">Login</h3>
                <hr>
                <input type="text" placeholder="Email" class="form-control">
                <input type="password" placeholder="Password" class="form-control mt-3 mb-3">
                <button class="btn btn-warning w-100">Login</button>
                <div class="text-center">
                    <p>Or</p>
                    <button class="btn btn-light"><i class="fa fa-google"></i> Sign in with Google</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>