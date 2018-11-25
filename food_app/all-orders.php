<?php
include 'includes/connect.php';
include 'routers/Module.php';
	if($_SESSION['admin_sid']==session_id())
	{
				$obj = new Module;

		?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<title>All orders</title>

	<!-- Favicons-->
	<link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
	<!-- Favicons-->
	<link rel="apple-touch-icon-precomposed" href="images/fsavicon/apple-touch-icon-152x152.png">
	<!-- For iPhone -->
	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
	<!-- For Windows Phone -->


	<!-- CORE CSS-->
	<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
	<!-- Custome CSS-->    
	<link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

	<style type="text/css">
		div.show-image {
    position: relative;
    float:left;
    margin:5px;
}
.update, .delete {
	background-color:#a8bfb9;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #afb3b2;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:10px 19px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2b665e;
}
.update:hover, .delete:hover {
	background-color:#6ac9c9;
}


div.show-image:hover table{
    opacity:0.5;
}
div.show-image:hover a {
    display: block;
}
div.show-image a {
    position:absolute;
    display:none;
}
div.show-image a.update {
    top:100px;
    left:40px;
}
div.show-image a.delete {
    top:100px;
    left:150px;
}
	</style>
</head>

<body>
	<!-- Start Page Loading -->
	<div id="loader-wrapper">
			<div id="loader"></div>        
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->

	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START HEADER -->
<?php include('header.php') ?>
	<!-- END HEADER -->

	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START MAIN -->
	<div id="main">
		<!-- START WRAPPER -->
		<div class="wrapper">

			<?php include('leftbar.php') ?>
			<!-- //////////////////////////////////////////////////////////////////////////// -->

			<!-- START CONTENT -->
			<section id="content">

				<!--start container-->
				<div class="container">
					<p class="caption">List of orders by customers with details</p>
					<div class="divider"></div>
					<!--editableTable-->
					<div class="container">

						<div class="table-responsive">          
							<table class="table">
								<tr>
									<?php 

									$result = mysqli_query($con, 'select id ,table_id, waiter_id, time, total_bill from orders');
									$cnt = 1;
									while($row = mysqli_fetch_array($result))
									{ 
										$res = mysqli_query($con, 'SELECT item, price ,quantity FROM orders o JOIN order_details od on (o.id = od.order_id) where od.order_id ='.$row['id']);


										?>


										<td>

											<div class="table-responsive show-image" style="min-height: 268px;border: 1px solid;width:70% !important">

												<table class="table" border="1" width="100%" >
													<caption>
														Order No: #<?php echo $row['id'] ?> &nbsp;&nbsp;
														Waiter  : <?php echo $obj->waiterName($row['waiter_id'],$con)  ?>&nbsp;&nbsp;
														Table    : <?php echo $row['table_id'] ?>
													</caption>
													<tr>
														<th>#</th>
														<th>Item</th>
														<th>Qty</th>
														<th>Price</th>
													</tr>
													<?php
													$sno = 1;
													while($data = mysqli_fetch_array($res)){
														?>															
														<tr>
															<td><?php echo $sno++ ?></td>
															<td><?php echo $obj->itemName($data['item'],$con) ?></td>
															<td><?php echo $data['quantity'] ?></td>
															<td><?php echo $data['price'] ?></td>
														</tr>
													<?php } ?>
													<tr>
														
														<td colspan="3">
															Total Amount : <?php ($row['total_bill'] > 200) ? print_r($row['total_bill'].' + 20 Rs (TC)' ) : print_r($row['total_bill']) ?>  
														</td>
														<td><b><?php ($row['total_bill'] > 200) ? print_r($row['total_bill'] + 20 ) : print_r($row['total_bill']) ?> Rs</b></td>
													</tr>

												</table>
												<div style="text-align: center;">
													<a class="update"  href='new_order.php?id=<?php echo $row['id'] ?> '" />Update</a>
													<a class="delete" href="javascript:void('0');" />Checkout</a>
												</div>

											</div>
										</td>
										<?php 
										if ($cnt++ %2 == 0) {
											echo "</tr><tr>";
										}
									}
									?>
								</tr>

							</table>
						</div>
					</div>

					<!--end container-->
				</section>
				<!-- END CONTENT -->
			</div>
			<!-- END WRAPPER -->

		</div>
		<!-- END MAIN -->



	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START FOOTER -->
	<?php include('footer.php') ?>
		<!-- END FOOTER -->



		<!-- ================================================
		Scripts
		================================================ -->
		
		<!-- jQuery Library -->
		<script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
		<!--angularjs-->
		<script type="text/javascript" src="js/plugins/angular.min.js"></script>
		<!--materialize js-->
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<!--scrollbar-->
		<script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>       
		<!--plugins.js - Some Specific JS codes for Plugin Settings-->
		<script type="text/javascript" src="js/plugins.min.js"></script>
		<!--custom-script.js - Add your own theme custom JS-->
		<script type="text/javascript" src="js/custom-script.js"></script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_id']==session_id())
		{
			header("location:orders.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>
