<?php
//link to functions script
require_once('functions.php');
startHTML('Admin Dashboard', 'Manage site content');
pageHeader('');
titleBanner('Welcome [ADMIN NAME HERE]', 'Use the links below to manage website content');
echo "<div class='parent'><br>\n";
echo "<a href='addEventForm.php'>Create Event</a><br>\n";
echo "<a href=''>Modify Events</a><br>\n";
echo "<a href=''>View Sales</a><br>\n";
echo "<a href=''>Compose Blog Post</a><br>\n";
echo "<a href=''>Modify Blog Posts</a><br>\n";
echo "<a href=''><b>Logout</b></a><br>\n";
echo "</div><br>\n";
echo "</article><br>\n";
echo endPage();
?>
