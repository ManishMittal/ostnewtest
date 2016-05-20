
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
	
			<div  algin="center" class="login_box_loc row-fluid sortable">
				<div class="box span12">
					<div class="box-content">

							<div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							  
							</div>
							<div class="control-group">
							  <label for="typeahead">
								  <h2 align="center" style="color:#578EBE;">Login Here</h2>

								   </label>
							  
							</div>
							<br>
							<div class="control-group">
							  <label class="offset3" align="center" for="typeahead">
								  <?php
								  if(isset($msg))
								  echo '<h6>'.$msg.'</h6>';

								  ?>
								   </label>
							  
							</div>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							<form class="form-horizontal" method="post" id="form1">
  <fieldset>
    
    <!-- Form Name -->
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="user_name">User Name</label>
      <div class="col-md-3 lgoin_box">
        <div class="input-group"> <span class="icon_left input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
</span>
          <input id="user_name" class="form-control input-md" style="height:30px;" name="user_name" type="text">
        </div>
      </div>
    </div>
    
    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Password">Password</label>
      <div class="col-md-3 lgoin_box">
        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
          <input id="user_pass" name="user_pass" type="password" style="height:30px;" class="form-control input-md">
        </div>
      </div>
    </div>
    
    <!-- Password input-->
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Submit"></label>
      <div class="col-md-4">
        <button id="Submit" name="login" class="btn btn-success" type="Submit">Login</button>
      </div>
    </div>
    
    
  </fieldset>
 
</form>
							
			 				   

					</div>
			<div class="form-group">
      <label>&nbsp;&nbsp;<a href="add_user.php">create a new account</a></label>
    </div>	 
				</div><!--/span-->

			</div><!--/row-->

			
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php
	include('footer.php');
	?>
