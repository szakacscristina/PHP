<?php
$path = "www.example.com/public_html/index.php";
$file = basename($path); // $file is set to "index.php"
echo $file;
echo "<br>";
function username($u){
  $parts = explode("@", $u);
  $parts=$parts[0]; //aici convertim lista de elemente din array in string plus alegem elementul de pe pozitia 0 din array
  return $parts;
  echo $parts;

}
$email="szakacscristina94@yahoo.com";
$username2 = username($email);
echo $username2;
 ?>
