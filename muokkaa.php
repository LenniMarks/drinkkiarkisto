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
#Drinkin tietojen päivitys
if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE drinkki set nimi='" . $_POST['nimi'] . "', kuvaus='" . $_POST['kuvaus'] . "', kategoria='" . $_POST['kategoria'] . "', ainesosat='" . $_POST['ainesosat'] . "', ohje='" . $_POST['ohje'] . "' ,tekija='" . $_POST['tekija'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Tiedot päivitetty onnistuneesti";
    }
    $result = mysqli_query($conn,"SELECT * FROM drinkki WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="muokkaa.css">
</head>

<body>
    <section class="header">
        <nav>
            <!-- navigointi -->
            <h1 id="mainheader">Drinkkiarkisto</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="drinkkiadmin.php">TAKAISIN</a></li>
                </ul>
            </div>
        </nav>
        <!-- Muokattavan drinkin tietojen lomake -->
        <div class="container">
            <form action="" method="POST" class="lomake">
                <h1 id="otsikko">Muokkaa tietoja</h1>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="tekstikentat">
                    <input type="text" name="nimi" placeholder="Nimi" value="<?php echo $row['nimi']; ?>">
                </div>

                <div class="tekstikentat">
                    <input type="text" name="kuvaus" placeholder="Kuvaus" value="<?php echo $row['kuvaus']; ?>">
                </div>

                <div class="tekstikentat">
                    <input type="text" name="kategoria" placeholder="Kategoria"
                        value="<?php echo $row['kategoria']; ?>">
                </div>

                <div class="tekstikentat">
                    <input type="text" name="ainesosat" placeholder="Ainesosat"
                        value="<?php echo $row['ainesosat']; ?>">
                </div>

                <div class="tekstikentat">
                    <input type="text" name="ohje" placeholder="Ohje" value="<?php echo $row['ohje']; ?>">
                </div>

                <div class="tekstikentat">
                    <input type="text" name="tekija" placeholder="Tekija" value="<?php echo $row['tekija']; ?>">
                </div>

                <div class="tekstikentat">
                    <button name="submit" class="nappi">Muokkaa</button>
                </div>

                <div id="viesti">
                    <b><?php if(isset($message)) { echo $message; } ?>
                </div>

            </form>
        </div>
    </section>
</body>

</html