<?php 
    require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mi House</title>
    <link rel="stylesheet" href="styleApplicantDashboard.css">
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style type="text/css">
    </style>
</head>
<body>
<?php 
    if (isset($_POST['residence_Id'])) {
			
        $save =  $db->query("update residences set
            residence_Id = '".$_POST['residence_Id']."',
            address = '".$_POST['address']."',
			numUnits = '".$_POST['numUnits']."',
			sizePerUnit = '".$_POST['sizePerUnit']."',
            monthlyRental = '".$_POST['monthlyRental']."' where id_r = $_POST[id_r]");
		
		$save2 =  $db->query("update application set
            residence_Id = '".$_POST['residence_Id']."' where application_id = $_POST[application_id]");
		
		$save3 =  $db->query("INSERT INTO unit (residence_id) VALUES (
            '".$_POST['residence_Id']."')");
		
			$select = "select * from unit order by unit_id";
			$select_query = mysqli_query($db, $select);
			while($select_result = mysqli_fetch_array($select_query))
			{
				$unit_id = $select_result['unit_id'];
			}
							
		$save4 =  $db->query("INSERT INTO allocation (unit_id, application_id) VALUES (
            '".$unit_id."',
			'".$_POST['application_id']."')");
			
        if($save) { ?>
        <div class="alert alert-success"><b>Registration Successful!</b>
        <?php } else { ?>
            <div class="alert alert-error"><b>Registration Failed!</b>
        <?php }
        
    }
?>
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
        <div class="col-lg-10 col-sm-12" style="margin-left: 15px;height: 50px;background-color: #042331;color:white;padding: 15px;font-size: 20px;">
            List View Application
        </div>
        <div class="col-lg-10 col-sm-12" style="margin-left: 15px;border:1px solid black;padding: 15px;font-size: 20px;">
           <div class="table-responsive">
				  <table class="table">
					  <thead>
						<tr>
						  <th scope="col">No</th>
						  <th scope="col">Applicant ID</th>
						  <th scope="col">Residence ID</th>
						  <th scope="col">Address</th>
						  <th scope="col">Num of Units</th>
						  <th scope="col">Size per unit</th>
						  <th scope="col">Monthly Rental</th>
						  <th scope="col">Status</th>
						  <th scope="col">Set up residence</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							$i = 1;
							$select = "select * from application a inner join residences b on a.applicant_id=b.applicant_id where a.staff_id = b.staff_id";

							$select_query = mysqli_query($db, $select);
							while($select_result = mysqli_fetch_array($select_query))
							{
							$id_r = $select_result['id_r'];
							$application_id = $select_result['application_id'];
							$applicant_id = $select_result['applicant_id'];
							$residence_Id = $select_result['residence_Id'];
							$address = $select_result['address'];
							$numUnits = $select_result['numUnits'];
							$sizePerUnit = $select_result['sizePerUnit'];
							$monthlyRental = $select_result['monthlyRental'];
							$status = $select_result['status'];
							
						?>
						<tr>
						  <th scope="row"><?php echo $i++; ?></th>
						  <td><?php echo $applicant_id; ?></td>
						  <td><?php if ($residence_Id == 0){echo "-" ;}else {echo $residence_Id;} ?></td>
						  <td><?php if ($address == ''){echo "-" ;}else {echo $address;} ?></td>
						  <td><?php if ($numUnits == 0){echo "-" ;}else {echo $numUnits;} ?></td>
						  <td><?php if ($sizePerUnit == 0){echo "-" ;}else {echo $sizePerUnit;} ?></td>
						  <td><?php if ($monthlyRental == 0){echo "-" ;}else {echo $monthlyRental;} ?></td>
						  <td><?php echo $status; ?></td>
						  <td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $applicant_id ;?>" data-idr="<?php echo $id_r ;?>" data-applicationid="<?php echo $application_id; ?>">
								Set
							</button>
						  </td>
						</tr>
						<?php
							}
							echo $application_id;
						?>
					  </tbody>
					</table>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New message</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="" method="post">
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">
								Applicant ID: <span type="text" class="form-appID" id="recipient-name"></span>
									<input name="id_r" type="text" class="form-idr" style="display:none;">
									<input name="application_id" type="text" class="applicationid" style="">
							</label>
						  </div>
						 <div class="form-group">
							<input type="text" class="form-control" name="residence_Id" placeholder="Residence Id">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="Address">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="numUnits" placeholder="Num of Units">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="sizePerUnit" placeholder="Size per unit">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="monthlyRental" placeholder="Monthly Rental">
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
					  </div>
					</div>
				  </div>
				</div>
        </div>
       

    </div>
</div>
<script src="../jquery-3.4.1/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="../popper.js@1.16.0/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var idr = button.data('idr')
	  var appid = button.data('applicationid')
	  var modal = $(this)
	  modal.find('.modal-title').text('Set Up Residence')
	  modal.find('.form-appID').text(recipient)
	  modal.find('.form-idr').val(idr)
	  modal.find('.applicationid').val(appid)
	})
</script>
</body>
</html>