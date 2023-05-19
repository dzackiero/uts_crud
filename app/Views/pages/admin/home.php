<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>

  <div class="card bg-base-200 shadow-xl border-l-2 border-violet-500">
    <div class="card-body">
      <h2 class="card-title text-2xl text-violet-500">Total Laba</h2>
      <p class="text-5xl">Rp120.000</p>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="card bg-base-200 shadow-xl border-l-2  border-violet-500">
      <div class="card-body">
        <h2 class="card-title text-2xl text-violet-500">Jumlah Karyawan</h2>
        <p class="text-5xl">120</p>
      </div>
    </div>

    <div class="card bg-base-200 shadow-xl border-l-2  border-violet-500" >
      <div class="card-body">
        <h2 class="card-title text-2xl text-violet-500">Jumlah Customer</h2>
        <p class="text-5xl">120</p>
      </div>
    </div>

    <div class="card bg-base-200 shadow-xl border-l-2  border-violet-500">
      <div class="card-body">
        <h2 class="card-title text-2xl text-violet-500">Jumlah Transaksi</h2>
        <p class="text-5xl">120</p>
      </div>
    </div>
  </div>

<?= $this->endSection(); ?>
