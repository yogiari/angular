<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	$nama_label = strtoupper($dataObjek->data->nama_label);
	$lat = strtoupper($dataObjek->data->latitude);
	$lon = strtoupper($dataObjek->data->longitude);
	$lokasi = strtoupper($dataObjek->data->lokasi);
	$distribusi = strtoupper($dataObjek->data->distribusi);
	$core = strtoupper($dataObjek->data->core);
	$kapasitas = strtoupper($dataObjek->data->kapasitas);
	$keterangan = strtoupper($dataObjek->data->keterangan);

	$perintah_sql = "update odp set latitude='{$lat}', longitude='{$lon}', lokasi='{$lokasi}', distribusi='{$distribusi}', core='{$core}', kapasitas='{$kapasitas}', keterangan='{$keterangan}' WHERE nama_label='{$nama_label}' ";
	$result = mysqli_query($koneksi,$perintah_sql);
	$respon = " ";
	if ($result) {
		$respon = "berhasil meyimpan data";
	}else{
		$respon = "gagal simpan data";
	};
	echo $respon;
?>