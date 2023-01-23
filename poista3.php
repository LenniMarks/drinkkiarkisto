<?php
#Tykkyksien poistaminen
include('yhteys.php');
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `tykkays` WHERE drinkki = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location: tykkaa.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>