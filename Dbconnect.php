<?php

  $DBhost = "localhost";
  $DBuser = "demo";
  $DBpass = "Lawlexicon";
  $DBname = "timepass";
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }?>