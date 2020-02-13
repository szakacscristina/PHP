<?php
if (isset($_POST['uname'])) //verifica daca exista variabila Post cu datele din textfield
{
  if ( $_POST ["uname"] == "user" && $_POST ["psw"] == "password")
{
    echo " Welcome to your page!";
    exit();
}
  else

    echo "You must log in first!";


}

?>

<html>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> <!--aici se reincarca pagina dupa ce se verifica ca datele din post sunt adevarate-->

    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
      </label>
  </form>
</form>
</body>
</html>
