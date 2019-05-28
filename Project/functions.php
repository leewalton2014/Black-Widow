<?php
//Database connection
function getConnection() {
    try {
        $connection = new PDO('mysql:host=localhost;dbname=unn_w17007224',
            'unn_w17007224', 'DB2020AVENGERS');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {
        throw new Exception('Connection error '. $e->getMessage(), 0, $e);
    }
}
//Sessions
//Function to start sessions and set path
function setSessionPath(){
    ini_set('session.save_path', '/home/unn_w15024065/sessionData');
    session_start();
    //get previous page to use for redirects back
    $_SESSION['previous_page'] =  $_SERVER['HTTP_REFERER'];
}
//Page Sections
//Navigation
function pageHeader($currentPage){
  $nav = "<header>\n";
  //Responsive Dropdown Navigation
  $nav .= "<img id='responsiveLogo' src='Images/mobileLogo.png'/>\n";
  $nav .= "<input type='checkbox' id='menuBtn' alt='menu button'/>\n";
  $nav .= "<label for='menuBtn'></label>\n";
  //Navbar Links
  $nav .= "<a href='customerLogin.php' id='logIn'>\n";
  $nav .= "<img alt='log in' src='icons/iconmonstr-log-out-13-24.png'/>\n";
  $nav .= "<h2>Log in</h2>\n";
  $nav .= "</a>\n";
  $nav .= "<a href='customerAccountView.php' id='logIn' class='logInWide'>\n";
  $nav .= "<img alt='account view' src='icons/iconmonstr-id-card-8-24.png'/>\n";
  $nav .= "<h2>Account</h2>\n";
  $nav .= "</a>\n";
  $nav .= "<a href='viewCart.php' id='logIn'>\n";
  $nav .= "<img alt='cart' src='icons/iconmonstr-shopping-cart-3-24.png'/>\n";
  $nav .= "<h2>Cart</h2>\n";
  $nav .= "</a>\n";
  $nav .= "<span id='spacer'></span>\n";
  $nav .= "<nav id='nav'>\n";
  $nav .= "<ul>\n";
  //if nav link is current page then apply active styling to current nav tab
  //else display origional formatting
  if($currentPage == "About"){
    $nav .= "<li class='active'><a href=''><img src='icons/round-supervised_user_circle-24px.svg'/>About</a></li>\n";
  }
  else{
    $nav .= "<li><a href=''><img src='icons/round-supervised_user_circle-24px.svg'/>About</a></li>\n";
  }
  if($currentPage == "View Events"){
    $nav .= "<li class='active'><a href='viewEvents.php'><img src='icons/round-event_note-24px.svg'/>View Events</a></li>\n";
  }
  else{
    $nav .= "<li><a href='viewEvents.php'><img src='icons/round-event_note-24px.svg'/>View Events</a></li>\n";
  }
  if($currentPage == "Merchandice"){
    $nav .= "<li class='active'><a href=''><img src='icons/t-shirt-black-silhouette.svg'/>Merchandice</a></li>\n";
  }
  else{
    $nav .= "<li><a href=''><img src='icons/t-shirt-black-silhouette.svg'/>Merchandice</a></li>\n";
  }
  if($currentPage == "Blog"){
    $nav .= "<li class='active'><a href='viewBlog.php'><img src='icons/round-format_align_left-24px.svg'/>Blog</a></li>\n";
  }
  else{
    $nav .= "<li><a href='viewBlog.php'><img src='icons/round-format_align_left-24px.svg'/>Blog</a></li>\n";
  }
  if($currentPage == "Home"){
    $nav .= "<li class='active'><a href='index.php'><img src='icons/baseline-home-24px.svg'/>Home</a></li>\n";
  }
  else{
    $nav .= "<li><a href='index.php'><img src='icons/baseline-home-24px.svg'/>Home</a></li>\n";
  }
  //End list, close nav and header
  $nav .= "</ul>\n";
  $nav .= "</nav>\n";
  $nav .= "</header>\n";

  echo $nav;
}
function startHTML($title, $description){
  $content = <<< startHTML
  <!doctype html>
  <html lang='en'>
  <head>
      <meta charset='utf-8'>
      <title>$title</title>
      <meta name='description' content='$description'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <!-- CSS -->
      <link rel='icon' href='/Images/loadingLogo.png'>
      <link rel='stylesheet' href='style.css'>
      <link href='https://fonts.googleapis.com/css?family=Heebo:800|Montserrat' rel='stylesheet'>

  </head>
  <body onload='loader()' style='margin:0;'>
      <div id='loader'></div>
      <div id='loaderBg'>
        <img src='Images/loadingLogo.png'/>
      </div>

      <!-- Width of main content area -->
      <div id='mainWrap'  style='display:none;' class='animate-bottom'>
startHTML;
  $content .= "\n";
  echo $content;
}
//Title banner
function titleBanner($title, $subtitle){
  $banner = <<< BANNER
  <main>
    <img id="logo" src="Images/logo.png"/>
      <img class="bannerImg" src="Images/slider.jpg"/>

      <article id="featured">
          <div id="bannerText">
            <p id="tagline">$subtitle</p>
            <h3>$title</h3>
          </div>
BANNER;
  $banner .= "\n";
  echo $banner;
}
//Page Start
function startPage(){
  $content = "<!doctype html>
  <html lang='en'>
  <head>
      <meta charset='utf-8'>
      <title>Home - Avengers Arena</title>
      <meta name='description' content=''>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <!-- CSS -->
      <link rel='icon' href='/Images/loadingLogo.png'>
      <link rel='stylesheet' href='style.css'>
      <link href='fonts.googleapis.com/css?family=Heebo:800|Montserrat' rel='stylesheet'>

  </head>
  <body onload='loader()' style='margin:0;'>
      <div id='loader'></div>
      <div id='loaderBg'>
        <img src='Images/loadingLogo.png'/>
      </div>

      <!-- Width of main content area -->
      <div id='mainWrap'  style='display:none;' class='animate-bottom'>
          <input type='checkbox'/ id='searchBtn'  alt='search button'>
          <label for='searchBtn'></label>
          <header>
            <!-- responsive logo -->
            <img id='responsiveLogo' src='Images/mobileLogo.png'/>
            <!-- responsive menu icon -->
            <input type='checkbox' id='menuBtn' alt='menu button'/>
            <label for='menuBtn'></label>


            <!-- Search bar -->

            <a href='' id='logIn'>
              <img alt='log in' src='icons/iconmonstr-log-out-13-24.png'/>
              <h2>Log in</h2>
            </a>
            <nav id='nav'>
              <ul>
                <li><a href=''><img src='icons/round-supervised_user_circle-24px.svg'/>About</a></li>
                <li><a href='viewEvents.php'><img src='icons/round-event_note-24px.svg'/>View Events</a></li>
                <li><a href='viewCart.php'><img src='icons/round-event_note-24px.svg'/>Shopping Cart</a></li>
                <li><a href=''><img src='icons/t-shirt-black-silhouette.svg'/>Merchandice</a></li>
                <li><a href=''><img src='icons/round-format_align_left-24px.svg'/>News</a></li>
                <li class='active'><a href='index.php'><img src='icons/baseline-home-24px.svg'/>Home</a></li>
              </ul>
            </nav>

          </header>
          <main>";
  return $content;
}
//Page end
function endPage(){
  $content = "<div id='footerImg'></div>
              <footer>
                  <div id='social'>
                    <img alt='facebook' src='icons/iconmonstr-facebook-4-48.png'/>
                    <img alt='instagram' src='icons/iconmonstr-instagram-14-48.png'/>
                    <img alt='email' src='icons/iconmonstr-gmail-4-48.png'/>
                    <span class='line-break'></span>
                    <img alt='youtube' src='icons/iconmonstr-youtube-4-48.png'/>
                    <img alt='twitter' src='icons/iconmonstr-twitter-4-48.png'/>
                  </div>
                  <div>
                    <img id='footerLogo' alt='Avengers Arena with logo' src='Images/logo_80x260.png'/>
                    <i>Copyright &copy; Avengers Arena</i>
                  </div>
                  <div id='footerNav'>
  				            <ul>
                      <li><a href=''>About</a></li>
                      <li><a href='viewEvents.php'>View Events</a></li>
                      <li><a href=''>Merchandice</a></li>
                      <li><a href=''>News</a></li>
                      <li class='active'><a href='index.php'>Home</a></li>
                      <li><a href='adminDash.php'>Admin Dashboard</a></li>
                    </ul>
                  </div>
              </footer>
          </main>
      </div>
  <!--Page Loader-->
  <script>
  var myVar;
  function loader() {
    myVar = setTimeout(showPage, 1000);
  }
  function showPage() {
    document.getElementById('loader').style.display = 'none';
    document.getElementById('loaderBg').style.display = 'none';
    document.getElementById('mainWrap').style.display = 'block';
  }
  </script>
  </body>

  </html>";
  return $content;
}
?>
