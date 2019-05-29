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
    <h1>Shirts</h1>

    <div class='merchCatagory'>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
    </div>

    <h1>Posters</h1>

    <div class='merchCatagory'>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
      <!-- Merch Items -->
      <div class='merchItem'>
        <img src='Images/event.png'/>
        <h2>Sample Title</h2>
        <p>sample descrption sample descrption sample descrption sample descrption sample descrption sample descrption.</p>
      </div>
    </div>

  </section>
  <aside class='merchList' id='sticky'>
    <h2>Catagories</h2>
    <a href='#'>Shirts</a>
    <a href='#'>Hats</a>
    <a href='#'>Posters</a>
    <br/>
    <p>All Merchandice can be purchaced from the stalls at the arena. call Now if you have any questions about stock.</p>
  </aside>
</div>
</article>";



echo endPage();
?>
