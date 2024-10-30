	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Insert Delivery</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>

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
									<h3>Customer Details</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Customer Id</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Address</th>
												<th>Reg. Date</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>

										<?php
                // print_r($result);
				$cnt=0;
                // print_r($result['records']);
                for($i=0; $i<sizeof($resultsub->records);$i++)
                { //print_r($result->records[$i]);
                ?>	
												<tr>
												<td><?php echo htmlentities($cnt); ?></td>
												<td><?php echo $resultsub->records[$i]->id; ?></td>
												<td><?php echo $resultsub->records[$i]->name;?></td>
												<td><?php echo $resultsub->records[$i]->email;?></td>
												<td><?php echo $resultsub->records[$i]->phone;?></td>
												<td><?php echo $resultsub->records[$i]->address;?></td>
												<td><?php echo $resultsub->records[$i]->reg;?></td>
												<td><?php echo $resultsub->records[$i]->status;?></td>
												<td><?php echo $resultsub->records[$i]->time;?></td>
								
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
		<div id="blank_size_field" style="display: none;">
			<div class="flex-grow-1 pr-3">
				<div class="form-group">
					<input type="text" class="span8 tip" name="size[]" id="size" placeholder="Enter Product Size" />
					<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeSize(this)">
						<!-- <i class="fa fa-minus"></i> -->
						 Remove
					</button>
				</div>
			</div>
		</div>
		<div id="blank_color_field" style="display: none;">
			<div class="flex-grow-1 pr-3">
				<div class="form-group">
					<input type="text" class="span8 tip" name="color[]" id="color" placeholder="Enter Product Color" />
					<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeColor(this)">
						<!-- <i class="fa fa-minus"></i> -->
						 Remove
					</button>
				</div>
			</div>
		</div>
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
