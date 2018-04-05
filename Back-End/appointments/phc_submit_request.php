<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
   
     die('Could not connect: ' . mysqli_error()); }

   if (isset($_POST['forwardto'])) {
   	$userid=$_SESSION['id'];
    $doc=$_POST['forwardto'];


   	$sql1 = "SELECT username FROM cms_details WHERE Name='$doc'";
   	$retval1 = mysqli_query( $conn,$sql1 );

   	if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
   } 
   $row = mysqli_fetch_assoc($retval1);
   $docid=$row['username'];

   	$sql = "INSERT INTO appointment_cms(phc_id, cms_id, approval_status)  VALUES ('$userid','$docid','Pending') ";
   	$retval = mysqli_query( $conn,$sql ); 
    
   if(! $retval ) { 
      die('Could not enter data: ' . mysqli_error()); 
   } 
   }

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Request Specialist</title>
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
<h1><center>Request Appointment</center></h1><br>
<br>
<?php
$userid=$_SESSION['id'];
$sql3 = "SELECT * FROM appointment_cms where phc_id = '$userid'";
$result = mysqli_query($conn,$sql3 );

?>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table>
<tr>
<td>S.No.</td>
<td>Specialist</td>
<td>Appointment Status</td>
<td>Delete Appointment</td>
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
  $result2 = mysqli_query($conn,"SELECT Name,username from cms_details WHERE username = '".$row1["cms_id"]."'" );
  $doc_query = mysqli_fetch_assoc($result2);
  $doctor = $doc_query["Name"];
  $i++;
?>
<td><?php echo $i+1?></td>
<td><?php echo $doctor?></td>
<td><?php echo $row1["approval_status"]; ?></td>
<td><input class = "btn waves-effect waves-teal" type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>
</tr>
<?php

}
?>


</table>
</form>
</body>
</html>