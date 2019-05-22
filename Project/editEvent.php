<?php
//link to functions script
require_once('functions.php');
startHTML('Modify Event', 'update details for a specific event');
pageHeader('');
titleBanner('Modify Event Details', 'Modify the fields below and click update to change event information');
echo "<div class='parent'>\n";
$eventID = isset($_REQUEST['eventID']) ? $_REQUEST['eventID'] : null;
//if user is logged in then display update form
//if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']){//Session active
    try{
        $dbConn = getConnection();
        //Get event info for selected event to be put into fields
        $getEventSQL = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, aa_event_type.typeID, eventType, aa_event_stage.stageID, stageNumber, stageCapacity, ticketPrice, imgRef
                      FROM aa_events
                      INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
                      INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
                      WHERE eventID = '$eventID'";
        $eventQuery = $dbConn->query($getEventSQL);
        $rowObj = $eventQuery->fetchObject();
        //Convert date to uk format
        $eventDate = date_create("{$rowObj->eventDate}");
        $date = date_format($eventDate, "d/m/y");

        //Query to generate publisher select list
        $sqlType = "SELECT typeID, eventType
        FROM aa_event_type";
        $queryTypeResult = $dbConn->query($sqlType);
        //Query to generate category select list
        $sqlStage = "SELECT stageID, stageNumber, stageCapacity
        FROM aa_event_stage";
        $queryStageResult = $dbConn->query($sqlStage);



            echo "<fieldset class='createEvent'>\n";
            echo "<legend><h2>Edit Event</h2></legend>\n";
            echo "<form action='updateEventInfo.php' method='POST' enctype='multipart/form-data' id='createEvent'>\n";
            echo "<input type='hidden' name='eventID' value='{$rowObj->eventID}' id=\'eventID\'/>\n";
            echo "<label for='eventTitle'>Event Title: </label><input type='text' name='eventTitle' id='eventTitle' value='{$rowObj->eventTitle}'/>\n";
            echo "<label for='eventDescription'>Event Description: </label><textarea maxlength='120' type='text' name='eventDescription' id='eventDescription'>{$rowObj->eventDescription}</textarea>\n";
            echo "<div class='formlayout'>";
              echo "<span><label for='eventDate'>Event Date: </label><input type='date' name='eventDate' value='{$rowObj->eventDate}' id='eventDate'/></span>\n";
              echo "<span><label for='eventTime'>Event Time: </label><input type='time' name='eventTime' value='{$rowObj->eventTime}' id='eventTime'/></span>\n";
            echo "</div><div class='formlayout'>";
              echo "<span><label for='typeID'>Event Type: </label>\n
                <select name='typeID' id='typeID'>\n";
              //fetch all categories one by one into the drop down list
              while ($type = $queryTypeResult->fetchObject()) {
                if($type->typeID == $rowObj->typeID){
                    echo "<option value='{$type->typeID}' selected='selected'>{$type->eventType}</option>\n";
                }else{
                    echo "<option value='{$type->typeID}'>{$type->eventType}</option>\n";
                }
              }
              echo "</select></span>";
              echo "<span><label for='stageID'>Stage: </label>\n";
              echo "<select name='stageID' id='stageID'>\n";
              //fetch all categories one by one into the drop down list
              while ($stage = $queryStageResult->fetchObject()) {
                if($stage->stageID == $rowObj->stageID){
                    echo "<option value='{$stage->stageID}' selected='selected'>Stage: {$stage->stageNumber}|Max Capacity: {$stage->stageCapacity}</option>\n";
                }else{
                    echo "<option value='{$stage->stageID}'>Stage: {$stage->stageNumber}|Max Capacity: {$stage->stageCapacity}</option>\n";
                }
              }//end while
              echo "</select></span>";
            echo "</div><div class='formlayout'>";
              echo "<span><label for='ticketPrice'>Price: </label><input type='text' name='ticketPrice' value='{$rowObj->ticketPrice}' id='ticketPrice'/></span>\n";
              echo "<span><label for='eventImage'>Upload Image: </label><input type='file' name='eventImage' id='eventImage'/></span>\n";
            echo "</div>";
            echo "<input type='submit' id='addEventSubmit' value='Update Event'/>\n";
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
