<?php

require_once('functions.php');

try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}
$eventID = filter_has_var(INPUT_GET, 'eventID') ? $_GET['eventID'] : null;
echo "<p>$eventID</p>";
?>
