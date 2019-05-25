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
if(empty($userName)||empty($password)){
  header('Location:'.$_SESSION['redirect']);
  exit();
}else{
  //unset previous variable values
  session_unset();
  $dbConn = getConnection();
  $pHashQuery = "SELECT custID, custPasswordHash
  FROM aa_customers
  WHERE custUsername = :username";
  $stmt = $dbConn->prepare($pHashQuery);
  $stmt->execute(array(':username'=>$username));
  $user = $stmt->fetchObject();
  //if a record is returned then user exists
  if($user){
      //if the entered password has the same hash value as the password hash then create session
      if(password_verify($password, $user->passwordHash)){
          //Set session variable
          $_SESSION['customer'] = true;
          //Set a session variable called username and set it as the username
          $_SESSION['userid'] = $user->custID;
          //Redirect to original page
          header('Location: customerAccountView.php');
          exit();
      }//end if
      else{
          //Redirect to original page
          header('Location: customerLogin.php');
          exit();
      }//end else
  }//end if
  else{
      //Redirect to original page
      header('Location: customerLogin.php');
      exit();
  }//end else
}//end else
?>
