<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])){
$sid=intval($_GET['id']);
$cshort=$_POST['package-short'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$income=$_POST['income'];
$nation=$_POST['nation'];
$mobno=$_POST['mobno'];
$email=$_POST['email'];


$query=mysqli_query($con,"update registration set package='$cshort', fname='$fname', lname='$lname', gender='$gender',
                     income='$income', nationality='$nation', mobno='$mobno',emailid='$email' where registration.id='$sid'");
if($query){
echo '<script>alert("Амжилттай өөрчилсөн")</script>';
echo "<script>window.location.href='manage-users.php'</script>";
} else{
echo '<script>alert("Дахин оролдоно уу")</script>';
echo "<script>window.location.href='edit-user.php'</script>";
}



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Хэрэглэч засах</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- <link href="bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet"> -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

<!-- <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- <link href="bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" integrity="sha512-ZfKn7az0YmtPUojZnRXO4CUdt3pn+ogBAyGbqGplrCIR5B/tQwPGtF2q29t+zQj6mC/20w4sSl0cF5F3r0HKSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<form method="post" >
	<div id="wrapper">
	<!--left !-->
    <?php include('leftbar.php')?>;
	 

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("Хэрэглэгч засах");?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

<?php 
$sid=intval($_GET['id']);
$query=mysqli_query($con,"SELECT * FROM registration 
join tbl_package on tbl_package.cid=registration.package");
while ($res=mysqli_fetch_array($query)) {

?>





			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Хэрэглэгч засах</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
		<div class="form-group">
		<div class="col-lg-4">
		<label>Бүртгэлийн дугаар</label>
		</div>
		<div class="col-lg-6">
 <input class="form-control" name="regno"  id="regno"  value="<?php echo $res['regno'];?>" readonly>
       </select>
	</div>
	 </div>	
				

<br><br>	

			<div class="form-group">
		    <div class="col-lg-4">
			<label>Багц сонгох<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div class="col-lg-6">
<select class="form-control" name="package-short" id="cshort" required="required" >			
<option VALUE="<?php echo $cid=$res['cid']?>"><?php echo $res['cshort'];?></option>				
			
             
                        
                        
                   
<?php $sql=mysqli_query($con,"select * from tbl_package");
while($res2=mysqli_fetch_array($sql)){ 
if($res2['cid']==$c){
continue;
}else{

	?>
 <option VALUE="<?php echo htmlentities($res2['cid']);?>"><?php echo htmlentities($res2['cshort']."-".$res2['cfull'])?></option>
<?php } } ?>
</select>
										</div>
											
										</div>	
										
							
								
											

										
	 <br><br>								
	
	</div>	
	<br><br>		
		
									
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Хувийн мэдээлэл</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-12">
			<div class="form-group">
		    <div class="col-lg-2">
			<label>Овог<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="fname" value="<?php echo htmlentities($res['fname']);?>"required="required">
			</div>
			
			<br><br>
								
		<div class="form-group">
		    <div class="col-lg-2">
			<label>Нэр</label>
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="lname" value="<?php echo htmlentities($res['lname']);?>">
			</div>
			 <div class="col-lg-2">
			<label>Хүйс<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<?php 
			if (strcasecmp($res['gender'],"Male")==0){?>
		 <input type="radio" name="gender" id="male" value="Male" required="required" checked> &nbsp; Эр &nbsp;
		 <?php }else{ ?>
		 <input type="radio" name="gender" id="male" value="Male" required="required"> &nbsp; Эр &nbsp;
		 <?php }?>
		 <?php 
			if (strcasecmp($res['gender'],"female")==0){?>
		 <input type="radio" name="gender" id="female" value="female" checked> &nbsp; Эм &nbsp;
		 <?php } else{?>
		 <input type="radio" name="gender" id="female" value="female"> &nbsp; Эм &nbsp;
		 <?php }?>
		
			</div>
			</div>	
		
		  
			<br><br>
					
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Family Income<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<select class="form-control" name="income"  id="income"required="required" >
        <option value="<?php echo htmlentities($res['income']);?>"><?php echo htmlentities($res['income']);?></option>
        <option VALUE="200000">200000</option>
        <option value="500000">500000</option>
        <option value="700000">700000</option>
        
       </select>
			</div>
			
			</div>	
			<br><br>
			
			
					
		     <div class="form-group">
			 			
			 <div class="col-lg-2">
			<label>Үндэс<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="nation" id="nation" required="required" 
			value="<?php echo htmlentities($res['nationality']);?>">
			</div>
			
			<br><br>
			
			
			
		    <div class="col-lg-2">
			<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" type="number" name="mobno" required="required" maxlength="10" 
			   value="<?php echo htmlentities($res['mobno']);?>">
			</div>
			 <div class="col-lg-2">
			<label>Email<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control"  type="email" name="email" required="required" 
			value="<?php echo htmlentities($res['emailid']);?>">
			</div>
			</div>	
			<br><br>
		
      	</div>
		</div>
			
				
       	  
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
<?php } ?>                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			</div>	
							
		  </div>	
			<br>
		
	<div class="form-group">
	<div class="col-lg-4">
	</div>
	<div class="col-lg-6"><br><br>
	<input type="submit" class="btn btn-primary" name="submit" value="Өөрчлөх"></button>
	</div>
	</div>			
	</div>
	</div><!--row!-->	

					
				</div>
				
			</div>
			
		</div>
		

	</div>
	

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<!-- Bootstrap Core JavaScript -->
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
