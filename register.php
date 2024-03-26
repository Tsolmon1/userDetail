<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])){
	
     
$cshort=$_POST['package-short'];

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$income=$_POST['income'];
$nation=$_POST['nation'];
$mobno=$_POST['mobno'];
$email=$_POST['email'];


$regno=mt_rand(1000000000,9999999999);

$query=mysqli_query($con,"INSERT INTO registration(package, fname, lname, gender,
                     income, nationality, mobno, emailid, regno) value('$cshort','$fname','$lname','$gender','$income','$nation','$mobno','$email','$regno')");
if($query){
echo '<script>alert("Хэрэглэгчийн бүртгэл амжилттай")</script>';
echo "<script>window.location.href='manage-users.php'</script>";
} else{
echo '<script>alert("Та дахин оролдоно уу")</script>';
echo "<script>window.location.href='register.php'</script>";
}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

<!-- <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" integrity="sha512-ZfKn7az0YmtPUojZnRXO4CUdt3pn+ogBAyGbqGplrCIR5B/tQwPGtF2q29t+zQj6mC/20w4sSl0cF5F3r0HKSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>

<body>
<form method="post" >
	<div id="wrapper">
	<?php include('leftbar.php');?>


		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("Хэрэглэгч бүртгүүлэх");?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Багц</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group">
		    <div class="col-lg-4">
			<label>Багц сонгох<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div class="col-lg-6">
<select class="form-control" name="package-short" id="cshort" required="required" >			
<option VALUE="">Сонго</option>
<?php $query=mysqli_query($con,"select * from tbl_package");
$sn=1;
while($res=mysqli_fetch_array($query)){ ?>
                        <option VALUE="<?php echo htmlentities($res['cid']);?>"><?php echo htmlentities($res['cshort']."-".$res['cfull'])?></option>
                        
                        
                    <?php } ?>   </select>
										</div>
											
										</div>	
										
								<br><br>
								
		
										
	 <br><br>								
			
	
										
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
			<input class="form-control" name="fname" pattern="[A-Za-z]+$">
			</div>
			<br><br>
								
		<div class="form-group">
		    <div class="col-lg-2">
			<label>Нэр</label>
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="lname" pattern="[A-Za-z]+$">
			</div>
			 <div class="col-lg-2">
			<label>Хүйс</label>
			
			</div>
			<div class="col-lg-4">
		 <input type="radio" name="gender" id="male" value="Male"> &nbsp; Эр &nbsp;
		 <input type="radio" name="gender" id="female" value="Female"> &nbsp; Эм &nbsp;
	
			</div>
			</div>	
	<br><br>		
		    	
			<br><br>
					
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Орлого<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<select class="form-control" name="income"  id="income"required="required" >
        <option VALUE="">Сонго</option>
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
			<input class="form-control" name="nation" id="nation">
			</div>
			</div>	
			<br><br>
			</div>	
			<br><br>
		</div>
      	</div>
		</div>
			
		  
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        
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
	<input type="submit" class="btn btn-primary" name="submit" value="Бүртгэх"></button>
	</div>
	</div>			
	</div>
	</div><!--row!-->		
	</div>	
			</div>
		</div>
	</div>
	</form>

	<!-- jQuery -->
	<!-- <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<!-- <script src="bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script> -->
	<script src="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.0/js/metismenu.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
	<script>



</script>
</body>
</html>
<?php ?>