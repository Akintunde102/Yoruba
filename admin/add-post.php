<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
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
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Add Post</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
		
		
		if($postTags ==''){
			$error[] = 'Please enter the tags.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate,postTags) VALUES (:postTitle, :postDesc, :postCont, :postDate, :postTags)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postTags' => $postTags,
					':postDate' => date('Y-m-d H:i:s')
				));

				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>
	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' class="form-control" name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' class="form-control" cols='80' rows='3'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Content</label><br />
		<textarea id="editor" name='postCont'  class="form-control" cols='60' rows='20'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><label>Tags</label><br />
		<input type='text' name='postTags'  class="form-control" value='<?php if(isset($error)){ echo $_POST['postTags'];}?>'></p>

		<p><input type='submit' name='submit' class="form-control btn-primary" value='Submit'></p>

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