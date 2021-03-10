<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Bukti Antrian</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>mods/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>mods/print.css">
</head>
<body>
	<div class="container-fluid wrapper">
		<div class="row">
			<h1 class="mx-auto text-center">Nomor Antrian JTI</h1>
		</div>
		<div class="row mt-4">
			<div class="w-25 mx-auto border border-primary text-center">
				<h3 id="b1"><?php echo $prodi; ?></h3>
				<h4 id="b2"><?php echo $no_antrian; ?></h4>
			</div>
		</div>
		<div class="row mt-4">
			<ul class="mx-auto">
				<li>Tanggal antri: <?php echo $tanggal; ?></li>
				<li>Nama: <?php echo $nama; ?></li>
				<li>Prodi: <?php echo $prodi; ?></li>
			</ul>
		</div>
		<div class="row mt-4">
			<h4 class="mx-auto text-center">JURUSAN TEKNOLOGI INFORMASI<br>
			POLITEKNIK NEGERI JEMBER</h4>
		</div>
	</div>
	<?php $this->load->view("_partials/footer"); ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>mods/jspdf/jspdf.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url();?>mods/tanggal.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){
			cetak();
		});
		function cetak(){
			var pdf = new jsPDF();
			pdf.addHTML($('body').first(), function() {
		        pdf.save("BuktiAntrian_<?php echo date('d-m-Y'). '_'. $nama; ?>.pdf");
		    });
		}
	</script>

</body>
</html>