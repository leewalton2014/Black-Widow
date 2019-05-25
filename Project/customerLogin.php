<?php
//link to functions script
require_once('functions.php');
startHTML('Login', 'Login to customer account');
pageHeader('Login');
titleBanner('Login', 'Login to buy and view tickets.');
echo "<div class='parent'>";
echo "<div class='logIn'>
  <h1>Log in</h1>
  <form action='customerLoginProcess.php' method='POST' enctype='multipart/form-data' id='customerLogin'>
  <div class='parent, logInParent' >
    <img src='icons/iconmonstr-user-1-24.png'/>
    <input placeholder='Username' type='text' class='username'/>
  </div>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-lock-15-24.png'/>
    <input placeholder='Password' type='password' class='password'/>
  </div>
  <input class='logInSubmit' type='submit'/>
  </form>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-user-8-24.png'/>
    <a>Register Account</a>
  </div>
</div>";



echo "</div>";
echo "</article>";
echo endPage();
?>
