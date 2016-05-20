
	<?php
	include('header.php');
	
	?>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Manage Product Info</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
						  <fieldset>

	
						<?php
								
   class Manage_Submit_Pro extends Category
   {
	   
	   
	   
	   
	   
	    function update_pro()
	   {
			  $pro_category = implode(', ', $_POST['pro_category']);
		if(mysql_real_escape_string(trim($_POST['pro_name']))=='')
	  {
		  $msg='please enter the product name';
		    
	  }
	  else if(mysql_real_escape_string(trim($_POST['pro_price']))=='')
	  {
		  $msg='please enter the product price';
	  }
	  else if(!is_numeric(mysql_real_escape_string(trim($_POST['pro_price']))))
	  {
		  $msg='product price must be in numeric';
	  }
	  else if($_POST['pro_category']=='')
	  {
		  $msg='please choose at least one category';
	  }
	  else
	  {
		  mysql_query("update Product set pro_name='".mysql_real_escape_string(trim($_POST['pro_name']))."',pro_price='".mysql_real_escape_string(trim($_POST['pro_price']))."',pro_des='".mysql_real_escape_string(trim($_POST['pro_des']))."',pro_category='$pro_category' where pro_id='".$_GET['pro_id']."'");
		$msg='product updated...';	
			?>
			<script>
			location.href="product_list.php?msg=<?php echo $msg; ?>";
			</script>
			<?php
		
		}	
	       ?>
			<script>
			location.href="product_submit.php?pro_id=<?php echo $_GET['pro_id']; ?>&msg=<?php echo $msg; ?>";
			</script>
			<?php
		
	   }
	   
	   
	   
	   function delete_pro()
	   {
		  
	   if(mysql_query("delete  from Product  where pro_id='".$_GET['pro_id']."'"))
	   {
			
		?>
			<script>
			//alert("Category updated successfully...");
			location.href="product_list.php?msg=deleted...";
			</script>
			<?php	
	
	     }
	   }
	   
	   
	   
   }
   
   
   
   if(isset($_POST['update_product']))
   {
	   $upd_pro=new Manage_Submit_Pro();
	   $upd_pro->update_pro();
   }
   
   
    if(isset($_GET['pro_id']) && isset($_GET['atn']))
   {
	   if($_GET['atn']==1)
	   {
		$del_pro=new Manage_Submit_Pro();
		$del_pro->delete_pro();
		//$msg="deleted...";
	   }
	   else
	   {
		   ?>
			<script>
			//alert("Unable to delete");
			location.href="product_list.php";
			</script>
			<?php
	   }
   }
   
						
						
						
						if(isset($_GET['pro_id']))
						{
						
						$singleresPro=new Actions();
						$result=$singleresPro->fetchSinglePro();
						?>
						
						<br>
						
					<div class="control-group">
						<br/>
							  <label class="offset3" align="center" for="typeahead">
								  <?php
								  if(isset($_GET['msg']))
								  echo '<h4 class="err">'.$_GET['msg'].'</h4>';

								  ?>
								   </label>
							  
							</div>
						<div class="control-group">
							  <label class="control-label" for="fileInput">Name</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="pro_name" id="focusedInput" type="text" value="<?php  
								echo $result['pro_name'];
								?>" >
							  </div>
						</div>
						<div class="control-group">
							  <label class="control-label" for="fileInput">Price</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="pro_price" id="focusedInput" type="text" value="<?php  
								echo $result['pro_price'];
								?>">
							  </div>
						</div> 
						<div class="control-group">
							  <label class="control-label" for="date01">Categorys</label>
							  <div class="controls">
								  <select id="selectError"  name="pro_category[]" data-rel="chosen" multiple="multiple">
									  
									  <?php
									  
									  
									  
									  $datarow=mysql_fetch_array(mysql_query("select pro_category from Product where pro_id='".$_GET['pro_id']."'"));
									  
									 $selected_cat=explode(",",$datarow['pro_category']);

									  
									 $res=mysql_query("select * from category");
									  
									  if($selected_cat[0]==0)
									  {
										echo '<option selected="selected" value="0">Parent</option>';
									  }
									  else
									  {
										echo '<option value="0">Parent</option>';
											
									  }
										
									
					 
									while($finallist=mysql_fetch_array($res))
									{
									$flag=true;

									
										
										
									for($i=0;$i<count($selected_cat);$i++)
									{
										
										if($selected_cat[$i]==$finallist['cat_id'])
										{
											$flag=false;
											break;
										}
										
									}
									 
									
									
									
									if($flag==true)
									{
									  echo '<option value="'.$finallist['cat_id'].'">'.$finallist['cat_title'].'</option>';
									
									}
									else
									{
									  echo '<option selected="selected" value="'.$finallist['cat_id'].'">'.$finallist['cat_title'].'</option>';
								    }
	
	
	
	
			
			
			
	
									}
									 ?>
									
								  </select>
								</div>
							</div>
							         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor"  name="pro_des" id="textarea2" rows="3"><?php  
								echo $result['pro_des'];
								?></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" name="update_product" class="btn btn-primary">Update product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
							<?php
						}
						
							?>
							
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
