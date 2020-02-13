<?php
// Functii : BUILD-IN
//Functia echo face o simpla afisare

echo strrev (".dlrow olleH"); // strrev este o functie care intoarce sirul
 echo "<br/>";
echo str_repeat ("Hip", 2); // str_repeat face ca strigul din paranteza sa apara de 2 ori
echo "<br>";
echo strtoupper ("horray!"); // strtoupper face ca stringul sa fie scris cu litere mari
echo "<br>";
$lowered = strtolower ("aNy # of Letters and Punctuation you WANT");
echo $lowered;
echo "<br>";
$ucfixed = ucfirst("any day."); // ucfirst = upper case first
echo $ucfixed;
echo "<br>";


// Functia print poate executa ecuatii, este mai complexa decat echo

print (5-8);
echo "<br>";
print (abs(5-8)); // abs returneaza valoarea absoluta poztiva a unei ecuatii
echo "<br>";
echo ucfirst(strtolower("any day YOU want")); // primul cuvant cu litera mare si urmatoarele cu litere mici

echo "<br>";

echo fix_names("WILLIAM", "henry", "gatES");
function fix_names($n1, $n2, $n3)
{
$n1=ucfirst(strtolower($n1));
$n2=ucfirst(strtolower($n2));
$n3=ucfirst(strtolower($n3));
return $n1. " " .$n2. " " .$n3;
}

echo "<h3> Use of Default Parameters<br></h3>";
function increment($num, $increment=1) // aici fac o functie de incrementare cu 1
{
  $num+=$increment; // aici scriu ce sa faca parametrii adica $num sa faca plus $increment
  echo $num; // aici afisez $num
}
$num=4;
increment($num); // apelez variabila increment care are valoare 1 si dau ca paramentri
echo "<br>";
increment($num, 2);
echo "<br>";
increment($num, 10); // $num nu ia valorile de sus, isi pastreaza aceeasi valoare(4)si face increment pe rand cu cat ii dau eu in paranteza
echo "<br>";

// apelul dinamic al functiilor
function sayHello() // aici am functia say hello care face print
{
  print "hello<br>";
}
$function_holder="sayHello"; // aici asociez functia sayHello unei variabile $function_holder care apeleaza dinamic functia de mai sus
$function_holder();
?>

<?php

// transmiterea prin referinta
$a1="WILLIAM";
$a2="henry";
$a3="gatEs";
echo $a1 . " ". $a2 . " ". $a3 . "<br/>";
fix_names1($a1, $a2, $a3);
echo $a1 . " " . $a2 . " " . $a3;
function fix_names1(&$n1,&$n2,&$n3)
{
  $n1=ucfirst(strtolower($n1));
  $n2=ucfirst(strtolower($n2));
  $n3=ucfirst(strtolower($n3));
}
echo "<br />";
// variabile globale

function myfunction()
{
  $GLOBALS["no1"]=10; // variabila locala
}
$no1=20; // variabila globala
myfunction(); //apel catre functia de sus
echo $no1;

ECHO "<BR/>";
?>
<?PHP

function myfunction1()
{
  $no1=10; // variabila locala
}
$no1=20; // variabila globala
myfunction1(); //apel catre functia de sus
echo $no1;
?>

<?php
function myfunction2()
{
  $no1=10; $no2=20;
  echo $no1+$no2. "<br>";
  echo $no1+$GLOBALS["no2"];
}
$no2=40;
//add();
echo "<br>";
echo date("Y/m/d") . "<br>";
 ?>

<?php
function function3()
{
  global $n1;
  $n1=10;
}
$n1=60;
function3();
echo $n1;
 ?>
 <?php
$a="WILLIAM";
$b="henRy";
$c="GATes";
echo $a. " ". $b." " . $c."<br/>";
fi_names(); // prefunctie in care dau toate datele
echo $a . " " . $b. " ". $c."<br/>";

function fi_names()
{
  global $a; $a=ucfirst(strtolower($a));
  global $b; $b=ucfirst(strtolower($b));
  global $c; $c=ucfirst(strtolower($c));
}
  ?>
  <?php
  function display()
  {
    static $no=12;
    echo $no;
    $no++;
  }
  display();
echo "<br>";
  display();
   echo "<br>";

  //OOP PHP CLASE
   $object = new User; // new se foloseste la crearea de obiecte
   $temp = new User ('name', 'password');
   print_r($object);
   class User  // declarare de clasa in php
   {
     public $name, $password;
     function save_user()
     {
       echo "Save User code goes here";
     }
   }
  ?>
