
	<?php
	include('front_header.php');
	if(isset($_SESSION["visitor_user"]))
	{
		?>
		<script>
		location.href="cat_list.php";
		</script>
		<?php
	}
	?>
	
			<div style="width:50%;margin-left:18%;" algin="center" class="row-fluid sortable">
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" method="post">
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							  
							</div>
							<div class="control-group">
							  <label for="typeahead">
								  <h2 align="center" style="color:#578EBE;">Registration Form</h2>

								   </label>
							  
							</div>
							<div class="control-group">
							  <label class="offset3" align="center" for="typeahead">
								  <?php
								  if(isset($msg))
								  echo '<h6>'.$msg.'</h6>';

								  ?>
								   </label>
							  
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Full Name</label>
							  <div class="controls">
								<input class="input-xlarge focused" style="height:30px;" name="user_full_name" id="focusedInput" type="text" 
								<?php
								 if($_POST['user_full_name']=="root")
								 {
									 echo 'value=""';
								 }
								 else
								 {
									 echo 'value="'.$_POST['user_full_name'].'"';
								 }
							     ?>>
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Mobile</label>
							  <div class="controls">
								<input class="input-xlarge focused" style="height:30px;" maxlength="10" name="user_mobile" id="focusedInput" type="text" value="<?php echo $_POST['user_mobile']; ?>">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Email Id</label>
							  <div class="controls">
								<input class="input-xlarge focused" style="height:30px;" name="user_email" id="focusedInput" type="text" value="<?php echo $_POST['user_email']; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">User Name</label>
							  <div class="controls">
								<input class="input-xlarge focused" style="height:30px;" name="user_name" id="user" type="text">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Password</label>
							  <div class="controls">
								<input name="user_pass"  style="height:30px;" class="input-xlarge focused" type="password">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Confirm Password</label>
							  <div class="controls">
								<input  name="user_pass_con" style="height:30px;" class="input-xlarge focused" type="password">
							  </div>
							</div>
							
						
							<div class="form-actions">
							  <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
							
							
  </fieldset>
   
</form>
						  
						  <div class="form-group">
      <label class="col-md-4"><a href="index.php">Login here</a></label>
    </div>						
	
						

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php
	include('footer.php');
	?>
