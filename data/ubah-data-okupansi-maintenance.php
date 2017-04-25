<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	
	$id_okupansi=$dataObjek->data->id_okupansi;
	$nik = strtoupper($dataObjek->data->nik);
	$id_frame_odp = strtoupper($dataObjek->data->id_frame_odp);

	$perintah_sql = "update okupansi set nik_petugas='{$nik}', id_frame_odp='{$id_frame_odp}' WHERE id_okupansi='{$id_okupansi}' ";
	$result = mysqli_query($koneksi,$perintah_sql);
	$respon = " ";
	if ($result) {
		$respon = "berhasil ubah data";
	}else{
		$respon = "gagal ubah data";
	};
	echo $respon;
?>