<?php
//accesarea obiectelor din clase
$object= new User; // se creeaza un obiect nou
print_r($object); echo "<br/>"; // se face lizibil pentru om ceea ce am psu in variabila
$object->name='joe';
$object->password= 'mypass';
print_r($object); echo "<br/>";
$object->save_user(); // declarare preclasa
class Usere // declarare de clasa
{
  public $name, $password;
  function save_user()
  {
    echo "save User code goes here";
  }

}
echo "<br/>";
 echo "<br/>";
 // se creeaza un obiect nou si se afiseaza
 $object= new User;
 print_r($object); echo "<br/>"; // acest print_r afiseaza doar variabilele din clasa fara ca ele sa contina ceva

 // se face atribuire la variabile cu valori
 $object->name='Cristina';
 $object->password='notyourbusiness';
 print_r($object); echo "<br/>"; // acesta afiseaza variabilele de mai sus insa impreuna cu valorile atribuite mai sus

// scriem o prefunctie care va apela functia din clasa
 $object-> save_user();// prefunctia se numeste save_user si asa se va numi si functia reala din clasa

 class User1 // se declara clasa
 {
   public $name, $password; // in clasa declaram variabilele folosite mai sus

   // aici scriem functia de salvare a utilizatorului
   function save_user()
   {
     echo "The code goes here"; // se afiseaza exact ce este in echo
   }
 }

echo "<br/>";
echo "<br/>";

// COPIERE
$object1= new User();// declarare obiect
$object1->name='Amy'; // se atribuie o valoare
$object2=$object1; // aici se declara ca obiectul 2 suprascrie 1 si cand ii dam o valore obj2 aceasta o suprascrie pe ca din obj1
$object2->name='Alice';// se atribuie o valoare
//$object2=$object1; // aici i se da obj2 valoarea obj1 $no=9
echo "object1 name = " .$object1->name. "<br/>";
echo "object2 name= ". $object2->name;
class User3
{
  public $name;
}


echo "<br/>";
//CLONAREA
$object1= new User();// declarare obiect
$object1->name='Amy'; // se atribuie o valoare
$object2= CLONE $object1; // aici obj2 cloneaza obj1 si dupa i se da o valore lui obj2. Clonarea nu suprascrie ci pastreaza valorile fiecarui obiect.
$object2->name='Alice';// se atribuie o valoare
//$object2= CLONE $object1;
echo "object1 name = " .$object1->name. "<br/>";
echo "object2 name= ". $object2->name;
class User2
{
  public $name;
}
 //CONSTRUCTORI

 class Utilizator
 {
   function User($par1, $par2)
   {
     // constructor code goes here
   }
 }
 echo "<br/>";

  class Uti{
    public $name, $password;
    function get_password()
    {
      return $this->password;
    }
  }
$object= new Uti;
$object->password ="secret";
echo $object->get_password();
 echo "<br/>";
?>
<?php
$object1=new Mia();
$object1 ->name="Alice";
echo $object1->name;
class Mia{}
   ?>
<?php
class Test
{
  public $name="Paul Smith";
  public $age=42;
  // public $time=time();
  // public $score=$level * 2;
}
 echo "<br/>";
Translate::lookup();
class Translate
{
  const ENGLISH=0;
  const SPANISH=1;
  const FRENCH=2;
  const GERMAN=3;

  function lookup()
  {
    echo self::SPANISH;
  }

}
echo "<br/>";
?>
<?php

//CONSTRUCTOR IN SUBCLASA

$object=new Tiger();
echo "Tigers have... <br/>";
echo "Fur:" .$object->fur."<br/>";
echo "Stripes:" .$object->stripes;

class Wildcat
{
  public $fur;
  function F_construct()
  {
    $this->fur="TRUE";
  }
}

class Tiger extends Wildcat
{
  public $stripes;

  function F_construct()
  {
    parent:: F_construct();
    $this->stripes="TRUE";
  }
}
echo "<br/>";
//SIRURI
 $paper[]="copier";
 $paper[]="inkjet";
 $paper[]="laser";
 $paper[]="photo";
 for($i=0; $i<4; ++$i ) // dau o conditie sa mearga forul atata timp cat i mai mic decat 4 ca sa parcurga toate elementele
 echo "$i: $paper[$i]<br>"; // printez rezultatul


//ADAUGARE ELEMENTE IN ARRAY
$p1=array("copier", "inkjet", "laser", "photo");
echo "p1 element: " .$p1[2] . "<br/>";
$p2=array(
  'copier'=> "copier and multipurpose",
  'inkjet'=> "inkjet printer",
  'laser'=> "laser printer",
  'photo'=> "photographic paper"
);
echo "p2 element: " .$p2['inkjet']. "<br/>";
 ?>
