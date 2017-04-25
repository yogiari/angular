<?php
 include '../koneksi.php';
//	if($_SERVER['REQUEST_METHOD']=='POST'){ 
if($user=$_GET['user'])
        $perintah_sql = "SELECT * FROM tiket a JOIN odp b ON a.odp=b.id WHERE petugas_maintenance='$user' and status='baru'";
//		$perintah_sql = "SELECT * FROM okupansi";
		$result = mysqli_query($koneksi,$perintah_sql);
		while ($row=mysqli_fetch_array($result)) {
			$data[] = array(
				'id_tiket' => $row['id_tiket'],
				'nama_label' => $row['nama_label'],
				'status' => $row['status'],
//				'tanggal' => $row['tanggal']
				// 'lat' => $row['lat'],
				// 'lon' => $row['lon'],
				// 'distribusi' => $row['distribusi'],
				// 'lokasi' => $row['lokasi']
			);
		}
	//json-kan
	echo '{"success":true, "data":' . json_encode($data) . '}';
//    } 
?>