<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Signup', 'Sign up to purchase Tickets');
pageHeader('');
titleBanner('Customer Signup', 'Signup to gain access to buy tickets.');
echo "<div class='parent'>\n";
echo"
<div class='logIn'>
  <h1>Register</h1>
  <form action='customerSignupProcess.php' method='POST' enctype='multipart/form-data' id='customerLogin'>
  <div class='parent, logInParent' >
    <input placeholder='First Name' type='text' id='forename' name='forename'>
  </div>
  <div class='parent, logInParent' >
    <input placeholder='Surname' type='text' id='surname' name='surname'>
  </div>
  <div class='parent, logInParent' >
    <img src='icons/iconmonstr-email-1-24.png'/>
    <input placeholder='Email' type='text' id='email' name='email'>
  </div>
  <div class='parent, logInParent' >
    <img src='icons/iconmonstr-user-1-24.png'/>
    <input placeholder='Username' type='text' id='username' name='username'>
  </div>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-lock-15-24.png'/>
    <input placeholder='Password' type='password' id='password' name='password'>
  </div>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-lock-15-24.png'/>
    <input placeholder='Confirm Password' type='password' id='password' name='password'>
  </div>
  <input value='Create Account' class='logInSubmit' type='submit'/>
  </form>
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-user-8-24.png'/>
    <a href='customerLogin.php'>Log In</a>
  </div>
</div>
";

echo "</div>";
echo endPage();
?>
