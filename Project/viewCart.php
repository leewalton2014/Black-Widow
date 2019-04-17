<?php
//link to functions script
require_once('functions.php');
echo startPage();
echo "<img id='logo' src='Images/logo.png'/>
  <img class='bannerImg' src='Images/slider.jpg'/>
    <article id='featured'>
      <div id='bannerText'>
        <p id='tagline'>Review your items and checkout</p>
        <h3>Your Shopping Cart</h3>
      </div>";
echo "<div class='parent'>";
echo "<section class='cart'>";
    try{

        $dbConn = getConnection();
        //Display cart items
        //$username = $_SESSION['username'];
        $username = "LWalton";

        $getCart = "SELECT cartItemID, aa_events.eventID, eventTitle, imgRef, ticketPrice, cartItemQuantity
        FROM aa_cart
        INNER JOIN aa_events ON aa_cart.eventID = aa_events.eventID
        WHERE custID = '$username'";

        $queryResult = $dbConn->query($getCart);
        while ($rowObj = $queryResult->fetchObject()) {
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
        echo "<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top' id='cart' name='cart'>
                <input type='hidden' name='business' value='lwaltondev@gmail.com'>
                <input type='hidden' name='cmd' value='_cart'>
                <input type='hidden' name='currency_code' value='GBP'>
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
echo "<p class='checkoutPrice'>Total :  £20.00</p>";
echo "<button type='submit' form='cart' id='checkoutBtn'><img src='icons/iconmonstr-debit-6-24.png'/>Go to Checkout</button>";
echo "</aside>";
echo "</div>";
echo "</article>";
echo endPage();
?>
