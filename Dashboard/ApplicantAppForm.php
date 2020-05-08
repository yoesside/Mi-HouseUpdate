<!--Ini SUBMIT APPLICATION-->
<?php 
    require '../koneksi.php';
	error_reporting();
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
<?php 
    if (isset($_POST['aplication_id'])) {
		$save1 =  $db->query("INSERT INTO applicant (email, username) VALUES (
            '".$_SESSION['user']['email']."',
            '".$_SESSION['user']['username']."')");
			
		$save2 =  $db->query("INSERT INTO housing_officer (username) VALUES (
            '".$_SESSION['user']['username']."')");
		
		$select = "select * from applicant where username='".$_SESSION['user']['username']."'";
		$select_query = mysqli_query($db, $select);
		while($select_result = mysqli_fetch_array($select_query))
		{
		$applicant_id = $select_result['applicant_id'] ;
		}
		
		$select1 = "select * from housing_officer where username='".$_SESSION['user']['username']."'";
		$select_query1 = mysqli_query($db, $select1);
		while($select_result1 = mysqli_fetch_array($select_query1))
		{
		$staff_id = $select_result1['staff_id'] ;
		}
		
		$save3 =  $db->query("INSERT INTO residences (applicant_id, staff_id) VALUES (
            '".$applicant_id."',
			'".$staff_id."')");
		
        $save =  $db->query("INSERT INTO application (application_id, name, applicant_id, username, staff_id, applicationDate, requiredMonth, requiredYear, status) VALUES (
            '".$_POST['aplication_id']."',
            '".$_POST['name']."',
			'".$applicant_id."',
			'".$_SESSION['user']['username']."',
			'".$staff_id."',
            '".$_POST['applicationDate']."',
            '".$_POST['requiredMonth']."',
            '".$_POST['requiredYear']."',
            '".$_POST['status']."')");
			
        if($save) { ?>
        <div class="alert alert-success"><b>Registration Successful!</b>
        <?php } else { ?>
            <div class="alert alert-error"><b>Registration Failed!</b>
        <?php }

        
    }
?>
<div class="wrapper">
    <div class="sidebar">
        <h2>Applicant</h2>
        <ul>
            <li><a href="ApplicantAppDashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="ApplicantAppProfile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="ApplicantAppView.php"><i class="fas fa-address-card"></i>View Application</a></li>
            <li><a href="ApplicantAppForm.php"><i class="fas fa-project-diagram"></i>Submit Application</a></li>
            <li><a href="ApplicantViewResidence.php"><i class="fas fa-blog"></i>View Residence</a></li>
        </ul> 
        <div class="social_media">
          <a href="../index.php" style="width: 100px;">Log Out</a> <!-- width buat ngatur lebar tombol -->
      </div>
    </div>
    <div class="main_content">
        <div class="header">Mi House</div>  
        <div class="info">
          
        </div>
        <div class="panel panel-primary" style="margin: 20px; width: 80%;">
          <div class="panel-heading">Submit Aplication</div>
          <div class="panel-body">
            <div class="container">
              <h2></h2>
              <form action="" method="post">
                <div class="form-group">
                  <label for="pwd">Aplication ID:</label>
                  <input type="text" class="form-control" name="aplication_id" style="width: 80%;">
                </div>
                <div class="form-group">
                  <label for="pwd">Name:</label>
                  <input type="text" class="form-control" name="name" style="width: 80%;">
                </div>
                <div class="form-group">
                  <label for="pwd">Application Date:</label>
                   <input class="form-control" name="applicationDate" placeholder="MM/DD/YYY" style="width: 80%;" type="text"/>
                </div>
                <div class="form-group">
                  <label for="pwd">Required Month:</label>
                  <input type="text" class="form-control" name="requiredMonth" style="width: 80%;">
                </div>
                <div class="form-group">
                  <label for="pwd">Required Year:</label>
                  <input type="text" class="form-control" name="requiredYear" style="width: 80%;">
                </div>
                <div class="form-group">
                  <label for="pwd" >Status:</label>
                  <select class="form-control" name="status" style="width: 80%;">
                      <option>New</option>
                      <option>Old</option>
                  </select>
                </div>
               
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>