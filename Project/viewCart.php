<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Cart', 'Review items and checkout');
pageHeader('Shopping Cart');
titleBanner('Your Shopping Cart', 'Review your items and checkout');
echo "<div class='parent'>";
//check if customer is logged in
if (isset($_SESSION['customer']) && $_SESSION['customer']){
echo "<section class='cart'>";
    try{

        $dbConn = getConnection();
        //Display cart items
        $username = $_SESSION['userid'];

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
        echo "<a href='clearBasket.php'><p>Empty Basket</p></a>\n";

        //Checkout form
        $ReturnURL = "http://unn-w17007224.newnumyspace.co.uk/SEPractise/Testing/t2/paymentSuccess.php";
        $CancelURL = "http://unn-w17007224.newnumyspace.co.uk/SEPractise/Testing/t2/viewCart.php";
        echo "<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top' id='cart' name='cart'>
                <input type='hidden' name='business' value='lwaltondev@gmail.com'>
                <input type='hidden' name='cmd' value='_cart'>
                <input type='hidden' name='currency_code' value='GBP'>
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='return' value='$ReturnURL'>
                <input type='hidden' name='cancel_return' value='$CancelURL'>
                <input type='hidden' name='rm' value='2'>
                <input type='hidden' name='upload' value='1'>\n";
        $itemNo = 0;
        $queryResult = $dbConn->query($getCart);
        while ($rowObj = $queryResult->fetchObject()) {
            //Paypal checkout item declarations
            $itemNo = $itemNo + 1;
            echo "<input type='hidden' name='item_name_$itemNo' id='item_name_$itemNo' value='{$rowObj->eventTitle}'/>\n";
            echo "<input type='hidden' name='quantity_$itemNo' id='quantity_$itemNo' value='{$rowObj->cartItemQuantity}'/>\n";
            echo "<input type='hidden' name='amount_$itemNo' id='amount_$itemNo' value='{$rowObj->ticketPrice}'/>\n";
        }//end while
        echo "</form>";
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
echo "</section>";
echo "<aside class='checkout' id='sticky'>";
echo "<h2>Checkout</h2>";
echo "<p class='checkoutPrice'>Total :  £$TotalPrice</p>";
echo "<button type='submit' form='cart' id='checkoutBtn'><img src='icons/iconmonstr-debit-6-24.png'/>Checkout</button>";
echo "</aside>";
}else{
  //user is not logged in
  //send to login page
  header('Location: customerLogin.php');
  die();
}
echo "</div>";
echo "</article>";
echo endPage();
?>
