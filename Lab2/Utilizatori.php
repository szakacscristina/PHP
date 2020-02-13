<html>

<?php session_start(); ?>
<?php include("head.php"); ?>

<body>
<?php
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if (isset($_SESSION['Username'])) {
    echo "<a href='Index.php' target='_self'>Inapoi la lista utilizatori</a>";
    echo "&nbsp; | &nbsp;";
    echo "<a href='Logout.php' target='_self'>Logout</a>";
    require_once("Config.php");
    $conn = mysqli_connect($host, $db_username, $db_password, $dbname) or die ("could not connect");

    $query = "SELECT * FROM $tbl_name WHERE id=$id";
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
        $username = $r['username'];
        echo "<h2>Utilizator: " . $username . "</h2>";
        $nume = $r['nume'];
        $prenume= $r['prenume'];
        echo "<p align='left'>Nume: " . $nume. " " . $prenume. "</p>";
        $email = $r['email'];
        echo "<p align='left'>E-mail: " . $email . "</p>";
        $telefon = $r['telefon'];
        echo "<p align='left'>Telefon: " . $telefon . "</p>";
        $sex = $r['sex'];
        echo "<p align='left'>Sex: " . $sex . "</p>";
        $starecivila = $r['starecivila'];
        if ($starecivila == 0) {
            $starecivila = "Necasatorit";
        } else {$starecivila = "Casatorit";}
        echo "<p align='left'>Stare civila: " . $starecivila . "</p>";
        $date = $r['datalogin'];
          echo "<p align='left'>datalogin: " . $date . "</p>";
          $poza = $r['fotografieuser'];
        $fileToUpload = $file_dir . $poza;
        echo "<p align='left'><img src='" . $fileToUpload . "' width='150'></p>";
        echo "<a href='Email.php?id=$id'  target='_self'>Trimite mail</a>";
    

    }
} //daca nu este autentificat, il trimite inapoi la Index.php
else {
    echo "<meta http-equiv='refresh' content='0; URL=Index.php'>";
}
?>
</body>
</html>
