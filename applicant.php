<?php 
  require 'koneksi.php'; 

  if(isset($_SESSION['user'])) {
    $level = $_SESSION['user']['leveluser'] ? $_SESSION['user']['leveluser'] : false;
  } else {
    $_SESSION['result'] = ['status' => 'error',' dilarang masuk !'];
    header('location:index.php');
  }
  
  if($level !="applicant") {
    echo "dilarang masuk !";exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="style.css" />
  <title>Login And Registration page</title>
</head>
<body>
  <header>
    <div class="logo">
      Logo
    </div>
    <div class="menu">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
    </div>
  </header>
  <div class="body-wrapper">
    <form method="post" action="login.php" class="form">
      <div class="action">
        <span class="load show" id="login-action" onclick="openLoginPage()"
        >Page Applicant</span
        >
      </div>
     
    </form>
  </div>
</body>
<script>
  function openLoginPage() {
    document.querySelector(".reg").classList.remove("show-page");
    document.querySelector(".login").classList.add("show-page");
    document.getElementById("login-action").classList.add("show");
    document.getElementById("reg-action").classList.remove("show");
  }
  function openRegPage() {
    document.querySelector(".reg").classList.add("show-page");
    document.querySelector(".login").classList.remove("show-page");
    document.getElementById("reg-action").classList.add("show");
    document.getElementById("login-action").classList.remove("show");
  }
</script>
</html>
