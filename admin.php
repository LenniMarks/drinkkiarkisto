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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
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
        <!-- Sivun keskellä näkyvä teksti -->
        <div class="text-box">
            <h1>ADMIN SIVU</h1>
            <p>Täältä löydät Suomen parhaimpien drinkkien reseptit ilmaiseksi! Rekisteröidy ilmaiseksi ja selaa monia
                eri reseptejä</p>
        </div>
</body>

</html>