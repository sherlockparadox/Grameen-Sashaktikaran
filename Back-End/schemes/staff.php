<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
   
     die('Could not connect: ' . mysqli_error()); }
       if (isset($_POST['choose'])) {
    $userid=$_SESSION['id'];
    $scheme=$_POST['choose'];


    $sql1 = "DELETE from scheme_govt WHERE id = '".$scheme."'";
    $retval1 = mysqli_query( $conn,$sql1 );

    if(! $retval1 ) { 
      die('Could not get data: ' . mysqli_error()); 
    }
    
    $sql2 = "INSERT INTO scheme_approval(s_id, a_id, Approval_Status) VALUES ('".$scheme."', 'daoa', 'Pending')";
    $retval2 = mysqli_query( $conn,$sql2 );

    if(! $retval2 ) { 
      die('Could not get data: ' . mysqli_error()); 
    }  
    
   }

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>View Schemes</title>
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
<h1><center>View Schemes</center></h1><br>
<br>
<?php
$userid=$_SESSION['id'];
$sql3 = "SELECT * FROM scheme_govt";
$result = mysqli_query($conn,$sql3 );

?>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table class="striped">
<tr>
<td>S.No.</td>
<td>Scheme</td>
<td>Type</td>
<td>Description</td>
<td>Comments</td>
<td>Action</td>


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
  /*
  $var = '';
  if($row1["approval_status"] == 'Approved'){
    $var = 'disabled';
  }
  */
?>
<td><?php echo $i+1?></td>
<td><?php echo $row1["Name"];?></td>
<td><?php echo $row1["Type"]; ?></td>
<td><?php echo $row1["Description"];?></td>
<td><?php echo $row1["Conditions"]; ?></td>

<td>
  <form method="POST" action="staff.php">
    <input type="hidden" name="choose" value="<?php echo $row1['id']?>"/>
    <input class = "btn waves-effect waves-teal" type="submit" name="app" value="Choose">
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