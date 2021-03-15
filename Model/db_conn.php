<?php
/**
 *  database connection 
 *  Database permission granted: 
 *  SELECT, INSERT, UPDATE on 
 *  all tables of DB1, DB2 and DB3
 */
define("HOST", "43.240.97.161:3306", false);
define("USERNAME", "asphang", false);
define("PASSWORD", "#Abc123", false);

$mysqli = new mysqli(HOST, USERNAME, PASSWORD);
if(mysqli_connect_errno()){
    printf("Connection failed: %s \n",mysqli_connect_errno());
    exit();
}
