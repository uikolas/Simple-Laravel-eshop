<?php

class Helper {

    public static function ip(){
        return $_SERVER['REMOTE_ADDR'];
    }
	
	public static function makeLink($string){
		setlocale(LC_ALL, 'lt_LT');
		$string = preg_replace('~[^\\pL0-9_]+~u', '-', $string);
		$string = trim($string, "-");
		$string = iconv("utf-8", "us-ascii//TRANSLIT//IGNORE", $string); 
		return strtolower(preg_replace('~[^-a-z0-9_]+~i', '', $string)); 
	}
	
	public static function randomNumber(){
		return rand(1000000, 9999999);
	}
	
}