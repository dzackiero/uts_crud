<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold">Produk</h1>
      <a class="btn btn-primary" href="<?= base_url('admin/products/create') ?>">Tambah Produk</a>
    </div>

    <div class="overflow-x-auto rounded-lg border-2 border-gray-600">
      <table class="table table-zebra w-full">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
              <th class="text-base">Nama</th>
              <th class="text-base">Kategori</th>
              <th class="text-base">Modal Unit</th>
              <th class="text-base">Harga Unit</th>
              <th class="text-base">Stok</th>
              <th class="text-base">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <?php $i = 1; ?>
          <?php foreach($products as $row): ?>
          <tr>
            <th><?= $i ?></th>
            <th><?= $row['name'] ?></th>
            <th><?= $categories[$row['category_id']] ?></th>
            <th><?= $row['cost'] ?></th>
            <th><?= $row['price'] ?></th>
            <th><?= $row['stock'] ?></th>
            <th><a href="<?= base_url("/admin/products/" . $row['id']) ?>" class="text-violet-500 underline text-center">Edit</a></th>
          </tr>
          <?php $i++;endforeach; ?>
        </tbody>
      </table>
    </div>
<?= $this->endSection(); ?>