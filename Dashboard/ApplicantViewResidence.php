<?php 
    include'../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi House</title>
	<link rel="stylesheet" href="styleApplicantDashboard.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>APPLICANT</h2>
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
          <div class="panel-heading"><b>Residence View</b></div>
            <div class="container">
			  <div class="table-responsive">
				  <table class="table">
					  <thead>
						<tr>
						  <th scope="col">No</th>
						  <th scope="col">Application ID</th>
						  <th scope="col">Name</th>
						  <th scope="col">Application Date</th>
						  <th scope="col">Required Month</th>
						  <th scope="col">Required Year</th>
						  <th scope="col">Status</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							$i = 1;
							$select = "select * from application";

							$select_query = mysqli_query($db, $select);
							while($select_result = mysqli_fetch_array($select_query))
							{
							$application_id = $select_result['application_id'];
							$name = $select_result['name'];
							$applicationDate = $select_result['applicationDate'];
							$requiredMonth = $select_result['requiredMonth'];
							$requiredYear = $select_result['requiredYear'];
							$status = $select_result['status'];
							
						?>
						<tr>
						  <th scope="row"><?php echo $i++; ?></th>
						  <td><?php echo $application_id; ?></td>
						  <td><?php echo $name; ?></td>
						  <td><?php echo $applicationDate; ?></td>
						  <td><?php echo $requiredMonth; ?></td>
						  <td><?php echo $requiredYear; ?></td>
						  <td><?php echo $status; ?></td>
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</div>
            </div>
    </div>
</div>

</body>
</html>