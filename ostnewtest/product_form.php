
	<?php
	include('header.php');
	
	?>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Products Info
						(
						<?php
						if(isset($_SESSION["visitor_user"]))
						{
							echo ucfirst($_SESSION["visitor_user"]);
						}
						
						?>
						)</h2>
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
							  <label class="control-label" for="fileInput">Name</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="pro_name" id="focusedInput" type="text" value="<?php echo $_POST['pro_name']; ?>">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Price</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="pro_price" id="focusedInput" type="text" value="<?php echo $_POST['pro_price']; ?>">
							  </div>
							</div> 
						
						<div class="control-group">
							  <label class="control-label" for="date01">Category</label>
							  <div class="controls">
								  <select id="selectError"  name="pro_category[]" data-rel="chosen" multiple="multiple">
									  <option value="0">Parent</option>
									  <?php
									  $ncat=new Actions();
									  $ncat->showCategory();
									  
									  ?>
									
								  </select>
								</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="pro_desc" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" name="insert_pro" class="btn btn-primary">Save changes</button>
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
