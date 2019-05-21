<?php
//link to functions script
require_once('functions.php');

try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}

$postTitle = filter_has_var(INPUT_POST, 'postTitle') ? $_POST['postTitle'] : null;
$postTitle = trim($postTitle);
$postBody = filter_has_var(INPUT_POST, 'postBody') ? $_POST['postBody'] : null;
$postBody = trim($postBody);
$postDate = date("Y/m/d");
$addPost = "INSERT INTO aa_blog (postTitle, postBody, postDate)
VALUES ('$postTitle', '$postBody', '$postDate')";

$queryResult = $dbConn->query($addPost);

if ($queryResult === false) {
  echo "<p>Query failed: " . $dbConn->error . "</p>\n";
  exit;
} else {
header("Location: viewBlog.php");
}
?>
