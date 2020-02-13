<?php
session_start();
include("head.php");

// verificare de user si parola
if (isset($_POST['submit'])) {
    require_once("Config.php");
    $conn = mysqli_connect($host, $db_username, $db_password, $dbname) or die ("could not connect");

    $username = $_POST['username'];
    $password = $_POST['parola'];
    $orderby = $_POST['order'];

    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $password = $password;


    $query = "SELECT * FROM $tbl_name WHERE username='$username' and parola='$password'";
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
          $UserID = $r["id"];
          $Username = $r["username"];
          $UserNume = $r["nume"];
          $UserPrenume = $r["prenume"];
          $UserEmail = $r["email"];
          $UserStarecivila = $r["starecivila"];
          $UserSex = $r["sex"];
          $password = $r["parola"];
          $date = $r["datelogin"];
      }
      $count = mysqli_num_rows($result);
  // daca datele sunt ok, inregistrare user
      if ($count == 1) {
          $_SESSION['Username'] = $Username;
          $_SESSION['UserID'] = $UserID;
          $_SESSION['UserNume'] = $UserNume;
          $_SESSION['UserPrenume'] = $UserPrenume;
          $_SESSION['UserEmail'] = $UserEmail;
          $_SESSION['UserStarecivila'] = $UserStarecivila;
          $_SESSION['UserSex'] = $UserSex;
          $_SESSION['Orderby'] = $orderby;
          $_SESSION['Password'] = $password;
          $_SESSION['UserDatelogin'] = $date;
          echo "<meta http-equiv='refresh' content='0;URL=Index.php'>";
      }

    // daca user sau parola sunt incorecte
    else {
        echo "Utilizator sau parola incorecta. <br><br>

<a href='Index.php' target='_self'>Prima pagina</a>
&nbsp;   |   &nbsp;
<a href='Login.php' target='_self'>Inapoi la Login</a>
&nbsp;   |   &nbsp;
<a href='Inscriere.php' target='_self'>Inregistrare utilizator nou</a>
";
    }
}
?>
