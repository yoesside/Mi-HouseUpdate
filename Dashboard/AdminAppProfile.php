<?php 
    require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mi House</title>
    <link rel="stylesheet" href="styleApplicantDashboard.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style type="text/css">
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="AdminAppDashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="AdminAppProfile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="AdminAppResidence.php"><i class="fas fa-address-card"></i>Set Up Residence</a></li>
            <li><a href="AdminAppAllocate.php"><i class="fas fa-project-diagram"></i>Allocate Housing</a></li>
            <li><a href="AdminAppView.php"><i class="fas fa-blog"></i>View Application</a></li>
        </ul> 
        <div class="social_media">
          <a href="../index.php" style="width: 100px;">Log Out</a> <!-- width buat ngatur lebar tombol -->
      </div>
    </div>
    <div class="main_content">
        <div class="header">Mi House</div>  
        <div class="info">
          
        </div>
        <div class="col-lg-8 col-sm-12" style="margin-left: 15px;height: 50px;background-color: #042331;color:white;padding: 15px;font-size: 20px;">
            
        </div>
        <div class="col-lg-8 col-sm-12" style="margin-left: 15px;height: 200px;background-color: black;color:white;padding: 15px;font-size: 20px;">
            <div class="row">
                <div class="col-lg-3">
                    <img src="profile-buttons-png-3.png" style="border-radius: 50%;width: 100px;height: 100px;" >
                </div>
                <div class="col-lg-9">
                    Full Name : <?php echo $_SESSION['user']['fullname']."</br>"; ?>
                    Username : <?php echo $_SESSION['user']['username']."</br>"; ?>
                    Email : <?php echo $_SESSION['user']['email']."</br>"; ?>
                </div>
            </div>
            
            
        </div>
       

    </div>
</div>

</body>
</html>