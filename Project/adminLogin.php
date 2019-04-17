<?php
//link to functions script
require_once('functions.php');
startHTML('Admin Login', 'Login to manage events');
pageHeader('Login');
titleBanner('Login to admin Dashboard', 'Login to manage events and view sales');
echo "<div class='logIn'>
  <h1>Log in</h1>
  <div class='parent, logInParent' >
    <img src='icons/iconmonstr-user-1-24.png'/>
    <input placeholder='Username' type='text' class='username'/>
  </div>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-lock-15-24.png'/>
    <input placeholder='Password' type='password' class='password'/>
  </div>
  <input class='logInSubmit' type='submit'/>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-user-8-24.png'/>
    <a>Register Account</a>
  </div>
</div>";
//if user is logged in then display update form
//if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']){//Session active

//}//end if
//if user is not logged in display an error message
//else {
    //echo "<h2>Access Denied!</h2>\n
            //<p>Login to view record list and/or edit details for records.</p>\n";
//}//end else
echo endPage();
?>
