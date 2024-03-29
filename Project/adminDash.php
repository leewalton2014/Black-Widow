<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Admin Dashboard', 'Manage site content');
pageHeader('');
titleBanner('Website Management Portal', 'Use the links below to manage website content');
if (isset($_SESSION['admin']) && $_SESSION['admin']){
echo "<div id='dashboard'>\n";
echo "<h2 id='dashTitle'>Quick Links</h2>\n";
echo "<a href='addEventForm.php'>Create Event</a><br>\n";
echo "<a href='editEventList.php'>Modify Events</a><br>\n";
echo "<a href='newAdminForm.php'>Create new admin account</a><br>\n";
echo "<a href='logout.php'>Logout</a><br>\n";
echo "<h2 id='dashTitle'>View contents of an order</h2>\n";
echo "<form action='viewOrder.php' method='POST' enctype='multipart/form-data' id='viewOrder'>\n";
echo "<p>Enter the order number of an order to view its contents</p>";
echo "<input type='text' name='orderNumber'>\n";
echo "<input type='submit' value='View Order'>\n";
echo "</form>\n";
echo "<h2 id='dashTitle'>Ticket Sales</h2>\n";
echo "<table class='orderItems'>\n
            <tr>\n
            <th class='eventName'><b>Event Name</a></th>\n
            <th class='date'><b>Event Date</a></th>\n
            <th class='totalSales'><b>Tickets Sold</a></th>\n
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
echo "</div>\n";
}else{
  //Admin user is not logged in
  //Login to admin account
  echo "<div class='logIn'>
    <h1>Log in</h1>
    <form action='adminLoginProcess.php' method='POST' enctype='multipart/form-data' id='adminLogin'>
    <div class='parent, logInParent' >
      <img src='icons/iconmonstr-user-1-24.png'/>
      <input placeholder='Username' type='text' name='username' class='username'/>
    </div>
    <div class='parent, logInParent'>
      <img src='icons/iconmonstr-lock-15-24.png'/>
      <input placeholder='Password' type='password' name='password' class='password'/>
    </div>
    <input class='logInSubmit' type='submit'/>
    </form>
  </div>";
}
echo "</article>\n";
echo endPage();
?>
