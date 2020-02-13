<?php
 // verificam toate campurile din formularul de mai jos
session_start();

$passwordold = $passwordnew = $passwordnew2= "";
$epasswordold = $epasswordnew = $epasswordnew2 =""; //definim variabilele pentru cazul de eroare
$fail="";

function fix_string($string) { // aici se face sanitizarea functiilor de mai sus
 if (get_magic_quotes_gpc())
 $string = stripslashes($string);
 return htmlentities ($string);
}

if (isset($_POST['submit']))
{

  if (isset($_POST['passwordold']))
  $passwordold = md5(fix_string($_POST['passwordold']));
  if (isset($_POST['passwordnew']))
  $passwordnew = md5(fix_string($_POST['passwordnew']));
  if (isset($_POST['passwordnew2']))
  $passwordnew2 = md5(fix_string($_POST['passwordnew2']));

  if($_SESSION['Password'] !== $passwordold){

    echo $passwordold;
    echo "<br>";
    echo $_SESSION['Password'] ;
    echo "Parola veche incorecta";
  } else {
    if($_POST["passwordnew"] != $_POST["passwordnew2"]) { echo "Parola 1 nu e aceasi ca parola 2";
    } else {
      if($_POST["passwordold"] == $_POST['passwordnew'] || $_POST["passwordold"] == $_POST['passwordnew2']) {  echo "Parola nu s-a schimbat fata de parola initiala";
      } else {
        $passChange = $passwordnew;
        $_SESSION["password"] = $passChange;
        $currentUser = $_SESSION["Username"];
        require_once("Config.php");
        $conn = mysqli_connect($host, $db_username, $db_password, $dbname) or die ("could not connect");
        $sql = "UPDATE $tbl_name SET parola = '$passChange' WHERE username = '$currentUser' ";
        echo $sql;
        if (mysqli_query($conn,$sql)){
          echo  "Parola modificata";
        } else {
          echo "Parola nemodificata".mysqli_error($conn);
        }
      }
    }
  }

}



 ?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- action form redirectioneaza si post trimite catre noua pagina -->

<label for="text"><b>Password1</b></label>
<input type="password" placeholder="Enter First Password" name="passwordold" value = "<?php echo $passwordold ?>" required>
<span class ="error">* <?php echo $epasswordold;?></span><br><br>
<br>

<label for="text"><b>Passwordnew</b></label>
<input type="password" placeholder="Enter New Password" name="passwordnew" value = "<?php echo $passwordnew ?>" required>
<span class ="error">* <?php echo $epasswordnew;?></span><br><br>
<br>

<label for="text"><b>Passwordnew2</b></label>
<input type="password" placeholder="Enter New Password Again" name="passwordnew2" value = "<?php echo $passwordnew2 ?>" required>
<span class ="error">* <?php echo $epasswordnew2;?></span><br><br>

<br>
<input type="submit" name="submit"/>
</div>

</body>
</html>
</form>
