<?php
//session_start();
// $jwt="123";
// $request_headers = [
//   'Authorization:' . $jwt
// ];
include "../constant.php";
$skuId=trim(strtoupper($_GET["skuId"]));
$url = $URL . "product/readproductById.php";
//$url="http://localhost/onlinesabjimandiapi/api/src/category/readCategory.php";
$data = array("skuId" => $skuId);
// //print_r($data);
$postdata = json_encode($data);
$client = curl_init();
curl_setopt( $client, CURLOPT_URL,$url);
//curl_setopt( $client, CURLOPT_HTTPHEADER,  $request_headers);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>


<?php
// include ('include/config.php');
// if (!isset($_SESSION['alogin'])) {
// 	header('location:index.php');
// } else {
// 	$pid = intval($_GET['id']); // product id
// 	if (isset($_POST['submit'])) {
// 		$skuId = $_POST['skuId'];
// 		$category = $_POST['category'];
// 		$subcat = $_POST['subcategory'];
// 		$productname = $_POST['productName'];
// 		$productcompany = $_POST['productCompany'];
// 		$productprice = $_POST['productprice'];
// 		$productpricebd = $_POST['productpricebd'];
// 		if (isset($_POST['size'])) {
// 			$size = $_POST['size'];
// 		} else {
// 			$size = array();
// 			;
// 		}
// 		if (isset($_POST['color'])) {
// 			$color = $_POST['color'];
// 		} else {
// 			$color = array();
// 		}
// 		$productHighlight = $_POST['productHighlight'];
// 		$additionalInfo = $_POST['additionalInfo'];
// 		$productrefundandExchange = $_POST['productrefundandExchange'];
// 		$productdescription = $_POST['productDescription'];
// 		$productscharge = $_POST['productShippingcharge'];
// 		$productavailability = $_POST['productAvailability'];
// 		$productimage1 = $_FILES["productimage1"]["name"];
// 		$productimage2 = $_FILES["productimage2"]["name"];
// 		$productimage3 = $_FILES["productimage3"]["name"];
// 		$sql = mysqli_query($con, "update  products set  skuId='$skuId',category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice', productHighlight='$productHighlight', additionalInfo='$additionalInfo', productrefundandExchange='$productrefundandExchange', productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd', size = '" . implode(', ', array_values($size)) . "', color = '" . implode(', ', array_values($color)) . "' where id='$pid' ");
// 		$_SESSION['msg'] = "Product Updated Successfully !!";
	//}


	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Insert Product</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
			rel='stylesheet'>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>

