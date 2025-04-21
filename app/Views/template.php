<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Template 1</title>
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables/DataTables-1.13.6/css/dataTables.bootstrap5.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/sweetalert/sweetalert2.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/select2/css/select2-bootstrap-5-theme.css">
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/croppie/croppie.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/summernote/summernote-lite.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/var.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/komponen.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" />

  <script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>plugins/datatables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>plugins/datatables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url(); ?>plugins/select2/js/select2.min.js"></script>
  <script src="<?= base_url(); ?>plugins/croppie/croppie.js"></script>
  <script src="<?= base_url(); ?>plugins/summernote/summernote-lite.min.js"></script>
  <script src="<?= base_url(); ?>plugins/chart_js/chart.js"></script>
</head>

<body>
  <?= $this->renderSection('modal'); ?>
  <div class="sidebar">
    <div class="atas">
      <a href="#" id="menu-toggle" class="">
        <img src="<?= base_url(); ?>assets/icon/menu.png" alt="gambar" />
      </a>
    </div>
    <div class="tengah">
      <ul>
        <li>
          <a href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>assets/icon/home.png" alt="gambar" /><span>Home</span></a>
        </li>
      </ul>
    </div>
    <div class="bawah">
      <a href="#" id="logout" class="">
        <img src="<?= base_url(); ?>assets/icon/logout.png" alt="gambar" />
      </a>
    </div>
  </div>
  <div class="header">
    <div class="isi">
      <?= $this->renderSection('title'); ?>
      <div class="profile">
        <img src="<?= base_url(); ?>assets/icon/profile.png" alt="gambar" />
      </div>
    </div>
  </div>
  <!-- Content -->
  <?= $this->renderSection('content'); ?>
  <script>
    $(".boot-select").select2({
      theme: 'bootstrap-5',
    });
  </script>
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
</body>

</html>