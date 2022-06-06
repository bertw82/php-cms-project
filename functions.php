<?php 
// confirm connection
function confirm($query_result){
  global $connection;
  if(!$query_result){
    die("query failed ." . mysqli_error($connection));
  }
}

// console.log

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>