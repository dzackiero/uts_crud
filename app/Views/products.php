<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>
  <main class="container lg:max-w-screen-xl mx-auto px-5 flex flex-col gap-6 py-8">
    <h1 class="font-semibold text-3xl"><?= $title ?></h1>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php foreach($products as $product): ?>
      <div class="card bg-base-100 shadow-xl ">
        <img class="w-full h-64 bg-white object-contain" src="<?= $product['image'] ?>" >
        <div class="card-body">
          <h2 class="card-title"><?= $product['name'] ?></h2>
          <p class="line-clamp-2"><?= $product['description'] ?></p>
          <div class="card-actions justify-end pt-3">
            <a class="btn btn-primary" href="<?= base_url(['product', $product['id']]) ?>">Buy Now</a>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </main>  
<?= $this->endSection(); ?>