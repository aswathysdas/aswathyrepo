<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | Home :: W3layouts</title>
		<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='<?php echo base_url('http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans');?>' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('css/responsiveslides.css');?>">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js')"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/responsiveslides.min.js>"></script>
		  <script>


		  
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});

			   

		  </script>
		  <style>

		  /* #reg{
		  	margin-left: 700px;
		  	margin-top:10px;
		  	padding: 3px;
		  }*/

		   #sign{
		  	margin-left: 120px;
		  }




		  </style>

	</head>
	<body>

		<div class="wrap">
		<!----start-Header---->
		
		<div class="header">
			                
			
			<div class="search-bar">
				<form>
					<input type="text"><input type="submit" value="Search" />
				</form>
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					<li><a href="loginctrl">Login</a></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">My account</a></li>
					<li><a href="#"><span>shopingcart&nbsp;&nbsp;: </span></a><lable> &nbsp;noitems</lable></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="../">Home</a></li>
				<li><a href="welcome/abt">About</a></li>
				<li><a href="store.html">Store</a></li>
				<li><a href="store.html">Featured</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
	<!--start-image-slider---->

					<div class="wrap">
						
					<div id="reg">

					<div class="row" id ="div1">
        <div class="col-sm-offset-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span class="glyphicon glyphicon-lock"></span>Register 
                   </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="register" action ="" method="post">
                    <div class="form-group">
                        <label for="inputfname3" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-7">
                        <input type="text"id="txt1" name="fname" class="form-control" id="inputfname3" placeholder="First Name" required>
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLname3" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="lname" id="txt2" class="form-control" id="inputLname3" placeholder="Last Name" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email Id</label>
                        <div class="col-sm-7">
                            <input type="email" name="email" id="txt3" class="form-control" id="inputEmail3" placeholder="Email" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="addrs" id="txt4" class="form-control" id="inputAddress3"></textarea>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputPincode3" class="col-sm-3 control-label">Pin Code</label>
                        <div class="col-sm-7">
                            <input type="text" name="pincd" id="txt5" class="form-control" id="inputPincode3" placeholder="pincode" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputMobilenum3" class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-7">
                            <input type="text" name="mbnum" id="txt6" class="form-control" id="inputMobilenum3" placeholder="Mobile number" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="pswd" id="txt7" class="form-control" id="inputPassword3" placeholder="password" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputConfrmpassword3" class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="cnfrmpswd" id="txt8" class="form-control" id="inputConfrmpassword3" placeholder="Confirm password" required>
                       </div>
                        </div>
                         <div class="col-sm-offset-5 col-sm-7">
                            <button type="submit" name="submt" class="btn btn-success">Sign Up</button>    
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

				</div>
					<!--End-image-slider---->
					</div>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="top-3-grids">
		    		<div class="section group">
				<div class="grid_1_of_3 images_1_of_3">
					  <a href="single.html"><img src="images/grid-img1.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 second">
					   <a href="single.html"><img src="images/grid-img2.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 theree">
					   <a href="single.html"><img src="images/grid-img3.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>
			</div>
		    	</div>
		    	
		    <div class="content-grids">
		    	<h4>Deals of the day</h4>
		    	<div class="section group">
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m1.jpg">
					 <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$260</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m2.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$150</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m7.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$130</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m4.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$460</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
			</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m2.jpg">
					 <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$260</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m6.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$100</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m7.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$180</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/m1.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>$140</h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="single.html"> </a></li>
					 	<li><a  class="Compar" href="single.html"> </a></li>
					 	<li><a  class="Wishlist" href="single.html"> </a></li>
					 </ul>
				</div>
			</div>
		    
		    	</div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							<li><a href="#">Accord Mobiles</a></li>
							<li><a href="#">Ace Mobile</a></li>
							<li><a href="#">Acer Mobile</a></li>
							<li><a href="#">Airfone</a></li>
							<li><a href="#">Apple</a></li>
							<li><a href="#">Blackberry</a></li>
							<li><a href="#">Byond Tech</a></li>
							<li><a href="#">Celkon Mobiles</a></li>
							<li><a href="#">Dell Mobile Phones </a></li>
							<li><a href="#">Fly Mobile</a></li>
							<li><a href="#">Fujezone Mobiles </a></li>
							<li><a href="#">HTC</a></li>
							<li><a href="#">LG Mobiles</a></li>
							<li><a href="#">Longtel Mobile</a></li>
							<li><a href="#">Maxx</a></li>
							<li><a href="#">Micromax Mobiles </a></li>
							<li><a href="#">Samsung Mobiles</a></li>
							<li><a href="#">Sony Ericsson Mobiles</a></li>
							<li><a href="#">Wynncom Mobiles</a></li>
						</ul>
		    	</div>
		    </div>
		    <div class="clear"> </div>
		    </div>
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Latest-News</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Store Location</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<h3>Order-online</h3>
					<p>080-1234-56789</p>
					<p>080-1234-56780</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
					<input type="text"><input type="submit" value="go" />
					<h3>Fallow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
					 </ul>
				</div>
			</div>
		</div>
		
		<div class="clear"> </div>
		<div class="wrap">
		<div class="copy-right">
			<p>Mobilestore  &#169	 All Rights Reserved | Design By <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>

