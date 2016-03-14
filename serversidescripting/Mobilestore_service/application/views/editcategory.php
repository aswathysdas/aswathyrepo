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

             
               $(document).ready(function(){
			    		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/Loginctrl/prodluv",
			   		'datatype':"json",
			   		
			   		'success':function(data){

			   			//alert(data);
			   			//$('#c').empty();
							var dat= JSON.parse(data);
							//alert(dat);
							var toAppend="";
							for (var i = 0; i < dat.length; i++) {

								toAppend+="<div class='grid_1_of_4 images_1_of_4 products-info'><img style='width:200px;height:280px;' src='<?php echo base_url(); ?>uploads/"+dat[i].vchr_product_img+"'> <a href='../welcome/singl/."+dat[i].pk_int_prdct_id+"'>"+dat[i].vchr_prdct_nm+"</a><h3>Rs."+dat[i].int_sell_price+"</h3></div>";
							};
							$('#vv').append(toAppend);
			   		}
			   	});
			   })
			    function editcat(val){
			    	//$('#edit').load('showcat');
			    		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/showcat",
			   		'datatype':"json",
			   		'data' :{name:val},
			   		'success':function(data){
			   			//alert(data);
			   			$('#edit').empty();
							var dat= JSON.parse(data);
							//alert(dat[1].pk_int_sub_id);
							var toAppend='';
							for (var i = 0; i <=dat.length-1; i++) {

								toAppend+="<input type='hidden' name='catid' value='"+dat[i].pk_int_category_id+"'><input id='txt1' type='text' id='inputcat' class='form-control' placeholder='"+dat[i].vchr_category_nm+"' name='ctgry'><br><button type='submit' name='add' class='btn btn-success'>"+'Submit'+"</button>";
							};
							$('#edit').append(toAppend);
			   		}
			   	});

			   
			    }



			    function deletecat(c){

			    		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/delcat",
			   		'data' :{name:c},
			   		'success':function(data){
			   			if (data=="YES") {alert("There is an error in deletion");} else{
			   				alert("successfully deleted");
			   				  setInterval('autoRefresh1()', 1000);
			   			};
			   			
			   		}
			   	});

			    }

			   function autoRefresh1()
                      {
	                     window.location.reload();
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

		  
                  #ct th,tr,td{
                	padding: 2px;
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
					<li><a href="Loginctrl/logout">Logout</a></li>
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
						<li><a href="editcat">Categories</a></li>
						<li><a href="vieweditsub">Sub-Categories</a></li>
						<li><a href="vieweditproduct">Products</a></li>
					</ul>

				</li>
				<li><a href="">View</a>
					<ul>
						<li><a href="viewc">Categories</a></li>
						<li><a href="viewsub">Sub-Categories</a></li>
						<li><a href="viewprdct">Products</a></li>
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
					  <div style="padding:50px;">
					  	<div class="row" id="div1">
					  		<div class="col-sm-offset-4 col-sm-4">
					  			<div class="panel panel-default">
					  				<div class="panel-heading">
					  					<h4>Categories</h4>
					  				</div>
					  				<div class="panel-body" id="div">
					  					 
					  					<table id="ct">
					  						<tr>
					  							<th>SL NO</th>
					  							<th>Category Name</th>
					  							<th></th>
					  						</tr>
					  						<?php
					  						$c="0"; 
					  						foreach ($category as $row) {
					  							echo "<tr>";
					  							echo "<td>".++$c."</td><td>".$row->vchr_category_nm."</td>";
					  							echo "<td><button type='button' class='btn btn-link' onclick='editcat(this.value)' value='".$row->pk_int_category_id."' id='".$row->pk_int_category_id."'>Edit</button><button type='button' onClick='deletecat(this.value)' class='btn btn-link' value='".$row->pk_int_category_id."' id='".$row->pk_int_category_id."'>Delete</button></td>";
					  							echo "</tr>";
					  						}
					  						?>
					  					</table>
					  					<br>
					  					<div class="form-group">
					  					<form method="post" action="updatecat">
					  		              <div  id="edit"></div>
					  		              <div ></div>
					  		            </form>
					                   </div>
					  				</div>
					  			</div>
					  		</div>
					  	</div>
					  <div id="delt"></div>
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

