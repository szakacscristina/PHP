<?php
if (isset($_POST['submit'])) //verifica daca exista variabila Post cu datele din textfield
{
  $user = $_POST ["uname"];
  $passwd =md5($_POST ["psw"]); // md5 cripteaza parola
  $sex = $_POST ["sex"];
  $stcv = $_POST ["stcv"];
  $nume = $_POST ["nume"];
  $prenume = $_POST ["prenume"];
  $email = $_POST ["email"];

require_once 'Config.php';

$conn = mysqli_connect($host, $db_username, $db_password, $dbname);
 if (!$conn) die ("Connection failed: ".mysqli_connect_error());

$sql = "INSERT INTO utilizatori(username, parola, sex, starecivila, nume, prenume, email ) VALUES ('$user', '$passwd', '$sex', '$stcv', '$nume', '$prenume', '$email')";

if(mysqli_query($conn, $sql)) {
  echo "New record created succesfully";
} else echo "Error: ".$sql."</br>".mysqli_error($conn);
}
?>
