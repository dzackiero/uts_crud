<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold"><?= $title ?></h1>
    </div>

    <div class="rounded-lg border-2 border-gray-600">
      <form action="<?= $method ?>" class="w-full px-10 py-6 flex flex-col gap-3" method="post">

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Nama</span>
          </label>
          <input type="text" value="<?= $product['name'] ?? '' ?>" placeholder="Nama Produk" name="name" id="name" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Harga</span>
          </label>
          <input type="number" value="<?= $product['price'] ?? '' ?>" placeholder="Harga Barang" name="price" id="price" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Modal</span>
          </label>
          <input type="number" value="<?= $product['cost'] ?? '' ?>" placeholder="Harga Barang" name="cost" id="cost" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Stok</span>
          </label>
          <input type="number" value="<?= $product['stock'] ?? '' ?>" placeholder="Stock Barang" name="stock" id="stock" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Kategori</span>
          </label>
          <select class="select select-bordered" name="category" id="category">
            <option selected disabled>Pilih Kategori</option>
            <?php foreach ($categories as $category):?>
              <option value="<?= $category['id'] ?>" <?= isset($product) && $category['id'] == $product['category_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <?php if(!isset($product)): ?>
          <div class="pt-3">
            <button class="btn btn-primary px-10">Submit</button>
          </div>
          <?php else: ?>
            <div class="pt-3 flex gap-5">
              <button class="btn btn-primary px-10">Update</button>
              <a class="btn btn-error text-white px-10" href="<?= current_url() . '/delete' ?>">Delete</a>
          </div>
        <?php endif ?>
      </form>
    </div>
<?= $this->endSection(); ?>