<?php
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('New Admin Account', 'Create a new account with admin permissions');
pageHeader('');
titleBanner('Please try again', 'Ensure all fields are populated');
echo "<div class='parent'>\n";
try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}
//accont info
$forename = filter_has_var(INPUT_POST, 'forename') ? $_POST['forename'] : null;
$forename = trim($forename);
$surname = filter_has_var(INPUT_POST, 'surname') ? $_POST['surname'] : null;
$surname = trim($surname);
$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
$username = trim($username);
//password
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
$password = trim($password);
$passwordCheck = filter_has_var(INPUT_POST, 'passwordCheck') ? $_POST['passwordCheck'] : null;
$passwordCheck = trim($passwordCheck);
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//query
$newAdmin = "INSERT INTO aa_admins (forename, surname, username, passwordHash)
VALUES ('$forename','$surname','$username','$passwordHash')";
//check if password check matches
if($password == $passwordCheck){
  //if($errors){
    //foreach($errors as $error)
    //{
      //echo "<p>$error</p><br>\n";
    //}
  //}else{
    $queryResult = $dbConn->query($newAdmin);
    if ($queryResult === false) {
      echo "<p>Please try again!</p>\n";
      exit;
    } else {
      header("Location: adminDash.php");
      die();
      //change to customer page later
    }
}else{
  //if($errors){
    //foreach($errors as $error){
      //echo "<p>$error</p><br>\n";
    //}
  echo "<p>Please ensure password and confirmation password are the same!</p>\n";
  //}
}
echo "</div>";
echo endPage();
?>
