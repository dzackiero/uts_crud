<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

    <title>UTS TEMPLATE</title>
</head>
<body>
  <!-- MASUKAN KOMPONEN YANG SELALU DIPAKAI DI TIAP VIEW -->

  <!-- Navbar -->
  <nav class="navbar bg-base-200">
    <div class="flex-1">
      <a class="btn btn-ghost normal-case text-2xl hidden md:flex" href="<?= base_url() ?>">Pusat<span class="text-violet-500">Komputer</span></a>
      <div>
        <ul class="menu menu-horizontal px-1">
          <li><a href="<?= base_url('product') ?>">Semua Produk</a></li>
          <li tabindex="0">
            <a>
              Kategori
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
            </a>
            <ul class="p-2 bg-base-200 z-50">
              <?php foreach($categories as $category): ?>
              <li class="z-50"><a class="z-50 bg-base-200" href="<?= base_url(['category',$category['id']]) ?>"><?= $category['name'] ?></a></li>
              <?php endforeach ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="flex-none">
      <?php if(isLogin()): ?>
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle">
            <div class="indicator">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
              <?php if(isset($cart)): ?>
                <span class="badge badge-sm indicator-item"><?= $cart['count'] ?></span>
              <?php endif ?>
            </div>
          </label>
          <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
            <?php if(isset($cart)): ?>
              <div class="card-body">
                <span class="font-bold text-lg"><?= $cart['count'] ?> Items</span>
                <span class="text-info">Subtotal: IDR <?= $cart['total'] ?></span>
                <div class="card-actions">
                  <button class="btn btn-primary btn-block">View cart</button>
                </div>
              </div>
            <?php else: ?>
              <div class="card-body">
                <span class="font-semibold text-lg text-center p-3 text-violet-500">Tidak ada item</span>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_kids_avatar_user_profile_icon_149314.png" />
            </div>
          </label>
          <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li><a href="<?= base_url('logout') ?>">Logout</a></li>
          </ul>
        </div>
      <?php else: ?>
        <a href="<?= base_url('login') ?>" class="btn btn-primary">Login</a>
      <?php endif ?>
    </div>
  </nav>
  
  <!-- me-render content dari view (di folder pages) yang meng-extend layout ini-->
  <?= $this->renderSection('content'); ?>
</body>
</html>