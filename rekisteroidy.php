<?php 

include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: kayttaja.php");
}
#Testaan onko salasanat samat ja löytyykö tunnus tai sähköposti jo taulusto jos ei niin ne lisätään sinne
if (isset($_POST['submit'])) {
	$tunnus = $_POST['tunnus'];
	$email = $_POST['email'];
	$salasana = ($_POST['salasana']);
	$vsalasana = ($_POST['vsalasana']);

	if ($salasana == $vsalasana) {
		$sql = "SELECT * FROM kayttaja WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$sql1 = "SELECT * FROM kayttaja WHERE tunnus='$tunnus'";
		$result1 = mysqli_query($conn, $sql1);
		if (!$result1->num_rows > 0) {
			if (!$result->num_rows > 0) {
				$sql = "INSERT INTO kayttaja (tunnus, email, salasana, adminid)
						VALUES ('$tunnus', '$email', '$salasana',2)";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					$message = "Käyttäjä luotu! Nyt voit kirjautu sisään tunnuksillasi.";
					$tunnus = "";
					$email = "";
					$_POST['salasana'] = "";
					$_POST['vsalasana'] = "";
				} else {
					$message = "Hups! jotain meni vikaan.";
				}
			} else {
				$message = "Sähköpostiosoite on jo käytössä.";
			}
		}
		else {
			$message = "Tunnus on jo käytössä.";
		} 
		} else {
			$message = "Salasanat eivät täsmää.";
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
    <link rel="stylesheet" type="text/css" href="rekisteroidy.css">
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
        <!-- Rekisteröitymislomake -->
        <div class="container">
            <form action="" method="POST" class="lomake">
                <div class="alaviiva">
                    <h1 id="otsikko">LUO KÄYTTÄJÄ</h1>
                </div>

                <div class="tekstikentat">
                    <input type="text" placeholder="Tunnus" name="tunnus" value="<?php echo $tunnus; ?>" required>
                </div>

                <div class="tekstikentat">
                    <input type="email" placeholder="Sähköposti" name="email" value="<?php echo $email; ?>" required>
                </div>

                <div class="tekstikentat">
                    <input type="password" placeholder="Salasana" name="salasana"
                        value="<?php echo $_POST['salasana']; ?>" required>
                </div>

                <div class="tekstikentat">
                    <input type="password" placeholder="Vahvista Salasana" name="vsalasana"
                        value="<?php echo $_POST['vsalasana']; ?>" required>
                </div>

                <div class="tekstikentat">
                    <button name="submit" class="nappi">Luo käyttäjä</button>
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