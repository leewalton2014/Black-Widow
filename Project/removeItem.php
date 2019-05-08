<?php
require_once('functions.php');

//Get id of item to remove from basket
$cartItemID = filter_has_var(INPUT_GET, 'cartItemID') ? $_GET['cartItemID'] : null;
$cartitemID = trim($cartItemID);
//temp username var
$username = "LWalton";
try {
    $dbConn = getConnection();//Connect to db
    //delete query
    $removeItem = "DELETE FROM aa_cart
    WHERE custID = '$username' AND cartItemID = '$cartItemID'";
    //execute query
    $queryResult = $dbConn->query($removeItem);

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
