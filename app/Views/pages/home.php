<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>

<!-- Content -->

<div class="p-10 flex flex-col gap-10">
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

  <main class="grid grid-cols-5 gap-8">
  <?php foreach($products as $product): ?>
    <div class="card bg-base-100 shadow-xl">
      <figure><img class="bg-cover" src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/32e90900-2918-4715-a6c8-c2b9eb82d172/revolution-6-running-shoes-5k6Jh6.png" alt="Shoes" /></figure>
      <div class="card-body">
        <h2 class="card-title">Barang <?= $product ?></h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, dolorem!</p>
        <div class="card-actions justify-end">
          <button class="btn btn-primary">Buy Now</button>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </main>
</div>


<?= $this->endSection(); ?>