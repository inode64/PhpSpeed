<?php

function test_db_setup($base) {

include "config_db.php";

    $t = $base;
    test_start(__FUNCTION__);    
 
for ( $counter = 0; $counter <= $t; $counter += 1) {

$rand = rand(1, 1000000);
$time = time();

$counter;
$con = mysql_connect($dbhost,$dbuname,$dbpass) or die("Cant connect to MySQL");
mysql_select_db($dbname) or die('Could not select database');

     if (!$con) {
     test_regression(__FUNCTION__);
     }

mysql_query("
INSERT INTO test_table (t1, t2, t3, t4, t5, t6, t7, t8, t9, t10) 
VALUES($counter,$time,$rand,$rand,$rand,$rand,$rand,$rand,$rand,$rand) ") or 
die(mysql_error());

}

mysql_close($con);

    return test_end(__FUNCTION__);
}

function test_db_setup_enabled() {
    return TRUE;
}

?>
