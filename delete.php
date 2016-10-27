<?php

$array = array(1=>50, 2=>50, 3=>.1,4=>50,5=>50,6=>50);

if(in_array(  50 , $array ))
{
	echo ("meow");
	$key = array_search ( 50 , $array ) +2;
	$array[$key] = $array[$key] +0.1;
}

if(in_array( 0 , $array))
{
	echo ("meow2");
}
else
{
	echo "Rawro";
}
print_r($array);
/*
function consolidate($array)
{ 
  $arrayString = "";
  $keys = array_keys($array);
  for( $i = 0; $i < count($array); $i++){
    if ($array[$i]=="")
    {
      $i = $i + 2;
    }
    else
    {
      $arrayString =$arrayString . $array[$i] . ",";
    }
  }
  return  rtrim($arrayString, ",");
  //return $arrayString;

}
print_r(fixNotation($array));
*/

  ?>