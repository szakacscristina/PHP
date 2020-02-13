<?php
 // verificam toate campurile din formularul de mai jos


$username = $nume = $prenume  = $email = $password1 = $password2 = $sex  = $starecivila = $telefon =  "";
$eusername = $enume = $eprenume  = $eemail = $epassword1 = $epassword2 = $esex= $efileToUpload = $etelefon =""; //definim variabilele pentru cazul de eroare
$fail="";
if (isset($_POST['submit']))
{
if (isset($_POST['username']))
 $username = fix_string($_POST['username']);
if (isset($_POST['nume']))
 $nume = fix_string($_POST['nume']);
if (isset($_POST['prenume']))
 $prenume = fix_string($_POST['prenume']);
if (isset($_POST['email']))
 $email = fix_string($_POST['email']);
if (isset($_POST['password1']))
 $password1 = fix_string($_POST['password1']);
if (isset($_POST['password2']))
 $password2 = fix_string($_POST['password2']);
 if (isset($_POST['telefon']))
  $telefon = fix_string($_POST['telefon']);
if (isset($_POST['sex']))
{
  $sex = $_POST['sex'];
}  else {
$esex = "Sex must be chosen"; //pt ca e  tip radio button se returneaza eroarea cu mesaj
}

if (isset($_POST['starecivila']))
{
  $starecivila = $_POST['starecivila'];
}  else {
$starecivila = "Necasatorit/a"; //pt ca e  tip radio button se returneaza erpoarea cu mesaj
}


$eusername .= validate_username($username);
$enume .= validate_nume($nume);
$eprenume .= validate_prenume($prenume);
$eemail .= validate_email($email);
$epassword1.= validate_password1($password1);
$epassword2 .= validate_password2($password2, $password1);
$etelefon .= validate_telefon($telefon);
require_once 'Config.php';
//creare conexiune
$conn = mysqli_connect($host,$db_username,$db_password,$dbname);
//verificare conexiune
if (!$conn) die ("connection failed: ".mysqli_connect_error());
//echo "Connected successfully";
//echo "<br>";

$query= "SELECT * FROM utilizatori WHERE username = '$username'";
$result=mysqli_query($conn, $query);
$count=mysqli_num_rows($result); //calculeaza inregistrarile din baza
if($count==1){
$eusername= "Acest utilizator exista deja";

 }

 $query= "SELECT * FROM utilizatori WHERE email = '$email'";
 $result=mysqli_query($conn, $query);
 $count=mysqli_num_rows($result); // calculeaza inregistrarile din baza
  if($count==1){
 $eemail = "Acest email exista deja";
  }
echo $_FILES["fileToUpload"]["size"];
  if ($_FILES["fileToUpload"]["size"]!==0)
  {
    $target_dir = "";
    $tmp = explode(" ", $_FILES["fileToUpload"]["name"]);
    $fileExt = end($tmp);
    $target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk=1;
    $imageFileType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $target_file=$target_dir.$username.".".$imageFileType;// concatenez ca sa imi faca username plus extensie
    // verificare daca fisierul este imagine
 echo $target_file;
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false){
        echo "File is an image-" .$check["mime"].".";
        $uploadOk=1;
      } else {
        $efileToUpload= "File is not an image.";
        $uploadOk=0;
      }

    // verificare daca fisierul exista deja
    if (file_exists($target_file)){
      $efileToUpload= "Sorry, file already exists.";
      $uploadOk=0;
    }
    //verificare daca fisierul are marimea corespunzatoare
    if($_FILES["fileToUpload"]["size"]>500000){
      $efileToUpload= "Sorry, your file is too large!";
      $uploadOk=0;
    }

    // verificare format imagine
    if($imageFileType != "aaa"){
      $fileToUpload= "Your format is allowed.";
      $uploadOk = 0;
    }

    // verifica daca totul este in regula si daca se face upload

    else
    {
      $efileToUpload="You must choose a File!";
    }
}

$fail=$fail.$eusername.$enume.$eprenume.$eemail.$epassword1.$epassword2.$efileToUpload.$etelefon; //verific daca exista o eroare la oricare camp din formular
if ($fail == "") {
 echo "Form data successfully validated";

   if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
     echo "The file ".basename($_FILES["fileToUpload"]["name"])."has been uploaded.";
   }else {
     $efileToUpload = "Sorry, there was an error uploading your file.";
   }
   $localvar= ($_POST ["password1"]);
   $date = date("Y-m-d H:i:s");
   $sql = "INSERT INTO utilizatori(username, parola, sex, starecivila, nume, prenume, email, fotografieuser, datalogin, telefon ) VALUES ('$username', '$localvar', '$sex', '$starecivila', '$nume', '$prenume', '$email', '$target_file', '$date', '$telefon')";

  $result=mysqli_query($conn, $sql);


 exit; // inchide scriptul
}
}

function validate_nume($field) {
 if ($field == "")
 return "No nume was entered<br />";
 return "";
}

