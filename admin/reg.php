<?php
//include config
require_once('../includes/config.php');

/** Check your file system path! **/
require_once('send/classes/Email.class.php');
require_once('send/classes/Courier.class.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }


//show message from add / edit page
if(isset($_GET['approve'])){ 
		$stmt = $db->prepare('UPDATE members SET Approval = :app, memid = :memID WHERE regid = :regID') ;

		$stmt->execute(array(':app' => '1',':regID' => $_GET['approve'],':memID' => $_GET['memid']));

		header('Location: reg.php');
		exit;

} 


//show message from add / edit page
if(isset($_GET['unapprove'])){ 
		$stmt = $db->prepare('UPDATE members SET Approval = :app WHERE regid = :regID') ;

		$stmt->execute(array(':app' => '0',':regID' => $_GET['unapprove']));

		header('Location: reg.php');
		exit;

} 

//show message from add / edit page
if(isset($_GET['sendmail'])){ 

		// construct the email
$Email = new Email();
$Email->sender = 'Yoruba Unity Forum - Youth Section <no-reply@yorubaunityforum.com>';
$Email->recipient = $_GET['name'].' <'.$_GET['sendmail'].'>';
$Email->subject = "You have been Approved ";
$Email->message_text = "Hello! {$_GET['name']}

You have been approved as a member of the Yoruba unity Forum -Youth Section

This is your ID NUMBER : {$_GET['memid']}

You can print your ID Slip Here: 
";

$Email->message_html = "<h1>Hello! {$_GET['name']}</h1>
<p>
You have been approved as a member of the Yoruba unity Forum -Youth Section</a>
</p>
<p>
This is your ID NUMBER : {$_GET['id']}
</p>
<p>
You can print your ID Slip Here: </p><br/>";
	$courier = new courier;
	 if ($courier->send($Email) == true){header('Location: reg.php?action=maildone');}
	 if ($courier->send($Email) == false){header('Location: reg.php?action=mailundone');}
	
		exit;

} 

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
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
<script language="JavaScript" type="text/javascript">

  
  function unapprove(id, title)
  {
	  if (confirm("Are you sure you want to unapprove '" + title + "'"))
	  {
	  	window.location.href = 'reg.php?unapprove=' + id;
	  }
  } 
  
  function approve(id, title, memid)
  {
	  if (confirm("Are you sure you want to approve '" + title + "'"))
	  {
	  	window.location.href = 'reg.php?approve=' + id + '&memid=' +memid;
	  }
  } 
  
  function sendmail(id, name, memid)
  {
	  if (confirm("Do you want to send approval mail to '" + name + "'"))
	  {
	  	window.location.href = 'reg.php?sendmail=' + id + '&name=' + name + '&memid=' +memid;
	  }
  }
  </script>
</head>
<body class="skin-blue layout-top-nav">

<?php include('menu.php');?>

<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Registered Members</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
				  <div class="form-group alerts">
                        
						<?php

						if (@$_GET['action'] == 'maildone'){echo '<div class="alert alert-warning alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>MAIL SENT HAS BEEN SENT</div>';}

						if (@$_GET['action'] == 'mailundone'){echo '<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Sorry,MAIL WAS NOT SENT,TRY AGAIN</div>';}
						
						?>
										
				  <table id="example2" class="table table-bordered table-hover">
				  
                    <thead>
                      <tr>
					  <th>MEMID</th>
					  
					  <th>Image</th>
					  
					  <th>Full Name</th>
					  
					  
					  <th>Date of birth</th>
					  
					  <th>Age</th>
					  
					  <th>State of Origin</th>
					  
					  <th>Town</th>
					  
					  <th>Address</th>
					  
					  <th>Place of Birth</th>
					  
					  <th>Approval Status</th>
					  
					  <th>Date of Registration</th>
					  
					  <th>Action</th>
					  
					  </tr>
					  
                    </thead>
                    <tbody>
					 


	<?php
		try {

			$stmt = $db->query('SELECT * FROM members ORDER BY regid DESC');
			while($row = $stmt->fetch()){
				$age = date('Y') - $row['Year'];
				if ($row['StateO'] == 'Ondo'){$stid = 'OD';}
				if ($row['StateO'] == 'Ekiti'){$stid = 'EK';}
				if ($row['StateO'] == 'Osun'){$stid = 'OS';}
				if ($row['StateO'] == 'Lagos'){$stid = 'LG';}
				if ($row['StateO'] == 'Oyo'){$stid = 'OY';}
				if ($row['StateO'] == 'Ogun'){$stid = 'OG';}
				if ($row['StateO'] == 'Kwara'){$stid = 'KW';}
				if (strlen($row['regid']) == 1){$nregid = '00'.$row['regid'];}
				if (strlen($row['regid']) == 2){$nregid = '0'.$row['regid'];}
				if (strlen($row['regid']) == 3){$nregid = $row['regid'];}
				$memid = 'YUF/'.$stid.'/'.$nregid;
				echo '<tr>';
				echo '<td>'.$memid.'</td>';
				$dest = 'http://'.$site_address.'/'.$row['image'];
				echo '<td ><a href="'.$dest.'" class="btn btn-sm btn-info btn-flat text-center" target="_blank">View Picture</a></td>';
				echo '<td>'.$row['FullName'].'</td>';
				echo '<td>'.$row['Month'].' '.$row['Day'].','.$row['Year'].''.'</td>';
				echo '<td>'.$age.'</td>';
				echo '<td>'.$row['StateO'].'</td>';
				echo '<td>'.$row['TownO'].'</td>';
				echo '<td>'.$row['Address'].'</td>';
				echo '<td>'.$row['PlaceB'].'</td>';
				if ($row['Approval'] == 1){echo '<td>Approved</td>';}
				else {echo '<td>Unapproved</td>';}
				echo '<td>'.date('jS M Y', strtotime($row['regdate'])).'</td>';
				?>
				<td> 
				<?php
if ($row['Approval'] == 1){	echo '<a href="javascript:unapprove(\''.$row['regid'].'\',\''.$row['FullName'].'\')" class="btn btn-primary">UnApprove</a>';}
else {	echo '<a href="javascript:approve(\''.$row['regid'].'\',\''.$row['FullName'].'\',\''.$memid .'\')" class="btn btn-primary">Approve</a>';}

echo '&nbsp;<a href="javascript:sendmail(\''.$row['regid'].'\',\''.$row['FullName'].'\',\''.$memid .'\')" class="btn btn-primary">Send Approval Mail</a>';

?>
			
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
		

	?>				
</tfoot>
                  </table>	
				  
				  
				  
				  

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
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>



</body>
</html>
