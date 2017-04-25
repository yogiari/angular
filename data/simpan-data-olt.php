<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	$id = strtoupper($dataObjek->data->id);
	$namaOlt = strtoupper($dataObjek->data->namaOLT);
	$lat = strtoupper($dataObjek->data->lat);
	$lon = strtoupper($dataObjek->data->lon);
	$ipOlt = strtoupper($dataObjek->data->ipOLT);
	$lokasi = strtoupper($dataObjek->data->lokasi);
	$keterangan = strtoupper($dataObjek->data->keterangan);

	$query="select * from olt";
	$hasil = mysqli_query($koneksi,$query);
	while ($row=mysqli_fetch_array($hasil)){
		$row_OLT=$row['namaOLT'];
	}


	if ($namaOlt=="" || $lat=="" || $lon=="" || $ipOlt=="" || $lokasi=="" || $keterangan=="") {
		$respon = "harus diisi semua";
	} elseif ($namaOlt==$row_OLT) {
		$respon="data sudah ada ";
	} else {
		
		$perintah_sql = "insert into olt (id,namaOLT,lat,lon,ipOLT,lokasi,keterangan) values ('{$id}','{$namaOlt}','{$lat}','{$lon}','{$ipOlt}','{$lokasi}','{$keterangan}')";
		$result = mysqli_query($koneksi,$perintah_sql);
		$respon = " ";
		if ($result) {
			$respon = "berhasil meyimpan data";
		}else{
			$respon = "gagal simpan data";
		};

	}
	echo $respon;
?>