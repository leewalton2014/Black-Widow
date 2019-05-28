<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Search Result', 'Search upcoming events');
pageHeader('Search Result');
$searchTerm = filter_has_var(INPUT_GET, 'searchBox') ? $_GET['searchBox'] : null;
$searchTerm = trim($searchTerm);
echo "<img id='logo' src='Images/logo.png'/>
  <img class='bannerImg' src='Images/slider.jpg'/>

  <article id='featured'>
      <div id='bannerText'>
        <p id='tagline'>Results for ... '$searchTerm'</p>
        <h3>Events</h3>
      </div>
      <div>
        <form class='featuredSearch' action='searchResult.php' method='GET' enctype='multipart/form-data' id='searchEvents'>
        <input type='text' placeholder='$searchTerm' id='searchBox' name='searchBox'/>
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
                      WHERE eventTitle LIKE '%$searchTerm%'";
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
echo "<a href='viewEvents.php'>Return to all events</a>";
echo "</article>";
echo endPage();
?>
