<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div id="app">
    <div class="container mt-5 mb-5">
        <div class="shopping-cart-desktop">
            <div class="row mt-5">
                <div class="title text-center">
                    <h4 class="text-muted mt-5"><span class="fw-bold">SHOPPING CART</span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                        </svg> <span class="text-muted">PEMBAYARAN </span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                        </svg> <span class="text-muted">ORDER COMPLETE</span></h4>
                </div>
                <div v-if='carts.length > 0'>
                    <div class="col mt-3">
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
                                    <td><button @click='remove_cart(content.id_cart)' class="btn btn-outline-danger align-middle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg></button></td>
                                    <td><img :src="'/img/product/'+content.images" alt="" width="100"></td>
                                    <th scope="row">{{ content.product_name }}</th>
                                    <td class="text-center">Rp. {{ content.price}}</td>
                                    <td class="text-center">
                                        <div class="text-center">
                                            <div class="quantity-cart">
                                                <button class="btn btn-dark" v-on:click='decrease(content)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                    </svg></button>
                                                <span class="badge badge-light">
                                                    <p id="badge-text">{{ content.quantity }}</p>
                                                </span></button>
                                                <button class="btn btn-dark" v-on:click='increase(content)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp. {{ content.sub_total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-muted text-center mt-5 mb-5" v-else>
                    <img src="https://cdn1.iconfinder.com/data/icons/free-98-icons/32/sad-512.png" width="200" alt="">
                    <h3>Keranjang Kosong Masih Kosong</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="/" class="btn btn-outline-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg>Lanjut Belanja</a>
                    <!-- <a href="#" class="btn green-custom text-light" @click='updateTotalShopping'>Update Cart</a> -->
                </div>
                <div class="col-md-6" v-if="carts.length > 0">
                    <div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Jumlah Produk</div>
                        <div class="col-md-2">{{ jumlah_produk }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10"><span>Total Harga Produk</span>
                        </div>
                        <div class="col-md-2"><span>Rp. {{ total }}</span></div>
                    </div>
                    <hr>
                    <a href="#" class="btn green-custom text-light w-100 mt-3" @click='addShoping'>PROCESS TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile version -->
    <div class="shopping-cart-mobile">
        <div class="container">
            <a href="/" class="btn mb-3 btn-outline-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                </svg> Lanjut Belanja</a>
            <h2 class="title-cart">Shopping Cart</h2>
            <div v-if='carts.length > 0'>
                <p class="text-muted">{{ jumlah_produk }} Jenis Makaroni</p>
                <hr>
                <div class="scrolling-wrapper">
                    <div class="card m-2 p-2" v-for='content in carts'>
                        <img :src="'/img/product/'+content.images" alt="" class="w-100">
                        <h4 class="mt-3">{{ content.product_name }}</h4>
                        <p>Rp.{{ content.price}}</p>
                        <p>{{ content.quantity }} Makaroni {{ content.product_name }}</p>
                        <p>Sub Total : Rp.{{ content.sub_total }}</p>
                        <div class="quantity-cart">
                            <button class="btn btn-dark w-100" v-on:click='decrease(content)'>-</button>
                            <span class="badge badge-light">
                                <p id="badge-text">{{ content.quantity }}</p>
                            </span></button>
                            <button class="btn btn-dark w-100" v-on:click='increase(content)'>+</button>
                        </div>
                    </div>
                </div>
                <hr>
                <p>Jumlah Produk : {{ jumlah_produk }} Jenis Makaroni</p>
                <p>Total Harga : Rp. {{ total }}</p>
                <a href="#" class="btn green-custom text-light w-100 mt-3" @click='addShoping'>PROCESS TO CHECKOUT</a>
            </div>
            <div class="text-muted text-center mt-5 mb-5" v-else>
                <img src="https://cdn1.iconfinder.com/data/icons/free-98-icons/32/sad-512.png" width="200" alt="">
                <h3>Keranjang Kosong Masih Kosong</h3>
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