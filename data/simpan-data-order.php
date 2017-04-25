<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);
	$odp="";
 	$id = $dataObjek->data->id;
 	$kategori = $dataObjek->data->kategori;
 	$keterangan = $dataObjek->data->keterangan;
 	//tanggal
 	date_default_timezone_set("Asia/Jakarta");
 	$tanggal = date("Y-m-d");
	//print_r($tanggal);


	$sql=mysqli_query($koneksi,"SELECT d.nik, d.nama FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame join user d ON a.nik_petugas=d.nik join jabatan e on d.jabatan=e.id_jabatan WHERE c.id='$id' and d.jabatan='2'");
	$hasil1=mysqli_fetch_array($sql);
	$teknisi=$hasil1['nik'];
//==========================================//
	$sql2=mysqli_query($koneksi,"SELECT d.nik, d.nama FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame join user d ON a.nik_petugas=d.nik join jabatan e on d.jabatan=e.id_jabatan WHERE c.id='$id' and d.jabatan='3'");
	$hasil2=mysqli_fetch_array($sql2);
	$pelapor=$hasil2['nik'];


 	$query="select * from tiket where odp='$id'";
 	$hasil = mysqli_query($koneksi,$query);
 	while ($row=mysqli_fetch_array($hasil)){
 		$odp=$row['odp'];
 	};


		if($id==$odp){
			$respon = "sudah terorder";
		}else {		
			$perintah_sql = "insert into tiket (odp,petugas_pelapor,tanggal_lapor,status,petugas_maintenance,kategori,keterangan) 
				values ('$id','$pelapor','$tanggal','baru','$teknisi','0','$keterangan')";
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