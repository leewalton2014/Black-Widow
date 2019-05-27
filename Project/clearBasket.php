<?php
require_once('functions.php');
//start session
setSessionPath();
//username var
$username = $_SESSION['userid'];
try {
    $dbConn = getConnection();//Connect to db
    //delete query
    $clearItems = "DELETE FROM aa_cart
    WHERE custID = '$username'";
    //execute query
    $queryResult = $dbConn->query($clearItems);

    if ($queryResult === false) {
      echo "<p>Could not remove items, Please try again.</p>\n";
      exit;
    } else {
      header('Location: viewCart.php');
      exit();
    }
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}
?>
