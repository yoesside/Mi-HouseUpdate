<?php 
require 'koneksi.php';

$data = $db->query("SELECT * FROM user WHERE username='".$_POST['username']."' OR email='".$_POST['email']."' ");


if($data->num_rows < 1) {

	$save =  $db->query("INSERT INTO user (username, password, email, fullname, leveluser) VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['nama']."','".$_POST['level']."')");

	if($save) { ?>
		<div class="alert alert-success"><b>Registration Successful!</b>
		<?php } else { ?>
			<div class="alert alert-error"><b>Registration Failed!</b>
		<?php }

	} else { ?>
		<div class="alert alert-error"><b>Registration Failed !</b><br>Username / Email Already Registered !</div>

		<?php
	} 
 
?>