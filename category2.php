<?php include('server.php');?>

<?php
$conn = new mysqli("localhost", "root", "", "grams");

if ($conn->connect_error) {	
	die("Connection failed: " . $conn->connect_error);
}
$usr = $_SESSION["name"];
$cat_name = "";
$cat_id = $_GET['cat'];

		$sql1 = "SELECT cat_name FROM category WHERE cat_id=$cat_id";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
    		while($row1 = $result1->fetch_assoc()) {
        	$cat_name = $row1['cat_name'];
    		}
		}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
<style>
</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>GRAMS : The Online Trading Community</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
	content="Free HTML5 Website Template by FreeHTML5.co" />
<meta name="keywords"
	content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
<meta name="author" content="FreeHTML5.co" />


<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<meta property="og:description" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<link
	href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700'
	rel='stylesheet' type='text/css'>

<!-- Animate.css -->
<link rel="stylesheet" href="css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- Owl Carousel -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<!-- Theme style  -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">

<!-- Modernizr JS -->
<script src="js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body
	style="background-size: 100px 80px; background-repeat: no-repeat; size: 10">
<?php if(isset($_SESSION['success'])):?>
<h3>
<?php 
echo $_SESSION['success'];
unset($_SESSION['success']);
 ?>
 </h3>
 <?php endif?>
 <?php if(isset($_SESSION["name"])):?>


	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<div class="topnav w3-bar w3-left" style="position: fixed; top: 0px;">
			<span style="padding:8px 16px;float:left;width:auto;border:none;display:block;outline:0;color:#cc0000"><b>Let's Share &amp; Evolve!!!</b></span>
			<a class="active w3-bar-item w3-button" href="profile.php" style="color:yellow;"><?php echo $_SESSION['name'];?><?php endif?> &nbsp;<img src="logo\user_logo.png"  width="27" height="27"/></a>
			<a class="active w3-bar-item w3-button" href="login.php?logout='1'">Logout </a>			
			<div class="search-container">

				<form action="search2.php" method="post">
					<button id="close-image" type="submit">
						<img src="logo/search.png">
					</button>
					<input type="text" placeholder="Search term here" name="search" id="search"
						class="w3-bar-item w3-button w3-right" style="color: white;"/>
				</form>
			</div>
		</div>
		<aside id="fh5co-aside" role="complementary"
			class="border js-fullheight" style="overflow: hidden;">
			<br> <br>
			<h1 id="fh5co-logo">
				<a href="index.php"><img src="images/logo.png" width="135"
					height="100" alt="Free HTML5 Bootstrap Website Template"></a>
			</h1>
			<br>


			<nav id="fh5co-main-menu" role="navigation">
				<ul>
                    <?php
                    for($i=1; $i<=10; $i++)
                    {
                        $cat_name2 = "";
                        $sql2 = "SELECT cat_name FROM category WHERE cat_id=$i";
		                $result2 = $conn->query($sql2);
		                if ($result2->num_rows > 0) {
    		                while($row2 = $result2->fetch_assoc()) {
        	                    $cat_name2 = $row2['cat_name'];
                            }
                        }
                        if($i==$cat_id) {
            			    echo "<li class=\"fh5co-active\"><a href=\"category.php?cat=".$i."\">".$cat_name2."</a></li>";
                        } else {
					        echo"<li><a href=\"category2.php?cat=".$i."\">".$cat_name2."</a></li>";
                        }
                    }
                    ?>
				</ul>
			</nav>


			<div class="fh5co-footer">
				<ul>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>




		<div id="fh5co-main">


			<div class="fh5co-narrow-content" style="width: 40%;padding-bottom: 20px;">
				<h3 class="fh5co-heading animate-box"
					data-animate-effect="fadeInLeft" style="color: lightcoral;">
					<center><?php echo $cat_name?></center>
				</h3>
			</div>
			<div class="fh5co-narrow-content" style="width: 80%;padding-top: 10px;">
					<table>
<?php

$sql = "SELECT p_id, title, desp, price, cat, dt, img1 FROM product where cat=$cat_id AND name<>'$usr'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {

		echo "				<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" class=\"fixed breakword promoted-list ad_id1i3sPL\" summary=\"Ad\" data-photos=\"4\">
			<tbody>
				<tr>
								<td width=\"164\" rowspan=\"2\">
						<div class=\"space\">

														<span class=\"rel inlblk detailcloudbox\">
								<a
									class=\"thumb vtop inlblk rel tdnone linkWithHash scale5 detailsLinkPromoted\"
									href=\"product.php?p_id=".$row["p_id"]."\" title=\"\">
									<img class=\"fleft\" height=\"100px\" width=\"100px\" src=\"uploads/".$row["img1"]."\" alt=\"2010 Harley Bullet 15000 Kms\">
								</a>
							</span>
													</div>
					</td>
								<td valign=\"top\">
						<h3 class=\"large lheight20 margintop10\">
														<a href=\"product.php?p_id=".$row["p_id"]."\" class=\"marginright5 link linkWithHash detailsLinkPromoted\">
								<span>".$row["title"] ."</span>
							</a>
							
						</h3>
						<p class=\"color-9 lheight14 margintop3\">
							<small class=\"breadcrumb small\">
                                                        ".$cat_name."							</small>
						</p>
					</td>
					<td width=\"170\" class=\"wwnormal tright td-price\" valign=\"top\">
						<div class=\"space rel\">
													<p class=\"price x-large margintop10\">
							 &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp	<img height=\"15\" src=\"logo/inr_symbol.png\"/>
								<strong class=\"c000\">
								".$row["price"] ."								</strong>
							</p>
																									</div>
					</td>
				</tr>
				<tr>
					<td valign=\"bottom\">
						<p class=\"color-9 lheight14 margintop3 small\">".$row["dt"]."						    						</p>
					</td>
				
				</tr>
			</tbody>
            
		</table>";	
	}	
}
else {
	
	echo "No results found";
	
}
?>
					</table>
				</c:forEach>
				<!-- jQuery -->
				<script src="js/jquery.min.js"></script>
				<!-- jQuery Easing -->
				<script src="js/jquery.easing.1.3.js"></script>
				<!-- Bootstrap -->
				<script src="js/bootstrap.min.js"></script>
				<!-- Carousel -->
				<script src="js/owl.carousel.min.js"></script>
				<!-- Stellar -->
				<script src="js/jquery.stellar.min.js"></script>
				<!-- Waypoints -->
				<script src="js/jquery.waypoints.min.js"></script>
				<!-- Counters -->
				<script src="js/jquery.countTo.js"></script>


				<!-- MAIN JS -->
				<script src="js/main.js"></script>
			</div>
</body>

</html>