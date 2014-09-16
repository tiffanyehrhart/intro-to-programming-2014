<?php
function Is_Palindrome ($string){
if ($string == strrev($string)){
  return true ;
}
else {return false ;}
}

$new_jersey_is_palindrome=Is_Palindrome("new jersey") ;
if($new_jersey_is_palindrome){
  echo "Is Palindrome!";
}
else{
  echo "Isn't Palindrome!";}
?>
