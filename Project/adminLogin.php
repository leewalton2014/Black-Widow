<?php
//link to functions script
require_once('functions.php');
echo startPage();
echo "<img id='logo' src='Images/logo.png'/>
  <img class='bannerImg' src='Images/slider.jpg'/>
      <div id='bannerText'>
        <p id='tagline'>Login to modify events and manage site - For use by staff</p>
        <h3>Login to admin dashboard</h3>
      </div>";
echo "<div class='parent'>";
//if user is logged in then display update form
//if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']){//Session active
            echo "<form action='admin.php' method='POST' enctype='multipart/form-data' id='adminLogin'>\n";
            echo "<label for='username'>Username: </label></br><input type='text' name='username' id='password'/></br>\n";
            echo "<label for='password'>Password: </label></br><input type='text' name='password' id='password'/></br>\n";
            echo "<input type='submit' value='Login'/>\n";
            echo"</form>\n";
//}//end if
//if user is not logged in display an error message
//else {
    //echo "<h2>Access Denied!</h2>\n
            //<p>Login to view record list and/or edit details for records.</p>\n";
//}//end else
echo "</div>";
echo endPage();
?>
