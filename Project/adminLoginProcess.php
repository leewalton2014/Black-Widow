<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//get username and password from form
$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
$username = trim($username);
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
$password = trim($password);
//check if empty
if(empty($username)||empty($password)){
  header('Location: adminDash.php');
  exit();
}else{
  $dbConn = getConnection();
  $pHashQuery = "SELECT username, passwordHash
  FROM aa_admins
  WHERE username = :username";
  $stmt = $dbConn->prepare($pHashQuery);
  $stmt->execute(array(':username'=>$username));
  $admin = $stmt->fetchObject();
  //if a record is returned then user exists
  if($admin){
      //if the entered password has the same hash value as the password hash then create session
      if(password_verify($password, $admin->passwordHash)){
          //unset previous variable values
          session_unset();
          //Set session variable
          $_SESSION['admin'] = true;
          //Set a session variable called username and set it as the username
          $_SESSION['admin_username'] = $admin->username;
          //Redirect to dashboard
          header('Location: adminDash.php');
          exit();
      }//end if
      else{
          header('Location: adminDash.php');
          exit();
      }//end else
  }//end if
  else{
      //Redirect to original page
      header('Location: adminDash.php');
      exit();
  }//end else
}//end else
?>
