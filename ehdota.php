<?php 
include('yhteys.php');

session_start();
#testataan onko sessio id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: kirjaudu.php");
}
#Ehdotuksen lähetys ehdotus tauluun
if (isset($_POST['submit'])) {
	$nimi = $_POST['nimi'];
	$kuvaus = ($_POST['kuvaus']);
    $kategoria = $_POST['kategoria'];
    $ainesosat = $_POST['ainesosat'];
	$ohje = ($_POST['ohje']);
    $tekija = $_POST['tekija'];


  $sql = "INSERT INTO ehdotus (nimi, kuvaus, kategoria, ainesosat, ohje, tekija)
  VALUES ('$nimi', '$kuvaus', '$kategoria', '$ainesosat', '$ohje', '$tekija')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $nimi = "";
    $kuvaus = "";
    $kategoria = "";
    $ainesosat = "";
    $ohje = "";
    $tekija = "";
    $message = "Ehdotus lähetetty.";

  } else {
    $message = "Hups! jotain meni vikaan.";
  }
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="ehdota.css">
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
        <!-- Ehdotus tietojen lisäys lomake -->
        <div class="container">
            <form action="" method="POST" class="lomake">
                <div class="alaviiva">
                    <h1 id="otsikko">EHDOTA DRINKKIÄ</h1>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Nimi" name="nimi" required>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Kuvaus" name="kuvaus" required>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Kategoria" name="kategoria" required>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Ainesosat" name="ainesosat" required>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Ohje" name="ohje" required>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Tekija" name="tekija" required>
                </div>

                <div class="tekstikentat">
                    <button name="submit" class="nappi">Lähetä</button>
                </div>

                <div id="viesti">
                    <b><?php if(isset($message)) { echo $message; } ?></b>
                </div>
            </form>
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