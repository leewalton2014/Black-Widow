<?php
//Database connection
function getConnection() {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w17007224",
            "unn_w17007224", "DB2020AVENGERS");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {
        throw new Exception("Connection error ". $e->getMessage(), 0, $e);
    }
}
//Sessions
//Function to start sessions and set path
function setSessionPath(){
    ini_set("session.save_path", "/home/unn_w17007224/sessionData");
    session_start();
    //Set redirect url
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
}
//Cart Functions
//Cart item count
function cartItemCounter(){
    $custID = 999;
    $countSQL = "SELECT sum(cartItemQuantity)
    FROM aa_cart
    WHERE custID = $custID";
    $count = exec($countSQL);
    return $count;
}
?>