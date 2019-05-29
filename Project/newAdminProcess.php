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
//queries
//add user to db
$newAdmin = "INSERT INTO aa_admins (forename, surname, username, passwordHash)
VALUES ('$forename','$surname','$username','$passwordHash')";
//check username does not exist in db
$checkusername = "SELECT count(username) as UsernameCount
FROM aa_admins
WHERE username = '$username'";
$usernames = $dbConn->query($checkusername);
$usernameCount = $usernames->fetchObject();
//validate form input
$required = array('forename','surname','username','password','passwordCheck');
$error = false;
//check form elements are not empty
foreach($required as $field){
  if(empty($_POST[$field])){
    $error = true;
  }
}
if($error){
  echo "<p>Pleasse ensure all fields are filled in. <a href='newAdminForm.php'>Try again.</a></p>\n";
}else{
  //check username is not currently in use
  if($usernameCount->UsernameCount==0){
    //check if password check matches
    if($password == $passwordCheck){
      $queryResult = $dbConn->query($newAdmin);
      if ($queryResult === false) {
        echo "<p>Please try again! <a href='newAdminForm.php'>Try again.</a></p>\n";
        exit;
      } else {
        header("Location: adminDash.php");
        die();
      }
    }else{
      echo "<p>Please ensure password and confirmation password are the same! <a href='newAdminForm.php'>Try again.</a></p>\n";
    }
  }else{
    echo "<p>Sorry username allready taken. <a href='newAdminForm.php'>Try again.</a></p>\n";
  }
}
echo "</div>";
echo endPage();
?>
