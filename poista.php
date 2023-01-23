<?php   
#Käyttäjien poistaminen
include('yhteys.php');
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `kayttaja` WHERE id = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location: kayttajatadmin.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>