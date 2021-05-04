<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div id="app">
    <div class="container mt-5 mb-5">
        <div class="title text-center">
            <h2 class="font-weigth-bold">SHOPPING CART > <span class="text-muted">METODE PEMBAYARAN </span> > <span class="text-muted">ORDER COMPLETE</span></h2>
        </div>

        <div class="row mt-5">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th></th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col" class="text-center">PRICE</th>
                            <th scope="col" class="text-center">QUANTITY</th>
                            <th scope="col" class="text-center">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for='content in carts'>
                            <td><button @click='remove_cart(content.id_cart)' class="btn btn-outline-danger align-middle">X</button></td>
                            <td><img :src="'/img/product/'+content.images" alt="" width="100"></td>
                            <th scope="row">{{ content.product_name }}</th>
                            <td class="text-center">{{ content.price}}</td>
                            <td class="text-center">
                                <div class="text-center">
                                    <div class="quantity-cart">
                                        <button class="btn btn-dark" v-on:click='decrease(content)'>-</button>
                                        <span class="badge badge-light">
                                            <p id="badge-text">{{ content.quantity }}</p>
                                        </span></button>
                                        <button class="btn btn-dark" v-on:click='increase(content)'>+</button>
                                    </div>
                                </div>

                            </td>
                            <td class="text-center">{{ content.sub_total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="/" class="btn btn-outline-dark">
                    < Lanjut Belanja</a>
            </div>
            <div class="col-md-6">
                <div>
                </div>
                <div class="row">
                    <div class="col-md-10">Jumlah Produk</div>
                    <div class="col-md-2">{{ jumlah_produk }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-10"><span>Total Produk</span>
                    </div>
                    <div class="col-md-2"><span>{{total}}</span></div>
                </div>
                <hr>
                <a href="#" class="btn btn-warning w-100 mt-3" @click='addShoping'>PROCESS TO CHECKOUT</a>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/cart/cart.js"></script>

<?= $this->endSection() ?>