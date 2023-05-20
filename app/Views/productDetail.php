<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>
  <main class="container lg:max-w-screen-lg mx-auto px-5 flex flex-col py-8 ">
    <div class="flex gap-16">
      <img class="lg:w-96 lg:h-96 object-contain bg-white border rounded-lg border-white p-3" src="<?= $product['image'] ?>" alt="">
      <div class="flex flex-col gap-10 max-w-xl">
        <div class="flex flex-col gap-3">
          <h1 class="text-4xl font-semibold"><?= $product['name'] ?></h1>
          <p class="text-lg"><?= $product['description'] ?></p>
        </div>
        <form class="flex flex-col gap-3" method="post" action="/addchart">
          <h1 class="text-3xl font-semibold"><?= "Rp. " . number_format($product['price'],0, '.', ',') ?></h1>
          <label for="" class="flex gap-2 items-center">
            <p class="text-xl">Qty: </p>
            <input type="number" placeholder="Quanitity" name="quantity" id="quantity" value="1" min="1" class="input input-bordered w-20" />
          </label>
            <input type="hidden" name="id" id="id" value="<?= $product['id'] ?>">
            <input type="hidden" name="name" id="name" value="<?= $product['name'] ?>">
            <input type="hidden" name="price" id="price" value="<?= $product['price'] ?>">
            <button class="btn btn-secondary  max-w-xs">Add to Chart</button>
        </form>
      </div>
    </div>
  </main>
<?= $this->endSection() ?>