<?php
$text =  "      \"Good morning, Dave,\"      said Hal";

 $text = '"Good morning, Dave," said Hal'; // a doua metoda de a scrie ce e mai sus

echo "<p><i>". $text."</i></p>"; //concatenare


$pi2 = number_format(pi(),2); //pi() inseamna ca apelam functia matematica pi
$radius =3;
$aria=$pi2 * $radius * $radius;
echo $aria;
echo "<br>";


function convert($f)
{
  $c = (5/9)*($f-32);
  return $c; //pentru a putea folosi variabila cu toti parametrii pe care ii are sus
}
$tf=100;
$tc=convert($tf);
echo $tc;
echo "<br>";
echo $tf;
echo"<br>";

$s="Php is fun";
echo "Sirul are ".strlen($s)." caractere";
echo "<br>";

$a= "WDWWLWWWLDDWDLL";
$b="WWW";
$d= strpos($a,$b);

$d = $d + 3;
$t = substr($a, $d, 1);
echo $t;
echo "<br>";

$s1= "Astazi este vineri!";
$b = "ri!";
$d= strpos($s1, $b);
$t = substr($s1, $d, 3);
echo $t;
echo "<br>";

echo $text = " Tomorrow I'll learn PHP global variable.";
echo "<br>";
echo $text =" This is a bad command: del c:\*.*";
echo "<br>";

$f= "vineri";
$v="vineri este ";
$b= strtoupper($f);
$n= strtolower($v);
$m= ucfirst($f);
$l= ucwords($v);
echo $b;
echo "<br>";
echo $n;
echo "<br>";
echo $m;
echo "<br>";
echo $l;
echo "<br>";
$b= "www.domeniu.com";
$n="www.";
$o = ltrim ($b, $n);
echo $o;
echo "<br>";
$b = "000000VINERI";
$n = "000000.";
$o = ltrim ($b, $n);
echo $o;
echo "<br>";
$b =  "acasa";
$n = "cas";
$p = str_replace($n,"", $b);
echo $p;
echo "<br>";
$b = 3;
if( $b % 2 == 0){
  echo "the number is even!";
} else
 echo " the number is odd";
echo "<br>";
$b = 5;
$h= ($b % 2==0) ? "true" : "false"; // ? inlocuieste un if
echo $h;
echo "<br>";
echo (max(1, 2, 3)) ? "true" : "false";
echo "<br>";
function sum($num) {
    $sum = 0;
    for ($i = 0; $i < strlen($num); $i++){
        $sum += $num[$i];
    }
    return $sum;
}
$num = "711";
echo sum($num);
echo "<br>";

// sirul lui Fibbonacci
$max= 18;
$a = 0;
$b = 1;
echo $a;
echo " , ";
echo $b;
while ($max > $b){
  $c=$a+$b;
  if ($max<$c) break;
  echo " , ";
  echo $c;
  $a=$b;
  $b=$c;
}
echo "<br>";

echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['REQUEST_URI']; // afiseaza numele fisierului curent
echo "<br>";
$arr = "MALAYALAM";
$h= (strrev ($arr)==$arr) ? "true" : "false";
echo $h;
echo "<br>";
 ?>
