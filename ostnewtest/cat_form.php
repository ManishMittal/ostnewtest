
	<?php
	include('header.php');
	
	?>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Category Info
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
							  <label class="control-label" for="typeahead"> </label>
							  
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
							  <label class="control-label" for="date01">Category</label>
							  <div class="controls">
								  <select id="selectError"  name="cat_par_id" data-rel="chosen" required>
									  <option value="0" selected="selected">Parent</option>
									  <?php
									  $ncat=new Actions();
									  $ncat->showSubCategory();
									  
									  ?>
									
								  </select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Title</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="cat_title" id="focusedInput" type="text" value="<?php echo $_POST['cat_title']; ?>">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="cat_des" id="textarea2" rows="3">
								<?php echo $_POST['cat_des']; ?>
								</textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" name="insert" class="btn btn-primary">Save changes</button>
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
