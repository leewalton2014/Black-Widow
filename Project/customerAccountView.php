<?php
//link to functions script
require_once('functions.php');
startHTML('Cart', 'Review items and checkout');
pageHeader('Shopping Cart');
titleBanner('Your Shopping Cart', 'Review your items and checkout');
echo "<div class='parent'>";
$username = "LWalton";

try{

    $dbConn = getConnection();
    //Display cart items
    //$username = $_SESSION['username'];
    $username = "LWalton";

    $getCart = "SELECT cartItemID, aa_events.eventID, eventTitle, imgRef, ticketPrice, cartItemQuantity
    FROM aa_cart
    INNER JOIN aa_events ON aa_cart.eventID = aa_events.eventID
    WHERE custID = '$username'";

    $TotalPrice = 0;

    $queryResult = $dbConn->query($getCart);
    while ($rowObj = $queryResult->fetchObject()) {
        $ItemTotal = "{$rowObj->cartItemQuantity}" * "{$rowObj->ticketPrice}";
        $TotalPrice = $TotalPrice + $ItemTotal;
        echo "<div class='cartItem'>\n";
        echo "<form action='updateQuantity.php' method='POST' id='{$rowObj->eventID}'>\n";
        echo "<input type='hidden' name='cartItemID' value='{$rowObj->cartItemID}' id='cartItemID'/>\n";
        echo "<div class='cartInfo'>\n";
        echo "<h2 class='cartTitle'><a href='viewEvent.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a></h2>\n";
        echo "<p class='cartPrice'>£{$rowObj->ticketPrice}</p>\n";
        echo "<p class='cartLabel'>Quantity: </p>\n";
        echo "<input type='number' name='itemQuantity' class='cartQuantity' value='{$rowObj->cartItemQuantity}'/>\n";
        echo "<input type='submit' class='updateQuantity'/>\n";
        echo "</form>";
        echo "<a class='cartRemove' href='removeItem.php?cartItemID={$rowObj->cartItemID}'><img src='icons/iconmonstr-trash-can-1-24.png'/>Remove Item</a>\n";
        echo "</div>\n";
        echo "<img src='Event_IMG/{$rowObj->imgRef}' class='cartImg'>\n";
        echo "</div>\n";
    }//end while
}//end try
catch (Exception $e){
    echo "<p>Error finding orders, check again later.</p>\n";
  }//end catch




echo "</div>";
echo "</article>";
echo endPage();
?>
