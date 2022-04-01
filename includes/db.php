<?php 

// make array with db values
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'cms';

foreach($db as $key => $value) { // use a loop to make constants
  // make constant
  define(strtoupper($key), $value); // Constants have to be upper-case
 }

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if($connection) {
//   echo 'we are connected';
// }


?>