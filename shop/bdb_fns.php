<?php

function bdb_connect() {
   $result = new mysqli('localhost', 'root', '', 'books');
   if (!$result) {
      return false;
   }
   $result->autocommit(TRUE);
   return $result;
}

function bdb_result_to_array($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}

?>
