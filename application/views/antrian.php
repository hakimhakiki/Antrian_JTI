<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('_partials/header'); ?>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-primary">
      <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>mods/jti.svg" style="max-width: 250px" alt="Antrian JTI"></a>
      <div class="navbar-text" style="font-size: 24px;">Sistem Antrian Admin Prodi JTI</div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 border main-block">
          <h2>MIF</h2>
          <h3 id="antri_mif">---</h3>
        </div>
        <div class="col-md-3 border main-block">
          <h2>TIF</h2>
          <h3 id="antri_tif">---</h3>
        </div>
        <div class="col-md-3 border main-block">
          <h2>TKK</h2>
          <h3 id="antri_tkk">---</h3>
        </div>
        <div class="col-md-3 border main-block">
          <h2>International</h2>
          <h3 id="antri_int">---</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 border main2-block">
          <h3>Tersisa</h3>
          <p id="sisa_mif"></p>
        </div>
        <div class="col-md-3 border main2-block">
          <h3>Tersisa</h3>
          <p id="sisa_tif"></p>
        </div>
        <div class="col-md-3 border main2-block">
          <h3>Tersisa</h3>
          <p id="sisa_tkk"></p>
        </div>
        <div class="col-md-3 border main2-block">
          <h3>Tersisa</h3>
          <p id="sisa_int"></p>
        </div>
      </div>
    </div>
    <footer class="fixed-bottom font-weight-bold text-center" style="font-size:18pt; padding-bottom: 20px;">Kunjungi kami di http://jti.polije.ac.id/antrianjti</footer>
    <?php $this->load->view('_partials/footer'); ?>
    <script>
      $(document).ready(function () {
        $("#antri_mif").prop("innerHTML", "000");
        $("#antri_tif").prop("innerHTML", "000");
        $("#antri_tkk").prop("innerHTML", "000");
        $("#antri_int").prop("innerHTML", "000");
        $("#sisa_mif").prop("innerHTML", "0");
        $("#sisa_tif").prop("innerHTML", "0");
        $("#sisa_tkk").prop("innerHTML", "0");
        $("#sisa_int").prop("innerHTML", "0");
      });
    </script>
  </body>
</html>
