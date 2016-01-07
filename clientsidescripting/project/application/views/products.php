<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | Home :: W3layouts</title>
		<link href= "<?php echo base_url('css/style.css');?>" rel="stylesheet" type="text/css"  media="all" />
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
			// function loadcategory(){
			// 	var select=document.getElementById('ct');
			// 	select.onchange=updateSubCats;
			// }
			// function updateSubCats(){
			// 	<?php 
			// 	foreach($subcategory as $row){
			// 		if(select== $row->fk_int_category_id){
			// 			echo '<option value="'.$row->fk_int_category_id.'">'.$row->vchr_sub_categry_nm.'</option>';
			// 		}
			// 	}
			// 	?>
			// }	

			function show(){
				

				var valu=$('#ct').val();
				//alert(valu);
                
					$.ajax({
					
						'type' :"POST",
						'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/viewsubcat",
						'datatype' :"json",
						'data' :{name:valu},
						'success':function(data){
								//alert(data);
							$('#vals').empty();
							var dat= JSON.parse(data);
							//alert(dat[1].pk_int_sub_id);
							var toAppend='';
							for (var i = 0; i <=dat.length-1; i++) {

								toAppend+="<option value='"+dat[i].pk_int_sub_id+"'>"+dat[i].vchr_sub_categry_nm+"</option>";
							};
							$('#vals').append(toAppend);
						}
				
			}); 
			}

		 
		   </script>
		  <style>
		           ul li
                     {
                          display: block;
                          position: relative;
                          float: left;
                      }

                       li ul
                          {
                             display: none;
                          }
                          li:hover ul 
                          {
                            display: block;
                            position: absolute;
                             background: #77b300;
                          }

                      ul li a { 
                                  display: block;  
                                  text-decoration: none;   
                                  color: #ffffff;  
                                  
                                  padding: 5px 15px 5px 15px;
                                   
                                  margin-left: 1px; 
                                  white-space: nowrap; 
                              } 
                       li:hover li
                        {
                        float: none;
                        font-size: 11px;
                        }

                      li:hover li a:hover 
                       {
                        background: #77b300;
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
				<li><a href="about.html">About</a></li>
				<li><a href="">Add</a>
					<ul>
						<li><a href="../Category_ctrl">Categories</a></li>
						<li><a href="subcat">Sub-Categories</a></li>
						<li><a href="addproduct">Products</a></li>
					</ul>
				</li>
				<li><a href="">Edit</a>
					<ul>
						<li><a href="">Categories</a></li>
						<li><a href="">Sub-Categories</a></li>
						<li><a href="">Products</a></li>
					</ul>

				</li>
				<li><a href="">View</a>
					<ul>
						<li><a href="">Categories</a></li>
						<li><a href="">Sub-Categories</a></li>
						<li><a href="">Products</a></li>
					</ul>

				</li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
        <!--start-image-slider---->
                      
					<div class="wrap">
					  <div id="prdct" style="padding:10px;">
					  	<div class="row">
					  		<div class="col-sm-offset-4 col-sm-5">
					  			<div class="panel panel-default">
					  				<div class="panel-heading">
					  					<span class="glyphicon glyphicon-list-alt"></span> Add Products
					  				</div>
					  				<div class="panel-body">
					  					<form class="form-horizontal" method="post" action="">
					  						<div class="form-group">
					  						<label class="col-sm-4 control-label">Category</label>
					  						<div class="col-sm-7">
					  							<select name="sub" id="ct" onChange="show()">
					  								<option>Select Category</option>
					  								<?php 
					  			               foreach ($category as $row) {
					  			    	     echo '<option value="'.$row->pk_int_category_id.'">'.$row->vchr_category_nm.'</option>';
					  			            }
					  			              ?>
					  			           </select>
					  						</div>
					  						</div>
					  						<div class="form-group">
					  							<label class="col-sm-4 control-label">Sub-category</label>
					  							<div class="col-sm-7">
					  								<select name="subcat" id="vals">
					  									<option>Select sub-category</option>
					  			              </select>
					  							</div>
					  						</div>
					  						<div class="form-group">
					  							<label for="product" class="col-sm-4 control-label">Product Name</label>
					  							<div class="col-sm-7">
					  								<input id="product" type="text" placeholder="product name" name="productnm" required>
					  							</div>
					  						</div>
					  						<div class="form-group">
					  							<label for="descr" class="col-sm-4 control-label">Description</label>
					  							<div class="col-sm-7">
					  								<textarea id="descr" name="desc"></textarea>
					  							</div>
					  						</div>
					  						<div class="form-group">
					  							<label for="pric" class="col-sm-4 control-label">Price</label>
					  							<div class="col-sm-7">
					  								<input id="pric" type="text" placeholder="price" name="price" required>
					  							</div>
					  						</div>
					  						<div class="form-group">
					  							<label for="quantity" class="col-sm-4 control-label">Quantity</label>
					  							<div class="col-sm-7">
					  								<input id="quantity" type="text" placeholder="quantity" name="qty" required>
					  							</div>
					  						</div>
					  						<div class="col-sm-offset-5 col-sm-7">
                                           <button type="submit" name="addsub" class="btn btn-success">Submit</button>      
                                           </div>
					  					</form>
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
				<div class="grid_1_of_3 images_1_of_3" id="im1">
					  <a href="single.html"><img src="<?php echo base_url();?>images/grid-img1.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 second" id="im2">
					   <a href="single.html"><img src="<?php echo base_url();?>images/grid-img2.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 theree" id="im3">
					   <a href="single.html"><img src="<?php echo base_url();?>images/grid-img3.jpg"></a>
					  <h3>Lorem Ipsum is simply dummy text </h3>
				</div>

				
			</div>
		    	</div>
		    	
		    <div class="content-grids">
		    	<h4>Deals of the day</h4>
		    	<div class="section group">
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m1.jpg">
					 <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>RS.3260</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m2.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.5150</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m7.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.6130</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m4.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.9460</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
			</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m2.jpg">
					 <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.10,260</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m6.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.10,100</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m7.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.12,180</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="<?php echo base_url();?>images/m1.jpg">
					  <a href="single.html">Duis aute irure dolor in reprehenderit sed do eiusmod tempor incididunt</a>
					 <h3>Rs.15,140</h3>
					 <ul>
					 	<li style="background:#9cd12e;"><a style="color:white;" href="single.html">Buy Now</a></li>
					 </ul>
				</div>
			</div>
		    
		    	</div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							<li class="category">Mobiles
							<ul>
							<li><a href="#">Accord Mobiles</a></li>
							<li><a href="#">Apple</a></li>
							<li><a href="#">Samsung Mobiles</a></li>
							<li><a href="#">Sony Ericsson Mobiles</a></li>
						</ul>
							</li>
							
							<li class="category">Mobile Accessories
								<ul>
							<li><a href="#">Cases And Covers</a></li>
							<li><a href="#">Mobile Memory Cards</a></li>
							<li><a href="#">Power Banks</a></li>
							<li><a href="#">Pendrives</a></li>
						</ul>
							</li>
							<li><a href="javascript:void(0);">Headphones And Headsets</a></li>
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
					 	<li><a href="#"><img src="<?php echo base_url();?>images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="<?php echo base_url();?>images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="<?php echo base_url();?>images/rss.png" title="Rss" />Rss</a></li>
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

