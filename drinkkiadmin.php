<?php 
include('yhteys.php');

session_start();
#Haetaan kirjautuneen käyttäjän id:eellä admin id ja testataan onko hän admin käyttäjä
$sessioid = $_SESSION['id'];
$adminhaku = "SELECT adminid FROM kayttaja WHERE id='$sessioid'";
$admintulokset = mysqli_query($conn, $adminhaku);
$adminrivi = mysqli_fetch_assoc($admintulokset);
$adminid = $adminrivi['adminid'];
if ($adminid == 2) {
    header("Location: kirjaudu.php");
    if (!isset($_SESSION['id'])) {
        header("Location: kirjaudu.php");
    }
}
$hakusql = "SELECT * FROM drinkki";
$tulokset = $conn->query($hakusql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="drinkkiadmin.css">
</head>

<body>
    <section class="header">
        <nav>
            <!-- navigointi -->
            <h1 id="mainheader">Drinkkiarkisto</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="admin.php">ETUSIVU</a></li>
                    <li><a href="ehdotuksetadmin.php">EHDOTUKSET</a></li>
                    <li><a href="kayttajatadmin.php">KÄYTTÄJÄT</a></li>
                    <li><a href="drinkkiadmin.php">DRINKIT</a></li>
                    <li><a href="adminlisaa.php">LISÄÄ DRINKKI</a></li>
                    <li><a href="kirjaudu-ulos.php">KIRJAUDU ULOS</a></li>
                </ul>
            </div>
        </nav>
        <!-- Drinkki reseptien poisto ja muokkaus taulu -->
        <div class="container">
            <h1 id="otsikko">Drinkit</h1>
            <div>

                <table border="1" cellspacing="0" cellpadding="0">
                    <tr class="heading">
                        <th>ID</th>
                        <th>Nimi</th>
                        <th>Kuvaus</th>
                        <th>Kategoria</th>
                        <th>Ainesosat</th>
                        <th>Ohje</th>
                        <th>Tekija</th>
                        <th>Toiminto</th>
                        <th>Toiminto</th>
                    </tr>
                    <?php   
                    #Drinkkien reseptien tietojen haku tauluun
	     if ($tulokset->num_rows > 0) {
               while($rivi = $tulokset->fetch_assoc()) {
                     echo "  
                          <tr>
                               <td>".$rivi['id']."</td>    
                               <td>".$rivi['nimi']."</td>  
                               <td>".$rivi['kuvaus'].   "</td>  
                               <td>".$rivi['kategoria']."</td>
                               <td>".$rivi['ainesosat']."</td>    
                               <td>".$rivi['ohje']."</td>
                               <td>".$rivi['tekija']."</td>    
                               <td><a href='poista2.php?id=".$rivi['id']."' id='poista'>POISTA</a></td>
                               <td><a href='muokkaa.php?id=".$rivi['id']."' id='muokkaa'>MUOKKAA</a></td>  
  
                          </tr>  
                     ";  
                }  
           }  
      ?>
                </table>
    </section>
</body>

</html>