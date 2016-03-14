<div class="row" id="div1">
					  		<div class="col-sm-offset-4 col-sm-4">
					  			<div class="panel panel-default">
					  				<div class="panel-body">
					  					<form class="form-horizontal" role="form" name="category" method="post" action="updatecat">
					  						<div class="form-group">
					  							<label for="inputcat" class="col-sm-4 control-label">Category Name</label>
					  							<div class="col-sm-7">
					  								<?php 
					  								foreach ($category as $row) {
					  								
					  								echo "<input id='txt1' type='text' id='inputcat' value='".$row->vchr_category_nm."' name='ctgry'>";
					  							}
					  							?>
					  							</div>
					  						</div>
					  						<div class="col-sm-offset-5 col-sm-7">
                                           <button type="submit" name="add" class="btn btn-success">Submit</button>      
                                           </div>
					  					</form>
					  				</div>
					  			</div>
					  		</div>
					  	</div>