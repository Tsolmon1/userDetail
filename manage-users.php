<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');

if(isset($_GET['del'])){  
$sid=$_GET['del'];
$query=mysqli_query($con,"delete from registration where id='$sid'");
echo '<script>alert("Хэрэглэгч устсан")</script>';
echo "<script>window.location.href='manage-users.php'</script>";

}

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage  Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

<!-- <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap.min.css">
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" integrity="sha512-ZfKn7az0YmtPUojZnRXO4CUdt3pn+ogBAyGbqGplrCIR5B/tQwPGtF2q29t+zQj6mC/20w4sSl0cF5F3r0HKSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("Хэрэглэгчид");?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Хэрэглэгчид
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
											<th>Бүртгэл дугаар</th>
											<th>Нэр</th>
                                            <th>Цахим хаяг</th>
                                            <th>Дугаар</th>
											<th>Багц</th>
										
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    $query=mysqli_query($con,"select * from registration left join tbl_package on tbl_package.cid=registration.package");
                                    $sn=1;
                                     while($res=mysqli_fetch_array($query)){
									  
									 ?>	
                                        <tr class="odd gradeX">
                              <td><?php echo $sn?></td>
                              <td><?php echo htmlentities( strtoupper($res['regno']));?></td>
             <td><?php echo htmlentities(strtoupper($res['fname']." ".$res['lname']));?></td>
       <td><?php echo htmlentities(strtoupper($res['emailid']));?></td>
	  <td><?php echo htmlentities($res['mobno']);?></td>
	  <td><?php echo htmlentities(strtoupper($res['cshort']));?></td>
      											  
      <td width="100"><a href="edit-user.php?id=<?php echo htmlentities($res['id']);?>" class="btn btn-primary btn-xs">Засах</a> &nbsp;&nbsp;
      <a href="manage-users.php?del=<?php echo htmlentities($res['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Устгахуу?');">Устгах</a>
	  
	  </td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <!-- <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.0/js/metismenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <!-- <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.0.0/js/jquery.dataTables.min.js"></script>
    <!-- <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> -->
    
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
<?php  ?>
