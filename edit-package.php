<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');


if(isset($_POST['submit'])){
	
$cshortname=$_POST['package-short'];
$cfullname=$_POST['package-full'];
$udate=$_POST['udate'];
$cid=intval($_GET['cid']);
$query=mysqli_query($con,"update tbl_package set cshort='$cshortname',cfull='$cfullname',cdate='$udate' where cid='$cid'");
if($query){
echo '<script>alert("Багц өөрчилсөн")</script>';
echo "<script>window.location.href='manage-packages.php'</script>";
} else{
echo '<script>alert("Дахин оролдоно уу")</script>';
echo '<script>window.location.href=add-package.php</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- MetisMenuCSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

<!-- <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
<!-- <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" integrity="sha512-ZfKn7az0YmtPUojZnRXO4CUdt3pn+ogBAyGbqGplrCIR5B/tQwPGtF2q29t+zQj6mC/20w4sSl0cF5F3r0HKSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;


		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("Багц засах");?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Багц засах</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									

<?php $cid=intval($_GET['cid']);
$query=mysqli_query($con,"select * from tbl_package where cid='$cid'");
$sn=1;
$count=mysqli_num_rows($query);
if($count>0){
while($res=mysqli_fetch_array($query)){?>	


<div class="form-group">
<div class="col-lg-4">
<label>Багцын богино нэр<span id="" style="font-size:11px;color:red">*</span>	</label>
</div>
<div class="col-lg-6">
  <input class="form-control" name="package-short" id="cshort"  value="<?php echo $res['cshort'];?>" required="required">       
				</div></div>		
<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Багцын бүтэн нэр<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
<input class="form-control" name="package-full" id="cfull" value="<?php echo $res['cfull'];?>" required="required">         
					</div>
	 </div>	
										
	 <br><br>								
										
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Хугацаа</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
	
	</div>
	</div>
	</div>	
<br><br>	
<?php }} else { ?>

<h5 style="color:red;" align="center">Илэрцгүй</h5>
<?php } ?>	
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Багц засах"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	
	<!-- <script src="bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<!-- <script src="bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script> -->
	<script src="https://cdn.jsdelivr.net/bootstrap.metismenu/1.1.0/js/metismenu.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
	

</form>
</body>

</html>
<?php ?>