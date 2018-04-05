<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
      die('Could not connect: ' . mysqli_error()); }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Appointment</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
      </script>
</head>
<body class="container">
<center><h1>Request Appointment</h1></center><br>
<div class="row">
<form method="post" action="phc_submit_request.php" class="col s12">
            <label>Choose Specialist</label>
               <select name="forwardto">
                  <option value = "" disabled selected>Specialist</option>
<?php
 $sql = "SELECT Name FROM cms_details";
 $retval = mysqli_query( $conn,$sql ); 
  while($row = mysqli_fetch_array($retval)){
    $name = $row["Name"];
    echo "<option>".$name."</option>";

  }

?>
</select><br>
<input class = "btn waves-effect waves-teal" type="submit" name="submit" value="Apply">
</form>
</body>
</html>