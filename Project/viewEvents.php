<?php
//link to functions script
require_once('functions.php');
startHTML('Events', 'Our upcoming events');
pageHeader('View Events');
titleBanner('Whats on?', 'Upcoming events at the avengers arena');
echo "<div class='featuredSearch'>
        <form action='searchResult.php' method='GET' enctype='multipart/form-data' id='searchEvents'>
        <input type='text' placeholder='Search' id='searchBox' name='searchBox'/>
        <input id='searchSubmit' type='submit'/>
        </form>
      </div>";
echo "<div id='eventWrap'>";

    try{
        $dbConn = getConnection();
        //Query to retrieve events
        $sqlEvents = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
                      FROM aa_events
                      INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
                      INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
                      ORDER BY eventTitle";
        $queryEventsResult = $dbConn->query($sqlEvents);

        while ($rowObj = $queryEventsResult->fetchObject()){
          //Display Event info
          $eventDate = date_create("{$rowObj->eventDate}");
          $date = date_format($eventDate, "d/m/y");
          echo "<section class='event' style='background-image: url(Event_IMG/{$rowObj->imgRef})'>\n";
          echo "<a href='viewEvent.php?eventID={$rowObj->eventID}'>";
          echo "<p>{$rowObj->eventTitle}</p>";
          echo "<p>$date</p><br/>";
          echo "<i>{$rowObj->eventDescription}</i>";
          echo "</a>";
          echo "</section>\n";
        }//end while
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
echo "</div>";
echo "</article>";
echo endPage();
?>
