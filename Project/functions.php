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
    ini_set('session.save_path', '/home/unn_w17007224/sessionData');
    session_start();
    //Set redirect url
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
}
//Cart Functions
//Cart item count
function cartItemCounter(){
    $custID = 999;
    $countSQL = 'SELECT sum(cartItemQuantity)
    FROM aa_cart
    WHERE custID = $custID';
    $count = exec($countSQL);
    return $count;
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
                <li><a href=''><img src='icons/t-shirt-black-silhouette.svg'/>Merchandice</a></li>
                <li><a href=''><img src='icons/round-format_align_left-24px.svg'/>News</a></li>
                <li class='active'><a href='index.html'><img src='icons/baseline-home-24px.svg'/>Home</a></li>
              </ul>
            </nav>

          </header>";
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
                  <div >
                    <img id='footerLogo' alt='Avengers Arena with logo' src='Images/logo_80x260.png'/>
                    <i>Copyright &copy; Avengers Arena</i>
                  </div>
                  <div id='footerNav'>
  				  <ul>
                      <li><a href=''>About</a></li>
                      <li><a href=''>View Events</a></li>
                      <li><a href=''>Merchandice</a></li>
                      <li><a href=''>News</a></li>
                      <li class='active'><a href=''>Home</a></li>
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
function filterInput($elementID){
  $input = filter_has_var(INPUT_POST, '$elementID') ? $_POST['$elementID'] : null;
  $eventTitle = trim($input);
  return $input;
}
?>
