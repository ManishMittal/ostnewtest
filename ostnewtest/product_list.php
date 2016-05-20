<?php
	include('header.php');
	
	?>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>All the categorys
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
					
					<br>
					<div class="box-title" data-original-title>
						<span class="add_new_item">
						<a class="btn btn-success" style="text-decoration:none;" href="product_form.php">Add new product</a></span>
						
					</div>
					
					<div class="control-group">
						<br/>
							  <label class="offset3" align="center" for="typeahead">
								  <?php
								  if(isset($_GET['msg']))
								  echo '<h4 class="fine">'.$_GET['msg'].'</h4>';

								  ?>
								   </label>
							  
							</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Title</th>
								  <th>Price</th>
								  <th>Categorys</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$prolist=new Actions();
							$res=$prolist->fetchAll("Product");
							
							while($data=mysql_fetch_array($res)){
			?>
			
			<tr>
								<td><?php echo ucfirst($data['pro_name']); ?></td>
								<td><?php echo $data['pro_price']; ?></td>
								
								<td class="center"><?php 
								
									
									if($data['pro_category']==0)
									{
										echo 'Parent';
									}
									
								    $arcat=explode(",",$data['pro_category']);
									
									for($i=0;$i<count($arcat);$i++)
									{
									
									 $ndata=mysql_fetch_array(mysql_query("select cat_title from category where cat_id='".trim($arcat[$i])."'"));
									 echo ucfirst($ndata['cat_title']).'<br>';
									
									$nsubdata=mysql_query("select cat_title from category where cat_par_id='".trim($arcat[$i])."'");
									 while($sub_cat=mysql_fetch_array($nsubdata))
									 {
										echo '<span style="margin-left:25px;">'.ucfirst($sub_cat['cat_title']).'</span><br>';
									 }	
									
									 	
									 
									}
									
									
									
								?></td>
								
								<td class="center">
									
									<a class="btn btn-info"  href="product_submit.php?pro_id=<?php echo $data['pro_id']; ?>">
										
										<i class="halflings-icon white edit"></i>
										  
									</a>
									<a class="btn btn-danger" href="product_submit.php?atn=1&pro_id=<?php echo $data['pro_id']; ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
			</tr>
							
			<?php
			
			
		//	echo '<option value="'.$data['cat_id'].'">'.$data['cat_title'].'</option>';
		}
							?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	include('footer.php');
	?>

