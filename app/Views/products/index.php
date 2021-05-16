<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="app">
    <!-- carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active item">
                <div class="bg-carousel"></div>
                <!-- <img class="d-block w-100" src="/img/carousel.jpeg" alt="First slide"> -->
                <div class="carousel-caption">
                    <h3 class="h3 text-dark fw-bold">Makroni Kriuk<br> Enaknya Sampe Ketulang :v</h3>
                    <br>
                    <a href="#buy" class="btn btn-dark">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container" id="buy">
        <form>
            <input v-model='keyword' type="text" class="form-control mt-5" id="search" aria-describedby="searchProduct" placeholder="Cari...">
        </form>

        <div class="title mt-5">
            <h3 class="h3 fw-bold" style="color:grey;"><span>New Variant</span></h3>
        </div>

        <div class="row mt-5 row-mobile">
            <div class="col-md-3 col-xs-4" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img v-bind:src="'/img/product/'+ product.images" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <p>Harga : Rp. {{ product.price }}</p>
                        <p v-if='product.stock != 0'>Stock : {{ product.stock }}</p>
                        <p v-else>Stock Habis</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                            </div>
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn green-custom text-light btn-mobile w-100">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/user/product/products" class="nav-link text-dark">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg></a>
        </div>
        <div class="title mt-5">
            <h3 class="h3 fw-bold" style="color:gray;"><span>Originals</span></h3>
        </div>

        <!-- Mobile Version -->
        <div class="row mt-5 row-mobile">
            <div class="col-sm" v-for="product in filterProduct" :key='product.id'>
                <div class="card mt-2">
                    <div class="card-body">
                        <img v-bind:src="'/img/product/'+ product.images" class="img-fluid">
                        <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                        </h5>
                        <!-- field harga -->
                        <p>Harga : Rp. {{ product.price }}</p>
                        <!-- field stock -->
                        <p v-if='product.stock != 0'>Stock : {{ product.stock }}</p>
                        <p v-else>Stock Habis</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn btn-outline-dark w-100 ">Detail</a>
                            </div>
                            <div class="col-md-6">
                                <a :href="'/user/product/detail/' + product.id" class="btn green-custom text-light w-100 btn-mobile">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card p-5 mt-5 bg-dark text-light rounded-0 text-center">
        <h1 class="h1">Feedback Customer</h1>
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