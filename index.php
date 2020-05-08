<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="style.css" />
  <title>Mi House</title>
  <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
  <header>
    <div class="`">
    </div>
    <div class="menu">
      <a href=""></a>
      <a href=""></a>
      <a href=""></a>

    </div>
  </header>
  <div class="body-wrapper">
    <div class="form">
      <div class="action">
        <?php if(isset($_SESSION['result'])) : ?>
            <div class="alert alert-<?= $result['status'] ?>">
              <?= $_SESSION['result']['msg'] ?>
            </div>
           <?php unset($_SESSION['result']); ?>
        <?php endif ?>
        <div id="result" style="margin-bottom: 20px"></div>
        <span class="load show" id="login-action" onclick="openLoginPage()"
        >Login</span
        >
        <span class="load" onclick="openRegPage()" id="reg-action"
        >Register</span
        >
      </div>

      <div class="login show-page">
        <input type="text" id="user" placeholder="Username" />
        <input type="password" id="pass" placeholder="Password" name="password" />
        <button id="login">Login</button>
        <a href="#" onclick="openRegPage()">Register</a>
      </div>
      <div class="reg">
        <input type="text" id="username" placeholder="Username" />
        <input type="text" id="nama" placeholder="Full Name" />
        <input type="text" id="email" placeholder="Email" />
        <input type="password" id="password" placeholder="Password" />
        <select id="level">
          <option value="" selected="" hidden="">Select Level</option>
          <option value="staff">Staff</option>
          <option value="applicant">Applicant</option>
        </select>
        <button id="register">Register</button>
        <a href="#" onclick="openLoginPage()">Login</a>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $(document).on('click','#register',function() {

    var username = $("#username").val();
    var nama = $("#nama").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var level = $("#level").val();
    if(username =='' || nama=='' || email == '' || password == '' || level == '') {
      $("#result").html("<div class='alert alert-error'>There Are Still Empty Data !</div>");
      return false;
    }

    $.ajax({
      url:'register.php',
      type:'POST',
      data:'username='+username+'&nama='+nama+'&email='+email+'&password='+password+'&level='+level,
      dataType:'html',
      success:function(data) {
        $("#result").html(data);
      },beforeSend:function() {
        $("#result").html("<center> Proses....</center>");
      },error:function() {
        $("#result").html("<center>There is an error....</center>");
      }
    });
  });

  $(document).on('click','#login',function() {

    var username = $("#user").val();
    var password = $("#pass").val();
    if(username =='' || password == '') {
      $("#result").html("<div class='alert alert-error'>There Are Still Empty Data !</div>");
      return false;
    }
    $.ajax({
      url:'login.php',
      type:'POST',
      data:'user='+username+'&pass='+password+'&leveluser'+level,
      success:function(data) {
        if(data=="staff") {
          pageRedirect("./Dashboard/AdminAppDashboard.php")
        } else if(data== "applicant") {
          pageRedirect("./Dashboard/ApplicantAppDashboard.php")
        } else {
          $("#result").html("<div class='alert alert-error'>"+data+"</div>");
        }

        // alert(data.level);
        
      },beforeSend:function() {
        $("#result").html("<center> Proses....</center>");
      }
    });
  });
</script>

<script>
  function pageRedirect(direct) {
    window.location.href = direct;
  }      
</script>
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
