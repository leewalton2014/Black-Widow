<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Order Details', 'View items in a specific order');
pageHeader('View Order');
titleBanner('Order View', 'View contents of your previous order');
echo "<div class='parent'>";
$orderNumber = isset($_REQUEST['orderNumber']) ? $_REQUEST['orderNumber'] : null;
$username = "LWalton";
echo "<h2>Order #$orderNumber</h2>\n";
echo "<table class='orderItems'>\n
            <tr>\n
            <th class='eventName'>Event Name</th>\n
            <th class='date'>Event Date</th>\n
            <th class='itemQuantity'>Quantity</th>\n
            <th class='totalPrice'>Total Price</th>\n
            </tr>\n";
try{

    $dbConn = getConnection();
    //Display cart items
    //$username = $_SESSION['username'];
    $username = "LWalton";

    $getOrders = "SELECT eventTitle, eventDate, saleQuantity, saleQuantity*ticketPrice AS TotalPrice
    FROM aa_sales
    INNER JOIN aa_events ON aa_sales.eventID = aa_events.eventID
    WHERE orderNumber = '$orderNumber'
    ORDER BY eventTitle";

    $queryResult = $dbConn->query($getOrders);
    while ($rowObj = $queryResult->fetchObject()) {
      echo "<tr>\n";
      echo "<td class='eventName'>{$rowObj->eventTitle}</td>\n";
      echo "<td class='date'>{$rowObj->eventDate}</td>\n";
      echo "<td class='itemQuantity'>{$rowObj->saleQuantity}</td>\n";
      echo "<td class='totalPrice'>£{$rowObj->TotalPrice}</td>\n";
      echo "</tr>\n";
    }//end while
    //Grand total
    $grandTotal = "SELECT SUM(saleQuantity*ticketPrice) AS GrandTotal
    FROM aa_sales
    INNER JOIN aa_events ON aa_sales.eventID = aa_events.eventID
    WHERE orderNumber = '$orderNumber' AND custID = '$username'";
    $gTotalResult = $dbConn->query($grandTotal);
    $gTotal = $gTotalResult->fetchObject();
    echo "<tr>\n";
    //link to view each order
    echo "<td class='eventName'></td>\n";
    echo "<td class='date'></td>\n";
    echo "<td class='itemQuantity'>Grand Total:</td>\n";
    echo "<td class='totalPrice'>£{$gTotal->GrandTotal}</td>\n";
    echo "</tr>\n";
}//end try
catch (Exception $e){
    echo "<p>Error finding orders, check again later.</p>\n";
  }//end catch
echo "</table>";
$redirect = $_SESSION['previous_page'];
echo "<a class='button' href='$redirect'>Back</a>\n";
echo "</div>";
echo "</article>";
echo endPage();
?>
