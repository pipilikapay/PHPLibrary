<?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $input = file_get_contents('php://input');
      $input = json_decode($input, true);

      echo "Webhook Data Received:\n";
      print_r($input);
   }
?>