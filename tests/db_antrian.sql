create table if not exist `Admin`(
	id_a char(2) not null primary key,
	username varchar(16),
	password varchar(16)
);

create table if not exist `Antrian`(
	id varchar(16) not null primary key,
	nim varchar(9),
	tanggal date,
	keperluan enum('admininistrasi', 'konsultasi'),
	prodi enum('mif', 'tif', 'tkk'),
	terpanggil boolean
);

insert into `Admin` (id_a, username, password) values
	('a1', 'adminmif', 'adminmif'),
	('a2', 'admintif', 'admintif'),
	('a3', 'admintkk', 'admintkk');

