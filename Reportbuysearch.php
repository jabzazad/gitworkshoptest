
<?php
	require_once("connect.php");
	if(!isset($_SESSION['Mid']))
	{
		echo '<a href="login.php">Please Login!</a>';
		exit();
	}elseif($_SESSION['Mid']!=1){
        echo '<a href="logout.php">Please Login Admin account!</a>';
		exit();
    }
	//*** Update Last Stay in Login System
	$sql = "UPDATE account SET LastUpdate = NOW() WHERE Mid = '".$_SESSION["Mid"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM account WHERE Mid = '".$_SESSION['Mid']."' ";
	$objQuery = mysqli_query($con,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo1234.JPG"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">Logout</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="product_admin.php" class="logo">
						<img src="images/icons/logo1234.JPG" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="product_admin.php">Shop</a>
							</li>
                            <li>
								<a href="productinsert.php">Insert New Product</a>
                            </li>
                            <li >
					<a href="Reportallpurchase.php">Report All Sold Product</a>
                </li>
                <li>
					<a href="Reportstuckincart.php">Report All Stuck in user cart</a>
				</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart" >
						<a href="product.php">
							<i class="zmdi zmdi-local-store">
							</i>
							</a>
						</div>

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="product_admin.php"><img src="images/icons/logo1234.JPG" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 " >
                <a href="product.php">
							<i class="zmdi zmdi-local-store">
							</i>
							</a>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">Logout</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">

				<li>
					<a href="product_admin.php">Shop</a>
                </li>
                <li>
					<a href="productinsert.php">Insert New Product</a>
                </li>
                <li>
					<a href="Reportallpurchase.php">Report All Sold Product</a>
				</li>
                <li>
					<a href="Reportstuckincart.php">Report All Stuck in user cart</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" id="search_text" placeholder="Search..." onkeyup="load_data()" >
					<div id="result"></div>
				</form>
			</div>
		</div>
	</header>


			<!-- End Sidebar navigation -->
		</div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 597.739px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
		<!-- End Sidebar scroll-->
	</div>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
            <?php
            echo "Report Search MemberID:".$_GET['Mid'];
            echo "<br>Date:".$_GET['dates'];
            ?>
		</h2>
	</section>	
<div class="container-fluid">
	<div class="row">
		
<?php
	$connect = mysqli_connect("localhost", "root", "", "market");
	$query = "SELECT * FROM sell INNER JOIN product on sell.Pid=product.Pid
	INNER JOIN account on sell.Mid=account.Mid
	INNER JOIN personalinfo on account.username=personalinfo.username 
    where sell.dates='".$_GET['dates']."' AND sell.Mid='".$_GET['Mid']."';";
	$result = mysqli_query($connect, $query);
	if(!$result){
		echo mysqli_error().'<br>';
		die('Can not acess database');
	}else{

	echo '<div class="col-7 col-lg-8">
            <div class="card">';
            $Totalsold=0;
			while($row = mysqli_fetch_array($result)){
				$TotalProduct=0;
				$TotalPrice=0;
				$countdate=0;
				echo'<div class="card-title">';
                      echo'  <h5>'.$row['Dates'].'<br>Name:'.$row['Firstname'].'<br>MemberID:'.$row['Mid'].' </h5>
					  </div>';
					
                    echo '<div class="card-body">
						<div class="table-responsive">';
                            echo '<table class="table" border=1>
                                <thead>
                                    <tr>
                                        <th>Productname</th>
                                        <th>Total</th>
                                        <th>Price</th>
                                    </tr>
								</thead>';
							echo'<tbody>';							
								echo ' <tr>
	<td>'.$row['Pname'].'</td>
	<td>'.$row['Qproduct'].'</td>
	<td class="color-primary"> $'.$row['Pprice']*$row['Qproduct'].'</td>
</tr>';	
$TotalProduct+=$row['Qproduct'];
$TotalPrice+=$row['Pprice']*$row['Qproduct'];
$checkdate=$row['Dates'];

	
                                  echo'<tr>
                                       <td><b>Total</b></td>
                                        <td>'.$TotalProduct.'</td>
                                        <td class="color-danger">$'.$TotalPrice.'</td>
									</tr>';
								echo '</tbody>';
							echo '</table>';
						
                        echo '</div>
                    </div><br>';
                    $Totalsold+=$TotalPrice;
					
			}	
			echo "Total Price From all sold Product is $".$Totalsold;
              echo' </div>
		</div>';
	}
?>
<div id="searchz" class="col-5 col-lg-4">
<form class="flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input  class="plh3" type="text" name="find" id="find" placeholder="Search MemberID" onkeyup="load_data()" >
					<div id="resultMID"></div>
				</form>
</div>
	</div>
</div>

<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at Male Dormitory, Prince of Songkla University, Phuket Campus
80, Moo 1, Vichitsongkram Road, Kathu, Kathu District Phuket 83120
Tambon Wichit, Amphoe Mueang Phuket
Chang Wat Phuket 83000
Thailand or call us on  (+86)10-62785025
					</p>

					<div class="p-t-27">
						<a href="https://www.facebook.com/1234Company/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
</body>
</html>
<script>
	$(document).ready(function(){
	
	 function load_data(query){
	  $.ajax({
	   url:"fetch.php",
	   method:"POST",
	   data:{query:query},
	   success:function(data){
		$('#result').html(data);
	   }
	  });
	 }
	 $('#search_text').keyup(function(){
	  var search = $(this).val();
	  if(search != ''){
	   load_data(search);
	  }
	  else{
	   load_data();
	  }
	 });
	});
	</script>
	<!--==========================================================-->
	<script>
	$(document).ready(function(){
	
	 function load_data(query){
	  $.ajax({
	   url:"fetchstuck.php",
	   method:"POST",
	   data:{query:query},
	   success:function(data){
		$('#resultMID').html(data);
	   }
	  });
	 }
	 $('#find').keyup(function(){
	  var search = $(this).val();
	  if(search != ''){
	   load_data(search);
	  }
	  else{
	   load_data();
	  }
	 });
	});
	</script>
