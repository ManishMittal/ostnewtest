
	<?php
	include('header.php');
	
	?>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Manage Category Info</h2>
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
							  <label class="control-label" for="typeahead">Manage your categorys  </label>
							  
							</div>
							
	
						<?php
						
						
   class Manage_submit extends Category
   {
	   
	   
	   
	   function update_cat()
	   {
		  $cat_par_id = $_POST['cat_par_id'];
		  if(mysql_real_escape_string(trim($_POST['cat_title']))=='')
		  {
		  $msg='please enter the category title';
		    ?>
			<script>
			location.href="cat_submit.php?cat_id=<?php echo $_GET['cat_id']; ?>&msg=<?php echo $msg; ?>";
			</script>
			<?php
	      }
	      else
	      {
		  mysql_query("update category set cat_title='".mysql_real_escape_string(trim($_POST['cat_title']))."',cat_des='".mysql_real_escape_string(trim($_POST['cat_des']))."',cat_par_id='$cat_par_id' where cat_id='".$_GET['cat_id']."'");
		  
			?>
			<script>
			location.href="cat_list.php?msg=category updated...";
			</script>
			<?php
			
	      } 
	   }
	   
	   function delete_cat()
	   {
		  
	     $res=mysql_fetch_array(mysql_query("select cat_par_id from category  where cat_id='".$_GET['cat_id_del']."'"));
         mysql_query("update category  set cat_par_id='".$res['cat_par_id']."'  where cat_par_id='".$_GET['cat_id_del']."'");
		
		$sql=mysql_query("select pro_category from Product");
		  while($result=mysql_fetch_array($sql))
		  {
			 $update_cat=str_replace($_GET['cat_id_del'],$res['cat_par_id'],$result['pro_category']);
			 mysql_query("update Product  set pro_category='".$update_cat."'");
		 
		  } 
		   
         
  
	    if(mysql_query("delete  from category  where cat_id='".$_GET['cat_id_del']."'"))
	    {
			
		?>
			<script>
			
			location.href="cat_list.php?msg=category deleted...";
			</script>
			<?php	
	
	     }
	   }  
	   
	   
	   
   }
   
   
    if(isset($_POST['update']))
   {
	   $ins_cat=new Manage_submit();
	   $ins_cat->update_cat();
   }
   
    if(isset($_GET['cat_id_del']) && isset($_GET['atn']))
   {
	   if($_GET['atn']==1)
	   {
		$ins_cat=new Manage_submit();
		$ins_cat->delete_cat();
		//$msg="deleted...";
	   }
	   else
	   {
		   ?>
			<script>
			//alert("Unable to delete");
			location.href="cat_list.php";
			</script>
			<?php
	   }
   }
   
						
						
						
						if(isset($_GET['cat_id']))
						{
						
						$singleres=new Actions();
						$result=$singleres->fetchSingle();
						?>
						
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
							  <label class="control-label" for="date01">Parent Category</label>
							  <div class="controls">
								  <select id="selectError"  name="cat_par_id" data-rel="chosen">
									  
									  <?php
									  
									  
                           $datarow=mysql_fetch_array(mysql_query("select cat_par_id from category where cat_id='".$_GET['cat_id']."'"));
									  
									 $selected_cat_par=$datarow['cat_par_id'];
									  $ncat=new Actions();
									  $ncat->showSubCategoryUpdate($selected_cat_par);
									
									
									 ?>
									
								  </select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Category Title</label>
							  <div class="controls">
								<input class="input-xlarge focused" name="cat_title"  id="focusedInput" type="text" value="<?php  
								echo $result['cat_title'];
								?>">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor"  name="cat_des" id="textarea2" rows="3" ><?php  
								echo $result['cat_des'];
								?></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" name="update" class="btn btn-primary">Update category</button>
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
