<?php
//link to functions script
require_once('functions.php');
startHTML('Success', 'Order Conformation');
pageHeader('');
titleBanner('Payment Successfull', 'Thanks for your order!');
$username = "LWalton";
try {
    $dbConn = getConnection();//Connect to db
    //Create records in order table for items in basket
    $orderSQL = "SELECT cartItemID, aa_events.eventID, cartItemQuantity
    FROM aa_cart
    INNER JOIN aa_events ON aa_cart.eventID = aa_events.eventID
    WHERE custID = '$username'";

    $queryResult = $dbConn->query($orderSQL);
    while ($rowObj = $queryResult->fetchObject()) {

        $eventID = "{$rowObj->eventID}";
        $itemQuantity = "{$rowObj->cartItemQuantity}";

        $insertSQL = "INSERT INTO aa_orders (custID, eventID, itemQuantity)
        VALUES ('$username','$eventID','$itemQuantity')";
        $queryResult = $dbConn->query($sqlAddToCart);

        if ($queryResult === false){
          echo "<p>Order unsuccessfull contact customer support if your payment method has been charged!</p>\n";
          exit;
        }//end if
    }//end while

    //Clear basket items
    $clearItems = "DELETE FROM aa_cart
    WHERE custID = '$username'";
    //execute query
    $queryResult = $dbConn->query($clearItems);

    if ($queryResult === false) {
      echo "<p>Order unsuccessfull contact customer support if your payment method has been charged!</p>\n";
      exit;
    }
}
catch (Exception $e) {
    echo "<p>Order unsuccessfull contact customer support if your payment method has been charged!</p>\n";
}



echo endPage();
?>
