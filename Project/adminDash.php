<?php
//link to functions script
require_once('functions.php');
startHTML('Admin Dashboard', 'Manage site content');
pageHeader('');
titleBanner('Welcome [ADMIN NAME HERE]', 'Use the links below to manage website content');
echo "<div class='parent'><br>\n";
echo "<a href='addEventForm.php'>Create Event</a><br>\n";
echo "<a href='editEventList.php'>Modify Events</a><br>\n";
echo "<a href=''>View Sales</a><br>\n";
echo "<a href=''>Logout</a><br>\n";
echo "<h2>Ticket Sales</h2>";
echo "<table class='orderItems'>\n
            <tr>\n
            <th class='eventName'>Event Name</th>\n
            <th class='date'>Event Date</th>\n
            <th class='totalSales'>Tickets Sold</th>\n
            </tr>\n";
try{
  $dbConn = getConnection();
  $getSales = "SELECT eventTitle, eventDate, SUM(saleQuantity) AS TotalSales
  FROM aa_sales
  INNER JOIN aa_events ON aa_sales.eventID = aa_events.eventID
  GROUP BY aa_events.eventID
  ORDER BY eventDate";

  $queryResult = $dbConn->query($getSales);
  while ($rowObj = $queryResult->fetchObject()) {
    echo "<tr>\n";
    echo "<td class='eventName'>{$rowObj->eventTitle}</td>\n";
    echo "<td class='date'>{$rowObj->eventDate}</td>\n";
    echo "<td class='totalSales'>{$rowObj->TotalSales}</td>\n";
    echo "</tr>\n";
  }//end while
}catch (Exception $e){
    echo "<p>Error finding orders, check again later.</p>\n";
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}//end catch

echo "</table>\n";
echo "</div><br>\n";
echo "</article><br>\n";
echo endPage();
?>
