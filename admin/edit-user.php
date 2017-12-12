<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit Post</title>
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

	<?php include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Edit User</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Please enter the password.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Please confirm the password.';
			}

			if($password != $passwordConfirm){
				$error[] = 'Passwords do not match.';
			}

		}
		

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if(!isset($error)){

			try {

				if(isset($password)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					//update into database
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':password' => $hashedpassword,
						':email' => $email,
						':memberID' => $memberID
					));


				} else {

					//update database
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':email' => $email,
						':memberID' => $memberID
					));

				}
				

				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID') ;
			$stmt->execute(array(':memberID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>

		<p><label>Username</label><br />
		<input type='text' class="form-control" name='username' value='<?php echo $row['username'];?>'></p>

		<p><label>Password (only to change)</label><br />
		<input type='password' class="form-control" name='password' value=''></p>

		<p><label>Confirm Password</label><br />
		<input type='password' class="form-control" name='passwordConfirm' value=''></p>

		<p><label>Email</label><br />
		<input type='text' class="form-control" name='email' value='<?php echo $row['email'];?>'></p>

		<p><input type='submit' class="form-control" name='submit' value='Update User'></p>

	</form>

</div>
<script>
	initSample();
</script>

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
</body>
</html>	
