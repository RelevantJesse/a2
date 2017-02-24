<?php

namespace DWA{
  class PasswordCreator{

    public static function Generate(){
      if(!isset($_GET['PasswordType']))
      return;

      $type = $_GET['PasswordType'];

      if($type == "XKCD"){
        return self::GenerateXKCD();
      }
      else{
        return self::GenerateSchneier();
      }
    }

    public static function GenerateXKCD(){
      $words = file("wordlist.txt") or die("Unable to open file!");
      $password = "";

      for ($x = 0; $x < $_GET['ddlNumberOfWords']; $x++) {
        $password .= trim($words[rand(0, count($words))]) . "-";
      }

      $password = rtrim($password, "-");

      return $password;
    }

    public static function GenerateSchneier(){
    }
  }
}
