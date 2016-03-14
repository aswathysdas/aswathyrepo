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
		<link href= "<?php echo base_url('css/style.css'); ?>" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='<?php echo base_url('http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans');?>' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('css/responsiveslides.css');?>">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('js/responsiveslides.min.js');?>"></script>
		<script src="<?php echo base_url('tree.jquery.js');?>"></script>
		<script src="<?php echo base_url('js/expandcollapsed.js');?>" type="text/javascript"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			//     $(function () {
			
			//       // Slideshow 1
			//       $("#slider1").responsiveSlides({
			//         maxwidth: 1600,
			//         speed: 600
			//       });
			// });


              $(document).ready(function(){
			   
			   	$.ajax({
			   		'type':"POST",
			   		'url' :"http://api.baabtra.com/Mobilestore_service/index.php/Loginctrl/viewcatess",
			   		'datatype':"json",
			   		
			   		'success':function(data){

			   			//alert(data);
			   			//$('#c').empty();
							var dat= JSON.parse(data);
							//alert(dat);
							var toAppend="";
							for (var i = 0; i < dat.length; i++) {

								toAppend+="<li value='"+dat[i].pk_int_category_id+"'><a href='javascript:void(0);'>"+dat[i].vchr_category_nm+"<button type='button' class='btn btn-link' value='"+dat[i].pk_int_category_id+"' onClick='subcat(this.value)'><span class='glyphicon glyphicon-plus'></span></button></a></li><div id='"+dat[i].pk_int_category_id+"'></div>";
							};
							$('#lk').append(toAppend);
			   		}
			   	});

			   	$.ajax({
			   		'type':"POST",
			   		'url' :"http://api.baabtra.com/Mobilestore_service/index.php/Loginctrl/prodluv",
			   		'datatype':"json",
			   		
			   		'success':function(data){

			   			//alert(data);
			   			//$('#c').empty();
							var dat= JSON.parse(data);
							//alert(dat);
							var toAppend="";
							for (var i = 0; i < dat.length; i++) {

								toAppend+="<div class='grid_1_of_4 images_1_of_4 products-info'><img style='width:175px;height:280px;' src='<?php echo base_url(); ?>uploads/"+dat[i].vchr_product_img+"'> <a href='../welcome/singl/."+dat[i].pk_int_prdct_id+"'>"+dat[i].vchr_prdct_nm+"</a><h3>Rs."+dat[i].int_sell_price+"</h3></div>";
							};
							$('#vv').append(toAppend);
			   		}
			   	});
			   })

			     

			  function subcat(kq){

			  	//alert("hi");
					$('#'+kq).load('myfunc');
			  		$.ajax({
			   		'type':"POST",
			   		'url' :"http://api.baabtra.com/Mobilestore_service/index.php/Loginctrl/viewsubcsss",
			   		'datatype':"json",
			   		'data' :{name:kq},
			   		'success':function(data){

			   			//alert(data);
			   			//$('#c').empty();
							var dat= JSON.parse(data);
							//alert(dat);
							var toAppend="";
							for (var i = 0; i < dat.length; i++) {

								toAppend+="<li value='"+dat[i].pk_int_sub_id+"'><a href='javascript:void(0);'>"+dat[i].vchr_sub_categry_nm+"<button type='button' class='btn btn-link' value='"+dat[i].pk_int_sub_id+"' onClick='prodo(this.value)'><span class='glyphicon glyphicon-minus'></span></button></a></li>";
							};
					
							$('#'+kq).append(toAppend);
			   		}
			   	});

							
			  }




			  function prodo(x){

			  	//alert(x);

			  	$.ajax({
			   		'type':"POST",
			   		'url' :"http://api.baabtra.com/Mobilestore_service/index.php/Loginctrl/productlove",
			   		'datatype':"json",
			   		'data' :{name:x},
			   		'success':function(data){

			   			  
			   			//alert(data);

			   			$('#vv').empty();
							var dat= JSON.parse(data);
							//console.dir(dat);
							var toAppend="";
							for (var i = 0; i < dat.length; i++) {
								var h=1;

								toAppend+="<div class='grid_1_of_4 images_1_of_4 products-info'><img style='width:200px;height:280px;' src='<?php echo base_url(); ?>uploads/"+dat[i].vchr_product_img+"'> <a  onClick='prodetails("+dat[i].pk_int_prdct_id+")'>"+dat[i].vchr_prdct_nm+"</a><h3>Rs."+dat[i].int_sell_price+"</h3><ul><li></li></ul></div>";
							};
							$('#vv').append(toAppend);
			   		}
			   	});
			  }

			  function prodetails(pk){

			  	alert(pk);

			  	$.ajax({
			   		'type':"POST",
			   		'url' :"http://api.baabtra.com/Mobilestore_service/index.php/Loginctrl/prodonclick",
			   		'datatype':"json",
			   		'data' :{name:pk},
			   		'success':function(data){

			   			  
			   			alert(data);

			   			//$('#vv').empty();
							var dat= JSON.parse(data);
							//console.dir(dat);
							
							for (var i = 0; i < dat.length; i++) {
								id=dat[i].pk_int_prdct_id;
								desc=dat[i].vchr_desc;
								pric=dat[i].int_price;
								spric=dat[i].int_sell_price;
								imgsp=dat[i].vchr_product_img;
								nms=dat[i].vchr_prdct_nm;
							};
							$('#dtsp').load('index.php/Loginctrl/singl',{a:id,b:desc,c:pric,d:spric,e:imgsp,f:nms});
			   		}
			   	});
			  }
			
		  </script>
		  <style>


		  </style>
	</head>
	<body id="dtsp">
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
					<li><a href="index.php/regstrctrl">Register</a></li>
					<li><a href="index.php/loginctrl">Login</a></li>
					<li id="del">Delivery</li>
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
				<a href="index.html"><img src="<?php echo base_url();?>images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="index.php/welcome/abt">About</a></li>
				<li><a href="index.php/welcome/contct">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
	<!--start-image-slider---->
					<div class="wrap">
					<div class="image-slider" id="img">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="<?php echo base_url();?>images/1.png" alt=""></li>
					      <li><img src="<?php echo base_url();?>images/2.png" alt=""></li>
					      <li><img src="<?php echo base_url();?>images/1.png" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					</div>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="top-3-grids">
		    		<div class="section group">
				<div class="grid_1_of_3 images_1_of_3" id="im1">
					  <a href=""><img style="width:480px;height:250px;" src="<?php echo base_url();?>images/images.jpg"></a>
					  <h3>Samsung Galaxy</h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 second" id="im2">
					   <a href="index.php/welcome/singl"><img src="<?php echo base_url();?>images/grid-img2.jpg"></a>
					  <h3>Nokia Lumia 530 dual sim </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 theree" id="im3">
					   <a href="index.php/welcome/singl"><img style="width:480px;height:250px;" src="<?php echo base_url();?>images/samsunga7.jpg"></a>
					  <h3>Samsung A7</h3>
				</div>

				
			</div>
		    	</div>
		    	
		    <div class="content-grids">
		    	<h4>Deals of the day</h4>
		    	<div class="section group" id="vv">
				
			</div>
			<div class="section group">
				
			</div>
		    
		    	</div>
		    	<div class="content-sidebar">
		    		 <ul>
		    		     	<h4>Categories</h4>
		    		     	<li id="lk">
		    		     	<ul id='sbs'><li></li></ul>
		    		     </li>
		    		     
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
					 	<li><a href="https://mobile.twitter.com"><img src="<?php echo base_url();?>images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="https://www.facebook.com/"><img src="<?php echo base_url();?>images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="https://www.rss.com"><img src="<?php echo base_url();?>images/rss.png" title="Rss" />Rss</a></li>
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

