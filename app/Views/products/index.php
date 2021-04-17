<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="app">
    <!-- carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active item">
                <img class="d-block w-100" src="/img/carousel.jpeg" alt="First slide">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h1>Make (I) Roni</h1>
                    <p>Cemilan Kriuk Gak Bikin Gemuk</p>
                    <p>Lokal Lestari</p>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container">
        <form>
            <input v-model='keyword' type="text" class="form-control mt-5" id="search" aria-describedby="searchProduct" placeholder="Cari...">
        </form>

        <div class="title mt-5">
            <h3 class="h3"><span>New Variant</span></h3>
        </div>

        <div class="row mt-5">
            <div class="col-md-3 col-xs-4" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img v-bind:src="'/img/product/'+ product.images" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <!-- field harga -->

                        <p>Harga : Rp. {{ product.price }}</p>
                        <!-- field stock -->
                        <p>stock : {{ product.stock }}</p>
                        <div class="row">
                            <div class="col-md-8">
                                <a :href="'product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                            </div>
                            <div class="col-md-4">
                                <a :href="'product/detail/' + product.id" class="btn btn-yellow w-100">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/product/all" class="nav-link">Selengkapnya</a>
        </div>
        <div class="title mt-5">
            <h3 class="h3"><span>Originals</span></h3>
        </div>

        <div class="row mt-5">
            <div class="col-md-3" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img v-bind:src="'/img/product/'+ product.images" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <!-- field harga -->
                        <p>Harga : Rp. {{ product.price }}</p>
                        <!-- field stock -->
                        <p>stock : {{ product.stock }}</p>

                        <div class="row">
                            <div class="col-md-8">
                                <a :href="'/product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                            </div>
                            <div class="col-md-4">
                                <a :hreft="'/product/detail/' + product.id" class="btn btn-warning w-100">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-5 mt-5 bg-dark text-light rounded-0 text-center">
        <h1>Feedback Customer</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 col-sm-12" v-for="item in feedback_customer" :key='item.id'>
                    <img :src="'/img/' + item.profile_picture" class="rounded-circle customer-photo">
                    <div class="p-3">
                        <h1>{{ item.name}}</h1>
                        <p>{{ item.feedback_desc}}</p>
                        <img src="https://img.pngio.com/evaluation-five-star-rating-favorite-like-recommend-icon-of-star-rating-png-256_256.png" style="height:100px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/products/product.js"></script>
<?= $this->endSection(); ?>