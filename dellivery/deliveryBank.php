<?php
//session_start();
// $jwt="123";
// $request_headers = [
//   'Authorization:' . $jwt
// ];
include "../constant.php";
$url = $URL . "deliveryBoy/readDeliveryBoyId.php";
//$url="http://localhost/onlinesabjimandiapi/api/src/category/readCategory.php";
$data = array();
// //print_r($data);
$postdata = json_encode($data);
$client = curl_init();
curl_setopt( $client, CURLOPT_URL,$url);
//curl_setopt( $client, CURLOPT_HTTPHEADER,  $request_headers);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
print_r($response);
$result = json_decode($response);
//print_r($result);
?>
<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Category</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	</head>

	<body>
		<?php include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Bank Details</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid"  action="action/bank-post.php" name="bankDetail" method="post" enctype="multipart/form-data">

										<div class="control-group">
											<label class="control-label" for="basicinput">Account Name</label>
											<div class="controls">
												<input type="text" placeholder="Enter Your Name" name="name" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Account No:</label>
											<div class="controls">
												<input type="text" placeholder="Account Number" name="acNo" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Bank</label>
											<div class="controls">
												<input type="text" placeholder="Bank Name" name="bank" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">IFSC Code</label>
											<div class="controls">
												<input type="text" placeholder="IFSC Code" name="ifsc" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">UPI</label>
											<div class="controls">
												<input type="text" placeholder="UPI ID" name="upi" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Passbook:</label>
											<div class="controls">
												<input type="file" class="span8" name="passbook">
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">ADD</button>
											</div>
										</div>
									</form>
								</div>
							</div>


							<div class="module">
								<div class="module-head">
									<h3>Manage Bank Details</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Account Number</th>
												<th>Passbook</th>
												<th>Bank</th>
												<th>IFSC</th>
												<th>UPI</th>
												<th>Creation date</th>
												<th>Last Updated</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

										<?php
                // print_r($result);
				$cnt=0;
                // print_r($result['records']);
                for($i=0; $i<sizeof($result->records);$i++)
                { //print_r($result->records[$i]);
                ?>	
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo $result->records[$i]->name;?></td>
													<td><?php echo $result->records[$i]->acNo;?></td>
													<td><img src="img/category/<?php echo $result->records[$i]->id ."/".$result->records[$i]->id.".png";?>"></td>
													<td><?php echo $result->records[$i]->bank;?></td>
													<td><?php echo $result->records[$i]->ifsc;?></td>
													<td><?php echo $result->records[$i]->upi;?></td>
													<td><?php echo $result->records[$i]->createdOn;?></td>
													<td><?php echo $result->records[$i]->updatedOn;?></td>
													<td>
														<a href="edit-category.php?id=<?php echo $result->records[$i]->id ?>"><i class="icon-edit"></i></a>
														<form class="form-horizontal row-fluid"  action="action/categoryDelete_post.php" name="Category" method="post" enctype="multipart/form-data">
															<input type="hidden" name="id" value="<?php echo $result->records[$i]->id ?>">
															<button type="submit" class="icon-remove-sign"></button>
														</form>
														
														<a href="category.php?id=<?php echo $result->records[$i]->id ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>

									</table>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
	</body>