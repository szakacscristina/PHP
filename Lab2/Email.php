<?php
session_start(); // pentru variabilele de sesiune TREBUIE PORNITA SESIUNEA!
$subject=$message=$id=$emailto= "";
$esubject=$emessage=$eid=$eemailto="";
$fail="";

if (isset($_GET['id']))
{
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
//echo $id;
require_once 'Config.php';
$conn = mysqli_connect($host,$db_username,$db_password,$dbname);
if (!$conn) die ("connection failed: ".mysqli_connect_error());
$query= "SELECT email FROM utilizatori WHERE id = '$id'";
$result=mysqli_query($conn, $query);
while ($r = mysqli_fetch_array($result)) {
    $emailto = $r['email'];
  }
}

if (isset($_POST['send']))
{
if (isset($_POST['subject']))
 $subject = fix_string($_POST['subject']);
if (isset($_POST['message']))
 $message = fix_string($_POST['message']);
 $esubject .= validate_subject($subject);
 $emessage .= validate_message($message);


 $fail=$esubject.$emessage.$eid;
 if ($fail == "") {

 $to = "someone@example.com";
 $subject = "Test mail";
 $message = "Hello! This is a simple email message. Acest email a fost trimis de pe pagina ...";
 $from = "From: ".$_SESSION['UserEmail'];
 $headers =$from;
 mail($to,$subject,$message,$headers);
 echo "Mail Sent.";
 exit;
 }
 }
 ?>
 <?php
 function validate_subject($field) {
  if ($field == "")
  return "No Subject was entered<br />";
  else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
  return "Only letters, numbers, - and _ in subjects";
  return "";
 }
 ?>
 <?php
 function validate_message($field) {
  if ($field == "")
  return "No Message was entered<br />";
  else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
  return "Only letters, numbers, - and _ in messages";
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

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"/> <!-- action form redirectioneaza si post trimite catre noua pagina -->
  <label for="subject"><b>Subject</b></label>
  <input type="text" placeholder="Enter Subject" name="subject" value ="<?php echo $subject ?>" required>
  <span class ="error">* <?php echo $esubject;?></span><br><br>
<br>

<label for="message"><b>Message</b></label>
<input type="text" placeholder="Enter Message" name="message" value ="<?php echo $message ?>" required>
<span class ="error">* <?php echo $emessage;?></span><br><br>
<br>

<label for="text"><b>To:</b></label>
<input type="email" placeholder="Enter Destinatary" name="to" value ="<?php echo $emailto ?>" required>
<span class ="error">* <?php echo $eemailto;?></span><br><br>
<br>
<br>
<input type="submit" value="Send">
<br>
<br>
<a href='Logout.php' target='_self'>Logout</a>
</form>
