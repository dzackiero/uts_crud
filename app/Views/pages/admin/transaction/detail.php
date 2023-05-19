<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold"><?= $title ?></h1>
      <button class="btn btn-primary px-10">Invoice</button>
    </div>
    

    <div class="flex flex-col gap-10">
      <!-- Order Details -->
      <div class="rounded-lg border-2 border-gray-600 w-full px-10 py-6 flex flex-col gap-4">
        <h1 class="text-3xl font-semibold">Detail Transaksi</h1>
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Pembuat Transaksi</span>
          </label>
          <input type="text" value="<?= $user['name'] ?? '' ?>" placeholder="Nama Lengkap" name="name" id="name" class="input input-bordered w-full cursor-default" readonly />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Jenis Transaksi</span>
          </label>
          <select class="select select-bordered cursor-default" name="is_sales" id="is_sales" disabled>
            <option selected disabled>Pilih Jenis Transaksi</option>
            <option value="true" <?= isset($transaction) && $transaction['is_sales'] == true ? 'selected' : '' ?>>Penjualan</option>
            <option value="false" <?= isset($transaction) && $transaction['is_sales'] == false ? 'selected' : '' ?>>Pembelian</option>
          </select>
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Alamat</span>
          </label>
            <textarea class="textarea textarea-bordered cursor-default" name="address" id="address" rows="3" readonly><?= $transaction['address'] ?? '' ?></textarea>
        </div> 

      </div>

      <!-- Order Items -->
      <div class="rounded-lg border-2 border-gray-600 w-full px-10 py-6 flex flex-col gap-6">
        <div class="flex gap-3">
          <h1 class="text-3xl font-semibold">Jumlah Produk :</h1>
          <input type="number" class="input input-bordered w-24 cursor-default" id="productCount" name="productCount" value="<?= sizeof($orderItems) ?>" readonly/>
        </div>

        <!-- Product List -->
        <div class="flex flex-col gap-6" id="productContainer">
          
          <!-- Product Loop -->
          <?php foreach($orderItems as $key => $orderItem): ?>
            <div class="rounded-lg border-2 border-gray-600 w-full px-8 py-4 flex flex-col gap-3">
              <h1 class="text-lg font-semibold">Produk #<?= $key + 1 ?></h1>
              <div class="flex gap-2">
                <div class="form-control w-full">
                  <label class="label">
                    <span class="label-text">Nama Produk</span>
                  </label>
                  <input type="text" value="<?= $products[$orderItem['product_id']] ?? '' ?>" name="product_name" id="product_name" class="input input-bordered w-full cursor-default" readonly />
                </div>
                <div class="form-control w-full">
                  <label class="label">
                    <span class="label-text">Harga Unit</span>
                  </label>
                  <input type="text" value="<?=  number_to_currency($orderItem['item_price'], "IDR") ?? '' ?>" name="item_price" id="item_price" class="input input-bordered w-full cursor-default" readonly />
                </div>
                <div class="form-control w-full">
                  <label class="label">
                    <span class="label-text">Quantity</span>
                  </label>
                  <input type="text" value="<?= $orderItem['quantity'] ?? '' ?>" name="quantity" id="quantity" class="input input-bordered w-full cursor-default" readonly />
                </div>
              </div>
            </div>
          <?php endforeach ?>

          <div class="rounded-lg border-2 border-gray-600 w-full px-8 py-4 flex flex-col gap-3">
            <h1 class="text-2xl font-semibold">TOTAL : <?= number_to_currency($total, "IDR") ?></h1>
          </div>
        
        </div>
      </div>

    </div>
<?= $this->endSection(); ?> 