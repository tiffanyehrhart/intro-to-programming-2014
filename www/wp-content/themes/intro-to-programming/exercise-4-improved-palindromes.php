<?php
function Is_Palindrome ($string){
if ($string == strrev($string)){
  return true ;
}
else {return false ;}
}
$words=array (" new jersey ", " abba "," axomoxoa "," racecars ");

foreach($words as $word) {

  $test_is_palindrome=Is_Palindrome($word) ;
  echo "<br/>$word" ;
  if($test_is_palindrome){
    echo "-Is Palindrome!";
  }
  else{
  echo "-Isn't Palindrome!";
  }
}
?>
