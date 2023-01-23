<?php
#Drinkeistä tykkääminen
include('yhteys.php');
session_start();

error_reporting(0);

if (!isset($_SESSION['id'])) {
  header("Location: kirjaudu.php");
}
if (isset($_GET['id'])) {  
      $id = $_GET['id'];
      $id1 = $_SESSION['id'];   

      $juomat = "SELECT drinkki FROM tykkays WHERE tunnus = '$id1'";
      $result1 = mysqli_query($conn, $juomat);
      $drinkit = array();
      $resultCheck = mysqli_num_rows($result1);
      if ($resultCheck > 0) {
          while ($row1 = mysqli_fetch_assoc($result1)) {
              $drinkit[] = $row1['drinkki'];
              $ids = implode(', ', $drinkit);
          }
      }
     if (!in_array($id, $drinkit)) {
        $query = "INSERT INTO `tykkays`(drinkki,tunnus) VALUES ('$id','$id1')";
     $run = mysqli_query($conn,$query);
     }

      if ($run) {  
           header('location: drinkki.php');  
      }else{  
          header('location: drinkki.php');  
     }  
 }  
 ?>