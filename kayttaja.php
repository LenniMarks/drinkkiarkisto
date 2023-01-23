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
    <link rel="stylesheet" type="text/css" href="kayttaja.css">
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
        <!-- Sivun keskellä näkyvä teksti -->
        <div class="text-box">
            <h1>Tervetuloa Drinkkiarkistoon</h1>
            <p>Täältä löydät Suomen parhaimpien drinkkien reseptit ilmaiseksi! Rekisteröidy ilmaiseksi ja selaa monia
                eri reseptejä</p>
        </div>
    </section>
    <!-- Sivun alempana näkyvät esimerkki drinkit jotka löytyvät drinkkiarkistosta -->
    <section class="drinks">
        <h1>Drinkit</h1>
        <p>Muutama esimerkki drinkeistä joiden resepti löytyy meidän arkistostamme</p>

        <div class="row">
            <div class="drinks-col">
                <img src="images/mojito.jpg" alt="">
                <h3>Mojito</h3>
                <p>Mojito on drinkki, joka valmistetaan kuubalaisesta vaaleasta rommista, ruokokidesokerista,
                    limemehusta, tuoreesta mintusta ja soodavedestä.</p>
            </div>
            <div class="drinks-col">
                <img src="images/margareta.jpg" alt="">
                <h3>Margarita</h3>
                <p>Margarita on drinkki, joka valmistetaan tequilasta, triple sec -likööristä ja limemehusta.</p>
            </div>
            <div class="drinks-col">
                <img src="images/negroni.jpg" alt="">
                <h3>Negroni</h3>
                <p>Negroni on drinkki, joka tehdään ginistä, vermutista ja katkerosta.</p>
            </div>
        </div>
    </section>
    <!-- Alaviite -->
    <section class="footer">
        <h4>Tietoa meistä</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut enim aliquam maiores in error et provident
            debitis,<br>
            laboriosam odio obcaecati expedita neque, quidem odit sunt officiis. Ad iure repellat dolores!</p>
    </section>

</body>

</html>