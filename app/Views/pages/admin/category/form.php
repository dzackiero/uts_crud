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
          <input type="text" value="<?= $category['name'] ?? '' ?>" placeholder="Nama Kategori" name="name" id="name" class="input input-bordered w-full" required />
        </div>

        <?php if(!isset($category)): ?>
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