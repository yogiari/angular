<?php  
include 'data/koneksi.php'; 
$userText = $_POST['userText']; 
 if(!empty($_FILES))  
 {  
      $path = 'upload/' . $_FILES['file']['name'];  
      if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
      {  
           $insertQuery = "insert into user (nik,nama,alamat,no_hp,password,jabatan,foto) values ('$nik','$nama','$alamat','$no_hp','$password','$jabatan','".$_FILES['file']['name']."')" 
           // $insertQuery = "INSERT INTO user (nama,foto) VALUES ('$nama','".$_FILES['file']['name']."')";  
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

// include 'data/koneksi.php';
//      $target_dir = "./upload/";
//      $name = $_POST['name'];
//      print_r($_FILES);
//      $target_file = $target_dir . basename($_FILES["file"]["name"]);

//      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

//      //write code for saving to database 
// //     include_once "config.php";

//      // Create connection
//      $conn = new mysqli($servername, $username, $password, $dbname);
//      // Check connection
//      if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//      }

//      $sql = "INSERT INTO user (nama,foto) VALUES ('".$name."','".basename($_FILES["file"]["name"])."')";

//      if ($conn->query($sql) === TRUE) {
//          echo json_encode($_FILES["file"]); // new file uploaded
//      } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//      }

//      $conn->close();

 ?>  