<?php
#Ehdotuksen Hylkays   
include('yhteys.php');
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `ehdotus` WHERE id = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location: ehdotuksetadmin.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>