<?php
//link to functions script
require_once('functions.php');
echo startPage();
echo "<img id='logo' src='Images/logo.png'/>
  <img class='bannerImg' src='Images/slider.jpg'/>

  <article id='featured'>
      <div id='bannerText'>
        <p id='tagline'>Upcoming Events and Gigs</p>
        <h3>Featured Events</h3>
      </div>

      <div class='featuredSearch'>
        <input placeholder='Search...'' id='searchBox' type='search'/>
        <input id='searchSubmit' type='submit'/>
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
          echo "<section class='event' style='background-image: url(Event_IMG/{$rowObj->imgRef})'>\n";
          echo "<a href='viewEvent.php?eventID={$rowObj->eventID}'>";
          echo "<p>{$rowObj->eventTitle}</p>";
          echo "<p>{$rowObj->eventDate}</p><br/>";
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
