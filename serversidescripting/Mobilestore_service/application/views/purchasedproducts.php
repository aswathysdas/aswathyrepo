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
			    

			   // function show(){
			   // 	$('#shw').load('subonchng');
			   // }
			   // function show(){
			   // 	$('#shw').load("viewpc");
			   // }
			   function fun(){
			   	var va=$('#inputcat').val();
			   	$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/viewsubcat",
			   		'datatype':"json",
			   		'data' :{name:va},
			   		'success':function(data){
			   			$('#cat').empty();
							var dat= JSON.parse(data);
							//alert(dat[1].pk_int_sub_id);
							var toAppend="<option>"+'Select Sub-category'+"</option>";
							for (var i = 0; i <=dat.length-1; i++) {

								toAppend+="<option value='"+dat[i].pk_int_sub_id+"'>"+dat[i].vchr_sub_categry_nm+"</option>";
							};
							$('#cat').append(toAppend);
			   		}
			   	});
			   }
			   function show(){
			   	var v=$('#cat').val();
			   	//alert(v);
			   		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/viewpc",
			   		'datatype':"json",
			   		'data' :{name:v},
			   		'success':function(data){
			   			//alert(data);
			   			$('#ct').empty();
							var dat= JSON.parse(data);
							//alert(dat[1].pk_int_sub_id);
							var toAppend="<tr><th>"+'SL No'+"</th><th>"+'Product Name'+"</th><th colspan='2'></th></tr>";
							for (var i = 0; i <=dat.length-1; i++) {

								toAppend+="<tr><td>"+dat[i].pk_int_prdct_id+"</td><td>"+dat[i].vchr_prdct_nm+"</td><td><button type='button' class='btn btn-link' onclick='editpro(this.value)' value='"+dat[i].pk_int_prdct_id+"'>Edit</button></td><td><button type='submit' onclick='delpro(this.value)' class='btn btn-link' value='"+dat[i].pk_int_prdct_id+"'>Delete</button></td></tr>";
							};
							$('#ct').append(toAppend);
			   		}
			   	});
			   }

			   function editpro(p){
			   		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/encodeproductedit",
			   		'datatype':"json",
			   		'data' :{name:p},
			   		'success':function(data){
			   			//alert(data);
			   			$('#divfm').empty();
							var dat= JSON.parse(data);

							//alert(dat[1].pk_int_sub_id);
							//alert(dat);
							var toAppend='';
							for (var i = 0; i <=dat.length-1; i++) {

								toAppend+="<input type='hidden' name='proid' value='"+dat[i].pk_int_prdct_id+"'><label class='col-sm-3' control-label>ProductName</label><div class='form-group'><div class='col-sm-7'><input id='txt1' type='text' id='inputcat' class='form-control' placeholder='"+dat[i].vchr_prdct_nm+"' name='pronm'></div></div><label class='col-sm-3' control-label>Price</label><div class='form-group'><div class='col-sm-7'><input id='txt1' type='text' id='inputcat' class='form-control' placeholder='"+dat[i].int_price+"' name='prodprice'></div></div><label class='col-sm-3' control-label>Description</label><div class='form-group'><div class='col-sm-7'><textarea id='inputcat' class='form-control' placeholder='"+dat[i].vchr_desc+"' name='proddesc'></textarea></div></div><label class='col-sm-3' control-label>Quantity</label><div class='form-group'><div class='col-sm-7'><input id='txt1' type='text' id='inputcat' class='form-control' placeholder='"+dat[i].int_quantity+"' name='prodqty'></div></div><div class='form-group'><div class='col-sm-offset-5 col-sm-7'><button type='submit' name='add' class='btn btn-success'>"+'Submit'+"</button></div></div>";
					};
							$('#divfm').append(toAppend);
			   		}
			   	});

			   }


			   function delpro(k){
			   	alert(k);
			   		$.ajax({
			   		'type':"POST",
			   		'url' :"<?php echo base_url(); ?>"+"index.php/category_ctrl/deletingproduct",
			   		'datatype':"json",
			   		'data' :{name:k},
			   		'success':function(data){
			   			//alert(data);
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
                	padding: 10px;
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
						<li><a href="Category_ctrl">Categories</a></li>
						<li><a href="Category_ctrl/subcat">Sub-Categories</a></li>
						<li><a href="Category_ctrl/addproduct">Products</a></li>
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
					  <div style="padding:50px;">
					  	<div class="row" id="div1">
					  		<div class="col-sm-offset-3 col-sm-6">
					  			<div class="panel panel-default">
					  				<div class="panel-heading">
					  					<h4>Sub Categories</h4>
					  				</div>
					  				<div class="panel-body">
					  					<form class="form-horizontal" method="post" action="">
					  					<div class="form-group">
					  							<label class="col-sm-5 control-label">Category Name</label>
					  							<div class="col-sm-5">
					  								<select name="cat" id="inputcat" onChange="fun()">
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
					  							<label for="cat" class="col-sm-5 control-label">Subcategory Name</label>
					  							<div class="col-sm-5">
					  								<select name="subcat" id="cat" onChange="show()">
					  									<option>Select Sub-Category</option>
					  								</select>
					  							</div>
					  						</div>
					  					</form>
					  					<div id="shw">
					  						<table id="ct" class="table table-striped"></table>
					  					</div>
					  					<form action="updateproducts" method="post" class="form-horizontal">
					  						<div id="divfm" class="form-group"></div>
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
		    	<div class="section group">
				
			</div>
			<div class="section group">
				
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

