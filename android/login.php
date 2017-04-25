<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mancore';
$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        $query_params = array(
            ':user' => $user,
            ':pass' => $pass
        );
        $st = $pdo->prepare("SELECT * FROM user where nik=:user and password=:pass and jabatan=3");
        $result = $st->execute($query_params);
        echo '{"success":true, "data":' .json_encode($st->fetchAll(PDO::FETCH_ASSOC)). '}';
        break;
	default:
		echo error_reporting;
}

?>