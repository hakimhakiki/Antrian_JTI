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
    <script type="text/javascript" src="<?php echo base_url('mods/howler/howler.min.js');?>"></script>
    <script>
      // List semua audio yang akan diputar
      var audio_list = [];
      // apakah masih memutar defult=false
      var isPlay = false;
      $(document).ready(function(){
        loop = setInterval(function(){

          // Blok program
          mif();
          tif();
          tkk();
          international();
          // var isPlay = false;
          
          if(isPlay===false && audio_list.length!=0){
            isPlay = true;
            play();
            // isPlay = false;
          }
        }, 1000);
        
      });
      // Blok program untuk prodi mif
      function mif(){
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getMif');?>",
            dataType: "JSON",
            success: function(data){
              if(data.nomor==""){
                $("#antri_mif").prop("innerHTML", "---");
              }else{
                $("#antri_mif").prop("innerHTML", data.nomor);
              }
              if(data.sisa==""){
                $("#sisa_mif").prop("innerHTML", "0");
              }else{
                $("#sisa_mif").prop("innerHTML", data.sisa);
              }
              if(data.panggil==0 && data.nomor!=""){
                // kunci status pada tabel
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciMif')?>",
                  error: function(response){
                    console.log(response.responseText);
                  }
                });
                console.log("dipanggil: "+data.nomor);
                // play sound/ add playlist
                addlist(data.files);
              }else{
                // console.log("tidak ada: "+data.nomor);
              }
            }
          });
      }
      // Blok program untuk prodi tif
      function tif(){
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getTif');?>",
            dataType: "JSON",
            success: function(data){
              if(data.nomor==""){
                $("#antri_tif").prop("innerHTML", "---");
              }else{
                $("#antri_tif").prop("innerHTML", data.nomor);
              }
              if(data.sisa==""){
                $("#sisa_tif").prop("innerHTML", "0");
              }else{
                $("#sisa_tif").prop("innerHTML", data.sisa);
              }
              if(data.panggil==0 && data.nomor!=""){
                // kunci status pada tabel
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciTif')?>",
                  error: function(response){
                    console.log(response.responseText);
                  }
                });
                console.log("dipanggil: "+data.nomor);
                // play sound/ add playlist
                addlist(data.files);
              }else{
                // console.log("tidak ada: "+data.nomor);
              }
            }
          });
      }
      // Blok program untuk prodi tkk
      function tkk(){
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getTkk');?>",
            dataType: "JSON",
            success: function(data){
              if(data.nomor==""){
                $("#antri_tkk").prop("innerHTML", "---");
              }else{
                $("#antri_tkk").prop("innerHTML", data.nomor);
              }
              if(data.sisa==""){
                $("#sisa_tkk").prop("innerHTML", "0");
              }else{
                $("#sisa_tkk").prop("innerHTML", data.sisa);
              }
              if(data.panggil==0 && data.nomor!=""){
                // kunci status pada tabel
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciTkk')?>",
                  error: function(response){
                    console.log(response.responseText);
                  }
                });
                console.log("dipanggil: "+data.nomor);
                // play sound/ add playlist
                addlist(data.files);
              }else{
                // console.log("tidak ada: "+data.nomor);
              }
            }
          });
      }
      // Blok program untuk prodi international
      function international(){
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('antrian/getInt');?>",
            dataType: "JSON",
            success: function(data){
              if(data.nomor==""){
                $("#antri_int").prop("innerHTML", "---");
              }else{
                $("#antri_int").prop("innerHTML", data.nomor);
              }
              if(data.sisa==""){
                $("#sisa_int").prop("innerHTML", "0");
              }else{
                $("#sisa_int").prop("innerHTML", data.sisa);
              }
              if(data.panggil==0 && data.nomor!=""){
                // kunci status pada tabel
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('antrian/kunciInt')?>",
                  error: function(response){
                    console.log(response.responseText);
                  }
                });
                console.log("dipanggil: "+data.nomor);
                // play sound/ add playlist
                addlist(data.files);
              }else{
                // console.log("tidak ada: "+data.nomor);
              }
            }
          });
      }

      
      /*
      Fungsi dibawah ini untuk bagian audio yang meliputi:
      1. rumus terbilang
      2. number to speech
      3. playlist
      */

      // playlist: audio_list
      function addlist(data_array){
        files=["<?php echo base_url('audio/antrian/')?>nomor-antrian.wav"];
        files = files.concat(data_array);
        audio_list.push(files);
      }
      function play(){
        // if(audio_list.length!=0){
          tmp = audio_list[0];
          // console.log("audio: " + audio_list);
          autoplay(0, tmp);
          delete audio_list[0];
          audio_list.shift();
        // }
      }

      // autoplay (with next) function goes here
      function autoplay(i, list){
        if (i != 'x'){
          var sound = new Howl({
            src: [list[i]],
            preload: true,
            onplay: function(){
              isPlay = true;
            },
            onend: function(){
              if((i + 1) == list.length){
                isPlay = false;
                autoplay('x', list);
              }
              else{
                autoplay(i + 1, list);
              }
            }
          });
          sound.play();
          // if(sound.isPlaying){
          //   isPlay = true;
          //   // sound.pause()
          // }else{
            
          // }
        }
      }
    </script>
  </body>
</html>
