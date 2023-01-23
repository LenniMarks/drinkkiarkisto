<?php 
#Kirjaudu ulos tuhoamalla istunto
session_start();
session_destroy();

header("Location: index.php");

?>