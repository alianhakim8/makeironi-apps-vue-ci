<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="app">
    <div class="container">
        <form>
            <input v-model='keyword' type="text" class="form-control mt-5" id="search" aria-describedby="searchProduct" placeholder="Cari...">
        </form>

        <div class="row mt-5">
            <div class="col-md-3" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Macaroni_closeup.jpg/1200px-Macaroni_closeup.jpg" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <!-- field harga -->
                        <p>Harga : Rp. {{ product.price }}</p>
                        <!-- field stock -->
                        <p>stock : {{ product.stock }}</p>
                        <div class="row">
                            <div class="col-md-8">
                                <a :href="'/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-dark w-100">Beli</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/products/product-all.js"></script>
<!-- <script src="/js/products/product.js"></script> -->
<?= $this->endSection(); ?>