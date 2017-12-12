<?php //include config
require_once('../includes/config.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
	<script src="../js/ckeditor/ckeditor.js"></script>
<script src="../js/ckeditor/samples/js/sample.js"></script>	
	<link rel="stylesheet" href="../js/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
</head>
<body class="skin-blue layout-top-nav">


<div id="wrapper">
<div class="row">
<div class="col-md-8 col-md-offset-2">
	<?php include('menu.php');?>
	<br/>
	
	<h2>Login</h2>

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

	<form action="" method="post">
	<p><label>Username</label><input  class="form-control" type="text" name="username" value=""  /></p>
	<p><label>Password</label><input class="form-control" type="password" name="password" value=""  /></p>
	<p><label></label><input  type="submit" class="form-control btn-large btn-primary" name="submit" value="Login"  /></p>
	</form>
	
	
  <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
</div>
