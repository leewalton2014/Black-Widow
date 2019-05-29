<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Merchandise', 'Why not buy a souvenir to remember your visit.');
pageHeader('Merchandise');
titleBanner('Merchandise', 'Why not buy a souvenir to remember your visit.');
echo "<div class='parent'>
  <section class='merch'>
    <h1 id='anchorShirt'>T-Shirts</h1>

    <div class='merchCatagory'>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/blackwiddowT.png'/>
        <h2>Black widow t-shirt</h2>
        <p>t-shirt with graphic of black widow and a well-known quote that she uses.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/hulkT.png'/>
        <h2>Hulk t-shirt</h2>
        <p>t-shirt with graphic of hulk and a well-known quote that he uses.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/ironmanT.png'/>
        <h2>Iron man t-shirt</h2>
        <p>t-shirt with graphic of iron man and a well-known quote that he uses.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/captainT.png'/>
        <h2>Captain America</h2>
        <p>t-shirt with graphic of captain America and a well-known quote that he uses.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/drT.png'/>
        <h2>Dr strange t-shirt</h2>
        <p>t-shirt with graphic of dr strange and a well-known quote that he uses.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/spidermanT.png'/>
        <h2>Spiderman t-shirt</h2>
        <p>t-shirt with graphic of spiderman  and a well-known quote that he uses.</p>
      </div>
    </div>

    <h1 id='anchorHat'>Hats</h1>

    <div class='merchCatagory'>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/hulkHat.png'/>
        <h2>Hulk Hat</h2>
        <p>hat with the word hulk on it.Buy now while stocks last!</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/drHat.png'/>
        <h2>Dr Strange Hat</h2>
        <p>hat with the words dr strange on it.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/ironmanHat.png'/>
        <h2>Iron Man Hat</h2>
        <p>hat with the words Iron Man on it. Buy now while stocks last!</p>
      </div>
    </div>

    <h1 id='anchorBadge'>Badges</h1>

    <div class='merchCatagory'>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/hulkBadge.png'/>
        <h2>Hulk Badge</h2>
        <p>Badge with the word hulk on it. Buy now while stocks last!</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/drBadge.png'/>
        <h2>Dr Strange Badge</h2>
        <p>Badge with the words dr strange on it.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/ironmanBadge.png'/>
        <h2>Iron Man Badge</h2>
        <p>Badge with the words Iron Man on it. Buy now while stocks last!</p>
      </div>
    </div>

  </section>
  <aside class='merchList' id='sticky'>
    <h2>Catagories</h2>
    <a href='#anchorShirt'>Shirts</a>
    <a href='#anchorHat'>Hats</a>
    <a href='#anchorBadge'>Badges</a>
    <br/>
    <p>All Merchandice can be purchaced from the stalls at the arena. call Now if you have any questions about stock.</p>
  </aside>
</div>
</article>";



echo endPage();
?>
