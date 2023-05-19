<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold"><?= $title ?></h1>
    </div>
    

    <form action="<?= $method ?>" method="post" class="flex flex-col gap-10">
      <!-- Order Details -->
      <div class="rounded-lg border-2 border-gray-600 w-full px-10 py-6 flex flex-col gap-4">
        <h1 class="text-3xl font-semibold">Detail Transaksi</h1>
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Pembuat Transaksi</span>
          </label>
          <select class="select select-bordered" name="user_id" id="user_id" required>
            <option selected disabled>Pilih User</option>
            <?php foreach ($users as $user):?>
              <option value="<?= $user['id'] ?>" <?= isset($transaction) && $transaction['user_id'] == $user['id'] ? 'selected' : '' ?>><?= $user['name'] . " (".$roles[$user['role']].")" ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Jenis Transaksi</span>
          </label>
          <select class="select select-bordered" name="is_sales" id="is_sales" required>
            <option selected disabled>Pilih Jenis Transaksi</option>
            <option value="true" <?= isset($transaction) && $transaction['is_sales'] == true ? 'selected' : '' ?>>Penjualan</option>
            <option value="false" <?= isset($transaction) && $transaction['is_sales'] == false ? 'selected' : '' ?>>Pembelian</option>
          </select>
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Alamat</span>
          </label>
            <textarea class="textarea textarea-bordered" name="address" id="address" rows="3" required><?= $transaction['address'] ?? '' ?></textarea>
        </div> 

      </div>

      <!-- Order Items -->
      <div class="rounded-lg border-2 border-gray-600 w-full px-10 py-6 flex flex-col gap-6">
        <div class="flex gap-3">
          <h1 class="text-3xl font-semibold">Product Count :</h1>
          <input type="number" class="input input-bordered w-24 cursor-default" id="productCount" name="productCount" value="0" readonly/>
        </div>

        <!-- Product Dropdown -->
        <div class="flex flex-col gap-6" id="productContainer">

        </div>
        <div>
          <button class="btn btn-primary px-10" id="addProduct" type="button">Tambah</button>
        </div>
      </div>
      <!-- Buttons -->
      <?php if(!isset($transaction)): ?>
          <div>
            <button class="btn btn-primary px-10">Submit</button>
          </div>
          <?php else: ?>
            <div class="flex gap-5">
              <button class="btn btn-primary px-10" >Update</button>
              <a class="btn btn-error text-white px-10" href="<?= current_url() . '/delete' ?>">Delete</a>
          </div>
        <?php endif ?>
    </form>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
  <script>
    const btnAdd = document.querySelector("#addProduct");
    const productContainer = document.querySelector("#productContainer");
    
    // Counter
    const productCount = document.querySelector("#productCount");
    let selectElements = document.querySelectorAll('.myselect');
    productCount.value = selectElements.length;


    //All Product Data
    const productsJson = <?=json_encode($products)?>;
    const products = Object.values(productsJson);

    function addProduct() {
      const productParent = document.createElement('div');
      productParent.classList.add("rounded-lg","border-2", "border-gray-600", "w-full", "px-6", "py-4", "flex", "flex-col", "gap-2");
      const formControl = document.createElement('div');
      formControl.classList.add("form-control", "w-full");

      const label = document.createElement("label");
      label.classList.add("label");

      const deleteButton = document.createElement('button');
      deleteButton.setAttribute('type', 'button');
      deleteButton.id = "deleteProduct";
      deleteButton.classList.add('text-red-400', 'hover:text-red-200');
      deleteButton.innerText = "Delete";

      const labelSpan = document.createElement("span");
      labelSpan.classList.add('label-text');
      labelSpan.innerText = "Produk #" + (selectElements.length+1);

      const inputDiv = document.createElement('div');
      inputDiv.classList.add('flex' ,'flex-wrap', 'gap-4');
      
      const quantity = document.createElement('input');
      quantity.classList.add('input' ,'input-bordered');
      quantity.name = "quantity" +productCount.value;
      quantity.placeholder = "Quantity";
      quantity.setAttribute('required', true);
      quantity.value = 1;
      quantity.type = "number";
      quantity.setAttribute('min', '1');

      const productSelect = document.createElement('select');
      productSelect.classList.add('myselect', 'select', 'select-bordered', 'grow');
      productSelect.name = "product" + productCount.value;

      label.appendChild(labelSpan);
      label.appendChild(deleteButton);
      
      formControl.appendChild(label);
      formControl.appendChild(inputDiv);
      
      inputDiv.appendChild(productSelect);
      inputDiv.appendChild(quantity);

      productParent.appendChild(formControl);

      deleteButton.addEventListener('click', (e) => {
        const target = e.target;
        const parentProduct = target.closest('.rounded-lg');
        parentProduct.remove();
        selectElements = document.querySelectorAll('.myselect');
        productCount.value = selectElements.length;
      })
      
      products.forEach((el) => {
        // Create Option
        const option = document.createElement('option');
        option.value = el.id;
        option.innerText = `${el.id} | ${el.name} ${el.price} ${el.cost}`;
        productSelect.appendChild(option);
      })

      // Adding the Select
      productContainer.appendChild(productParent);

      // Adding the counter
      selectElements = document.querySelectorAll('.myselect');
      productCount.value = selectElements.length;
    }

    if(productCount.value <= 0){
      addProduct();
    } 

    // Saat Edit

    btnAdd.addEventListener("click",(e) => {
      addProduct();
    })
  </script>
<?= $this->endSection(); ?>