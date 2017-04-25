<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);

	$id = strtoupper($dataObjek->data->id);
	$namaOLT = strtoupper($dataObjek->data->namaOLT);
	$lat = strtoupper($dataObjek->data->lat);
	$lon = strtoupper($dataObjek->data->lon);
	$ipOLT = strtoupper($dataObjek->data->ipOLT);
	$lokasi = strtoupper($dataObjek->data->lokasi);
	$keterangan = strtoupper($dataObjek->data->keterangan);

	$perintah_sql = "update olt set namaOLT='{$namaOLT}', lat='{$lat}', lon='{$lon}', ipOLT='{$ipOLT}', lokasi='{$lokasi}', keterangan='{$keterangan}' WHERE id='{$id}' ";
	$result = mysqli_query($koneksi,$perintah_sql);
	$respon = " ";
	if ($result) {
		$respon = "berhasil meyimpan data";
	}else{
		$respon = "gagal simpan data";
	};
	echo $respon;
?>