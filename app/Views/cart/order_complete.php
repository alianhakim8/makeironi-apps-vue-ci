<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">


    <div id="order">
        <div v-if='cart.length > 0'>
            <!-- Desktop Version -->
            <div class="order-complete-desktop">
                <div class="title text-center">
                    <h4 class="text-muted mt-5">SHOPPING CART <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                        </svg> <span class="text-muted">PEMBAYARAN </span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                        </svg> <span class="fw-bold text-dark">ORDER COMPLETE</span></h4>
                </div>
                <div class="mb-5 mt-5">
                    <ul class="nav nav-tabs mb-3 mt-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-konfirmasi-tab" data-toggle="pill" href="#pills-konfirmasi" role="tab" aria-controls="pills-konfirmasi" aria-selected="true">Menunggu Konfirmasi <span v-if="total_konfirmasi > 0" class="badge badge-primary bg-dark text-light">{{ total_konfirmasi }}</span> </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-kemas-tab" data-toggle="pill" href="#pills-kemas" role="tab" aria-controls="pills-kemas" aria-selected="false">Sedang Dikemas <span v-if="total_kemas > 0" class="badge badge-primary bg-dark text-light">{{ total_kemas }}</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-kirim-tab" data-toggle="pill" href="#pills-kirim" role="tab" aria-controls="pills-kirim" aria-selected="false">Sedang Dikirim <span v-if="total_kirim > 0" class="badge badge-primary bg-dark text-light">{{ total_kirim }}</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">Selesai <span v-if="total_selesai > 0" class="badge badge-primary bg-dark text-light">{{ total_selesai }}</span></a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-konfirmasi" role="tabpanel" aria-labelledby="pills-konfirmasi-tab">
                            <div v-for="item in cart">
                                <div v-if='item.status_payment == "konfirmasi"'>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="fw-bold">Invoice Number</p>
                                            <p class="text-muted">{{ item.invoice_number }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Status</p>
                                            <p class="badge bg-info text-light">Menunggu Konfirmasi</p>
                                        </div>

                                        <div class="col-md-4">
                                            <p class="fw-bold">Total</p>
                                            <p class="text-muted">Rp. {{ item.total }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-kemas" role="tabpanel" aria-labelledby="pills-kemas-tab">
                            <div v-for="item in cart">
                                <div v-if='item.status_payment == "kemas"'>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="fw-bold">Invoice Number</p>
                                            <p class="text-muted">{{ item.invoice_number }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Status</p>
                                            <p class="badge bg-warning text-dark">Sedang Dikemas</p>
                                        </div>

                                        <div class="col-md-4">
                                            <p class="fw-bold">Total</p>
                                            <p class="text-muted">Rp. {{ item.total }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-kirim" role="tabpanel" aria-labelledby="pills-kirim-tab">
                            <div v-for="item in cart">
                                <div v-if='item.status_payment == "kirim"'>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="fw-bold">Invoice Number</p>
                                            <p class="text-muted">{{ item.invoice_number }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Status</p>
                                            <p class="badge bg-primary text-light">Dikirim</p>
                                        </div>

                                        <div class="col-md-4">
                                            <p class="fw-bold">Total</p>
                                            <p class="text-muted">Rp. {{ item.total }}</p>
                                        </div>
                                        <hr>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Check Resi</p>
                                            <p class="text-muted"><a href="#">JNGNOAIS09182039812</a></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Pengiriman</p>
                                            <p class="text-muted"><a href="#" style="background-color: red; color:white;">J&T</a></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold">Selesai</p>
                                            <p class="text-muted"><button class="btn btn-xs btn-success">selesai</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                            <div v-for="item in cart">
                                <div v-if='item.status_payment == "selesai"'>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="fw-bold">Invoice Number</p>
                                            <p class="text-muted">{{ item.invoice_number }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fw-bold">Status</p>
                                            <p class="badge bg-success text-light">{{ item.status_payment }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fw-bold">Total</p>
                                            <p class="text-muted">Rp. {{ item.total }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fw-bold">Beri Feedback</p>
                                            <div id="wrapper">
                                                <form action="" method="post">
                                                    <p class="clasificacion">
                                                        <input id="radio1" type="radio" name="estrellas" value="5">
                                                        <label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4">
                                                        <label for="radio2">&#9733;</label>
                                                        <input id="radio3" type="radio" name="estrellas" value="3">
                                                        <label for="radio3">&#9733;</label>
                                                        <input id="radio4" type="radio" name="estrellas" value="2">
                                                        <label for="radio4">&#9733;</label>
                                                        <input id="radio5" type="radio" name="estrellas" value="1">
                                                        <label for="radio5">&#9733;</label>
                                                    </p>
                                                    <p class="float-end">
                                                        <input type="submit" value="kirim" name="kirim" />
                                                    </p>
                                                </form>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Version -->
            <div class="order-complete-mobile">
                <h3 class="mt-3 mb-4 fw-bold text-muted text-center">Order Complete</h3>
            </div>
        </div>
        <div class="text-muted text-center mt-5 mb-5" v-else>
            <img src="https://cdn1.iconfinder.com/data/icons/free-98-icons/32/sad-512.png" width="200" alt="">
            <h3>Data Kosong Masih Kosong</h3>
        </div>
    </div>
</div>

<script src="/js/order/order.js"></script>
<?= $this->endSection(); ?>