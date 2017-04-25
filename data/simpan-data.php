<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	
	$nama_label = strtoupper($dataObjek->data->nama_label);
	$nama_frame = strtoupper($dataObjek->data->nama_frame);
	$latitude = strtoupper($dataObjek->data->lat);
	$longitude = strtoupper($dataObjek->data->lon);
	// $lokasi = strtoupper($dataObjek->data->lokasi);
	$distribusi = strtoupper($dataObjek->data->distribusi_core);
	$olt = strtoupper($dataObjek->data->olt);
	$lokasi = strtoupper($dataObjek->data->lokasi);
	$vendor =  strtoupper($dataObjek->data->vendor);
	$tglUT = strtoupper($dataObjek->data->tglUT);

	$query="select * from odp";
	$hasil = mysqli_query($koneksi,$query);
	while ($row=mysqli_fetch_array($hasil)){
		// $row_id=$row['id'];
		$row_label=$row['nama_label'];
	}


	if ($nama_label=="" || $nama_frame=="" || $latitude=="" || $longitude==""  || $lokasi=="" || $distribusi=="" || $olt=="" || $vendor=="" || $tglUT=="") {
		$respon = "harus diisi semua";
	} elseif ($nama_label==$row_label) {
		$respon="data sudah ada ";
	} else {		
		$perintah_sql = "insert into odp (nama_label,nama_frame,vendor,lat,lon,distribusi_core,olt,lokasi,tanggal_uji_terima) values 
			('$nama_label','$nama_frame','$vendor','$latitude','$longitude','$distribusi','$olt','$lokasi','$tglUT')";
		$result = mysqli_query($koneksi,$perintah_sql);
		$respon = " ";
		if ($result) {
			$respon = "berhasil meyimpan data";
		}else{
			$respon = "gagal simpan data";
		};
	}
	echo $respon;
	// print_r($cores);
	print_r($nama_frame);
	
?>