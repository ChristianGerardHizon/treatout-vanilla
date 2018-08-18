<?php
  include '../../../library/config.php';
  include '../../../classes/places.php';

  $myObj->name = "John";
  $myObj->city = "New York";

  $myJSON = json_encode($myObj);

  echo $myJSON;