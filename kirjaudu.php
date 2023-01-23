<?php 

include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: kayttaja.php");
}
#Testataan löytyykö sivuston käyttäjän antamat tiedot taulusta
if (isset($_POST['submit'])) {
	$tunnus = $_POST['tunnus'];
	$salasana = ($_POST['salasana']);
	$sql = "SELECT * FROM kayttaja WHERE tunnus='$tunnus' AND salasana='$salasana'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		header("Location: kayttaja.php");
	}
	$admin = "SELECT * FROM kayttaja WHERE tunnus='$tunnus' AND salasana='$salasana' AND adminid=1";
	$result2 = mysqli_query($conn, $admin);
	if ($result2->num_rows > 0) {
		$row1 = mysqli_fetch_assoc($result2);
		$_SESSION['id'] = $row1['id'];
		header("Location: admin.php");
	}
	 else {
		$message = "Tunnus tai salasana on väärin!";

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
    <link rel="stylesheet" type="text/css" href="kirjaudu.css">
</head>

<body>
    <section class="header">
        <nav>
            <!-- navigointi -->
            <h1 id="mainheader">Drinkkiarkisto</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">ETUSIVU</a></li>
                    <li><a href="kirjaudu.php">KIRJAUDU SISÄÄN</a></li>
                    <li><a href="rekisteroidy.php">LUO KÄYTTÄJÄ</a></li>
                    <li><a href="tietoja.php">TIETOJA</a></li>
                </ul>
            </div>
        </nav>
        <!-- Kirjautumislomake -->
        <div class="container">
            <form action="" method="POST" class="lomake">
                <div class="alaviiva">
                    <h1 id="otsikko">KIRJAUDU</h1>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Tunnus" name="tunnus" value="<?php echo $tunnus; ?>" required>
                </div>

                <div class="tekstikentat">
                    <input type="password" placeholder="Salasana" name="salasana"
                        value="<?php echo $_POST['salasana']; ?>" required>
                </div>

                <div class="tekstikentat">
                    <button name="submit" class="nappi">Kirjaudu</button>
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