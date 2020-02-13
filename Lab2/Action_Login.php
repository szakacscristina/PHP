<?php
 //verifica daca exista variabila Post cu datele din textfield
echo date('Y-m-d');

if (isset($_POST['submit'])) //verifica daca exista variabila Post cu datele din textfield
{
  require_once "Config.php";
  $db = mysqli_connect($host, $db_username, $db_password, $dbname);
  $user = $_POST ["uname"];
  $passwd = md5($_POST ["psw"]);
  $query= "SELECT * FROM utilizatori WHERE username = '$user' and parola ='$passwd'";
  $result=mysqli_query($db, $query);
  while ($r=mysqli_fetch_array($result))
  {
    $UserID=$r["id"];
    $Username=$r["username"];
    $UserNume=$r["nume"];
    $UserPrenume=$r["prenume"];
    $UserEmail=$r["email"];
    $UserStarecivila=$r["starecivila"];
    $UserSex=$r["sex"];
      $Userparola=$r["parola"];
  }
  $count=mysqli_num_rows($result);
  //daca e ok, se inregistreaza un user
   if($count==1){
     $_SESSION['username'] = $Username;
     $_SESSION['id'] = $UserID;
     $_SESSION['nume'] = $UserNume;
     $_SESSION['prenume'] = $UserPrenume;
     $_SESSION['email'] = $UserEmail;
     $_SESSION['starecivila'] = $UserStarecivila;
     $_SESSION['sex'] = $UserSex;

     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }
  else {
    echo "The user or the password is incorrect";
  }
}
?>
