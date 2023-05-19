<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold">Transaksi</h1>
      <a class="btn btn-primary" href="<?= base_url('admin/transactions/create') ?>">Tambah Transaksi</a>
    </div>

    <div class="overflow-x-auto rounded-lg border-2 border-gray-600">
      <table class="table table-zebra w-full">
        <!-- head -->
        <thead>
          <tr>
            <th class="text-base">No</th>
            <th class="text-base">Kode Order</th>
            <th class="text-base">Nama</th>
            <th class="text-base">Jenis Transaksi</th>
            <th class="text-base">Total Harga</th>
            <th class="text-base">Tanggal</th>
            <th class="text-base">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($transactions as $row): ?>
          <tr>
            <th><?= $i ?></th>
            <th><?= $row['id'] ?></th>
            <th><?= $users[$row['user_id']] ?></th>
            <th><?= $row['is_sales'] ? 'Penjualan' : 'Pembelian' ?></th>
            <th><?= number_to_currency($prices[$row['id']], 'IDR') ?></th>
            <th><?= $row['updated_at'] ?></th>
            <th><a href="<?= base_url("/admin/transactions/" . $row['id']) ?>" class="text-violet-500 underline text-center">Detail</a></th>
          </tr>
          <?php $i++;endforeach; ?>
        </tbody>
      </table>
    </div>
<?= $this->endSection(); ?>
