<?php
//link to functions script
require_once('functions.php');
    try{

        $dbConn = getConnection();
        //Get variables
        $eventID = filter_has_var(INPUT_POST, 'eventID') ? $_POST['eventID'] : null;
        $eventID = trim($eventID);
        $ticketQuantity = filter_has_var(INPUT_POST, 'ticketQuantity') ? $_POST['ticketQuantity'] : null;
        $ticketQuantity = trim($ticketQuantity);
        $username = $_SESSION['username'];

        //Query to add record to cart table
        $sqlAddToCart = "INSERT INTO aa_cart (eventID, cartItemQuantity, custID)
        VALUES ('$eventID','$ticketQuantity','$username')";

        $queryResult = $dbConn->query($sqlAddToCart);

        echo "<h2>Cart Updated</h2>\n";
        echo "<a href='viewEvents.php'>Continue Shopping!</a>\n";
        echo "<a href='viewCart.php'>View Basket</a>\n";


    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
?>
