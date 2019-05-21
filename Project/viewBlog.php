<?php
//link to functions script
require_once('functions.php');
startHTML('Blog', 'Keeping you informed');
pageHeader('Blog');
titleBanner('News', 'Keeping you informed');
echo "<div class='parent'>";
echo "<div class='blogPosts' >
  <div class='blogWrap'>
    <div class='newPost'>
      <h2>Insert New Post</h2>
      <form action='addBPost.php' method='POST' enctype='multipart/form-data' id='addBPost'>
      <input type='text' placeholder='Name of post' class='postName' name='postTitle'>
      <textarea placeholder='Post Text Here' class='postText' name='postBody'></textarea>
      <input type='submit' class='postSubmit'>
      </form>
    </div>";
try{
  //connect to db
  $dbConn = getConnection();
  //query to retrieve all blog posts
  $sql = "SELECT postTitle, postBody, postDate
  FROM aa_blog
  ORDER BY postDate DESC, postTitle ASC";
  //get query result
  $queryResult = $dbConn->query($sql);
  //display each object from db as blog post
  while($rowObj = $queryResult->fetchObject()){
    //blogpost layout
    $postDate = date_create("{$rowObj->postDate}");
    $date = date_format($postDate, "d/m/y");
    echo "<section class='blogPost'>
      <div class='blogArea'>
        <h1>{$rowObj->postTitle}</h1>
        <span class='blogDate'>$date</span>
        <p>{$rowObj->postBody}</p>
        <br/>
      </div>
    </section>";
  }
}//end try
catch (Exception $e) {
  echo "<p>Sorry we are currently experiancing technical difficulties.
        Keep updated on our facebook page!</p>\n";
}


echo "</div>";
echo "</div>";
echo "</article>";
echo endPage();
?>
