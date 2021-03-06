<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('_partials/header'); ?>
  </head>
  <body>
    <div class="wrapper">
      <div class="main-navbar">
        <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand h1" href="#">Sistem Antrian Admin Prodi</a>
          <div class="nav-text">Tanggal: <span id="my_tgl"></span></div>
        </nav>
      </div>
      <div class="middle">
        <!-- Disini untuk side bar -->
        <div class="bg-light sidebar">
          <div class="list-group top-sidebar">
            <a href="#" class="list-group-item list-group-item-action active"
              >Antrian</a
            >
            <a href="#" class="list-group-item list-group-item-action"
              >Pengaturan</a
            >
          </div>
          <div class="list-group bottom-sidebar">
            <a
              href="<?php echo base_url('admin/login/logout')?>"
              class="list-group-item list-group-item-action text-danger border-danger"
              >Keluar/Logout</a
            >
          </div>
        </div>
        <div class="main-content bg-white">
          <div class="half">
            <div class="box-text bg-light" id="antrian">
              <h4>Antrian</h4>
              <h5><?php echo strtoupper($prodi);?>-<?php echo $nomorurut;?></h5>
            </div>
            <div class="box-text bg-light" id="tersisa">
              <h4>Tersisa</h4>
              <h5><?php echo $tersisa; ?></h5>
            </div>
            <form action="<?php echo base_url('admin/home/panggil');?>" method="POST">
              <button class="btn btn-primary btn-lg" style="" id="btn-panggil" type="submit">
                <i class="fa fa-paper-plane"></i> Panggil
              </button>
            </form>
            <form action="<?php echo base_url('admin/home/selanjutnya');?>" method="POST">
              <button class="btn btn-primary btn-lg" style="" id="btn-lanjut" type="submit">
                Nomor Selanjutnya <i class="fa fa-arrow-right"></i>
              </button>
            </form>
          </div>

          <div class="half">
            <h3>Status Kerja</h3>
            <label class="switch">
              <input type="checkbox" id="slider_kerja" onchange="action_kerja()"/>
              <span class="slider"></span>
            </label>
            <div class="text-success" id="aktif-kerja">Aktif</div>
            <div class="text-danger" id="tidak-kerja">Tidak Aktif</div>
          </div>
        </div>
      </div>
      <div class="bottom">
        <h3>Sisa Antrian</h3>
        <div class="fixtable">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($tabel_antrian as $ta) {?>
              <tr>
                <td><?php echo substr($ta->id, 10); ?></td>
                <td><?php echo $ta->nama; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php $this->load->view('_partials/footer'); ?>
    <script>
      $(document).ready(function () {
        // Membuat program untuk tanggal
        var dt = new Date();
        day = dt.getDay();
        date = dt.getDate();
        month = dt.getMonth() + 1;
        year = dt.getFullYear();
        _format = "" + day2hari(day) + ", " + date + "-" + month + "-" + year;
        $("#my_tgl").prop("innerHTML", _format);

        getAktif();
      });

      function getAktif(){
        $.ajax({
          type: "GET",
          url: "<?php echo base_url('admin/home/getAktifKerja');?>",
          success: function(data) {
            console.log("onget: " + data);
            if (data == "aktif"){
              $("#slider_kerja").prop("checked", true);
              console.log("aktif selected");
              labelKerja(true);
            }else if(data == "tidak aktif"){
              $("#slider_kerja").prop("checked", false);
              console.log("tidak aktif selected");
              labelKerja(false);
            }
          }
        });
      }

      // Ambil antrian selanjutnya
      function getNext(){
        //setinterval();
      }

      function labelKerja(status){
        if(status){
          $("#aktif-kerja").show();
          $("#tidak-kerja").hide();
        }else{
          $("#aktif-kerja").hide();
          $("#tidak-kerja").show();
        }
      }

      // Untuk checking checkbox slider
      function action_kerja() {
        if ($("#slider_kerja").prop("checked")) {
          // Kirim info slider aktif
          console.log("Slider checked");
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('admin/home/setAktifKerja');?>",
            data: {state: "aktif"},
            success: function(data){
              console.log("oke");
            }
          });
          labelKerja(true);
        } else {
          // Kirim info slider non-aktif
          console.log("Shutdown");
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('admin/home/setAktifKerja');?>",
            data: {state: "tidak aktif"},
            success: function(data){
              console.log("oke");
            }
          });
          labelKerja(false);
        }
      }

      function day2hari(day) {
        switch (day) {
          case 0:
            return "Minggu";
            break;
          case 1:
            return "Senin";
            break;
          case 2:
            return "Selasa";
            break;
          case 3:
            return "Rabu";
            break;
          case 4:
            return "Kamis";
            break;
          case 5:
            return "Jum`at";
            break;
          case 6:
            return "Sabtu";
            break;
        }
      }
    </script>
  </body>
</html>
