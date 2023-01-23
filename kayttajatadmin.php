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

$hakusql = "SELECT * FROM kayttaja WHERE adminid!=1";
$tulokset = $conn->query($hakusql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="kayttajatadmin.css">
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
        <!-- Käyttäjien poisto ja muokkaus taulu -->
        <div class="container">
            <h1 id="otsikko">Käyttäjät</h1>
            <div>

                <table border="1" cellspacing="0" cellpadding="0">
                    <tr class="heading">
                        <th>ID</th>
                        <th>Tunnus</th>
                        <th>Salasana</th>
                        <th>Email</th>
                        <th>Toiminto</th>
                    </tr>
                    <?php   
                    #Käyttäjien tietojen haku tauluun
	     if ($tulokset->num_rows > 0) {
               while($rivi = $tulokset->fetch_assoc()) {
                     echo "  
                          <tr>  
                               <td>".$rivi['id']."</td>  
                               <td>".$rivi['tunnus']."</td>  
                               <td>".$rivi['salasana']."</td>  
                               <td>".$rivi['email']."</td>  
                               <td><a href='poista.php?id=".$rivi['id']."' id='btn'>Poista</a></td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>
                </table>
    </section>
</body>

</html>