<?php 
    require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mi House</title>
	<link rel="stylesheet" href="styleApplicantDashboard.css">
	<link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

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
		<div class="col-lg-10 col-sm-12" style="margin-left: 15px;height: 50px;background-color: #042331;color:white;padding: 15px;font-size: 20px;">
           View Application
        </div>
        <div class="col-lg-10 col-sm-12" style="margin-left: 15px;border:1px solid black;padding: 15px;font-size: 20px;">
           <div class="table-responsive">
				  <table class="table">
					  <thead>
						<tr>
						  <th scope="col">No</th>
						  <th scope="col">Residence ID</th>
						  <th scope="col">Address</th>
						  <th scope="col">Number of Unit</th>
						  <th scope="col">Size per unit(m2)</th>
						  <th scope="col">Monthly rental</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							$i = 1;
							$select = "select * from application a inner join residences b on a.applicant_id=b.applicant_id 
										inner join allocation c on a.application_id = c.application_id where a.staff_id = b.staff_id";

							$select_query = mysqli_query($db, $select);
							while($select_result = mysqli_fetch_array($select_query))
							{
							$id_r = $select_result['id_r'];
							$applicant_id = $select_result['applicant_id'];
							$residence_Id = $select_result['residence_Id'];
							$address = $select_result['address'];
							$numUnits = $select_result['numUnits'];
							$sizePerUnit = $select_result['sizePerUnit'];
							$monthlyRental = $select_result['monthlyRental'];
							
						?>
						<tr>
						  <th scope="row"><?php echo $i++; ?></th>
						  <td><?php echo $residence_Id;?></td>
						  <td><?php echo $address; ?></td>
						  <td><?php echo $numUnits; ?></td>
						  <td><?php echo $sizePerUnit; ?></td>
						  <td><?php echo $monthlyRental; ?></td>
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