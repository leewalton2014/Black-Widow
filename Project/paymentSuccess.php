<?php
//link to functions script
require_once('functions.php');
startHTML('Success', 'Order Conformation');
pageHeader('');
titleBanner('Payment Successfull', 'Thanks for your order!');
echo "<div class='parent'>\n";
$username = "LWalton";
$orderNumber = uniqid($username);
$date  = date("Y-m-d");
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
        $sqlAddToSales = "INSERT INTO aa_sales (custID, eventID, saleQuantity, orderNumber, orderDate)
        VALUES ('$username','$eventID','$itemQuantity','$orderNumber','$date')";
        $saleProcess = $dbConn->query($sqlAddToSales);

    }//end while

    //Clear basket items
    $clearItems = "DELETE FROM aa_cart
    WHERE custID = '$username'";
    //execute query
    $clearCart = $dbConn->query($clearItems);

    if ($clearCart === false) {
      echo "<p>Order unsuccessfull contact customer support if your payment method has been charged!</p>\n";
      exit;
    }
}
catch (Exception $e) {
    echo "<p>Order unsuccessfull contact customer support if your payment method has been charged!</p>\n";
}


echo "</div>\n";
echo endPage();
?>
