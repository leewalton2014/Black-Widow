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
echo "<div>";
$orderNumber = isset($_REQUEST['orderNumber']) ? $_REQUEST['orderNumber'] : null;
if (isset($_SESSION['customer']) || isset($_SESSION['admin'])){
echo "<h2 class='accountHeading'>Order #$orderNumber</h2>\n";
echo "<table class='orderItems'>\n
            <tr>\n
            <th class='eventName'><b>Event Name</b></th>\n
            <th class='date'><b>Event Date</b></th>\n
            <th class='itemQuantity'><b>Quantity</b></th>\n
            <th class='totalPrice'><b>Total Price</b></th>\n
            </tr>\n";
try{

    $dbConn = getConnection();
    //Display items
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
    WHERE orderNumber = '$orderNumber'";
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
}else{
  //user or admin not logged include
  echo "<p>Please login to view order info.</p>";
}
if(isset($_SERVER['HTTP_REFERER'])){
  $redirect = $_SERVER['HTTP_REFERER'];
}else{
  //use browser local previous page
  $redirect = "javascript:history.go(-1)";
}
echo "<a class='accountLogOut' href='$redirect'>&#60; Back</a>\n";
echo "</div>";
echo "</div>";
echo "</article>";
echo endPage();
?>
