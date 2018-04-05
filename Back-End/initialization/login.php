<?php
 session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
      die('Could not connect: ' . mysqli_error()); 
   }

   if(isset($_POST['user'])){
   
   $user = $_POST['user'];
   $pass = $_POST['pass'];
   $type = $_POST['group1'];
 
 
   $sql = "SELECT username,password,type FROM login_details where username='$user'"; 
   
   $retval = mysqli_query( $conn,$sql ); 
    
   if(! $retval ) { 
      die('Could not get data: ' . mysqli_error()); 
   } 

   $row = mysqli_fetch_assoc($retval);
   if( $user == $row['username'] && $pass == $row['password'] && $type == $row['type']){
      $_SESSION['id']=$user;
      //header("Location:homepage.php?user=$user");
      if ($type == 1) { //Citizen
      header("Location:../../Front-End/UI_Citizen/index.html?user=$user");  
      }
      if ($type == 2) { //GPO
      header("Location:../../Front-End/UI_GPO/index.html?user=$user");  
      }
      if ($type == 3) { //DAO Staff
      header("Location:../../Front-End/UI_DAO_Staff/index.html?user=$user");  
      }
      if ($type == 4) { //DAO Admin
      header("Location:../../Front-End/UI_DAO_Admin/index.html?user=$user");  
      }
      if ($type == 5) { //PHC Doctor
      header("Location:../../Front-End/UI_PHC/index.html?user=$user");  
      }
      if ($type == 6) { //CMS
      header("Location:../../Front-End/UI_CMS/index.html?user=$user");  
      }
   }
   else{
      header('Location:error.php');
   }
}
   mysqli_close($conn); 
?>
