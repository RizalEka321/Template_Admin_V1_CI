<?= $this->extend('template'); ?>
<?= $this->section('title'); ?>
<div class="sub-menu">
  <a href="<?= base_url(session()->get('hak_akses') . '/' . 'berita'); ?>" class="list active"><img src="<?= base_url(); ?>assets/icon/berita.png" alt="gambar" />Berita</a>|
  <a href="<?= base_url(session()->get('hak_akses') . '/' . 'kategori'); ?>" class="list"><img src="<?= base_url(); ?>assets/icon/kategori.png" alt="gambar" />Kategori</a>
</div>
<?= $this->endsection(); ?>
<?= $this->section('content'); ?>
<div class="main">
  <div class="tab-container">
    <div class="tabs">
      <button class="tab active" data-tab="events">Events</button>
      <button class="tab" data-tab="materials">Materials</button>
      <button class="tab" data-tab="videos">Videos</button>
      <button class="tab" data-tab="doot">Doot</button>
    </div>
    <div class="tab-content" id="events">
      <div class="filters">
        <div class="filter">
          <label for="event-type">Select Event Type</label>
          <select id="event-type">
            <option>Event type</option>
          </select>
        </div>
        <div class="filter">
          <label for="audience-type">Select Audience Type</label>
          <select id="audience-type">
            <option>Audience type</option>
          </select>
        </div>
        <button class="btn primary">Explore Other Events</button>
        <button class="btn clear">Clear filters</button>
      </div>
    </div>
    <div class="tab-content" id="materials" style="display: none">
      <!-- content -->
    </div>
    <div class="tab-content" id="videos" style="display: none">
      <!-- content -->
    </div>
    <div class="tab-content" id="doot" style="display: none">
      <!-- content -->
    </div>
  </div>
  <style>
    .tab-container {
      border-radius: 8px;
      overflow: hidden;
      margin: 0 auto;
      display: flex;
      justify-content: center;
      flex-direction: column;
      min-width: 832px;
      width: 100%;
      filter: drop-shadow(2px 4px 6px #e0e0e0);
    }

    .tabs {
      display: flex;
      max-width: fit-content;
      margin-left: 20px;
    }

    .tabs .tab {
      flex: 1;
      padding: 10px 20px;
      text-align: center;
      cursor: pointer;
      background: #f1f1f1;
      border: none;
      outline: none;
      font-size: 15px;
      color: #989797;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      margin-right: 2px;
      border: 1px solid #e7e7e7;
    }

    .tabs .tab:last-child {
      margin-right: 0;
    }

    .tabs .tab.active {
      background: #fff;
      border: 1px solid transparent;
      /* border-bottom: 2px solid #007bff; */
      font-weight: bold;
      color: #333;
      position: relative;
      top: 1px;
    }

    .tabs .tab:hover:not(.active) {
      border: 1px solid transparent;
      background-color: #e2e1e1;
      border-bottom: 2px solid #989797;
    }

    .tab-content {
      background: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-top: 1px solid #e0e0e0;
      min-height: 100px;
      border-radius: 15px;
    }

    .tab-content .filters {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .tab-content .filters .filter {
      display: flex;
      flex-direction: column;
    }

    .tab-content .filters .filter label {
      font-size: 15px;
      padding-bottom: 2px;
    }

    .tab-content .filters .filter select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background: #fff;
      font-size: 14px;
      color: #333;
      width: 200px;
    }

    .tab-content .filters .btn {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      outline: none;
      margin-left: auto;
      margin-top: 20px;
    }

    .tab-content .filters .btn.primary {
      background: #007bff;
      color: #fff;
      margin-right: 20px;
    }

    .tab-content .filters .btn.clear {
      background: transparent;
      color: #007bff;
      text-decoration: underline;
    }
  </style>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const target = tab.getAttribute('data-tab');

        contents.forEach(content => {
          if (content.id === target) {
            content.style.display = 'block';
          } else {
            content.style.display = 'none';
          }
        });
      });
    });
  });

  $('#isi').summernote({
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
    ],
    dialogsInBody: true
  });

  $('#btn_add').click(function(e) {
    $('#tambah_data').removeClass('hidden');
    $('#datanya').addClass('hidden');
    reset_form();
  });

  $('#btn_close').click(function(e) {
    $('#tambah_data').addClass('hidden');
    $('#datanya').removeClass('hidden');
    reset_form();
  });

  var table = $('#tabelku').DataTable({
    "searching": true,
    "processing": true,
    "responsive": true,
    "serverSide": true,
    "paging": true,
    "lengthChange": true,
    "ordering": false,
    "info": false,
    "autoWidth": false,
    "language": {
      "zeroRecords": "Tidak ditemukan data yang sesuai",
      "infoEmpty": "Tidak ada data yang tersedia",
      "paginate": {
        'previous': '<i class="fa-solid fa-arrow-left"></i>',
        'next': '<i class="fa-solid fa-arrow-right"></i>'
      }
    },
    "aLengthMenu": [
      [10, 25, 50],
      [10, 25, 50]
    ],
    "ajax": {
      "url": "<?= base_url(session()->get('hak_akses') . '/' . 'berita/list'); ?>",
      "type": "POST",
    },
    "columnDefs": [{
        className: "text-center",
        width: "12%",
        targets: [0],
      },
      {
        className: "text-center",
        width: "5%",
        targets: [1],
      },
      {
        className: "text-center",
        width: "20%",
        targets: [2],
      },
      {
        className: "text-center",
        targets: [3],
      }
    ],
  });

  $('#tabelku_length').hide()
  $('#tabelku_filter').hide();

  $('#cari').keyup(function(e) {
    var cari = $(this).val();
    $('#tabelku_filter input').val(cari).trigger('keyup');
  });

  $('#page').change(function(e) {
    var page = $(this).val();
    $('select[name = "tabelku_length"]').val(page).trigger('change');
  });

  function reload() {
    table.ajax.reload();
  }

  function reset_form() {
    $('#form_tambah')[0].reset();
    $('#form_tambah').attr('action', '<?= base_url(session()->get('hak_akses') . '/' . 'berita/save'); ?>');
    $('#badan-title').html('TAMBAH DATA USER');
    $('.boot-select').val('').trigger('change');
    $('.error-message').empty();
    $('input').removeClass('error');
    $('textarea').removeClass('error');
    $('select').removeClass('error');
    $('#isi').summernote('reset');
  }

  $(function() {
    $('#form_tambah').submit(function(event) {
      event.preventDefault();
      event.stopImmediatePropagation();
      var url = $(this).attr('action');
      var formData = new FormData($(this)[0]);

      Swal.fire({
        title: "Sedang memproses",
        html: "Mohon tunggu sebentar...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        willOpen: () => {
          Swal.showLoading();
        }
      });

      $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          Swal.close();
          $('.error-message').empty();
          $('input').removeClass('error');
          $('textarea').removeClass('error');
          $('select').removeClass('error');
          if (data.errors) {
            $.each(data.errors, function(key, value) {
              $('#error-' + key).text('*' + value);
              $('#' + key).addClass('error');
            });
            Swal.fire({
              title: 'Error',
              text: 'Datanya ada yang kurang',
              icon: 'error',
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              toast: true
            });
          } else {
            $('#datanya').removeClass('hidden');
            $('#tambah_data').addClass('hidden');
            Swal.fire({
              title: 'Sukses',
              text: 'Data berhasil disimpan',
              icon: 'success',
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              toast: true
            });
            reload();
            reset_form();
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.close();
          Swal.fire({
            title: 'Error',
            text: 'Terjadi kesalahan jaringan error message: ' +
              errorThrown,
            icon: 'error',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            toast: true
          });
        }
      });
    });
  });

  function edit_data(id) {
    $('#form_tambah')[0].reset();
    $('#form_tambah').attr('action', '<?= base_url(session()->get('hak_akses') . '/' . 'berita/update?q='); ?>' + id);

    Swal.fire({
      title: "Sedang memproses",
      html: "Mohon tunggu sebentar...",
      allowOutsideClick: false,
      allowEscapeKey: false,
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading();
      }
    });

    $.ajax({
      url: "<?= base_url(session()->get('hak_akses') . '/' . 'berita/edit') ?>",
      type: "POST",
      data: {
        q: id
      },
      dataType: "JSON",
      success: function(data) {
        Swal.close();
        $('#judul').val(data.judul);
        $('#isi').summernote('code', data.isi);
        $('#kategori_id').val(data.kategori_id).trigger('change');
        $('#tambah_data').removeClass('hidden');
        $('#datanya').addClass('hidden');
        $('#badan-title').html('EDIT DATA USER');

      },
      error: function(jqXHR, textStatus, errorThrown) {
        Swal.close();
        Swal.fire({
          title: 'Error',
          text: 'Terjadi kesalahan jaringan error message: ' + errorThrown,
          icon: 'error',
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          toast: true
        });
      }
    });
  }

  function delete_data(id) {
    Swal.fire({
      title: 'Hapus Berita',
      text: "Apakah anda yakin!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Sedang memproses",
          html: "Mohon tunggu sebentar...",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          willOpen: () => {
            Swal.showLoading();
          }
        });

        $.ajax({
          url: "<?php echo site_url('berita/delete') ?>",
          type: "POST",
          data: {
            q: id
          },
          dataType: "JSON",
          success: function(data) {
            Swal.close();
            Swal.fire({
              title: 'Hapus!',
              text: 'User berhasil Dihapus',
              icon: 'success',
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              toast: true
            });
            reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.close();
            Swal.fire({
              title: 'Error',
              text: 'Terjadi kesalahan jaringan error message: ' +
                errorThrown,
              icon: 'error',
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              toast: true
            });
          }
        });
      }
    })
  };
