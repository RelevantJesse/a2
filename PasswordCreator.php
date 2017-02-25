<?php
namespace DWA{
  class PasswordCreator{
    public static function Generate(){
      $words = file("wordlist.txt") or die("Unable to open file!");
      $password = "";

      for ($x = 0; $x < $_GET["ddlNumberOfWords"]; $x++) {
        $password .= trim($words[rand(0, count($words))]) . "-";
      }

      $password = rtrim($password, "-");

      if(isset($_GET["chkNumber"])){
        $password .= rand(0,9);
      }

      if(isset($_GET["chkSymbol"])){
        $password .= $_GET["ddlSymbols"];
      }

      return $password;
    }
  }
}
