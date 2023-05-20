<?= $this->extend('./layouts/auth'); ?>

<?= $this->section('content'); ?>

  <main class="container">
    <article>
      <h1 style="text-align: center;">Register</h1>

      <?= validation_list_errors() ?? '' ?>
      
      <form action="<?= base_url('register/store') ?>" method="POST">
        <label for="email">
          Email
          <input type="email" name="email" id="email" placeholder="Email">
        </label>
        <label for="password">
          Password
          <input type="password" name="password" id="password" placeholder="Password">
        </label>
        <label for="passconf">
          Confirm Password
          <input type="password" name="passconf" id="passconf" placeholder="Confirm Password">
        </label>
        <button value="submit">Submit</button>
      </form>
    </article>
  </main>

<?= $this->endSection() ?>