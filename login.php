<?php
require 'koneksi.php';

$data = $db->query("SELECT * FROM user WHERE username='".$_REQUEST['user']."' AND password='".$_REQUEST['pass']."' ");

if($data->num_rows > 0) {

	$get_data = $data->fetch_assoc();

	foreach ($get_data as $key => $value) {
		$_SESSION['user'][$key] = $value;
		$_SESSION['status'] = "masuk";
	}


	$result = $get_data['leveluser']; 


} else { 
	$result = 'Login Failed! Username / wrong password!';
}
echo $result;
?>
