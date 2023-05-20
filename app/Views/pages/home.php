<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>

<!-- Content -->

<div class="container lg:max-w-screen-xl mx-auto px-5 flex flex-col gap-6 py-8">
  <div>
    <div class="carousel w-full rounded-md mb-3">
      <div id="item1" class="carousel-item w-full h-96">
        <img src="https://dynamicwallpaper.club/landing-vids/1.png" class="w-full" />
      </div> 
      <div id="item2" class="carousel-item w-full h-96">
        <img src="https://dynamicwallpaper.club/landing-vids/1.png" class="w-full" />
      </div> 
      <div id="item3" class="carousel-item w-full h-96">
        <img src="https://dynamicwallpaper.club/landing-vids/1.png" class="w-full" />
      </div> 
      <div id="item4" class="carousel-item w-full h-96">
        <img src="https://dynamicwallpaper.club/landing-vids/1.png" class="w-full" />
      </div>
    </div> 
    <div class="flex justify-center w-full py-2 gap-2">
      <a href="#item1" class="btn btn-md">1</a> 
      <a href="#item2" class="btn btn-md">2</a> 
      <a href="#item3" class="btn btn-md">3</a> 
      <a href="#item4" class="btn btn-md">4</a>
    </div>
  </div>

  <main class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
  </main>
</div>


<?= $this->endSection(); ?>