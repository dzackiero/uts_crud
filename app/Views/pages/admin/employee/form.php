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
          <input type="text" value="<?= $employee['name'] ?? '' ?>" placeholder="Nama Lengkap" name="name" id="name" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" value="<?= $employee['email'] ?? '' ?>" placeholder="example@example.com" name="email" id="email" class="input input-bordered w-full" required />
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Nomor Telepon</span>
          </label>
          <input type="text" value="<?= $employee['phone'] ?? '' ?>" placeholder="08xxxxxx" name="phone" id="phone" class="input input-bordered w-full" required />
        </div>

        <?php if(!isset($employee)): ?>
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" name="password" placeholder="password" id="password" class="input input-bordered w-full cursor-default" required/>
        </div>
        <?php endif ?>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Role</span>
          </label>
          <select class="select select-bordered" name="role" id="role" <?= isset($employee) ? 'disabled' : '' ?>>
            <option selected disabled>Pilih Role</option>
            <?php foreach ($roles as $key => $role):?>
              <option value="<?= $key ?>" <?= isset($employee) && $employee['role'] == $key ? 'selected' : '' ?>><?= $role ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <?php if(!isset($employee)): ?>
          <div class="pt-3">
            <button class="btn btn-primary px-10">Submit</button>
          </div>
          <?php else: ?>
            <div class="pt-3 flex gap-5">
              <button class="btn btn-primary px-10">Update</button>
              <a class="btn btn-error text-white px-10" href="<?= base_url('admin/employees/'.$employee['id'].'/delete') ?>">Delete</a>
          </div>
        <?php endif ?>
      </form>
    </div>
<?= $this->endSection(); ?>