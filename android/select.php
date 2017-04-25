<?php
 include 'koneksi.php';
//	if($_SERVER['REQUEST_METHOD']=='POST'){ 
if($user=$_GET['user'])
        $perintah_sql = "SELECT c.id, c.nama_label 
		FROM okupansi a join frame_odp b on a.id_frame_odp = b.id_frame_odp join odp c on b.nama_frame=c.nama_frame 
		WHERE a.nik_petugas='$user'";
//		$perintah_sql = "SELECT * FROM okupansi";
		$result = mysqli_query($koneksi,$perintah_sql);
		while ($row=mysqli_fetch_array($result)) {
			$data[] = array(
				'id' => $row['id'],
				'nama_label' => $row['nama_label'],
//				'status' => $row['status'],
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