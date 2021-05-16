<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div id="product-detail">
    <div class="alert alert-warning" role="alert" v-if='warning'>
        Minimal pembelian 1
    </div>
    <div class="container">
        <div class="card mb-5 mt-5 detail-desktop w-100" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img :src="'/img/product/' + products.images" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="product-detail-title">{{ products.product_name }}</h5>
                        <h3 class="card-text price-detail">Rp.{{ products.price }}</h3>
                        <p class="card-text">Stock : {{ products.stock }}</p>
                        <div class="quantity">
                            <button class="btn btn-dark" @click='decrease'>-</button>
                            <span class="badge badge-light">
                                <p id="badge-text" class="stock">{{ stock }}</p>
                            </span></button>
                            <button class="btn btn-dark" @click='increase'>+</button>
                            <button class="btn btn-success btn-cart" @click="addToCart">+ Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card detail-mobile mt-5">
            <div class="card-body">
                <img :src="'/img/product/' + products.images" class="card-img" alt="...">
                <h3 class="card-title mt-2">{{ products.product_name }}</h3>
                <p class="card-text">Harga : Rp.{{ products.price }}</p>
                <p class="card-text">Stock : {{ products.stock }}</p>
                <div class="text-center">
                    <div class="quantity">
                        <button class="btn btn-dark w-100" @click='decrease'>-</button>
                        <span class="badge badge-light">
                            <p id="badge-text">{{stock}}</p>
                        </span></button>
                        <button class="btn btn-dark w-100" @click='increase'>+</button>
                    </div>
                </div>
                <button class="btn btn-success mt-3 w-100" @click="addToCart">Add To Cart</button>
            </div>
        </div>
    </div>

</div>
<div class="others ">
    <div class="container">
        <p class="mt-3">Produk Lainnya</p>
        <hr>
        <div id="app">
            <div class="row mt-5 mb-5">
                <div class="col-md-3 col-xs-4" v-for="product in filterProduct" :key='product.id'>
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
                                <div class="col-md-8">
                                    <a :href="'/user/product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                                </div>
                                <div class="col-md-4">
                                    <a :href="'/user/product/detail/' + product.id" class="btn green-custom text-light w-100">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/products/detail.js"></script>
<script src="/js/products/product.js"></script>
<?= $this->endSection(); ?>