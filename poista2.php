<?php
#Drinkkien poistaminen   
include('yhteys.php');
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `drinkki` WHERE id = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location: drinkkiadmin.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>