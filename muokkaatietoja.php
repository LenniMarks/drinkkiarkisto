<?php 
include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: kirjaudu.php");
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
    <link rel="stylesheet" type="text/css" href="muokkaatietoja.css">
</head>

<body>
    <section class="header">
        <nav>
            <!-- navigointi -->
            <h1 id="mainheader">Drinkkiarkisto</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="kayttaja.php">ETUSIVU</a></li>
                    <li><a href="tietoja1.php">TIETOJA</a></li>
                    <li><a href="ehdota.php">EHDOTA</a></li>
                    <li><a href="drinkki.php">RESEPTIT</a></li>
                    <li><a href="muokkaatietoja.php">OMAT TIEDOT</a></li>
                    <li><a href="tykkaa.php">TYKÄTYT</a></li>
                    <li><a href="kirjaudu-ulos.php">KIRJAUDU ULOS</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="alaviiva">
                <h1 id="otsikko">OMAT TIEDOT</h1>
            </div>
            <!-- Omien tietojen haku -->
            <div id="tiedot">
                <?php
	            if ($tulokset->num_rows > 0) {
                    while($rivi = $tulokset->fetch_assoc()) {
                            if($rivi["id"] == $_SESSION["id"]){
                                echo "<b>Tunnus</b><br>" . $rivi["tunnus"] . "<br><br>" . "<b>Salasana</b><br>" .$rivi["salasana"] . "<br><br>" . "<b>Sähköposti</b><br>" . $rivi["email"];
                              }
              
                          }
                     }
        ?>
            </div>
            <!-- Omien tietojen muokkausnappi -->
            <br>
            <a href="paivita.php?id=<?php echo $_SESSION['id'] ?>" id="muokkaa">MUOKKAA</a>

        </div>
        <!-- Alaviite -->
        <footer class="footer">
            <h4>Tietoa meistä</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut enim aliquam maiores in error et provident
                debitis,<br>
                laboriosam odio obcaecati expedita neque, quidem odit sunt officiis. Ad iure repellat dolores!</p>
        </footer>
    </section>
</body>

</html>