<?php
	$link=mysqli_connect("localhost","root","root","GymBet");

	if(isset($_POST['identifier'])) {
		// create array of acceptable values
		$ok = array('andrew', 'sahrah');
		// if we have an acceptable value for color_name ...
		if(in_array($_POST['identifier'], $ok)) {
			// update the counter for that color
			$q = mysqli_query($link, "UPDATE counter SET count = count + 1 WHERE identifier = '" . $_POST['identifier'] . "'") or die ("Error updating count for " . $_POST['identifier']);
		}
	}

	$rs = mysqli_query($link, "SELECT * FROM counter") or die ('Cannot process SQL count totals query');
	if(mysqli_num_rows($rs) > 0) {
		while($row = mysqli_fetch_array($rs)) {
			$count[$row['identifier']] = $row['count'];
		}
	}
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Gym Bet</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/demo.css">

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<!--<link rel="icon" type="image/png" href="favicon.png">-->

</head>

<body>

	<!-- header 
   ================================================== -->
   <header>
   	<div class="row">
   		<div class="col-twelve">

   			<h1>GET FIT OR BUY PETER LUGER'S TRYIN<span>.</span></h1>

   			<p class="lead">
   			Plz be ethical!! :)
   			</p>

   		</div>
   	</div>   	
   </header> <!-- /header -->

   	<!-- main content
   ================================================== -->
   <main>
   	<div class="row">
   		<div class="block-1-3 block-s-1-2 block-mob-full">
   			<div class="bgrid">
   					<div class="image-part">
   						<img class='pic' src="images/demo/andrew.jpg" alt="">
   					</div>
   					<div class="demo-title">
   						<h3>Andrew</h3>
   						<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
							<label id="l_andrew"><input type="radio" id="r_andrew" name="identifier" value="andrew" onclick="this.form.submit();" /></label> <label id="c_andrew"><h3><?php echo $count['andrew']; ?></h3></label>
						</form>
   					</div>
   				</a>
   			</div>

   			<div class="bgrid">
   					<div class="image-part">
   						<img class='pic' src="images/demo/sahrah.jpg" alt="">
   					</div>
   					<div class="demo-title">
   						<h3>SAHRAH</h3>
   						<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
							<label id="l_sahrah"><input type="radio" id="r_sahrah" name="identifier" value="sahrah" onclick="this.form.submit();" /></label> <label id="c_sahrah"><h3><?php echo $count['sahrah']; ?></h3></label>
						</form>
   					</div>
   				</a>
   			</div>
   		</div>
   	</div>   
   </main> <!-- /main -->

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>