<?php 
    require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mi House</title>
	<link rel="stylesheet" href="stylesAdminDashboard.css">
	<link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<?php 
    if (isset($_POST['application_id'])) {
			
        $save =  $db->query("update allocation set
            fromDate = '".$_POST['fromDate']."',
            duration = '".$_POST['duration']."',
			endDate = '".$_POST['endDate']."' where application_id = $_POST[application_id]");
			
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
           Allocate Housing
        </div>
        <div class="col-lg-10 col-sm-12" style="margin-left: 15px;border:1px solid black;padding: 15px;font-size: 20px;">
           <div class="table-responsive">
				  <table class="table">
					  <thead>
						<tr>
						  <th scope="col">No</th>
						  <th scope="col">Application ID</th>
						  <th scope="col">Residence ID</th>
						  <th scope="col">Address</th>
						  <th scope="col">From Date</th>
						  <th scope="col">Duration</th>
						  <th scope="col">End Date</th>
						  <th scope="col">Action</th>
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
							$application_id = $select_result['application_id'];
							$residence_Id = $select_result['residence_Id'];
							$address = $select_result['address'];
							$fromDate = $select_result['fromDate'];
							$duration = $select_result['duration'];
							$monthlyRental = $select_result['monthlyRental'];
							$endDate = $select_result['endDate'];
							
						?>
						<tr>
						  <th scope="row"><?php echo $i++; ?></th>
						  <td><?php echo $application_id; ?></td>
						  <td><?php if ($residence_Id == 0){echo "-" ;}else {echo $residence_Id;} ?></td>
						  <td><?php if ($address == ''){echo "-" ;}else {echo $address;} ?></td>
						  <td><?php if ($fromDate == 0){echo "-" ;}else {echo $fromDate;} ?></td>
						  <td><?php if ($duration == 0){echo "-" ;}else {echo $duration;} ?></td>
						  <td><?php if ($endDate == 0){echo "-" ;}else {echo $endDate;} ?></td>
						  <td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $residence_Id ;?>" data-applid="<?php echo $application_id ;?>">
								Allocate
							</button>
						  </td>
						</tr>
						<?php
							}
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
								Residence ID: <span type="text" class="form-appID" id="recipient-name"></span>
									<input name="application_id" type="text" class="form-applid" style=";">
							</label>
						  </div>
						 <div class="form-group">
							<input type="text" class="form-control" name="fromDate" placeholder="From Date(format: YYYY-MM-DD)">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="duration" placeholder="Duration">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="endDate" placeholder="En date (format: YYYY-MM-DD)">
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
	  var applid = button.data('applid')
	  var modal = $(this)
	  modal.find('.modal-title').text('Set Up Residence')
	  modal.find('.form-appID').text(recipient)
	  modal.find('.form-applid').val(applid)
	})
</script>
</body>
</html>