function validate_prenume($field) {
 if ($field == "")
 return "No prenume was entered<br />";
 return ""; }
?>
<?php
function validate_username($field) {
 if ($field == "")
 return "No Username was entered<br />";
 else if (strlen($field) < 5)
 return "Usernames must be at least 5 characters<br/>";
 else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
 return "Only letters, numbers, - and _ in usernames";
 return "";
}
?>
<?php
function validate_password1($field) {
 if ($field == "")
 return "No Password1 was entered<br />";
 else if (strlen($field) < 6)
 return "Passwords must be at least 6 characters<br/>";
 else if ( !preg_match("/[a-z]/", $field) ||
!preg_match("/[A-Z]/", $field) ||
!preg_match("/[0-9]/", $field))
 return "Passwords require 1 each of a-z, A-Z and 0-9";
 return "";
}
?>
<?php
function validate_password2($field,$field2) {
 if ($field == "")
 return "No Password2 was entered<br />";
 else if (strlen($field) < 6)
 return "Passwords must be at least 6 characters<br/>";
 else if ( !preg_match("/[a-z]/", $field) ||
!preg_match("/[A-Z]/", $field) ||
!preg_match("/[0-9]/", $field))
 return "Passwords require 1 each of a-z, A-Z and 0-9";
 else if ($field2!==$field)
 return "Password2 is different from Password1";
 return ""; //aici se face  return daca nu se respecta conditiile din if
}
?>
<?php
function validate_telefon($field) {
 if ($field == "")
 return "No Phone Number was entered<br />";
 else if (strlen($field) < 5)
 return "Phone numbers must be at least 5 characters<br/>";
 else if (preg_match("/[^0-9 +_-]/", $field))
 return "Only numbers, spaces and + in phones numbers!";
 return "";
}
?>
<?php
function validate_email($field) {
 if ($field == "")
 return "No Email was entered<br />";
 else if (!((strpos($field, ".") > 0) &&
(strpos($field, "@") > 0)) ||
preg_match("/[^a-zA-Z0-9.@_-]/", $field)) // ^ in paranteza inseamna ca orice element in afara de cele din paranteza
 return "The Email address is invalid<br />";
 return "";
}
?>
<?php
function fix_string($string) { // aici se face sanitizarea functiilor de mai sus
 if (get_magic_quotes_gpc())
 $string = stripslashes($string);
 return htmlentities ($string);
}
 ?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- action form redirectioneaza si post trimite catre noua pagina -->
  <div class="imgcontainer"> </div>

  <div class="container">

    <label for="nume"><b>Nume</b></label>
    <input type="text" placeholder="Enter Nume" name="nume" value="<?php echo $nume ?>" required>
    <span class ="error">* <?php echo $enume;?></span><br><br>
     <!-- verific daca exista setata o eroare in nume atunci printez eroarea -->
<br>
    <label for="prenume"><b>Prenume</b></label>
    <input type="text" placeholder="Enter Prenume" name="prenume" value ="<?php echo $prenume ?>" required>
    <span class ="error">* <?php echo $eprenume;?></span><br><br>
<br>

<label for="sex"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="username" value = "<?php echo $username ?>" required>
<span class ="error">* <?php echo $eusername;?></span><br><br>
  <br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value = "<?php echo $email ?>" required>
    <span class ="error">* <?php echo $eemail;?></span><br><br>
<br>

<label for="text"><b>Password1</b></label>
<input type="password" placeholder="Enter Password" name="password1" value = "<?php echo $password1 ?>" required>
<span class ="error">* <?php echo $epassword1;?></span><br><br>
<br>

<label for="text"><b>Password2</b></label>
<input type="password" placeholder="Enter Password Again" name="password2" value = "<?php echo $password2 ?>" required>
<span class ="error">* <?php echo $epassword2;?></span><br><br>

<br>
<label for="phone"><b>Telefon</b></label>
<input type="text" placeholder="Enter Phone Number" name="telefon" value = "<?php echo $telefon ?>" required>
<span class ="error">* <?php echo $etelefon;?></span><br><br>
  <br>

<input type="radio" name="sex" value="M" <?php if ($sex=="M") echo "checked"; ?>> M
<br>

<input type="radio" name="sex" value="F" <?php if ($sex=="F") echo "checked"; ?>> F
<span class ="error">* <?php echo $esex;?></span><br><br>
<br>

<label for="text"><b>Stare civila</b></label>
<br>
<input type="checkbox" name="starecivila" value="casatorit/a" <?php if ($starecivila=="casatorit/a") echo "checked"; ?>>Casatorit/a
<br>
<br>
<input  name="fileToUpload" type="file">
<span class ="error">* <?php echo $efileToUpload;?></span><br><br>
<br>
<br>

<input type="submit" name="submit"/>

</div>

<a href='Index.php' target='_self'>Prima pagina</a>
&nbsp; | &nbsp;
<a href='Login.php' target='_self'>Login</a>
</body>
</html>
</form>
