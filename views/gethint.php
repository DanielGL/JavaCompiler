<?php
// Fill up array with names
$a[]="1";
$a[]="1.0 double";
$a[]="2";
$a[]="2.0 double";
$a[]="3";
$a[]="3.0 double";
$a[]="4";
$a[]="4.0 double";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q=strtolower($q); $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name,0,$len))) {
      if ($hint==="") {
        $hint=$name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint were found
// or output the correct values 
echo $hint==="" ? "no suggestion" : $hint;
?>