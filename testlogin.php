<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="style.css" />
  <title>Mi House</title>
</head>
<body>
  <header>
    <div class="logo">
      Logo
    </div>
   
  </header>
  <div class="body-wrapper">
    <form method="post" action="register.php" class="form">
      <div class="action">
        <span class="load show" id="login-action" onclick="openLoginPage()"
        >Login</span
        >
        <span class="load" onclick="openRegPage()" id="reg-action"
        >Register</span
        >
      </div>
      <div class="login show-page">
        <input type="text" placeholder="Username" name="username"/>
        <input type="password" placeholder="Password" name="password" />
        <button>Login</button>
        <a href="#" onclick="openRegPage()">Register</a>
      </div>
      <div class="reg">
        <input type="text" placeholder="Username" name="username" />
        <input type="text" placeholder="Full Name" name="fullname" />
        <input type="text" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <button>Register</button>
        <a href="#" onclick="openLoginPage()">Login</a>
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
