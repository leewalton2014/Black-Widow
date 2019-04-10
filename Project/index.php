<?php
//link to functions script
require_once('functions.php');
echo startPage();

echo "<img id='logo' src='Images/logo.png'/>
  <div class='slider'>
    <input type='radio' name='slider' title='slide1' checked='checked' class='slider__nav'/>
    <input type='radio' name='slider' title='slide2' class='slider__nav'/>
    <input type='radio' name='slider' title='slide3' class='slider__nav'/>
    <input type='radio' name='slider' title='slide4' class='slider__nav'/>

    <div class='slider__inner'>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
      <div class='slider__contents'>
        <h2 class='slider__caption'>Content Slider Example Text</h2>
        <p class='slider__txt'>Etiam porttitor lectus in iaculis egestas. Pellentesque in neque sollicitudin, tempor quam vel, rhoncus felis. Integer bibendum posuere mauris id ultricies.</p>
      </div>
    </div>
  </div>

  <div id='callUs'>
    <p id='callUsMain'>You can call us to make a booking by phone</p>
    <img src='icons/iconmonstr-smartphone-3-24.png' alt='phone'/>
    <i>07127656982</i>
  </div>

  <article id='welcome'>
    <div><!--IMG Wrap-->
      <img src='Images/welcome.jpg'>
    </div>
    <section>
        <p>love music events?</p>
        <h2>Welcome Home</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
    </section>
  </article>

  <article id='featured'>
      <p id='tagline'>Upcoming Events and Gigs</p>
      <h3>Featured Events</h3>
      <!-- events -->
      <div id='eventWrap'>

        <section class='event' style='background-image: url(Images/event.png)'><!--Image URL-->
          <a href=''><!-- link generated with php -->
            <p>Tyler The Creator</p><!--Title-->
            <p>3rd August 2019</p><br/><!--Date-->
            <i>Tyler Gregory Okonma better known by his stage name Tyler, The Creator, is an American rapper and record producer from California.</i><!--Desc 120 charaters max-->
          </a>
        </section>

        <section class='event'>
          <a href=''>
            <p>Title</p>
            <p>Date</p><br/>
            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </i>
          </a>
        </section>
        <section class='event'>
          <a href=''>
            <p>Title</p>
            <p>Date</p><br/>
            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </i>
          </a>
        </section>
        <section class='event'>
          <a href=''>
            <p>Title</p>
            <p>Date</p><br/>
            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </i>
          </a>
        </section>
        <section class='event'>
          <a href=''>
            <p>Title</p>
            <p>Date</p><br/>
            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </i>
          </a>
        </section>
        <section class='event'>
          <a href=''>
            <p>Title</p>
            <p>Date</p><br/>
            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </i>
          </a>
        </section>
      </div>
  </article>";

echo endPage();
?>
