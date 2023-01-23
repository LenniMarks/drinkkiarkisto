<?php 

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
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
    <link rel="stylesheet" type="text/css" href="tietoja1.css">
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
        <!-- Alaviitteen tiedot -->
        <div class="container">
            <div class="alaviiva">
                <h1 id="otsikko">TIETOJA</h1>
            </div>
            <div id="teksti">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut enim aliquam maiores in error et
                    provident
                    debitis,<br>
                    laboriosam odio obcaecati expedita neque, quidem odit sunt officiis. Ad iure repellat dolores!</p>
                <br>
                <p><b>Sähköposti:</b> Drinkkiarkisto@gmail.com</p><br>
                <p><b>Puhelinnumero:</b> +358 0123 456 7891</p><br>
                <p><b>Osoite:</b> Drinkkikatu 15 <br>12345 Helsinki</p>
            </div>
        </div>
    </section>
</body>

</html>