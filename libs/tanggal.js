function getDateNow(){
	// Membuat program untuk tanggal
    var dt = new Date();
    day = dt.getDay();
    date = dt.getDate();
    month = dt.getMonth() + 1;
    year = dt.getFullYear();
    _format = "" + day2hari(day) + ", " + date + "-" + month + "-" + year;
    return _format;
}

function day2hari(day) {
	// Mengubah 0-6 menjadi Minggu-Sabtu
	switch (day) {
		case 0: return "Minggu"; break;
		case 1:	return "Senin"; break;
		case 2:	return "Selasa"; break;
		case 3:	return "Rabu"; break;
		case 4:	return "Kamis"; break;
		case 5:	return "Jum`at"; break;
		case 6:	return "Sabtu"; break;
	}
}