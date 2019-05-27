<?php
require_once('functions.php');
//start session
setSessionPath();
//Get id of item to update
$cartItemID = filter_has_var(INPUT_POST, 'cartItemID') ? $_POST['cartItemID'] : null;
$cartitemID = trim($cartItemID);
//Get new quantity of item
$itemQuantity = filter_has_var(INPUT_POST, 'itemQuantity') ? $_POST['itemQuantity'] : null;
$itemQuantity = trim($itemQuantity);
//temp username var
$username = $_SESSION['userid'];

try {
    $dbConn = getConnection();//Connect to db
    //UPDATE query
    $updateQuantity = "UPDATE aa_cart
    SET cartItemQuantity = '$itemQuantity'
    WHERE custID = '$username' AND cartItemID = '$cartItemID'";
    //execute query
    $queryResult = $dbConn->query($updateQuantity);

    if ($queryResult === false) {
      echo "<p>Could not update items, Please try again.</p>\n";
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
