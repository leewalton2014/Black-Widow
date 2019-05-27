<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
    try{

        $dbConn = getConnection();
        //Get variables
        $eventID = filter_has_var(INPUT_POST, 'eventID') ? $_POST['eventID'] : null;
        $eventID = trim($eventID);
        $ticketQuantity = filter_has_var(INPUT_POST, 'ticketQuantity') ? $_POST['ticketQuantity'] : null;
        $ticketQuantity = trim($ticketQuantity);
        //$username = $_SESSION['username'];
        $username = "LWalton";

        //Query to add record to cart table
        $sqlAddToCart = "INSERT INTO aa_cart (eventID, cartItemQuantity, custID)
        VALUES ('$eventID','$ticketQuantity','$username')";

        $queryResult = $dbConn->query($sqlAddToCart);

        header('Location: viewCart.php');


    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
?>
