<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div id="purchase">

    <!-- Desktop Version -->
    <div class="purchase-desktop">
        <div class="container mt-5 mb-5">
            <div class="title text-center">
                <h4 class="text-muted">SHOPPING CART <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                    </svg> <span class="fw-bold text-dark">PEMBAYARAN </span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                    </svg> <span class="text-muted">ORDER COMPLETE</span></h4>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card p-5">
                        <span class="h6 fw-bold mb-3">Total Tagihan : Rp. {{ cart.total }}</span>
                        <!-- <img src="https://logos-download.com/wp-content/uploads/2017/03/BCA_logo_Bank_Central_Asia.png" width="100"> -->
                        <p>No Rek Penjual : {{ no_rek }}</p>
                        <span class="h6 fw-bold mb-3">Bank Tujuan</span>
                        <select class="form-control mb-3">
                            <option>BCA</option>
                        </select>
                        <span class="h6 fw-bold mb-3">Informasi Rekening Pembeli</span>
                        <div class="d-flex">
                            <div class="w-50">
                                <p>Nama Pembeli</p>
                                <input type="text" placeholder="Contoh : Alian" class="form-control" require>
                            </div>

                            <div class="w-50">
                                <p>No. Rekening Pembeli</p>
                                <input type="text" placeholder="123198312" class="form-control" require>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-6 p-3">
                    <div class="card p-5">
                        <h5 class="text-muted">Ringkasan Pembayaran</h5>
                        <table>
                            <tr>
                                <td class=" text-muted">Total Transaksi</td>
                                <td class="text-muted float-end">Rp. {{ cart.total }}</td>
                            </tr>
                            <tr>
                                <td class=" text-muted">Biaya Layanan</td>
                                <td class=" float-end text-muted">Gratis</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="text-muted">Total Tagihan</td>
                                <td class="float-end text-muted">Rp. {{ cart.total }}</td>
                            </tr>
                        </table>
                        <div class="input-group mt-3">
                            <div class="custom-file">
                                <p>Upload Bukti Pembayaran (.jpg, .png)</p>
                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-danger w-100 mt-3" @click='cancelPayment'>Batalkan Pembayaran</button>
                        <button class="btn btn-custom green-custom w-100 mt-3 text-light" @click='payment' v-if="cart.total > 0">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile version -->
    <div class="mobile-purchase">
        <div class="container mt-5 mb-5">
            <h2 class="h2 text-center fw-bold text-muted">Metode Pembayaran</h2>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card p-5">
                        <span class="h6 fw-bold mb-3">Total Tagihan : Rp. {{ cart.total }}</span>
                        <!-- <img src="https://logos-download.com/wp-content/uploads/2017/03/BCA_logo_Bank_Central_Asia.png" width="100"> -->
                        <p>No Rek Penjual : {{ no_rek }}</p>
                        <span class="h6 fw-bold mb-3">Bank Tujuan</span>
                        <select class="form-control mb-3">
                            <option>BCA</option>
                        </select>
                        <span class="h6 fw-bold mb-3">Informasi Rekening Pembeli</span>

                        <div class="w-100">
                            <p>Nama Pembeli</p>
                            <input type="text" placeholder="Contoh : Alian" class="form-control" require>
                        </div>
                        <div class="w-100 mt-3">
                            <p>No. Rekening Pembeli</p>
                            <input type="text" placeholder="123198312" class="form-control" require>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="card p-5">
                        <h5 class="text-muted">Ringkasan Pembayaran</h5>
                        <table>
                            <tr>
                                <td class=" text-muted">Total Transaksi</td>
                                <td class="text-muted float-end">Rp. {{ cart.total }}</td>
                            </tr>
                            <tr>
                                <td class=" text-muted">Biaya Layanan</td>
                                <td class=" float-end text-muted">Gratis</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="text-muted">Total Tagihan</td>
                                <td class="float-end text-muted">Rp. {{ cart.total }}</td>
                            </tr>
                        </table>
                        <div class="input-group mt-3">
                            <div class="custom-file">
                                <p>Upload Bukti Pembayaran (.jpg, .png)</p>
                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-custom green-custom w-100 mt-3 text-light" @click='payment'>Bayar Sekarang</button>
                    <button class="btn btn-danger w-100 mt-1" @click='cancelPayment'>Batalkan Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="/js/order/purchase_detail.js"></script>
<?= $this->endSection(); ?>