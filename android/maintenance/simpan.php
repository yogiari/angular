<?php 
//	header('Access-Control-Allow-Origin: *');
	include '../koneksi.php';
	//json dari keterangan
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	$namaLabel = strtoupper($dataObjek->nama_label);
	$keterangan = strtoupper($dataObjek->keterangan);
	$file = "uploads/".$dataObjek->foto.".jpg";
	$id_tiket = $dataObjek->foto;
	$tanggal = date("Y-m-d");

	$target_path = "uploads/".basename($_FILES['file']['name']);	
		if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
			echo "Upload success";
		} else {
			echo "gagal";
		};
	
	
	$sql="UPDATE tiket SET status='selesai',tanggal_selesai='$tanggal',keterangan='$keterangan' WHERE id_tiket=$id_tiket";
	
	//eksekusi insert database
	if ($keterangan=="") {
		$respon = "harus diisi semua";
	}  else {
		//eksekusi upload gambar		
		//$perintah_sql = "insert into jurnal (label_odp,keterangan,foto) values ('$namaLabel','$keterangan','$file')";
		$result = mysqli_query($koneksi,$sql);
		if ($result) {
			$respon = "berhasil meyimpan data";
		}else{
			$respon = "gagal simpan data";
		};
	}
	echo $respon;
	
	
?>