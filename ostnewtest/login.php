
	<?php
	include('header.php');
	?>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Login here</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							  
							</div>
							<div class="control-group">
							  <label class="offset3" align="center" for="typeahead">
								  <?php
								  if(isset($msg))
								  echo '<h4>'.$msg.'</h4>';

								  ?>
								   </label>
							  
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">User Name</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="user_name" id="user" type="text">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Password</label>
							  <div class="controls">
								<input name="user_pass"  type="password">
							  </div>
							</div>
							
							
						
							<div class="form-actions">
							  <button type="submit" name="login" class="btn btn-primary">Login</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
							
							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php
	include('footer.php');
	?>
