<?php
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Signup', 'Sign up to purchase Tickets');
pageHeader('');
titleBanner('Please try again', 'Signup to gain access to buy tickets.');
echo "<div class='parent'>\n";
try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}

$forename = filter_has_var(INPUT_POST, 'forename') ? $_POST['forename'] : null;
$forename = trim($forename);

$surname = filter_has_var(INPUT_POST, 'surname') ? $_POST['surname'] : null;
$surname = trim($surname);

$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
$email = trim($email);

$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
$username = trim($username);

$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
$password = trim($password);
//password
$passwordCheck = filter_has_var(INPUT_POST, 'passwordCheck') ? $_POST['passwordCheck'] : null;
$passwordCheck = trim($passwordCheck);
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//queries
$addUserInfo = "INSERT INTO aa_customers (custForename, custSurname, custEmail, custUsername, custPasswordHash)
VALUES ('$forename','$surname','$email','$username','$passwordHash')";
$checkusername = "SELECT count(custUsername) as UsernameCount
FROM aa_customers
WHERE custUsername = '$username'";
$usernames = $dbConn->query($checkusername);
$usernameCount = $usernames->fetchObject();
//check username is not currently in use
if($usernameCount->UsernameCount==0){
//check if password check matches
if($password == $passwordCheck){
  //if($errors){
    //foreach($errors as $error)
    //{
      //echo "<p>$error</p><br>\n";
    //}
  //}else{
    $queryResult = $dbConn->query($addUserInfo);
    if ($queryResult === false) {
      echo "<p>Please try again!</p>\n";
      exit;
    } else {
      header("Location: customerAccountView.php");
      die();
      //change to customer page later
    }
}else{
  //if($errors){
    //foreach($errors as $error){
      //echo "<p>$error</p><br>\n";
    //}
  echo "<p>Please ensure password and confirmation password are the same! <a href='customerSignup.php'>Try again.</a></p>\n";
  //}
}
}else{
  echo "<p>Sorry username allready taken. <a href='customerSignup.php'>Try again.</a></p>\n";
}
echo "</div>";
echo endPage();
?>
