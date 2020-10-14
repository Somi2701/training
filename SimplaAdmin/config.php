<?php
/**
 * MyClass File Doc Comment    
 * PHP version 5
 * 
 * @category MyClass
 * @package  MyPackage
 * @author   Me <me@example.com>
 * @license  http://www.abc.org GNU General Public License
 * @link     http://www.abc.com/
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "project";
// Create connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// print_r($con);
// echo "successfully connected";


?>