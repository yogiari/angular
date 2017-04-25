<?php
include "koneksi.php";
include "../excel_reader2/excel_reader2.php";
 
/*	if($handle = fopen($_FILES['filename']['tmp_name'], "r")){		
		//$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
		fgetcsv($handle);   
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$num = count($data);
			for ($c=0; $c < $num; $c++) {
			  $col[$c] = $data[$c];
			}
		$query = "insert into odp (namaLabel,vendor,lat,lon,distribusi,olt,lokasi,keterangan,tglUT) values 
		('$col[0]','$col[1]','$col[2]','$col[3]','$col[4]','$col[5]','$col[6]','$col[7]','$col[8]')";
		mysqli_query($koneksi,$query);
		//var_dump($query);
		}
		fclose($handle); 
		//echo "data ada";
		header("Location: http://localhost/kp/admin.php");
	}else{
		echo "harus ada data csv";
	}
*/
if($_FILES['filename']['tmp_name']){
	// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
	// dan baca dengan PHP Excel Class
	$data = new Spreadsheet_Excel_Reader($_FILES['filename']['tmp_name']);
	$hasildata = $data->rowcount($sheet_index=0);
	// default nilai 
	$sukses = 0;
	$gagal = 0;
	//dimulai dari baris kedua sampai jumlah baris keseluruhan 
	for ($i=2; $i<=$hasildata; $i++){
		$data1 = $data->val($i,1); 
		$data2 = $data->val($i,2);
		$data3 = $data->val($i,3);
		$data4 = $data->val($i,4); 
		$data5 = $data->val($i,5);
		$data6 = $data->val($i,6);
		$data7 = $data->val($i,7); 
		$data8 = $data->val($i,8);
		$data9 = $data->val($i,9);
	 
		$query = "insert into odp (nama_label,nama_frame,vendor,lat,lon,distribusi_core,olt,lokasi,tanggal_uji_terima) 
			values ('$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8','$data9') ";
		$hasil = mysqli_query($koneksi,$query);
		 
		if ($hasildata) $sukses++;
		else $gagal++;
		 
		print_r($data1);
	 
	}
	echo "<b>import data selesai.</b>";
	echo "<br>Data yang berhasil di import : ".$sukses;
	echo "<br>Data yang gagal diimport : ".$gagal;
	echo "<br>back <a href='http://localhost/kp/admin.php'>KEMBALI</a>";
}else{
	echo "upload file .xls dahulu !!!!!";
}
?>