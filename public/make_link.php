<?php
function make_link($string){
	setlocale(LC_ALL, 'lt_LT');

	$string = preg_replace('~[^\\pL0-9_]+~u', '-', $string);
	$string = trim($string, "-");
	$string = iconv("utf-8", "us-ascii//TRANSLIT//IGNORE", $string); 
	
	return strtolower(preg_replace('~[^-a-z0-9_]+~i', '', $string)); 
}  

echo make_link("Philips 46PFL3208H");		

?>