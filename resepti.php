<?php 
include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
  header("Location: kirjaudu.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="resepti.css">
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
        <!-- Drinkin reseptin tietojen haku -->
        <?php 
        
                $sql = "SELECT * FROM drinkki WHERE id='$_GET[id]'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <!-- Drinkin reseptin tiedot -->
        <div class="container">
            <div class="alaviiva">
                <h1 id="otsikko"><?php echo $row['nimi']?></h1>
                <h2 class="otsikko2"><a href="tykkays.php?id=<?php echo $row['id'] ?>" id="tykkaa">TYKKÄÄ</a></h2>
            </div>
            <div id="kokolaatikko">

                <div class="laatikko">
                    <h2 class="otsikko2">Kuvaus</h2><br>
                    <p><?php echo $row['kuvaus'];?>
                    <p>
                </div>

                <div class="laatikko">
                    <h2 class="otsikko2">Kategoria</h2><br>
                    <p><?php echo $row['kategoria'];?>
                    <p>
                </div>

                <div class="laatikko">
                    <h2 class="otsikko2">Ainesosat</h2><br>
                    <p><?php echo $row['ainesosat'];?>
                    <p>
                </div>

                <div class="laatikko">
                    <h2 class="otsikko2">Ohje</h2><br>
                    <p><?php echo $row['ohje'];?>
                    <p>
                </div>

                <div class="laatikko">
                    <h2 class="otsikko2">Tekija</h2><br>
                    <p><?php echo $row['tekija'];?>
                    <p>
                </div>

            </div>
        </div>

        <?php
                    }
                }
            ?>
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