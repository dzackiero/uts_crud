<?= $this->extend("./layouts/dashboard"); ?>
<?= $this->section("content"); ?>
    <div class="flex justify-between">
      <h1 class="text-3xl font-semibold">Karyawan</h1>
      <a class="btn btn-primary" href="<?= base_url('admin/employees/create') ?>">Tambah Karyawan</a>
    </div>

    <div class="overflow-x-auto rounded-lg border-2 border-gray-600">
      <table class="table table-zebra w-full">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
              <th class="text-base">Nama</th>
              <th class="text-base">Email</th>
              <th class="text-base">Role</th>
              <th class="text-base">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <?php $i = 1; ?>
          <?php foreach($employees as $row): ?>
          <tr>
            <th><?= $i ?></th>
            <th><?= $row['name'] ?></th>
            <th><?= $row['email'] ?></th>
            <th><?= $roles[$row['role']] ?></th>
            <th><a href="<?= base_url("/admin/employees/" . $row['id']) ?>" class="text-violet-500 underline text-center">Edit</a></th>
          </tr>
          <?php $i++;endforeach; ?>
        </tbody>
      </table>
    </div>
<?= $this->endSection(); ?>