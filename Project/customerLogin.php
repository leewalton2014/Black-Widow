<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Login', 'Login to customer account');
pageHeader('Login');
titleBanner('Login', 'Login to buy and view tickets.');
echo "<div class='parent'>";
//check if customer is logged in
if (isset($_SESSION['customer']) && $_SESSION['customer']){
  //customer allready logged in
  //redirect to account view
  header('Location: customerAccountView.php');
  die();
}else{
//customer login form
echo "<div class='logIn'>
  <h1>Log in</h1>
  <form action='customerLoginProcess.php' method='POST' enctype='multipart/form-data' id='customerLogin'>
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
  <div class='parent, logInParent'>
    <img src='icons/iconmonstr-user-8-24.png'/>
    <a href='customerSignup.php'>Register Account</a>
  </div>
</div>";
}


echo "</div>";
echo "</article>";
echo endPage();
?>
