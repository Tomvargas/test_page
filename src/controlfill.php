<?php
   $name = "empty";
   if(!empty($_POST["name"]))
   {
     $name = $_POST["name"];
   }
   echo $name;
 ?>