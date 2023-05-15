<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Pico.css (Ini bisa diganti sesuai keinginan) -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" /> -->

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

    <title>UTS TEMPLATE</title>
</head>
<body>
  <!-- MASUKAN KOMPONEN YANG SELALU DIPAKAI DI TIAP VIEW -->

  <!-- me-render content dari view (di folder pages) yang meng-extend layout ini-->
  <?= $this->renderSection('content'); ?>
</body>
</html>