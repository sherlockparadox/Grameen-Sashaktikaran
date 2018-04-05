<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";
 if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
 $time=new DateTime;
 //$time2=$time->format('Y-m-d');
 $time2=$time->format('Y-m-d H:i:s');

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
   
     die('Could not connect: ' . mysqli_error()); }

   if (isset($_POST['applyto'])) {
   	$userid=$_SESSION['id'];
    $doc=$_POST['applyto'];


   	$sql1 = "SELECT username FROM phc_details WHERE Name='$doc'";
   	$retval1 = mysqli_query( $conn,$sql1 );

   	if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
   } 
   $row = mysqli_fetch_assoc($retval1);
   $docid=$row['username'];

   	$sql = "INSERT INTO appointment_phc(citizen_id, phc_id, approval_status,time_s)  VALUES ('$userid','$docid','Pending','$time2') ";
   	$retval = mysqli_query( $conn,$sql ); 
    
   if(! $retval ) { 
      die('Could not enter data: ' . mysqli_error()); 
   } 
   }

  if (isset($_POST['delete_apt'])) {
    $userid=$_SESSION['id'];
    $doc=$_POST['delete_apt'];
    /*echo "<script>alert('$doc')</script>";
    echo "<script>alert('$userid')</script>";*/

    $sql1 = "DELETE from appointment_phc WHERE citizen_id = '$userid' and phc_id = '$doc'";
    $retval1 = mysqli_query( $conn,$sql1 );

      if(! $retval1 ) { 
        die('Could not get data: ' . mysqli_error()); 
     } 
   }

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Request Appointment</title>
    <!--link rel="stylesheet" type="text/css" href="styles.css" /-->
<script language="javascript" src="users.js" type="text/javascript"></script>
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
</head>
<body class="container">
<center><h1>Request Appointment</h1></center><br><br>
<?php
$userid=$_SESSION['id'];
$sql3 = "SELECT * FROM appointment_phc where citizen_id = '$userid'";
$result = mysqli_query($conn,$sql3 );

?>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<center><table class="striped">
<tr>
<td>S.No.</td>
<td>Doctor</td>
<td>Appointment Status</td>
<td>Delete Appointment</td>
<td>Time Stamp</td>
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
  $result2 = mysqli_query($conn,"SELECT Name,username from phc_details WHERE username = '".$row1["phc_id"]."'" );
  $doc_query = mysqli_fetch_assoc($result2);
  $doctor = $doc_query["Name"];
  $i++;
?>
<td><?php echo $i+1?></td>
<td><?php echo $doctor?></td>
<td><?php echo $row1["approval_status"]; ?></td>
<td>
  <form method="POST" action="citizen_submit_request.php">
    <input type="hidden" name="delete_apt" value="<?php echo $row1['phc_id']?>"/>
    <input class = "btn waves-effect waves-teal" type="submit" name="app" value="Delete">
  </form>
</td>
<td><?php echo $row1["time_s"]; ?></td>
</tr>
<?php

}
?>


</table>
</center>
</form>
</body>
</html>