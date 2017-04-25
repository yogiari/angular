<?php
	include 'data/koneksi.php';
	
	$odp = $_GET['o'];
	$sql=mysqli_query($koneksi,"SELECT d.nik, d.nama FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame join user d ON a.nik_petugas=d.nik join jabatan e on d.jabatan=e.id_jabatan WHERE c.id='$odp' and d.jabatan='2'");
	$hasil=mysqli_fetch_array($sql);
	$data = array('teknisi'=>$hasil['nama']);
	// echo json_encode($data);
//==========================================//
	$sql2=mysqli_query($koneksi,"SELECT d.nik, d.nama FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame join user d ON a.nik_petugas=d.nik join jabatan e on d.jabatan=e.id_jabatan WHERE c.id='$odp' and d.jabatan='3'");
	$hasil2=mysqli_fetch_array($sql2);
	$data2= array('pelapor'=>$hasil2['nama']);
	// echo json_encode($data2);

	echo json_encode($array= $data + $data2);
?>