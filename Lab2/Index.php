<html>
<?php session_start(); ?>
<?php include("head.php"); ?>
<body>
<div align="left">
    <?php

    // se verifica daca user-ul este autentificat - exista deja sesiune
    if (isset($_SESSION['Username'])) {
          echo "<a href='Logout.php' target='_self'>Logout</a>";

          echo "&nbsp; | &nbsp;";
          echo "<a href='NewPass.php' target='_self'>Change Password</a>";
      }
    // daca user-ul nu este autentificat se poate loga
    else {
        echo "<a href='Login.php' target='_self'>Login</a>";
        echo "&nbsp; | &nbsp;";
        echo "<a href='Inscriere.php' target='_self'>Inregistrare utilizator nou</a>";
        echo "<p align='left'>Trebuie sa va autentificati sa vedeti datele utilizatorilor</p>";
    }
    ?>

</div>

<h2>Toti utilizatorii inregistrati</h2>
<?php

// daca user-ul este logat se va afisa o lista cu utilizatorii in ordinea aleasa la login cu datele complete
if (isset($_SESSION['Username'])) {
    require_once("Config.php");
    $orderby = $_SESSION['Orderby'];
    //conexiune la db
    $conn = mysqli_connect($host, $db_username, $db_password, $dbname) or die ("could not connect");
    //selectarea utilizatorilor care exista in BD curent
    $query = "SELECT * FROM $tbl_name ORDER BY username $orderby";
    $result = mysqli_query($conn, $query);
    //rezultat ordonat in functie de optiune
    while ($r = mysqli_fetch_array($result)) {
        $username = $r['username'];
        echo "<div class='row'>";
        echo "<div class='column left'><p align='left'>" . $username . "</p></div>";
        $nume= $r['nume'];
        $prenume = $r['prenume'];
        echo "<div class='column middle'><p align='left'>" . $nume . " " . $prenume . "</p></div>";
        $id = $r['id'];
        echo "<div class='column right'><p align='left'><a href='Utilizatori.php?id=$id' target='_self'>Mai multe detalii</a></p></div>";
        echo "</div>";
    }
}
// daca user-ul nu este  logat se va afisa numai o lista cu username-uri fara a ordona
else {
    require_once("Config.php");
    $conn = mysqli_connect($host, $db_username, $db_password, $dbname) or die ("could not connect");

    $query = "SELECT * FROM $tbl_name";
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
        $username = $r['username'];
        echo "<p align='left'>" . $username . "</p>";
    }
}
?>
</body>
</html>
