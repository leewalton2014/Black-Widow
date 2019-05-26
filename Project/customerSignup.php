<?php
//link to functions script
require_once('functions.php');
startHTML('Signup', 'Sign up to purchase Tickets');
pageHeader('');
titleBanner('Customer Signup', 'Signup to gain access to buy tickets.');
echo "<div class='parent'>\n";
echo "<h2>Signup</h2>
<p>Ensure ALL fields are filled in.</p>
<form action='customerSignupProcess.php' method='POST' enctype='multipart/form-data' id='viewOrder'>
<label for='forename'>Forename:</label>
<input type='text' id='forename' name='forename'>
<label for='surname'>Surname:</label>
<input type='text' id='surname' name='surname'>
<label for='email'>Email:</label>
<input type='text' id='email' name='email'>
<label for='username'>Username:</label>
<input type='text' id='username' name='username'>
<label for='password'>Password:</label>
<input type='password' id='password' name='password'>
<label for='passwordCheck'>Confirm Password:</label>
<input type='password' id='passwordCheck' name='passwordCheck'>
<input type='submit' value='Create Account'>
</form>";



echo "</div>";
echo endPage();
?>
