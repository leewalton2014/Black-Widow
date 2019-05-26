<?php
//link to functions script
require_once('functions.php');
startHTML('Home', 'Welcome to avengers arena!');
pageHeader('Home');

echo "<img id='logo' src='Images/logo.png'/>
  <div class='slider'>
    <input type='radio' name='slider' title='slide1' checked='checked' class='slider__nav'/>
    <input type='radio' name='slider' title='slide2' class='slider__nav'/>
    <input type='radio' name='slider' title='slide3' class='slider__nav'/>
    <input type='radio' name='slider' title='slide4' class='slider__nav'/>

    <div class='slider__inner'>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
    </div>
  </div>

  <div id='callUs'>
    <p id='callUsMain'>You can call us to make a booking by phone</p>
    <img src='icons/iconmonstr-smartphone-3-24.png' alt='phone'/>
    <i>07127656982</i>
  </div>

  <article id='welcome'>
    <div><!--IMG Wrap-->
      <img src='Images/welcome.jpg'>
    </div>
    <section>
        <p>love music events?</p>
        <h2>Welcome To The Arena</h2>
        <hr>
        <p>The avengers arena is a brand new one of a kind venue in newcastle. We host many events from music to comedy and even trade shows.</p>
        <p>You can use our new website to browse and purchase tickets online from the comfort of your own home. Simply choose your tickets, pay and you will recieve an e-ticket on your device.</p>
        <p>If you are intrested in hosting an event at the arena contact us via our email in our 'about us' page.</p>
    </section>
  </article>

  <article id='featured'>
      <p id='tagline'>Whats going on today?</p>
      <h3>Todays Events</h3>\n";
try{
  $dbConn = getConnection();
  //current date
  $currentDate = date("Y-m-d");
  //Query to retrieve events
  $sqlEvents = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
  FROM aa_events
  INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
  INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
  WHERE eventDate  = '$currentDate'
  ORDER BY eventTitle";
  $queryResult = $dbConn->query($sqlEvents);
  if(empty($queryResult)){
      echo "<h2>There are no events sceduled for today</h2>\n";
  }else{
    echo "<div id='eventWrap'>\n";
    //Display events
    while ($rowObj = $queryResult->fetchObject()){
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
    echo "</div>\n";
  }
}
catch(Exception $e){
  echo "<p>Nothing to show.</p>\n";
}
echo "</article>\n";

echo endPage();
?>
