<?= $this->extend('./layouts/auth'); ?>

<?= $this->section('content'); ?>

  <main class="container">
    <article>
      <h1 style="text-align: center;">Login</h1>

      <p>
        <?php
        if(session()->getFlashData('msg')){
          echo session()->getFlashData('msg');
        }
        ?>
      </p>

      <form action="login/auth" method="post">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="password">
        <button>Submit</button>
      </form>
      <p>Don't have account ? <a href="<?= base_url('register') ?>">Register</a></p>
    </article>
  </main>

<?= $this->endSection() ?>