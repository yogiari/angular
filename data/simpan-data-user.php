<?php
	include '../data/koneksi.php';
	// $postdata = file_get_contents('php://input');
	// $dataObjek = json_decode($postdata);
	
	// $nik = $dataObjek->data->nik;
	// $nama = $dataObjek->data->nama;
	// $alamat = $dataObjek->data->alamat;
	// $no_hp = $dataObjek->data->no_hp;
	// $password = $dataObjek->data->password;
	// $jabatan = $dataObjek->data->jabatan;
	// //foto
	// $foto=$_FILES['file']['name'];
	// $path = '../upload/' . $foto;
	// move_uploaded_file($_FILES['file']['tmp_name'], $path);


	// $query="select * from user";
	// $hasil = mysqli_query($koneksi,$query);
	// while ($row=mysqli_fetch_array($hasil)){
	// 	// $row_id=$row['id'];
	// 	$row_nik=$row['nik'];
	// }


	// if ($nik=="" || $nama=="" || $alamat==""  || $no_hp=="" || $password=="" || $jabatan=="" || $foto=="" ) {
	// 	$respon = "harus diisi semua";
	// } elseif ($nik==$row_nik) {
	// 	$respon="data sudah ada ";
	// } else {		
	// 	$perintah_sql = "insert into user (nik,nama,alamat,no_hp,password,jabatan,foto) values ('$nik','$nama','$alamat','$no_hp','$password','$jabatan','$foto')";
	// 	$result = mysqli_query($koneksi,$perintah_sql);
	// 	$respon = " ";
	// 	if ($result) {
	// 		$respon = "berhasil meyimpan data";
	// 	}else{
	// 		$respon = "gagal simpan data";
	// 	};
	// }
	// echo $respon;


//======================================
	// include '../data/koneksi.php'; 
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$password = $_POST['password'];
	$jabatan = $_POST['jabatan']; 
	$userText = $_POST['userText'];
	 if(!empty($_FILES))  
	 {  
	      $path = '../upload/' . $_FILES['file']['name'];  
	      if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
	      {  
	           $insertQuery = "insert into user (nik,nama,alamat,no_hp,password,jabatan,foto) values ('$nik','$nama','$alamat','$no_hp','$password','$jabatan','".$_FILES['file']['name']."')" ;
	           // $insertQuery = "INSERT INTO user (nik,foto) VALUES ('$nik','".$_FILES['file']['name']."')";  
	           if(mysqli_query($koneksi, $insertQuery))  
	           {  
	                echo 'File Uploaded';  
	           }  
	           else  
	           {  
	                echo 'File Uploaded But not Saved';  
	           }  
	      }  
	 }  
	 else  
	 {  
	      echo 'Some Error';  
	 }
	 
?>