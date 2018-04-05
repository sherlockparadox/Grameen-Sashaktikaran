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
if (isset($_POST['choose'])) {
  $sql3 = "SELECT * FROM citizen_details WHERE username='".$_POST['choose']."'";
$result = mysqli_query($conn,$sql3 );
$row1 = mysqli_fetch_assoc($result);

}

?>

<div style="width:500px;">
<p ><strong>Username: </strong><?php echo $row1["username"];?></p>
<p><strong>Name: </strong><?php echo $row1["first_name"]." ".$row1["last_name"];?></p>
<p><strong>Occupation: </strong><?php echo $row1["occupation"];?></p>
<p><strong>Email: </strong><?php echo $row1["email"];?></p>
<p><strong>Contact: </strong><?php echo $row1["contact"];?></p>
<p><strong>Phone type: </strong><?php echo $row1["ph_type"];?></p>
<p><strong>Phone alternative: </strong><?php echo $row1["ph_alt"];?></p>
<p><strong>Address type: </strong><?php echo $row1["add_type"];?></p>
<p><strong>DOB: </strong><?php echo $row1["dob"];?></p>
<p><strong>Gender: </strong><?php echo $row1["gender"];?></p>
<p><strong>Vaccines: </strong><?php echo $row1["vaccines"];?></p>
<p><strong>Timestamp: </strong><?php echo $row1["m_history"];?></p>
<p><strong>Allergies: </strong><?php echo $row1["allergies"];?></p>
<p><strong>Biometric: </strong><?php echo $row1["biometric"];?></p>



</body>
</html>