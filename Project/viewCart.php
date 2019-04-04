<?php
//link to functions script
require_once('functions.php');
    try{

        $dbConn = getConnection();

        echo "<h2>Your Basket</h2>";

        //Display cart items
        //$username = $_SESSION['username'];
        $username = "LWalton";

        $getCart = "SELECT cartItemID, aa_events.eventID, eventTitle, ticketPrice, cartItemQuantity
        FROM aa_cart
        INNER JOIN aa_events ON aa_cart.eventID = aa_events.eventID
        WHERE custID = '$username'";

        $queryResult = $dbConn->query($getCart);
        while ($rowObj = $queryResult->fetchObject()) {
            echo "<fieldset id='{$rowObj->eventID}'>\n";
            echo "<form action='updateAmount.php' method='get' id='{$rowObj->eventID}'>\n";
            echo "<input type='hidden' name='cartItemID' value='{$rowObj->cartItemID}' id='cartItemID'/>\n";
            echo "<a class='button' href='viewEvent.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a>";
            echo "<p>Price: {$rowObj->ticketPrice}</p>\n";
            echo "<a href='removeItem.php?cartItemID={$rowObj->cartItemID}'><p>Remove Item</p></a>\n";
            echo "<label for='quantity'>Quantity:</label><input type='number' value='{$rowObj->cartItemQuantity}' id='quantity' name='quantity'>";
            echo "<input type='submit' value='Update Quantity'/>\n";
            echo"</form>\n";
            echo "</fieldset>\n";
        }//end while
        echo "<a href='clearBasket.php'><p>Empty Basket</p></a>\n";

    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
?>
