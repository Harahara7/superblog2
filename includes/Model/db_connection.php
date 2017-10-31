<?php 

$dbparam['db_host'] = "localhost";
$dbparam['db_user'] = "root";
$dbparam['db_pass'] = "";
$dbparam['db_schema'] = "superblog";

foreach($dbparam as $key => $value){
    define(strtoupper($key), $value);
}//foreach

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA);


/*
if($connection){
    
    echo "Connection Successful!";
    
}
*/


?>