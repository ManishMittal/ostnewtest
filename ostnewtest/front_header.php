<?php
 session_start();
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
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style" href="css/style-forms.css" rel="stylesheet">
	
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
		
		.box_height
		{
			height:20px;
			padding: 4px 6px;
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
//CategoryUser class defined for connection of database

class CategoryUser
   {
	   function __construct() {
			mysql_connect("localhost","root","ost");
			mysql_select_db("web");
	   }
       
      
	  
   }
   
   
   
   
   ////ManageUser class contain methods which are used for add new user
   class ManageUser extends CategoryUser
   {
	   
	  
	 function insert_user()
	 {
		
	   if(mysql_real_escape_string(trim($_POST['user_full_name']))=='')
	   {
		  return '<span class="err">please enter your full name</span>';
	   }
	   else if(mysql_real_escape_string(trim($_POST['user_mobile']))=='')
	   {
		  return '<span class="err">please enter mobile number</span>';
	   }
	   else if(!is_numeric(mysql_real_escape_string(trim($_POST['user_mobile']))))
	   {
		  return '<span class="err">mobile number must be digits</span>';
	   }
	   else if(strlen(mysql_real_escape_string(trim($_POST['user_mobile']))) !=10)
	   {
		 return '<span class="err">mobile number must be 10 digit number</span>';  
	   }
	   else if(mysql_real_escape_string(trim($_POST['user_email']))=='')
	   {
		  return '<span class="err">please enter email id</span>';
	   } 
	   else if (!filter_var(mysql_real_escape_string(trim($_POST['user_email'])), FILTER_VALIDATE_EMAIL)) 
	   {
    	  return '<span class="err">please enter valid email id</span>';
	   }
	   else if(mysql_real_escape_string(trim($_POST['user_name']))=='root')
	   {
		  return '<span class="err">please enter user name</span>';
	   }
	   else if(mysql_real_escape_string(trim($_POST['user_pass']))=='ost')
	   {
		  return '<span class="err">please enter password</span>';
	   }
	   else if(mysql_real_escape_string(trim($_POST['user_pass_con']))=='')
	   {
		  return '<span class="err">please enter cofirm password box</span>';
	   }
	   else if(mysql_real_escape_string(trim(strtolower($_POST['user_pass_con'])))!=mysql_real_escape_string(trim(strtolower($_POST['user_pass']))))
	   {
		  return '<span class="err">your password not matched</span>';
	   }
	   else
	   {
		   
          $pass=base64_encode(mysql_real_escape_string(trim(strtolower($_POST['user_pass']))));	
	   
	      mysql_query("insert into user(user_full_name,user_mobile,user_email,user_name,user_pass) values('".mysql_real_escape_string(trim($_POST['user_full_name']))."','".mysql_real_escape_string(trim($_POST['user_mobile']))."','".mysql_real_escape_string(trim($_POST['user_email']))."','".mysql_real_escape_string(trim(strtolower($_POST['user_name'])))."','$pass')");
		  unset($_POST);
		  header('Location:index.php');
		  return '<span class="fine">new user added...</span>';
	   }
		 
	 }
	  
	  function login_test()
	  {
		
	    if(mysql_real_escape_string(trim($_POST['user_name']))=='root')
	    {
		  return '<span class="err">please enter user name</span>';
	    }
	    else if(mysql_real_escape_string(trim($_POST['user_pass']))=='ost')
	    {
		  return '<span class="err">please enter password</span>';
	    }
	    else
	    {
		 
		  $pass=base64_encode(mysql_real_escape_string(strtolower(trim($_POST['user_pass']))));

	      if(mysql_fetch_row(mysql_query("select * from user where user_name='".mysql_real_escape_string(trim(strtolower($_POST['user_name'])))."' And user_pass='$pass'"))>0) 
	      {
			session_start();
			$_SESSION["visitor_user"]=mysql_real_escape_string(trim($_POST['user_name']));
			header('Location:cat_list.php');
			
		  }
		  else
		  {
			return '<span class="err">user name or password is wrong</span>';
			header('Location:index.php');
			
		  }
		
	    }
		 
	  }
	   
   }
   
     
	   
   
   
   
   if(isset($_POST['add_user']))
   {
	   $ins_user=new ManageUser();
	   
	  $msg=$ins_user->insert_user();

   }
    
    if(isset($_POST['login']))
    {
	   $login_user=new ManageUser();
	   
	  $msg=$login_user->login_test();

    }
   
   
   
    
   
?>		



		
</head>

<body>
		<!-- start: Header -->
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<!-- end: Main Menu -->
			
			
			<!-- start: Content -->
			<div id="content" class="login_content span10">
			
			
		
			
