<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header"); ?>
  </head>
  <body>
    <div class="wrapper">
      <div class="main-navbar">
        <div class="navbar navbar-expand-sm navbar-light bg-light">
          <ul class="navbar-nav">
            <span class="navbar-brand">Sistem Antrian Mahasiswa</span>
            <!-- <li class="nav-item rounded">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item rounded active">
              <a href="#" class="nav-link">Antrian</a>
            </li>
            <li class="nav-item rounded">
              <a href="#" class="nav-link">Bantuan</a>
            </li>
            <li class="nav-item rounded">
              <a href="#" class="nav-link">Logout</a>
            </li> -->
          </ul>
        </div>
      </div>
      <form class="middle" id="form-antrian" action="<?php echo base_url('Formantrian/confirm'); ?>" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama">Nama singkat</label>
              <input type="text" id="nama" name="nama" class="form-control" autofocus required />
              <div class="text-danger"><?php echo form_error('nama'); ?></div>
            </div>
            <!-- <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" />
            </div> -->
            <div class="form-group">
              <label for="keperluan">Keperluan untuk</label>
              <select class="form-control" id="keperluan" name="keperluan" required>
                <option value="" selected>---</option>
                <option value="konsul">Konsultasi</option>
                <option value="admin">Administrasi</option>
              </select>
              <div class="text-danger"><?php echo form_error('keperluan'); ?></div>
            </div>
            <div class="form-group">
              <label for="prodi">Ke Prodi</label>
              <select class="form-control" id="prodi" name="prodi" required>
                <option value="" selected>---</option>
                <option value="mif">Manajemen Informatika</option>
                <option value="tif">Teknik Informatika</option>
                <option value="tkk">Teknik Komputer</option>
                <option value="int">MIF/TIF International</option>
              </select>
              <div class="text-danger"><?php echo form_error('prodi'); ?></div>
            </div>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-lg">
              Konfirmasi & cetak bukti
            </button>
          </div>
        </div>
      </form>
    </div>
    <?php $this->load->view("_partials/footer"); ?>
    <script>
      $(document).ready(function () {
        if($("#keperluan").val() == ""){
          $("#prodi").prop("disabled", true);
        }

        $("#keperluan").on("change", function (event) {
          if ($("#keperluan").val() == "") {
            $("#prodi").val("");
            $("#prodi").prop("disabled", true);
          } else {
            $("#prodi").prop("disabled", false);
          }
        });

        /* Script dibawah ini hanya untuk melakukan test submit */
        // START
        // $("#form-antrian").submit(function(){
        //   nama = $("#nama").val();
        //   nim = $("#nim").val();
        //   keperluan = $("#keperluan").val();
        //   prodi = $("#prodi").val();

        //   alert("" + nama + " perlu " + keperluan + " ke prodi " + prodi + "");
        // });
        // END
        
      });
    </script>
  </body>
</html>
