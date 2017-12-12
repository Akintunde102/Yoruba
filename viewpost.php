<?php 
include('header.html');

$stmt = $db->prepare('SELECT postID, postTitle,postDesc, postCont, postDate, postTags FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();



//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<div class="page-heading text-center" style="background: black;">

		<div class="container zoomIn animated">

			<h1 class="page-title">		<?php		
				echo '<h1>'.$row['postTitle'].'</h1>'; ?> <span class="title-under"></span></h1>
			<p class="page-description">
					<?php		
				echo '<h3>'.$row['postDesc'].'</h3>';
				echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
				
				?>

		</div>

	</div>

	<div class="main-container fadeIn animated" style="background: #337ab7 url(http://<?=$site_address?>/assets/images/banner.png);">

		<div class="container">

			<div class="row">

				<div class="col-md-10 col-md-offset-1">
<div class="blogtext" style="padding: 10px 15px 12px 15px;">


		
	
		<?php		
					echo ''.$row['postCont'].'</div>';				
			
		?>





				</div>

			
			</div> <!-- /.row -->


		</div>



	</div>
<?php include('footer.html'); ?>