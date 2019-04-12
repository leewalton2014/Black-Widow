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
            echo "<form action='updateAmount.php' method='get' id='{$rowObj->eventID}'>\n";
            echo "<input type='hidden' name='cartItemID' value='{$rowObj->cartItemID}' id='cartItemID'/>\n";
            echo "<div class='cartInfo'>\n";
            echo "<h2 class='cartTitle'><a href='viewEvent.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a></h2>\n";
            echo "<p class='cartPrice'>£{$rowObj->ticketPrice}</p>\n";
            echo "<p class='cartLabel'>Quantity: </p>\n";
            echo "<input type='number' class='cartQuantity' value='{$rowObj->cartItemQuantity}'/>\n";
            echo "<input type='submit' class='updateQuantity'/>\n";
            echo "</form>";
            echo "<a class='cartRemove' href='removeItem.php?cartItemID={$rowObj->cartItemID}'><img src='icons/iconmonstr-trash-can-1-24.png'/>Remove Item</a>\n";
            echo "</div>\n";
            echo "<img src='Event_IMG/{$rowObj->imgRef}' class='cartImg'>\n";
            echo "</div>\n";
        }//end while
        echo "<a href='clearBasket.php'><p>Empty Basket</p></a>\n";
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
echo "</section>";
echo "<aside class='checkout' id='sticky'>";
echo "<h2>Checkout</h2>";
echo "<p class='checkoutPrice'>Total :  £20.00</p>";
echo "<button id='checkoutBtn'><img src='icons/iconmonstr-debit-6-24.png'/>Go to Checkout</button>";
echo "</aside>";
echo "</div>";
echo "</article>";
echo endPage();
?>
