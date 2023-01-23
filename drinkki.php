<?php 
include('yhteys.php');

session_start();
#testataan onko istunnon id tyhjä vai löytyykö se
error_reporting(0);

if (!isset($_SESSION['id'])) {
  header("Location: kirjaudu.php");
}

$sql = "SELECT * FROM drinkki;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
#Kategorioiden id:deet
$ajarjestys = $_GET['id'];
$drinkit = $_GET['id'];
$shotit = $_GET['id'];
$booli = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinkkiarkisto</title>
    <link rel="stylesheet" type="text/css" href="drinkki.css">
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
                <h1 id="otsikko">RESEPTIT</h1>
                <!-- Drinkin haku lomake -->
                <form action="" class="haku">
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"
                        placeholder="Hae drinkkejä">
                </form>
                <!-- Kategoria painikkeet -->
                <div id="kategoriat">
                    <a href="drinkki.php?id=ajarjestys" class="haku2" name="ajarjestys">Aakkosjärjestys</a>
                    <a href="drinkki.php?id=drinkit" class="haku2" name="drinkit">Drinkit</a>
                    <a href="drinkki.php?id=shotit" class="haku2" name="shotit">Shotit</a>
                    <a href="drinkki.php?id=boolit" class="haku2" name="boolit">Boolit</a>
                </div>
            </div>

            <div id="juomat">
                <?php
                    #Aakkosjärjestys
                    if($ajarjestys == "ajarjestys"){
                        $jarjesta = "ASC";
                        $sql1 = "SELECT * FROM drinkki ORDER BY nimi $jarjesta";
                        $result1 = mysqli_query($conn, $sql1);
                        $resultCheck1 = mysqli_num_rows($result1);
                        if ($resultCheck1 > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                ?>
                <a href="resepti.php?id=<?php echo $row1['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $row1['nimi'] ."<br>". $row1['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                }
                            }
                    }

                    #Juomat jotka kuuluvat "Drinkki" kategoriaan.
                    elseif($drinkit == "drinkit"){
                        $sql1 = "SELECT * FROM drinkki WHERE kategoria = 'Drinkit'";
                        $result1 = mysqli_query($conn, $sql1);
                        $resultCheck1 = mysqli_num_rows($result1);
                        if ($resultCheck1 > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                ?>
                <a href="resepti.php?id=<?php echo $row1['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $row1['nimi'] ."<br>". $row1['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                }
                            }
                        }
                    #Juomat jotka kuuluvat "Shotti" kategoriaan.
                        elseif($shotit == "shotit"){
                            $sql1 = "SELECT * FROM drinkki WHERE kategoria = 'shotit'";
                            $result1 = mysqli_query($conn, $sql1);
                            $resultCheck1 = mysqli_num_rows($result1);
                            if ($resultCheck1 > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    ?>
                <a href="resepti.php?id=<?php echo $row1['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $row1['nimi'] ."<br>". $row1['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                    }
                                }
                            }
                    #Juomat jotka kuuluvat "Shotti" kategoriaan.
                            elseif($booli == "boolit"){
                                $sql1 = "SELECT * FROM drinkki WHERE kategoria = 'boolit'";
                                $result1 = mysqli_query($conn, $sql1);
                                $resultCheck1 = mysqli_num_rows($result1);
                                if ($resultCheck1 > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        ?>
                <a href="resepti.php?id=<?php echo $row1['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $row1['nimi'] ."<br>". $row1['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                        }
                                    }
                                }
                    #Etusivun kaikki drinkit
                    elseif(!isset($_GET['search'])){
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                <a href="resepti.php?id=<?php echo $row['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $row['nimi'] ."<br>". $row['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                }
                            }
                        }

                    #Drinkkihaku
                    elseif(isset($_GET['search']))
                     {
                         $filtervalues = $_GET['search'];
                         $query = "SELECT * FROM drinkki WHERE CONCAT(nimi,ainesosat) LIKE '%$filtervalues%' ";
                         $query_run = mysqli_query($conn, $query);                                
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $items)
                                    {
                                        ?>
                <a href="resepti.php?id=<?php echo $items['id']; ?>" class="drinkki">
                    <div class="laatikot">
                        <p><?php echo $items['nimi'] ."<br>". $items['kategoria'] . "<br>";?></p>
                    </div>
                </a>
                <?php
                                    }
                                }

                    
                         else
                         {
                             ?>
                <tr>
                    <td colspan="4">Mitään ei löytynyt</td>
                </tr>
                <?php
                         }
                     }
                ?>
            </div>
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