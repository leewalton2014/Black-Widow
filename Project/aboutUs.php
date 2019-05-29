<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('About Us', 'Everything you need to know');
pageHeader('About');
titleBanner('About Us', 'Everything you need to know for your visit');
echo "<div class='parent'>
  <div class='aboutMain'>
    <div class='map'>
      <iframe src='https://www.google.com/maps/d/embed?mid=1x2AZf0QOGCxt3lifKpmK_ydq_WHi-amS' width='100%' height='260px'></iframe>
    </div>
    <h2>Opening Times</h2>
    <table class='openingTimes'>
    <tr>
    <th class='day'><b>Day</b></th>
    <th class='hours'><b>Opening Hours</b></th>
    </tr>
    <tr>
    <td class='day'>Mon - Thurs</td>
    <td class='hours'>15:00 - 22:00</td>
    </tr>
    <tr>
    <td class='day'>Friday</td>
    <td class='hours'>15:00 - End of last event</td>
    </tr>
    <tr>
    <td class='day'>Saturday</td>
    <td class='hours'>15:00 - End of last event</td>
    </tr>
    <tr>
    <td class='day'>Saunday</td>
    <td class='hours'>15:00 - 20:00</td>
    </tr>
    </table>
    <h2>Contact Us</h2>
    <form id='contactForm'>
      <input placeholder='Name' id='contactName' type='text'>
      <input placeholder='Email' id='contactEmail' type='email'>
      <textarea placeholder='Message Here' id='contactMessage'></textarea>
      <input id='contactSend' type='submit' value='Send'>
    </form>
  </div>
  <div class='aboutSidebar'>
    <h2>About Us</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    <br>
    <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
  </div>
</div>
</article>";
echo endPage();
?>
