<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="app">
    <div class="container">
        <form>
            <input v-model='keyword' type="text" class="form-control mt-5" id="search" aria-describedby="searchProduct" placeholder="Cari...">
        </form>

        <div class="row mt-5 mb-5">
            <div class="col-md-3" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img :src="'/img/product/' + product.images" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <!-- field harga -->
                        <p>Harga : Rp. {{ product.price }}</p>
                        <!-- field stock -->
                        <p v-if='product.stock != 0'>Stock : {{ product.stock }}</p>
                        <p v-else>Stock Habis</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                            </div>
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn green-custom text-light w-100">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/products/products.js"></script>
<!-- <script src="/js/products/product.js"></script> -->
<?= $this->endSection(); ?>