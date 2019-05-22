<?php
//link to functions script
require_once('functions.php');
startHTML('Add Event', 'Manage site content');
pageHeader('');
titleBanner('Add an Event', 'Provide details of a new event, ensure all fields are populated');
echo "<div class='parent'>\n";
//if user is logged in then display update form
//if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']){//Session active
    try{
        $dbConn = getConnection();

        //Query to generate publisher select list
        $sqlType = "SELECT typeID, eventType
        FROM aa_event_type";
        $queryTypeResult = $dbConn->query($sqlType);
        //Query to generate category select list
        $sqlStage = "SELECT stageID, stageNumber, stageCapacity
        FROM aa_event_stage";
        $queryStageResult = $dbConn->query($sqlStage);



            echo "<fieldset class='createEvent'>\n";
            echo "<legend><h2>Create Event</h2></legend>\n";
            echo "<form action='addEvent.php' method='POST' enctype='multipart/form-data' id='createEvent'>\n";
            echo "<label for='eventTitle'>Event Title: </label><input type='text' name='eventTitle' id='eventTitle' placeholder='Enter a title for the event'/>\n";
            echo "<label for='eventDescription'>Event Description: </label><textarea maxlength='120' type='text' name='eventDescription' id='eventDescription'></textarea>\n";
            echo "<div class='formlayout'>";
              echo "<span><label for='eventDate'>Event Date: </label><input type='date' name='eventDate' id='eventDate'/></span>\n";
              echo "<span><label for='eventTime'>Event Time: </label><input type='time' name='eventTime' id='eventTime'/></span>\n";
            echo "</div><div class='formlayout'>";
              echo "<span><label for='typeID'>Event Type: </label>\n
                <select name='typeID' id='typeID'>\n";
              //fetch all categories one by one into the drop down list
              while ($type = $queryTypeResult->fetchObject()) {
                  echo "<option value='{$type->typeID}'>{$type->eventType}</option>\n";
              }
              echo "</select></span>";
              echo "<span><label for='stageID'>Stage: </label>\n";
              echo "<select name='stageID' id='stageID'>\n";
              //fetch all categories one by one into the drop down list
              while ($stage = $queryStageResult->fetchObject()) {
                      echo "<option value='{$stage->stageID}'>Stage: {$stage->stageNumber}|Max Capacity: {$stage->stageCapacity}</option>";
              }//end while
              echo "</select></span>";
            echo "</div><div class='formlayout'>";
              echo "<span><label for='ticketPrice'>Price: </label><input type='text' name='ticketPrice' id='ticketPrice'/></span>\n";
              echo "<span><label for='eventImage'>Upload Image: </label><input type='file' name='eventImage' id='eventImage'/></span>\n";
            echo "</div>";
            echo "<input type='submit' id='addEventSubmit' value='Add Event'/>\n";
            echo"</form>\n";
            echo "</fieldset>\n";
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
    }//end catch
//}//end if
//if user is not logged in display an error message
//else {
    //echo "<h2>Access Denied!</h2>\n
            //<p>Login to view record list and/or edit details for records.</p>\n";
//}//end else
echo "</div>";
echo endPage();
?>
