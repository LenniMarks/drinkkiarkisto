<?php 
include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: kirjaudu.php");
}
#Etsitään käyttäjän tykkäämien drinkkien tiedot ja laitetaan ne listaan
$id1 = $_SESSION['id'];   

$juomat = "SELECT drinkki FROM tykkays WHERE tunnus = '$id1'";
$result1 = mysqli_query($conn, $juomat);
$drinkit = array();
$resultCheck = mysqli_num_rows($result1);
if ($resultCheck > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $drinkit[] = $row1['drinkki'];
        $ids = implode(', ', $drinkit);
        $sql2 = ('SELECT * FROM drinkki WHERE id IN ('.$ids.')' );
        $result2 = $conn->query($sql2);
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
    <link rel="stylesheet" type="text/css" href="tykkaa.css">
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
        <!-- Tykättyjen drinkkien nimi ja poistamis toiminto -->
        <div class="container">
            <div class="alaviiva">
                <h1 id="otsikko">TYKÄTYT DRINKIT</h1>
            </div>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>Nimi</th>
                    <th>Toiminto</th>
                </tr>
                <?php   
                    if($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                            ?>
                <tr>
                    <td><a href="resepti.php?id=<?php echo $row2['id']; ?>" id='tykkays'><?php echo $row2['nimi'];?></a>
                    </td>
                    <td><a href="poista3.php?id=<?php echo $row2['id']; ?>" id='hylkaa'>Poista</a></td>
                </tr>
                <?php       
                            }
                    }
                ?>
            </table>
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