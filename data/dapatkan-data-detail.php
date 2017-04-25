<?php
	include '../data/koneksi.php';

if($id=$_GET['r']){
	$perintah_sql = "SELECT * FROM odp WHERE nama_label='$id'";
	$data = [];
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['nama_label'] = $row['nama_label'];
		$temp_data['latitude'] = $row['latitude'];
		$temp_data['longitude'] = $row['longitude'];
		$temp_data['lokasi'] = $row['lokasi'];
		$temp_data['distribusi'] = $row['distribusi'];
		$temp_data['core'] = $row['core'];
		$temp_data['kapasitas'] = $row['kapasitas'];
		$temp_data['keterangan'] = $row['keterangan'];

		array_push($data,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($data);	
}
?>