<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div id="purchaseControl">
    <div class="container">
        <h1 class="mt-5">Daftar Pembelian</h1>
        <table class="table table-bordered table-stripped table-hover mt-5 mb-5">
            <tr>
                <thead>
                    <th>Invoice Number</th>
                    <th>ID Customer</th>
                    <th>Total</th>
                    <th>Status Pembayaran</th>
                    <th>Verifikasi Pembayaran</th>
                    <th>Aksi</th>
                </thead>
            </tr>
            <tbody>
                <tr v-for="item in purchase">
                    <td>{{ item.invoice_number }}</td>
                    <td>{{ item.id_customer }}</td>
                    <td>{{ item.total }}</td>
                    <td>
                        <p class=" badge bg-info text-dark" v-if="item.status_payment=='konfirmasi'">{{ item.status_payment }}</p>
                        <p class=" badge bg-warning text-dark" v-if="item.status_payment=='kemas'">{{ item.status_payment }}</p>
                        <p class=" badge bg-primary text-dark" v-if="item.status_payment=='kirim'">{{ item.status_payment }}</p>
                        <p class=" badge bg-success text-dark" v-if="item.status_payment=='selesai'">{{ item.status_payment }}</p>
                    </td>
                    <td>{{ item.verify_payment }}</td>
                    <td>
                        <div v-if="item.status_payment == 'kemas'">
                            <button class="btn bg-dark text-light w-100" @click='action(item)'>Sedang Dikirim</button>
                        </div>
                        <div v-else-if="item.status_payment == 'konfirmasi'">
                            <button class="btn bg-dark text-light w-100" @click='action(item)'>Sedang Dikemas</button>
                        </div>
                        <!-- <button class="btn bg-dark text-light w-100" @click='action(item)'>Sedang Dikemas</button> -->
                        <p class=" badge bg-info text-dark w-100" v-else-if="item.status_payment=='kirim'">Menunggu Konfirmasi Customer</p>
                        <!-- </div -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="/js/admin/purchaseControl.js"></script>
<?= $this->endSection() ?>