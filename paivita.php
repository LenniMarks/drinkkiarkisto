<?php 
include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: kirjaudu.php");
}
#Istunnon id:een avulla haetaan käyttäjän tunnus ja sähköposti
$varmistusid = $_SESSION['id'];
$sql2 = "SELECT tunnus, email FROM kayttaja WHERE id='$varmistusid'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$paatunnus = $row2['tunnus'];
$paaemail = $row2['email'];

#Testaan onko käyttäjän antamat tiedot jo jonkun käytössä vai voiko niitä käyttää jos voi tiedot päivitetään
if (isset($_POST['submit'])) {
	$tunnus = $_POST['tunnus'];
	$email = $_POST['email'];

	$sql = "SELECT * FROM kayttaja WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	$sql1 = "SELECT * FROM kayttaja WHERE tunnus='$tunnus'";
	$result1 = mysqli_query($conn, $sql1);

		if ((!$result1->num_rows > 0) || ($tunnus == $paatunnus) ) {
			if ((!$result->num_rows > 0) || ($email == $paaemail) ) {
				$sql = "UPDATE kayttaja set tunnus='" . $_POST['tunnus'] . "', salasana='" . $_POST['salasana'] . "', email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'";
				$result = mysqli_query($conn, $sql);
				if ($result) {
                    $message = "Tiedot päivitetty onnistuneesti";
					$tunnus = "";
					$email = "";
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
		}

    $result = mysqli_query($conn,"SELECT * FROM kayttaja WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="paivita.css">
</head>

<body>
    <section class="header">
        <nav>
            <!-- navigointi -->
            <h1 id="mainheader">Drinkkiarkisto</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="muokkaatietoja.php">TAKAISIN</a></li>
                </ul>
            </div>
        </nav>
        <!-- Omien tietojen muokkaus lomake -->
        <div class="container">
            <form action="" method="POST" class="lomake">
                <div class="alaviiva">
                    <h1 id="otsikko">MUOKKAA TIETOJA</h1>
                </div>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="tekstikentat">
                    <input type="text" name="tunnus" placeholder="Tunnus" value="<?php echo $row['tunnus']; ?>"
                        required>
                </div>

                <div class="tekstikentat">
                    <input type="text" name="salasana" placeholder="Salasana" value="<?php echo $row['salasana']; ?>"
                        required>
                </div>

                <div class="tekstikentat">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
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