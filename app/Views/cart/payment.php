<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div id="payment">
        <h3 class="mt-5 mb-5 fw-bold text-muted text-center">Daftar Produk Yang Belum Di Bayar</h3>
        <div class="card mb-5">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for='item in list' v-if="item.verify_payment == 0">
                            <td>{{ item.invoice_number }}</td>
                            <td>Rp. {{ item.total }}</td>
                            <td><a :href="'/user/purchase/payment/view/detail/' + item.id_purchase" class="btn green-custom text-light">Selesaikan Pembayaran</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="/js/order/payment.js"></script>
<?= $this->endSection(); ?>