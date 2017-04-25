<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	
	$nik = strtoupper($dataObjek->data->nik);
	$id_frame_odp = strtoupper($dataObjek->data->id_frame_odp);

	$query="select * from okupansi";
	$hasil = mysqli_query($koneksi,$query);
	while ($row=mysqli_fetch_array($hasil)){
		// $row_id=$row['id'];
		$row_id_frame_odp=$row['id_frame_odp'];
		$row_nik=$row['nik_petugas'];
	}


	if ($nik=="" || $id_frame_odp=="" ) {
		$respon = "harus diisi semua";
	} 
	// elseif ($row_id_frame_odp=$id_frame_odp & $row_nik=$nik) {
	// 	$respon="error input";
	// } 
	else {		
		$perintah_sql = "insert into okupansi (nik_petugas,id_frame_odp) values 
			('$nik','$id_frame_odp')";
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
	// print_r($dataObjek->data->core);
	
?>