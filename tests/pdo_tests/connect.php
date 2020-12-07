<html>
	<head>
		<title>Connection PDO</title>
	</head>
	<body>
		<h2>Coba koneksi PDO</h2>
		<?php
			$host = "localhost";
			$dbname = "lalapan";
			$user = "root";
			$pass = "";

			try{
				// PDO Mysql
				$dbh = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
				echo "Koneksi berhasil dilakukan";
			}catch (PDOException $e){
				echo $e->getMessage();
			}
		?>
	</body>
</html>
