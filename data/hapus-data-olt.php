<?php
	include '../data/koneksi.php';
	$postdata = file_get_contents('php://input');
	$dataObjek = json_decode($postdata);

	$id = $dataObjek->id;
	$perintah_sql = "delete from olt where id='{$id}'";
	$result=mysqli_query($koneksi,$perintah_sql);

	print_r($id);
?>