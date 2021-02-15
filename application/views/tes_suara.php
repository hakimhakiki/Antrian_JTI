<!DOCTYPE html>
<html>
<head>
	<title>Test suara</title>
</head>
<body>
<audio id="bell" src="<?php echo base_url('audio/Airport_Bell.mp3');?>"></audio>
<audio id="urut" src="<?php echo base_url('audio/antrian/nomor-urut.wav');?>"></audio>
<audio id="s1" src="<?php echo base_url('audio/antrian/1.wav');?>"></audio>
<audio id="s2" src="<?php echo base_url('audio/antrian/2.wav');?>"></audio>
<audio id="loket" src="<?php echo base_url('audio/antrian/loket.wav');?>"></audio>
<button id="tombol_bell">Play Bell</button>
<button id="stop_bell">Stop Bell</button>

<script type="text/javascript" src="<?php echo base_url('mods/jquery/jquery-3.3.1.min.js');?>"></script>
<script type="text/javascript">
	$("#tombol_bell").on("click", function(){
		document.getElementById("bell").pause();
		document.getElementById("bell").currentTime = 0;
		document.getElementById("bell").play();
		totalWaktu = document.getElementById("bell").duration*1000;

		//playnomerurutnya
		setTimeout(function(){
			document.getElementById("urut").pause();
			document.getElementById("urut").currentTime=0;
			document.getElementById("urut").play();
		}, totalWaktu);
		totalWaktu=totalWaktu+1000;

		setTimeout(function(){
			document.getElementById("s1").pause();
			document.getElementById("s1").currentTime=0;
			document.getElementById("s1").play();
		}, totalWaktu);
		totalWaktu=totalWaktu+1000;

		setTimeout(function(){
			document.getElementById("loket").pause();
			document.getElementById("loket").currentTime=0;
			document.getElementById("loket").play();
		}, totalWaktu);
		totalWaktu=totalWaktu+1000;

		setTimeout(function(){
			document.getElementById("s2").pause();
			document.getElementById("s2").currentTime=0;
			document.getElementById("s2").play();
		}, totalWaktu);
		totalWaktu=totalWaktu+1000;
	});
	$("#stop_bell").on("click", function(){
		document.getElementById("bell").pause();
		document.getElementById("bell").currentTime = 0;
	});
</script>
</body>
</html>