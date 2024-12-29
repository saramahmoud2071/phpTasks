<?php


// 1-how to make \n work in browser.

$text = " line 1 \n line 2 \n line 3";
echo nl2br($text); //nl2br() Converts newlines to <br> tags
echo "<br/>";




// 2-Display $_SERVER in readable format

$server_data= $_SERVER;
foreach($_SERVER as $key => $val){ print "$key = $val <br/>";}

//another method
echo '<pre>'; //display the content in a preformatted text block
print_r($_SERVER);
echo '</pre>';
echo "<br/>";




// 3-Try any three functions from String or Arrays built in
echo str_repeat("repeating str",5);
echo "<br/>";

$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_merge($a1,$a2));
echo "<br/>";


$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));
echo "<br/>";



// 4-Write a PHP script to get the sum and avg of an indexed array and then sort
$array = array(12, 45, 10, 25);
$sum = array_sum($array);
echo "Sum: " . $sum . "<br>"; 

$average = $sum / count($array);
echo "Average: " . $average . "<br>";

//reverse array by index
$reversed=array_reverse($array);
foreach ($reversed as $value) { echo $value . "<br>"; }
echo "<br>";
//resort array by values(highest to lowest)
rsort($array);
foreach ($array as $value) { echo $value . "<br>"; }
echo "<br/>";




// 5-sortin assocative array
$array = array("Sara"=>31, "John"=>41, "Walaa"=>39, "Ramy"=>40);


//Ascending order by value asort()
asort($array);
foreach($array as $key => $val) { echo $key . " => " . $val . "<br>";} 
echo "<br/>";

// Descending order  by value arsort()
arsort($array);
foreach($array as $key => $val) { echo $key . " => " . $val . "<br>"; }
echo "<br/>";

//Ascending order by key ksort()
ksort($array);
foreach($array as $key => $val) { echo $key . " => " . $val . "<br>"; }
echo "<br/>";

// Descending order by key krsort()
krsort($array);
foreach($array as $key => $val) { echo $key . " => " . $val . "<br>"; }




?>
