<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
   
     die('Could not connect: ' . mysqli_error()); }

   if (isset($_POST['approve'])) {
   	$userid=$_SESSION['id'];
    $cit=$_POST['approve'];


   	$sql1 = "UPDATE appointment_phc SET approval_status = 'Approved' WHERE citizen_id = '".$_POST['approve']."' and phc_id = '".$_SESSION['id']."'";
   	$retval1 = mysqli_query( $conn,$sql1 );

   	if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
    }  
   }
       if (isset($_POST['reject'])) {
    $userid=$_SESSION['id'];
    $cit=$_POST['reject'];


    $sql1 = "DELETE from appointment_phc WHERE citizen_id = '".$_POST['reject']."' and phc_id = '".$_SESSION['id']."'";
    $retval1 = mysqli_query( $conn,$sql1 );

    if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
    }  
   }
    if (isset($_POST['forward'])) {
    $userid=$_SESSION['id'];
    $cit=$_POST['approve'];


    $sql1 = "UPDATE appointment_phc SET approval_status = 'Approved' WHERE citizen_id = '".$_POST['approve']."' and phc_id = '".$_SESSION['id']."'";
    $retval1 = mysqli_query( $conn,$sql1 );

    if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
    }  
   }

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>View Patients Appointment</title>
      <title>The Materialize Example</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>             
      
      <style>
         div {
            width : 200px;  
            height : 200px;       
         } 
      </style>
<script language="javascript" src="users.js" type="text/javascript"></script>
</head>
<body class="container">
<h1><center>View Patients Appointment</center></h1><br>
<br>
<?php
$userid=$_SESSION['id'];
$sql3 = "SELECT * FROM appointment_phc where phc_id = '$userid'";
$result = mysqli_query($conn,$sql3 );

?>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table class="striped">
<tr>
<td>S.No.</td>
<td>Patient</td>
<td>Appt. Status</td>
<td colspan=8><center>Action</center></td>

</tr>


<?php
$i=0;
while($row1 = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="";
else
$classname="";
?>
<tr>
<?php 
  $i++;
  $var = '';
  if($row1["approval_status"] == 'Approved'){
    $var = 'disabled';
  }
?>
<td><?php echo $i+1?></td>
<td><?php echo $row1["citizen_id"];?></td>
<td><?php echo $row1["approval_status"]; ?></td>

<td>
  <form method="POST" action="phc_patients.php">
    <input type="hidden" name="approve" value="<?php echo $row1["citizen_id"];?>"/>
    <input class = "btn waves-effect waves-teal" type="submit" name="app" <?php echo $var;?> value="Approve">
  </form>

  <td>
  <form method="POST" action="phc_patients.php">
    <input type="hidden" name="reject" value="<?php echo $row1["citizen_id"];?>"/>
    <input class = "btn waves-effect waves-teal" type="submit" name="app" value="Reject">
  </form>
</td>
<td>
  <form method="POST" action="phc_forward_request.php">
    <input type="hidden" name="forward" value="<?php echo $row1["citizen_id"];?>"/>
    <input class = "btn waves-effect waves-teal" type="submit" name="for" value="Forward">
  </form>
</td>

</tr>
<?php

}
?>


</table>
</form>
</body>
</html>