<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Your Account', 'View customer account information');
pageHeader('View Account');
titleBanner('Your Account', 'View your details and view your previous orders');
echo "<div class='parent'>";
echo "<div>";
$username = $_SESSION['userid'];

//check if customer is logged in
if (isset($_SESSION['customer']) && $_SESSION['customer']){

echo "<h2 class='accountHeading'>Your Previous Orders</h2>\n";
echo "<table class='orderTable'>\n
            <tr>\n
            <th class='orderNo'><b>Order Number</b></th>\n
            <th class='orderDate'><b>Order Date</b></th>\n
            <th class='itemQuantity'><b>No. Of Items</b></th>\n
            </tr>\n";
try{

    $dbConn = getConnection();
    //Display cart items
    $getOrders = "SELECT orderNumber, orderDate, SUM(saleQuantity) AS orderQuantity
    FROM aa_sales
    WHERE custID = '$username'
    GROUP BY orderNumber
    ORDER BY orderDate DESC";

    $queryResult = $dbConn->query($getOrders);
    while ($rowObj = $queryResult->fetchObject()) {
      echo "<tr>\n";
      //link to view each order
      echo "<td class='orderNo'><a class='button' href='viewOrder.php?orderNumber={$rowObj->orderNumber}'>{$rowObj->orderNumber}</a></td>\n";
      echo "<td class='orderDate'>{$rowObj->orderDate}</td>\n";
      echo "<td class='itemQuantity'>{$rowObj->orderQuantity}</td>\n";
      echo "</tr>\n";
    }//end while
}//end try
catch (Exception $e){
    echo "<p>Error finding orders, check again later.</p>\n";
  }//end catch

echo "</table>";
echo "<a class='accountLogOut' href='logout.php'>Logout</a><br>\n";
}else{
  //else customer is not logged in
  //send to login page
  header('Location: customerLogin.php');
  die();
}
echo "</div>";
echo "</div>";
echo "</article>";
echo endPage();
?>
