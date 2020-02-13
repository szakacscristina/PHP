<?php
session_start();

require_once 'Config.php';
//creare conexiune
$conn = mysqli_connect($host,$db_username,$db_password,$dbname);
//verificare conexiune
if (!$conn) die ("connection failed: ".mysqli_connect_error());
echo "Connected successfully";
echo "<br>";

if (isset($_POST['submit'])) // post primeste o informatie daca s-a facut submit
{

  $myusername = $_POST['uname'];
  $mypassword = $_POST['psw'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$myusername = mysqli_real_escape_string($conn, $myusername);
$mypassword = mysqli_real_escape_string($conn, $mypassword);

$mypassword = md5($mypassword);

$query= "SELECT * FROM utilizatori WHERE username = '$myusername' and parola ='$mypassword'";
echo $query;

$result=mysqli_query($conn, $query);

while ($r=mysqli_fetch_array($result))
{
  $UserID=$r["id"];
  $Username=$r["username"];
  $UserNume=$r["nume"];
  $UserPrenume=$r["prenume"];
  $UserEmail=$r["email"];
  $UserStarecivila=$r["starecivila"];
  $UserSex=$r["sex"];
}
$count=mysqli_num_rows($result); // calculeaza inregistrarile din baza
//daca e ok, se inregistreaza un user
 if($count==1){
   $_SESSION['username'] = $Username;
   $_SESSION['id'] = $UserID;
   $_SESSION['nume'] = $UserNume;
   $_SESSION['prenume'] = $UserPrenume;
   $_SESSION['starecivila'] = $UserStarecivila;
   $_SESSION['sex'] = $UserSex;
  $_SESSION['email'] = $UserEmail;

   //echo "<meta http-equiv='refresh' content='0;URL=index.php'>"; face refresh
 }
else {
  echo "The user or the password is incorrect";
}
echo "<br>";
$link_address1 = 'Logout.php';
echo "<a href='".$link_address1."'>Logout page</a>";
}

 ?>
