<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Dashboard', 'Create admin user');
pageHeader('Create Admin User');
titleBanner('New Admin Form', 'Create new account with admin access');
echo "<div class='parent'>\n";
if (isset($_SESSION['admin']) && $_SESSION['admin']){
echo "<div class='logIn'>\n";
//display form
echo "<h1>Create account</h1>
<p>Please note this creates a new account with admin/management access. Please ensure ALL fields are filled in.</p>
<form action='newAdminProcess.php' method='POST' enctype='multipart/form-data' id='newAdmin'>
<label for='forename'>Forename:</label>
<input type='text' id='forename' name='forename'>
<label for='surname'>Surname:</label>
<input type='text' id='surname' name='surname'>
<label for='username'>Username:</label>
<input type='text' id='username' name='username'>
<label for='password'>Password:</label>
<input type='password' id='password' name='password'>
<label for='passwordCheck'>Confirm Password:</label>
<input type='password' id='password' name='passwordCheck'>
<input type='submit' class='logInSubmit' value='Create Account'>
</form>";
if(isset($_SERVER['HTTP_REFERER'])){
  $redirect = $_SERVER['HTTP_REFERER'];
}else{
  //use browser local previous page
  $redirect = "javascript:history.go(-1)";
}
echo "<a class='button' href='$redirect'>Back</a>\n";
echo "</div>\n";
}else{
  //redirect to admin dashboard
  header('Location: adminDash.php');
  die();
}
echo "</div>";
echo endPage();
?>
