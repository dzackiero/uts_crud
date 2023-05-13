<?= $this->extend('./layouts/template') ?>

<?= $this->section('content'); ?>
  <main class="container">
    <hgroup>
      <h1>Form Components</h1>
      <p>Component ini di-style menggunakan "Pico.css". Harap hanya ambil component dan jangan hiraukan class-nya. Component disini untuk mengisikan value yang dioper sesuai ke view dari controller menggunakan <b>$namaModel["namaData"]</b></p>
    </hgroup>

  <?php if(getRole()): ?>
    <article>
      <p><b>Session Data</b></p>
      <p>Username (id): <?= session()->get('username') . " (" . session()->get('id') . ")" ?></p>
      <p>Email : <?= session()->get('email') ?></p>
      <p>Role Id : <?= session()->get('roleId') ?></p>
      <p>Role: <?= session()->get('role') ?></p>
    </article>
  <?php endif ?>

    <article>
      <p ><span style="color: aqua;">$namaModel</span><span style="color: yellow;">[</span><span style="color: greenyellow;">'namaData</span><span style="color: yellow;">]</span> <span style="color: coral;">??</span> <span style="color: greenyellow;">''</span></p>
      <p style="text-align: center;">
        Sama dengan kode berikut:
      </p>
      <p>
        if &#40; isset&#40;<span style="color: aqua;">$namaModel</span><span style="color: yellow;">[</span><span style="color: greenyellow;">'namaData</span><span style="color: yellow;">]</span>&#41; &#41; &#123; <br>
        &ensp; <span style="color: purple;">return</span> <span style="color: aqua;">$namaModel</span><span style="color: yellow;">[</span><span style="color: greenyellow;">'namaData</span><span style="color: yellow;">]</span>;<br>
        &#125; else &#123; <br>
        &ensp; <span style="color: purple;">return</span> <span style="color: greenyellow;">''</span>;<br>
        &#125;
      </p>
      <p style="text-align: center;">
        Dimana kode itu mengecek apakah <span style="color: aqua;">$namaModel</span><span style="color: yellow;">[</span><span style="color: greenyellow;">'namaData</span><span style="color: yellow;">]</span> sudah ter-inisialisasi atau belum. Jika sudah, maka akan me-return nilainya sendiri. Namun, jika belum ter-inisialisasi akan me-return <span style="color: greenyellow;">''</span> (String kosong)
      </p>
    </article>

    <!-- Form elements-->
    <section id="form">
      <form>

      <!-- 
        PENJELASAN LOGIC YANG ADA PADA DI VALUE
        
        $namaModel['namaData] ?? ''

        sama saja dengan

        if ( isset($namaModel['namaData]) ) {
          return $namaModel['namaData];
        } else {
          return '';
        }

        Dimana kode itu mengecek apakah $namaModel['namaData] sudah ter-inisialisasi atau belum. Jika sudah, maka akan me-return nilainya sendiri. Namun, jika belum ter-inisialisasi akan me-return '' (String kosong).

        Jadi jika controller mengirimkan data, maka value (isi) dari input tersebut akan berisi data yang telah dikirimkan dari controller

        Jika bingung
        https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-ophttps://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op

      -->

        <!-- Text -->
        <label for="text">Text</label>
        <input type="text" id="text" name="text" placeholder="Text" value="<?= $namaModel['namaData'] ?? '' ?>"/>
        <small>Curabitur consequat lacus at lacus porta finibus.</small>

        <!-- password -->
        <label for="password">password</label>
        <input type="password" id="password" name="password" placeholder="Password" value="<?= $namaModel['namaData'] ?? '' ?>"/>
        <small>Curabitur consequat lacus at lacus porta finibus.</small>


        <!-- 
        ( Condition: Boolean ? if_true_value : if_false_value)

        Dokumentasi : https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
        -->

        <!-- Select -->
        <label for="select">Select</label>
        <select id="select" name="select" required>
          <option value="data1" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data1" ? "selected" : "" ?>>Data 1</option>
          <option value="data2" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data2" ? "selected" : "" ?>>Data 2</option>
        </select>

        <!-- File browser -->
        <label for="file"
          >File browser
          <input type="file" id="file" name="file" value="<?= $namaModel['namaData'] ?? '' ?>"/>
        </label>

        <div class="grid">
          <!-- Date-->
          <label for="date"
            >Date
            <input type="date" id="date" name="date" value="<?= $namaModel['namaData'] ?? '' ?>"/>
          </label>

          <!-- Time-->
          <label for="time"
            >Time
            <input type="time" id="time" name="time" value="<?= $namaModel['namaData'] ?? '' ?>"/>
          </label>

        </div>

        <div class="grid">
          <!-- Checkboxes -->
          <fieldset>
            <legend><strong>Checkboxes</strong></legend>
            <label for="checkbox-1">
              <input type="checkbox" id="checkbox-1" name="checkbox-1" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data1" ? "checked" : "" ?>/>
              Checkbox
            </label>
            <label for="checkbox-2">
              <input type="checkbox" id="checkbox-2" name="checkbox-2" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data2" ? "checked" : "" ?>/>
              Checkbox
            </label>
          </fieldset>

          <!-- Radio buttons -->
          <fieldset>
            <legend><strong>Radio buttons</strong></legend>
            <label for="radio-1">
              <input type="radio" id="radio-1" name="radio" value="radio-1" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data1" ? "checked" : "" ?> />
              Radio button
            </label>
            <label for="radio-2">
              <input type="radio" id="radio-2" name="radio" value="radio-2" <?= isset($namaModel['namaData']) && $namaModel['namaData'] == "data2" ? "checked" : "" ?>/>
              Radio button
            </label>
          </fieldset>

        </div>

        <!-- Buttons -->
        <input type="submit" value="Submit" onclick="event.preventDefault()" />
      </form>
    </section>
    <!-- ./ Form elements-->
  </main>

<?= $this->endSection(); ?>
