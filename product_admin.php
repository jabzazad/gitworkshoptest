
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
	<title>Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
							<li class="active-menu">
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

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" >
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

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  ">
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

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".new">
						New
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Women">
						Women
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Sort By
					</div>
				</div>

				<!-- Filter -->
				<?php
				echo '<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						

						<div class="filter-col2 p-r-15 p-b-27 filter-tope-group">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<button class="filter-link stext-106 trans-04 how-active1" data-filter="*">
								All Products
							</button>
								</li>

								<li class="p-b-6">
								<button class="filter-link stext-106 trans-04 " data-filter=".zero">
										$0.00 - $50.00
									</button>
								</li>

								<li class="p-b-6">
									<button class="filter-link stext-106 trans-04" data-filter=".fifty">
										$50.00 - $100.00
									</button>
								</li>

								<li class="p-b-6">
									<button class="filter-link stext-106 trans-04" data-filter=".hundred">
										$100.00 - $150.00
									</button>
								</li>

								<li class="p-b-6">
									<button class="filter-link stext-106 trans-04" data-filter=".hundredfifty">
										$150.00 - $200.00
									</button>
								</li>

								<li class="p-b-6">
									<button class="filter-link stext-106 trans-04" data-filter=".high">
										$200.00+
									</button>
								</li>
							</ul>
						</div>';
				
?>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
			<?php
			$connect = mysqli_connect("localhost", "root", "", "market");
			$query = "SELECT * FROM product";
			$result = mysqli_query($connect, $query);
			if(!$result){
				echo mysqli_error().'<br>';
				die('Can not acess database');
			}else{
			while($row = mysqli_fetch_array($result)){
			if($row['Pprice']>=0 && $row['Pprice']<50){
			echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new zero">';
			}else if($row['Pprice']>=50 && $row['Pprice']<100){
				echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new fifty">';
			}else if($row['Pprice']>=100 && $row['Pprice']<150){
				echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new hundred">';
			}else if($row['Pprice']>=150 && $row['Pprice']<200){
				echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new hundredfifty">';
			}else{
					echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new high">';
			}
					echo '<div class="block2">';
					echo '<div class="block2-pic hov-img0">';
						echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Pimage'] ).'" height="300" width="300" class="img-thumnail"
						 alt="IMG-PRODUCT">';
						 echo '<form action="product-update.php" method="get">';
				  echo '<button type="submit" name="count" 
				   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 "value="'.$row['Pid'].'">
							Update
								</button';		
						echo "</form>";
						echo '</div>';
						echo '<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									'.$row['Pname'].'
								</a>

								<span class="stext-105 cl3">
								$'.$row['Pprice'].'
								</span>
							</div>
						</div>
					</div>
				</div>';
			}}
			/*SavepointJab*/
			
							echo "<br>";
			
?>
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

	<!-- Modal1 -->

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
	<!--============================================================================================-->
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