<script>
			function getSubcat(val) {
				//alert(val);
				var dataPost = {
					"cat_id": val};var dataString = JSON.stringify(dataPost);
				$.ajax({
					type: "POST",
					url: "../api/src/subcotegory/readsubcatogory.php",
					data: {
                          cat_id: dataString
					},
					success: function(data) 
					{
					
						 $('#subcategories').html('');
						$('#subcategories').append('<option>' +"Sub Categories" + '</option>');
						 $.each(data.records, function (i, value) {
						  
                $('#subcategories').append('<option id=' + (value.categoryid) + '>' + (value.subcategoryName) + '</option>');
            });
					},
					error: function(data)
					{
					       $('#subcategories').html('');
					     $('#subcategories').append('<option>' + "No records found !!" + '</option>');
					
		
					}
				});
			}

			function selectCountry(val) {
				$("#search-box").val(val);
				$("#suggesstion-box").hide();
			}
		</script>


	</head>

	<body>
		<?php include ('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include ('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Insert Product</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong>
											<?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong>
											<?php echo htmlentities($_SESSION['delmsg']); ?>
											<?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="insertproduct" method="post"
										enctype=	"multipart/form-data">

										<?php
                // print_r($result);
				$cnt=0;
                // print_r($result['records']);
                for($i=0; $i<sizeof($result->records);$i++)
                { //print_r($result->records[$i]);
                ?>


											<div class="control-group">
												<label class="control-label" for="basicinput">Category</label>
												<div class="controls">
												<select name="categoriesId" class="span8 tip" onChange="getSubcat(this.value);" >
													<option value="">Select Category</option>
													<?php
                // print_r($result);
                // print_r($result['records']);
                // for($i=0; $i<sizeof($result->records);$i++)
                // { print_r($result->records[$i]);
                // ?>
				
													
														<option value="<?php echo $result->records[$i]->categoriesId;?>"> <?php echo $result->records[$i]->categoriesId;?></option>
														
													
												</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product SKU-ID</label>
												<div class="controls">
													<input type="text" name="skuId" 
														value="<?php echo $result->records[$i]->skuId;?>" class="span8 tip"
														required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Sub Category</label>
												<div class="controls">

													<select name="subcategory" id="subcategory" class="span8 tip" required>
														<option value="<?php echo $result->records[$i]->categoriesId;?>">
														<?php echo $result->records[$i]->skuId;?>
														</option>
													</select>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Name</label>
												<div class="controls">
													<input type="text" name="productName" placeholder="Enter Product Name"
														value="<?php echo $result->records[$i]->name;?>"
														class="span8 tip">
												</div>
											</div>

											
											<div class="control-group">
												<label class="control-label" for="basicinput">Product Price Before
													Discount</label>
												<div class="controls">
													<input type="text" name="productpricebd" placeholder="Enter Product Price"
														value="<?php echo $result->records[$i]->price;?>"
														class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Price</label>
												<div class="controls">
													<input type="text" name="productprice" placeholder="Enter Product Price"
														value="<?php echo $result->records[$i]->price - $result->records[$i]->discount;?>"
														class="span8 tip" required>
												</div>
											</div>

											<?php if (!empty($row['size'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Size</label>
													<div class="controls" id="size_area">
														<?php
														$size = explode(',', $row['size']);
														foreach ($size as $item) {
															?>
															<div class="flex-grow-1 pr-3">
																<div class="form-group">
																	<input class="span8 tip" type="text" name="size[]"
																		value="<?= $item ?>" id="size">
																	<button type="button" class="btn btn-danger btn-sm"
																		style="margin-top: 0px;" name="button"
																		onclick="removeSize(this)">
																		Remove
																	</button>
																</div>
															</div>
														<?php } ?>
														<button type="button" class="btn btn-success btn-sm"
															style="margin-top: 0px;" name="button" onclick="appendSize(this)">
															Add
														</button>
													</div>
												</div>
											<?php } else { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Size</label>
													<!-- <div class="controls">
														<input type="text" name="size[]" placeholder="Enter Product Size"
															class="span8 tip">
														<button type="button" class="btn btn-success btn-sm"
															style="margin-top: 0px;" name="button" onclick="appendSize(this)">
															Add
														</button>
													</div> -->
													<div class="controls" id="size_area">
														<button type="button" class="btn btn-success btn-sm"
															style="margin-top: 0px;" name="button" onclick="appendSize(this)">
															Add
														</button>
													</div>
												</div>
											<?php } ?>


											<?php if (!empty($row['color'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Color</label>
													<div class="controls" id="color_area">
														<?php
														$color = explode(',', $row['color']);
														foreach ($color as $item) {
															?>
															<div class="flex-grow-1 pr-3">
																<div class="form-group">
																	<input class="span8 tip" type="text" name="color[]"
																		value="<?= $item ?>" id="color">
																	<button type="button" class="btn btn-danger btn-sm"
																		style="margin-top: 0px;" name="button"
																		onclick="removeColor(this)">
																		Remove
																	</button>
																</div>
															</div>
														<?php } ?>
														<button type="button" class="btn btn-success btn-sm"
															style="margin-top: 0px;" name="button" onclick="appendColor(this)">
															Add
														</button>
													</div>
												</div>
											<?php } else { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Color</label>
													<div class="controls" id="color_area">
														<button type="button" class="btn btn-success btn-sm"
															style="margin-top: 0px;" name="button" onclick="appendColor(this)">
															Add
														</button>
													</div>
												</div>
											<?php } ?>
											<br>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Description</label>
												<div class="controls">
													<textarea name="productDescription" placeholder="Enter Product Description"
														rows="6"
														class="span8 tip"><?php echo $result->records[$i]->description;?>
													</textarea>
												</div>
											</div>

											
											
											<div class="control-group">
												<label class="control-label" for="basicinput">Product Shipping Charge</label>
												<div class="controls">
													<input type="text" name="productShippingcharge"
														placeholder="Enter Product Shipping Charge"
														value="<?php echo $result->records[$i]->shippingCharge;?>"
														class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Availability</label>
												<div class="controls">
													<select name="productAvailability" id="productAvailability"
														class="span8 tip" required>
														<option
															value="<?php echo htmlentities($row['productAvailability']); ?>">
															<?php echo htmlentities($row['productAvailability']); ?>
														</option>
														<option value="In Stock">In Stock</option>
														<option value="Out of Stock">Out of Stock</option>
													</select>
												</div>
											</div>


											<?php if (!empty($row['productImage1'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Image1</label>
													<div class="controls">
														<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage1']); ?>"
															width="200" height="100"> <a
															href="update-image1.php?id=<?php echo $row['id']; ?>">Change Image</a>
													</div>
												</div>
											<?php } ?>
											<?php if (!empty($row['productImage2'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Image2</label>
													<div class="controls">
														<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage2']); ?>"
															width="200" height="100"> <a
															href="update-image2.php?id=<?php echo $row['id']; ?>">Change Image</a>
													</div>
												</div>
											<?php } ?>
											<?php if (!empty($row['productImage3'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Image3</label>
													<div class="controls">
														<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage3']); ?>"
															width="200" height="100"> <a
															href="update-image3.php?id=<?php echo $row['id']; ?>">Change Image</a>
													</div>
												</div>
											<?php } ?>
											<?php if (!empty($row['productImage4'])) { ?>
												<div class="control-group">
													<label class="control-label" for="basicinput">Product Image4</label>
													<div class="controls">
														<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage4']); ?>"
															width="200" height="100"> <a
															href="update-image4.php?id=<?php echo $row['id']; ?>">Change Image</a>
													</div>
												</div>
											<?php } ?>
										<?php } ?>
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

		<div id="blank_size_field" style="display: none;">
			<div class="flex-grow-1 pr-3">
				<div class="form-group">
					<input type="text" class="span8 tip" name="size[]" id="size" placeholder="Enter Product Size" />
					<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button"
						onclick="removeSize(this)">
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
					<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button"
						onclick="removeColor(this)">
						<!-- <i class="fa fa-minus"></i> -->
						Remove
					</button>
				</div>
			</div>
		</div>


		<script>
			function appendSize() {
				var blank_requirement = $('#blank_size_field').html();
				$('#size_area').append(blank_requirement);
			}

			function removeSize(sizeElem) {
				$(sizeElem).parent().parent().remove();
			}


			function appendColor() {
				var blank_requirement = $('#blank_color_field').html();
				$('#color_area').append(blank_requirement);
			}

			function removeColor(sizeElem) {
				$(sizeElem).parent().parent().remove();
			}
		</script>

		<?php include ('include/footer.php'); ?>

		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function () {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
	</body>