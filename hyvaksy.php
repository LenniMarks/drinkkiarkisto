<?php 
#Ehdotuksen Hyväksyminen   
include('yhteys.php');
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "INSERT INTO `drinkki`(nimi, kuvaus, kategoria, ainesosat, ohje, tekija, hyvaksytty) SELECT nimi, kuvaus, kategoria, ainesosat, ohje, tekija, 1 FROM `ehdotus` WHERE id = '$id'";
      $query1 = "DELETE FROM `ehdotus` WHERE id = '$id'";
      $run = mysqli_query($conn,$query);
      $run1 = mysqli_query($conn,$query1);  
      if ($run and $run1) {  
           header('location: ehdotuksetadmin.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>