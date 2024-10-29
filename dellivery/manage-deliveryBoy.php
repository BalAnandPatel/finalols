<?php
//session_start();
// $jwt="123";
// $request_headers = [
//   'Authorization:' . $jwt
// ];
include "../constant.php";
$url = $URL . "deliveryBoy/readDeliveryBoy.php";
//$url="http://localhost/onlinesabjimandiapi/api/src/category/readCategory.php";
$data = array();
// //print_r($data);
$postdata = json_encode($data);
$client = curl_init();
curl_setopt($client, CURLOPT_URL, $url);
//curl_setopt( $client, CURLOPT_HTTPHEADER,  $request_headers);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Sellar</title>
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
								<h3>Update Address</h3>
							</div>
							<div class="module-body">
							<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data" action="action/insertSellarPost.php">
									<div class="control-group">
											<label class="control-label" for="basicinput">Name</label>
											<div class="controls">
												<input type="text" name="sellarName" placeholder="Name" class="span8 tip" required>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Shop Title</label>
											<div class="controls">
												<input type="text" name="counterName" placeholder="Counter Name" class="span8 tip" required>
										</div>
										</div>
										
									
										<div class="control-group">
											<label class="control-label" for="basicinput">phone No</label>
											<div class="controls">
												<input type="text" name="phoneNo" placeholder="Phone No" class="span8 tip" required>
										</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Email Id</label>
											<div class="controls">
												<input type="text" name="email" placeholder="Enter Email Id" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Deposit Amount</label>
											<div class="controls">
												<input type="text" name="depositAmount" placeholder="Deposit Amount" class="span8 tip" required>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input type="text" name="password" placeholder="password" class="span8 tip" required>
										</div>
										</div>
									<div class="control-group">
											<label class="control-label" for="basicinput">Reg Fee</label>
											<div class="controls">
												<input type="text" name="regFee" placeholder="Reg Fee" class="span8 tip" required>
										</div>
										</div>
									
									
										<div class="control-group">
											<label class="control-label" for="basicinput">Gst</label>
											<div class="controls">
												<input type="text" name="gst" placeholder="Enter GST NO" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Aadhar</label>
											<div class="controls">
												<input type="text" name="aadhar" placeholder="Adhar no" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Pan</label>
											<div class="controls">
												<input type="text" name="pan" placeholder="pan Card" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Adress</label>
											<div class="controls">
												<input type="text" name="address" placeholder="Address" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Pin</label>
											<div class="controls">
												<input type="text" name="pin" placeholder="Pin" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">City</label>
											<div class="controls">
												<input type="text" name="city" placeholder="City" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Owner Image</label>
											<div class="controls">
												<input type="file" name="upload" placeholder="counter Image" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Shop Image</label>
											<div class="controls">
												<input type="file" name="shopupload" placeholder="shop Image" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
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