
<?php
//Function names must be followed by brackets, then braces
 function Message()
  {
  echo "WELCOME TO FUNCTION"; 
  }//END

  function Start()
  {
  	echo "php functions are good";
  }//END

  //NB:FUNCTIONS MUST BE USED /
  Message();
  Start();

 function SUM()
 {
 	$num = 4;//local variable
 	$num2 = 5;
 	$addition =$num + $num2;
 	echo "<h3>TOTAL IS $addition</h3>";
 }//END

 Sum();//we use the sum function


 function Multiply()
 {
 	$num1 = 86;
 	$num2 = 45;
 	$Multiply = $num1 * $num2;
 	echo "<h3>TOTAL IS $Multiply</h3>";


 }
Multiply();

$x = 78;



function Division()
{
$num = 4;// local var
$num4 = 90;
$Division = $num / $num2 *$x;
echo "<h3>DIV IS $Division</h3>";

}//end
//var defined inside a is called a function;ocal variable.it is defined outside its global var
//the variables inside the brackets are called parameters


function Check($x,$y)
 {
 	echo 'WE GOT:'.$x/$y.'<br>';
 	//echo "WE GOT $z";


 }//end
 Check(2,5);//PARSE THE PARAMETERS





 function Check1($m,$n,$h)
 {
 	$w =$m + $n + $h;
 	echo "I ENDED UP WITH/ $w";
 }//END
Check1(67, 89,56);
Check($x,$y);


function add($num1,$num2)
{
  echo "Sum is:";
  echo $num1+$num2. '<br>';
}
add(70, 40);
add(20,30);
add(60,100);

























?>