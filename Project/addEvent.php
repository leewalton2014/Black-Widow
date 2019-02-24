<?php
//include functions
//connect to db
//get variables

$addEventSQL = "INSERT INTO aa_events (eventID, eventTitle, eventDescription, 
eventDate, eventTime, typeID, stageID, ticketPrice) 
VALUES ('$eventID', '$eventTitle', '$eventDescription', 
'$eventDate', '$eventTime', '$typeID', '$stageID', '$ticketPrice')";
$execSQL = exec($addEventSQL);

//redirect

?>