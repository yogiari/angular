<?php 
//	header('Access-Control-Allow-Origin: *');
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	$odp = strtoupper($dataObjek->id_odp);
	$keterangan = strtoupper($dataObjek->keterangan);
	$tanggal_laporan = strtoupper($dataObjek->tanggal_laporan);
	$petugas_pelapor = strtoupper($dataObjek->petugas_pelapor);
	
	include 'koneksi.php';
//	if($odp=$_GET['odp']){
//        $perintah_sql = "SELECT * FROM odp a JOIN frame_odp b ON a.nama_frame=b.nama_frame JOIN okupansi c ON b.id_frame_odp=c.id_frame_odp JOIN user d ON c.nik_petugas=d.nik JOIN jabatan e ON d.jabatan=e.id_jabatan WHERE a.id='$odp'";
		$sql="SELECT * FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame join user d ON a.nik_petugas=d.nik join jabatan e on d.jabatan=e.id_jabatan WHERE c.id='$odp' and d.jabatan='2'";

		$result = mysqli_query($koneksi,$sql);
		while ($row=mysqli_fetch_array($result)) {
				//$row['id']
				$nik_maintenance=$row['nik_petugas'];
		}
//	}	
//	echo $nik_maintenance;
	$petugas_maintenance = $nik_maintenance;
	
	$sql="insert into tiket (odp,petugas_pelapor,tanggal_lapor,status,petugas_maintenance,keterangan) 
	values ('$odp','$petugas_pelapor','$tanggal_laporan','baru','$petugas_maintenance','$keterangan')";
	
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