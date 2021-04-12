<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="product-all">
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
                                <button class="btn w-100 btn-outline-dark">Detail</button>
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
<?= $this->endSection(); ?>