</script>
<?= $this->endsection(); ?>
<?= $this->section('modal'); ?>
<div class="modal fade" id="modalCover">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-icon">
          <div class="border-profil img-bulat">
            <img id="preview" src="<?= base_url(); ?>assets/icon/Berita.png"
              class="img-fluid" />
          </div>
        </div>
        <div class="isi-modal">
          <h1>Upload Cover Berita</h1>
          <p>Silahkan upload cover berita</p>
          <div class="browse-foto">
            <a href="javascript:void(0)" class="btn-browse-foto" id="btn-browse">
              <img src="<?= base_url(); ?>assets/icon/Upload.png" />
            </a>
            <input id="input-file" class="hidden" type="file" name="cover"
              accept="image/jpg,image/jpeg,image/png">
            <input type="hidden" id="id_berita" />
            <p>Click Icon Browse Untuk Mengupload cover berita </p>
            <div class="row">
              <div class="text-center">
                <div class="btn-group">
                  <button type="button" class="btn3" data-bs-dismiss="modal">
                    <div class="btn-text">
                      <i class="fa-solid fa-x"></i>&nbsp;&nbsp;CANCEL
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="crop-foto text-center hidden">
            <div id="upload-foto" class="upload-ft"> </div>
            <div class="btn-group">
              <button type="button" id="btn-ok" class="btn1 me-2">
                <div class="btn-text">
                  <i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;&nbsp;UPLOAD
                </div>
              </button>
              <button onclick="reset_upload()" type="button" class="btn3"
                data-bs-dismiss="modal">
                <div class="btn-text">
                  <i class="fa-solid fa-x"></i>&nbsp;&nbsp;CANCEL
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function upload_cover(id) {
    $('#id_berita').val(id);
    $('#modalCover').modal('show');
  }

  $(document).ready(function() {
    $('#btn-browse').click(function(e) {
      var file = $(this).siblings('#input-file');
      $(file).trigger('click');
    });


    $uploadCrop = $('#upload-foto').croppie({
      enableExif: true,
      viewport: {
        width: 300,
        height: 200,
        type: 'square'
      },
      boundary: {
        width: 350,
        height: 250
      }
    });
  });

  function reset_upload() {
    $('#foto-file').val("");
    rawImg = "";
    tempFilename = "";
    imageId = "";
    fileName = "";
    $('.browse-foto').removeClass('hidden');
    $('.crop-foto').addClass('hidden');
    $('#id_berita').val("");;
  }

  var $uploadCrop, tempFilename, rawImg, imageId, fileName;
  $(function() {
    $("#input-file").change(function(e) {
      fileName = e.target.files[0].name;
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext ==
          "jpg")) {
        imageId = $(this).data('id');
        tempFilename = $(this).val();
        readFile(this);
      } else {
        Swal.fire('FORMAT FOTO TIDAK DIDUKUNG',
          'Format file tidak didukung silahkan pilih foto dengan format yang benar', 'error');
        $('#input-file').val("");
      }
    });
  });

  function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        rawImg = e.target.result;
        $uploadCrop.croppie('bind', {
          url: rawImg
        }).then(function() {});
        $('.browse-foto').addClass('hidden');
        $('.crop-foto').removeClass('hidden');
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      Swal.fire('BROWSER TIDAK MENDUKUNG', 'Browser yang anda gunakan tidak mendukung Fasilitas ini', 'error');
      foto_for_upload = null;
      $('#input-file').val("");
    }
  }

  $(document).ready(function() {
    $('#btn-ok').click(function() {
      $uploadCrop.croppie('result', {
        type: "canvas",
        size: "original",
        format: "png",
        quality: 1
      }).then(function(response) {
        var file_asli = response;
        Swal.fire({
          title: "Sedang memproses",
          html: "Mohon tunggu sebentar...",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          willOpen: () => {
            Swal.showLoading();
          }
        });
        $.ajax({
          url: "<?php echo site_url('lokasi/upload') ?>",
          type: "POST",
          data: {
            foto: file_asli,
            id: $('#id_berita').val(),
          },
          dataType: "JSON",
          success: function(data) {
            Swal.close();
            if (!data.status) {
              Swal.fire('Gagal Upload',
                'Terjadi kesalahan pada proses upload. Pastikan Anda telah memilih file foto yang ingin diupload!',
                'error');
            } else {
              $('#modalCover').modal('hide');
              $('.browse-foto').removeClass('hidden');
              $('.crop-foto').addClass('hidden');
              reset_upload();
              reload();
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.close();
            Swal.fire({
              title: 'Error',
              text: 'Terjadi kesalahan jaringan error message: ' + errorThrown,
              icon: 'error',
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              toast: true
            });
          }
        });
      });
    });
  });
</script>
<?= $this->endsection(); ?>