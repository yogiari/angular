<?php
	include '../data/koneksi.php';
	if($user=$_GET['user']){
		$perintah_sql = "select * from odp a join tiket b on a.id = b.odp where petugas_pelapor=$user
			";
		$datas = [];
		$i=1;
		$result = mysqli_query($koneksi,$perintah_sql);
		while ($row=mysqli_fetch_array($result)) {
			$temp_data = [];
			$temp_data['no'] = $i++;
			$temp_data['id_tiket'] = $row['id_tiket'];
			$temp_data['nama_label'] = $row['nama_label'];
			$temp_data['status'] = $row['status'];
			$temp_data['tanggal_lapor'] = $row['tanggal_lapor'];
			$temp_data['tanggal_selesai'] = $row['tanggal_selesai'];

			array_push($datas,$temp_data);
		}
	}
	
	echo json_encode($datas);	
?>