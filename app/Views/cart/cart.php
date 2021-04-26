<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div id="app">
    <div class="container mt-5 mb-5">
        <div class="title text-center">
            <h2 class="font-weigth-bold">SHOPPING CART > <span class="text-muted">CHECKOUT DETAIL</span> > <span class="text-muted">ORDER COMPLETE</span></h2>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th></th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for='content in carts'>
                            <td><button @click='remove_cart(content.id_cart)' class="btn btn-outline-danger align-middle">X</button></td>
                            <td><img :src="'/img/product/'+content.images" alt="" width="100"></td>
                            <th scope="row">{{ content.product_name }}</th>
                            <td>{{ content.price}}</td>
                            <td class="text-center">{{ content.quantity}}</td>
                            <td class="text-center">{{ content.price}}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="/" class="btn btn-outline-dark">
                    < Lanjut Belanja</a>
            </div>

            <div class="col-md-6">
                <h3>Cart Total</h3>
                <div class="row mt-5">
                    <div class="col-md-10"><span>SubTotal</span></div>
                    <div class="col-md-2"><span>Rp.5000</span></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-10"><span>Total</span></div>
                    <div class="col-md-2"><span>Rp.5000</span></div>
                </div>
                <a href="#" class="btn btn-warning w-100 mt-3">PROCESS TO CHECKOUT</a>
            </div>
        </div>
    </div>
</div>

<script src="/js/cart/cart.js"></script>

<?= $this->endSection() ?>