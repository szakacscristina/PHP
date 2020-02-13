<?php
if (isset($_POST["textfield"])) //verifica daca exista variabila Post cu datele din textfield
{
  $text= $_POST["textfield"];
  echo "Sirul de caractere: " .$text;
  echo "<br>";
  echo "Numar caractere: " .strlen($text);
  echo "<br>";
  echo "Sir inversat: " .strrev($text);
  echo "<br>";
  echo " Litere mici: " .strtolower($text);
  echo "<br>";
  echo "Litere mari: " .strtoupper($text);
  echo "<br>";
//exit();

}
?>

<html>
<body>
  <a href="Lab2.22.php">Back to the form</a>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name = "form1"  target = "_self" id = "form1">
 <!--php echo $_PHP_SELF ?>" reincarca pagina din formular -->
 <!--/ target = "_self" redeschide pagina in acelasi tab -->

<input type= "text" name = "textfield"/>
<input type= "submit" name = "submit" value = "submit"/>
</form>
</body>
</html>
