<?php
 session_start();
 
 if(!isset($_SESSION["visitor_user"]))
	{
		?>
		<script>
		  location.href="index.php";
		</script>
		<?php
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<style type="text/css">
		.err
		{
			color:red;
		}
		.fine
		{
			color:green;
		}
	</style>
	
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
<?php
//category class defined for connection of database

class Category
   {
	   function __construct() {
			mysql_connect("localhost","root","ost");
			mysql_select_db("web");
	   }
     
   }
   
    
   ////Actions class is a child class of Category which is used for show all the Category and Products
   
   class Actions extends Category
   {
		public static $s=30;
		public static $r=1;
		
	   //showCategory() fetch all category normally
	   function showCategory()
	   {
		
		 $res=mysql_query("select * from category");
		 while($data=mysql_fetch_array($res))
		 {
			
			echo '<option value="'.$data['cat_id'].'">'.$data['cat_title'].'</option>';
		 }
		   
	   }
	   
	   ///showSubCategory() show all category in the form of parent child
	   function showSubCategory()
	   {
		
		 $prolist=new Actions();
		 $res=$prolist->fetchAll("category");
						
		 $parentdata=mysql_query("select * from category where cat_par_id='0'");
		 while($parent_sub_cat=mysql_fetch_array($parentdata))
		 {
			echo '<option value="'.$parent_sub_cat['cat_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.ucfirst($parent_sub_cat['cat_title']).'</option>';
		 			
			 if(mysql_num_rows(mysql_query("select * from category where cat_par_id='".$parent_sub_cat['cat_id']."'"))>0)
			 {
				Actions::$r++;
				Actions::viewCategory($parent_sub_cat['cat_id']);
			 } 
			  
		 }						
		   
	   }
	   
	    ///showSubCategoryUpdate() show all category in the form of parent child in update form
	   function showSubCategoryUpdate($par_id)
	   {
		
		 $prolist=new Actions();
		 $res=$prolist->fetchAll("category");
						
		 $parentdata=mysql_query("select * from category where cat_par_id='0'");
		 
		 if($par_id==0)
		 {
			echo '<option selected="selected" value="0">Parent</option>';
											
		 }
		 else
		 {
		 	echo '<option value="0">Parent</option>';
		 }
		 
		 while($parent_sub_cat=mysql_fetch_array($parentdata))
		 {
			 if($parent_sub_cat['cat_id']==$par_id)
			 {
					echo '<option selected="selected" value="'.$parent_sub_cat['cat_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.ucfirst($parent_sub_cat['cat_title']).'</option>';
		 	
			 }
			 else
			 {
				echo '<option value="'.$parent_sub_cat['cat_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.ucfirst($parent_sub_cat['cat_title']).'</option>';
		 	
			 }
					
			 if(mysql_num_rows(mysql_query("select * from category where cat_par_id='".$parent_sub_cat['cat_id']."'"))>0)
			 {
				Actions::$r++;
				Actions::viewCategoryUpdate($parent_sub_cat['cat_id'],$par_id);
			 } 
			  
		 }						
		   
	   }
	   
	   //this function will work recursively when a category have childs
	   
	   public static function  viewCategoryUpdate($cat_id,$par)
	   {
				
				
		        $nsubdata=mysql_query("select * from category where cat_par_id='$cat_id'");
				while($sub_cat=mysql_fetch_array($nsubdata))
				{
					if($sub_cat['cat_id']==$par)
					{
					  echo '<option selected="selected"  value="'.$sub_cat['cat_id'].'" style="margin-left:'.Actions::$s*Actions::$r.'px;">'.ucfirst($sub_cat['cat_title']).'</option>';
					}
					else
					{
					  echo '<option  value="'.$sub_cat['cat_id'].'" style="margin-left:'.Actions::$s*Actions::$r.'px;">'.ucfirst($sub_cat['cat_title']).'</option>';
					}
					 if(mysql_num_rows(mysql_query("select * from category where cat_par_id='".$sub_cat['cat_id']."'"))>0)
			         {
							Actions::$r++;
							
						   Actions::viewCategoryUpdate($sub_cat['cat_id'],$par);
					 }
					 	 	
					  
				
				}
			Actions::$r--;	

	   }
	   
	   public static function  viewCategory($cat_id)
	   {
				
				
		        $nsubdata=mysql_query("select * from category where cat_par_id='$cat_id'");
				while($sub_cat=mysql_fetch_array($nsubdata))
				{
					if($sub_cat['cat_id']==$cat_id)
					{
					  echo '<option selected="selected"  value="'.$sub_cat['cat_id'].'" style="margin-left:'.Actions::$s*Actions::$r.'px;">'.ucfirst($sub_cat['cat_title']).'</option>';
					}
					else
					{
					  echo '<option  value="'.$sub_cat['cat_id'].'" style="margin-left:'.Actions::$s*Actions::$r.'px;">'.ucfirst($sub_cat['cat_title']).'</option>';
					}
					 if(mysql_num_rows(mysql_query("select * from category where cat_par_id='".$sub_cat['cat_id']."'"))>0)
			         {
							Actions::$r++;
							
						   Actions::viewCategory($sub_cat['cat_id']);
					 }
					 	 	
					  
				
				}
			Actions::$r--;	

	   }
	  
	   ///fetchSingle() fetch a single category
	   function fetchSingle()
	   {
		   
		 $res=mysql_query("select * from category where cat_id='".$_GET['cat_id']."'");
		 $data=mysql_fetch_array($res);
		 return $data;	
	   }
		
	   ///fetchSinglePro() fetch a single product
	   function fetchSinglePro()
	   {
		   
		 $res=mysql_query("select * from Product where pro_id='".$_GET['pro_id']."'");
		 $data=mysql_fetch_array($res);
		 return $data;	
	    }
		///fetchAll() show all table depend on table name
	   function fetchAll($table_name)
	   {
		
		 $res=mysql_query("select * from $table_name");
		 return $res;
		
	   }
	   
   }
   
   
   
   
   ////Manage class contain methods which are used for add new user,category and product
   class Manage extends Category
   {
	  
	   ///insert a new category in category table 
	   function insert_cat()
	   {
		 $cat_par_id = $_POST['cat_par_id'];
		 if(mysql_real_escape_string(trim($_POST['cat_title']))=='')
		 {
		   return '<span class="err">please enter the category title</span>';
		 }
		 else
		 {
		   mysql_query("insert into category(cat_par_id,cat_title,cat_des) values('$cat_par_id','".mysql_real_escape_string(trim($_POST['cat_title']))."','".mysql_real_escape_string(trim($_POST['cat_des']))."')");
		   unset($_POST);
		   return '<span class="fine">category inserted successfully...</span>';
		 }
      	 
       }
	   ///insert a new product in product table
	   function insert_pro()
	   {
		  $pro_category = implode(', ', $_POST['pro_category']);
	      if(mysql_real_escape_string(trim($_POST['pro_name']))=='')
	      {
		    return '<span class="err">please enter the product name</span>';
	      }
	      else if(mysql_real_escape_string(trim($_POST['pro_price']))=='')
	      {
		    return '<span class="err">please enter the product price</span>';
	      }
	      else if(!is_numeric(mysql_real_escape_string(trim($_POST['pro_price']))))
	      {
		    return '<span class="err">product price must be in numeric</span>';
	      }
	      else if($_POST['pro_category']=='')
	      {
		    return '<span class="err">please choose at least one category</span>';
	      }
	      else
	      {
	        mysql_query("insert into Product(pro_name,pro_price,pro_des,pro_category) values('".mysql_real_escape_string(trim($_POST['pro_name']))."','".mysql_real_escape_string(trim($_POST['pro_price']))."','".mysql_real_escape_string(trim($_POST['pro_desc']))."','$pro_category')");
		    unset($_POST);
		    return '<span class="fine">product inserted...</span>';
	      }
		 
	  }
	   
   }
   
     
	   
   
   
   //this will work when insert category button is clicked
   if(isset($_POST['insert']))
   {
	   $ins_cat=new Manage();
	   $msg= $ins_cat->insert_cat();
   }
   
   //this will work when insert product button is clicked
   if(isset($_POST['insert_pro']))
   {
	   $ins_pro=new Manage();
	   $msg=$ins_pro->insert_pro();

   }
   
   //this will work when add new user button is clicked
   if(isset($_POST['add_user']))
   {
	   $ins_user=new Manage();
	   $msg=$ins_user->insert_user();

   }
   
    //this will work when login button is clicked
    if(isset($_POST['login']))
    {
	   $login_user=new Manage();
	   $msg=$login_user->login_test();

    }
   
   
   
    
   
?>		



		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>OST</span></a>
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						
						<li><a href="cat_list.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Category List
						<li><a href="product_list.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Product List</span></a></li>
						<li><a href="view_user.php"><i class="icon-edit"></i><span class="hidden-tablet"> Users List</span></a></li>
						<li><a href="logout.php"><i class="icon-edit"></i><span class="hidden-tablet"> Logout</span></a></li>
						
						</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
		
			
