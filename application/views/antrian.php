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
        setInterval(function(){

          // Blok program untuk prodi mif
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getMif');?>",
            success: function(data){
              if(data==""){
                $("#antri_mif").prop("innerHTML", "---");
              }else{
                $("#antri_mif").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/sisaMif');?>",
            success: function(data){
              if(data==""){
                $("#sisa_mif").prop("innerHTML", "0");
              }else{
                $("#sisa_mif").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/panggilMif');?>",
            success: function(data){
              if(data==0){
                // play sound
                var audio = new Audio("<?php echo base_url('mods/sno.mp3');?>");
                audio.play();
                // kunci database
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciMif')?>"
                });
              }
              // audio.pause();
              // audio.currentTime = 0;
            }
          });

          // Blok program untuk prodi tif
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getTif');?>",
            success: function(data){
              if(data==""){
                $("#antri_tif").prop("innerHTML", "---");
              }else{
                $("#antri_tif").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/sisaTif');?>",
            success: function(data){
              if(data==""){
                $("#sisa_tif").prop("innerHTML", "0");
              }else{
                $("#sisa_tif").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/panggilTif');?>",
            success: function(data){
              if(data==0){
                // play sound
                var audio = new Audio("<?php echo base_url('mods/sno.mp3');?>");
                audio.play();
                // kunci database
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciTif')?>"
                });
              }
              // audio.pause();
              // audio.currentTime = 0;
            }
          });

          // Blok program untuk prodi tkk
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getTkk');?>",
            success: function(data){
              if(data==""){
                $("#antri_tkk").prop("innerHTML", "---");
              }else{
                $("#antri_tkk").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/sisaTkk');?>",
            success: function(data){
              if(data==""){
                $("#sisa_tkk").prop("innerHTML", "0");
              }else{
                $("#sisa_tkk").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/panggilTkk');?>",
            success: function(data){
              if(data==0){
                // play sound
                var audio = new Audio("<?php echo base_url('mods/sno.mp3');?>");
                audio.play();
                // kunci database
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciTkk')?>"
                });
              }
              // audio.pause();
              // audio.currentTime = 0;
            }
          });

          // Blok program untuk prodi international
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getInt');?>",
            success: function(data){
              if(data==""){
                $("#antri_int").prop("innerHTML", "---");
              }else{
                $("#antri_int").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/sisaInt');?>",
            success: function(data){
              if(data==""){
                $("#sisa_int").prop("innerHTML", "0");
              }else{
                $("#sisa_int").prop("innerHTML", data);
              }
            }
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/panggilInt');?>",
            success: function(data){
              if(data==0){
                // play sound
                var audio = new Audio("<?php echo base_url('mods/sno.mp3');?>");
                audio.play();
                // kunci database
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciInt')?>"
                });
              }
              // audio.pause();
              // audio.currentTime = 0;
            }
          });
        }, 1000);
        
        // $("#antri_mif").prop("innerHTML", "000");
        // $("#antri_tif").prop("innerHTML", "000");
        // $("#antri_tkk").prop("innerHTML", "000");
        // $("#antri_int").prop("innerHTML", "000");
        // $("#sisa_mif").prop("innerHTML", "0");
        // $("#sisa_tif").prop("innerHTML", "0");
        // $("#sisa_tkk").prop("innerHTML", "0");
        // $("#sisa_int").prop("innerHTML", "0");
      });
    </script>
  </body>
</html>
