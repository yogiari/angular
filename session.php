<<<<<<< HEAD
<?php
	include 'data/koneksi.php';
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$status="harap login";

	// $sql=mysqli_query($koneksi,"select * from user where nik='$user' and password='$pass'");
	$sql=mysqli_query($koneksi,"select * from user a join jabatan b on a.jabatan=b.id_jabatan where a.nik='$user' and a.password='$pass' and b.nama_jabatan='admin'");
	if(mysqli_num_rows($sql)==1){
		session_start();
		while ($r=mysqli_fetch_array($sql)) {
			//$_SESSION['id']=$r['id'];
			//$_SESSION['level']=$r['level'];
			$_SESSION['username']=$r['nik'];
			$_SESSION['password']=$r['password'];
		}
		header('location:admin.php');
	} else {
		header('location:index.php');
	}
=======
<?php
	include 'data/koneksi.php';
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$status="harap login";

	// $sql=mysqli_query($koneksi,"select * from user where nik='$user' and password='$pass'");
	$sql=mysqli_query($koneksi,"select * from user a join jabatan b on a.jabatan=b.id_jabatan where a.nik='$user' and a.password='$pass' and b.nama_jabatan='admin'");
	if(mysqli_num_rows($sql)==1){
		session_start();
		while ($r=mysqli_fetch_array($sql)) {
			//$_SESSION['id']=$r['id'];
			//$_SESSION['level']=$r['level'];
			$_SESSION['username']=$r['nik'];
			$_SESSION['password']=$r['password'];
		}
		header('location:admin.php');
	} else {
		header('location:index.php');
	}
>>>>>>> 191a45d039c667b0e064c453c45715fe6f8349b8
?>