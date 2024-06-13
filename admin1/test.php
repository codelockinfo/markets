<?php
 echo "nivedita";
 echo "<br>";
 $v1=5;
 $v2=2;
 $age=2;
 if($age>18){
    echo " allow";
 }
 else if($age==3){
    echo "do not allow";
 }
  else{
    echo "not allow";
 }
 echo "<br>";
// arithmetic  operators
echo $v1 / $v2;
echo "<br>";
echo $v1 * $v2;
echo "<br>";
echo $v1 + $v2;
echo "<br>";
echo $v1 - $v2;
echo "<br>";

// assignment operators 
$newv1 = $v1;
$newv1 += 2;
echo $newv1;
 
// comparison operators 
echo  var_dump(1==6);
echo  var_dump(1!=6);
echo  var_dump(1>=6);
echo  var_dump(1<=6);
echo  var_dump(1==6);


// increment/decrement 
echo --$v1;
echo "<br>";
echo $v1;
?>





<?php
 echo "nivedita";
 echo "<br>";
 $v1=5;
 $v2=2;
// arithmetic  operators
echo $v1 / $v2;
echo "<br>";
echo $v1 * $v2;
echo "<br>";
echo $v1 + $v2;
echo "<br>";
echo $v1 - $v2;
echo "<br>";

// assignment operators 
$newv1 = $v1;
$newv1 += 2;
echo $newv1;
 
// comparison operators 
echo  var_dump(1==6);
echo  var_dump(1!=6);
echo  var_dump(1>=6);
echo  var_dump(1<=6);
echo  var_dump(1==6);


// increment/decrement 
echo --$v1;
echo "<br>";
echo $v1;
echo "<br>";

// while loop 
$i = 1;

while ($i <= 6) {
  echo $i;
  $i++;
} 
echo "<br>";
$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $x) {
  echo "$x <br>";
}
echo "<br>";
class Car {
   public $color;
   public $model;
   public function __construct($color, $model) {
     $this->color = $color;
     $this->model = $model;
   }
 }
 
 $myCar = new Car("red", "Volvo");
 
 foreach ($myCar as $x => $y) {
   echo "$x: $y <br>";
 }

 class car2{
   public $model;
   public $color;
   public function __construct($model, $color){
      $this->model = $model;
      $this->color = $color;
   }
 }
 $myCar2 = new Car2("aoudi", "white");
 foreach ($myCar2 as $x => $y) {
   echo "$x: $y <br>";
 }
 $cars = array("Volvo", "BMW", "Toyota"); 

var_dump($cars);
$cars = array("Volvo", "BMW", "Toyota"); 

foreach ($cars as $x) {
  echo "$x <br>";
}
$favanimal = "";
 switch ($favanimal){
   case "sparrows":
   echo "Your favorite animal is sparrows!";
   break;
   case "rabbit":
   echo "Your favorite animal is rabbit!";
   break;
   case "elephant":
   echo "Your favorite animal is elephant!";
   break;
   default:
   echo "Your favorite animal is neither sparrows, rabbit, or elephant!";
 }
 echo "<br>";
 $array = array("apple", "orange", "banana");
 print_r($array);
 echo "<br>";
 $number = 10;
$str = "apples";
printf("I have %d %s.", $number, $str);
?>





