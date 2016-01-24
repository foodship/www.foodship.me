<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Foodship</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="banner">
  <div class="header">
    <div class="header-inner container clear">
      <a class="logo" href="#"><span class="sr">Lambda Logo</span></a>
      <input type="checkbox" id="navigation-toggle-checkbox" name="navigation-toggle-checkbox" class="navigation-toggle-checkbox sr">
      <label for="navigation-toggle-checkbox" class="navigation-toggle-label" onclick>
        <span class="navigation-toggle-label-inner">
          <span class="sr">Navigation</span>
        </span>
      </label>
      <div class="navigation">
        <ul class="navigation-menu">
          <li class="navigation-item"><a href="#about">About</a></li>
          <li class="navigation-item"><a href="#shelter">For shelters</a></li>
          <li class="navigation-item"><a href="#restaurant">For restaurants</a></li>
        </ul>
        <ul class="navigation-social">
          <li class="navigation-item-social"><a class="social social-twitter" href="#"><span class="sr">Twitter</span></a></li>
          <li class="navigation-item-social"><a class="social social-facebook" href="#"><span class="sr">Facebook</span></a></li>
          <li class="navigation-item-social"><a class="social social-google-plus" href="#"><span class="sr">Google Plus</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="banner-inner container">
    <h1 class="banner-lead">
      <span class="banner-lead-1">shipping the food</span>
      <span class="banner-lead-2">to the people in need</span>
    </h1>
    <div class="banner-buttons">
      <a href="#shelter" class="button button-primary">I'm a homeless shelter</a>
      <a href="#restaurant" class="button button-secondary">I'm a restaurant</a>
    </div>
  </div>
</div>

<div id="menu" class="content-block food-menu-block">
  <div class="food-menu-block-inner container">
    <div class="clear">
      <div class="food-menu-content">
        <h2>Who are we?</h2>
        <ul class="food-menu-list">
          <li class="food-menu-item">
            <div class="food-menu-summary">
              <p>
                We are first-year computer science majors at the University of Pennsylvania.
              </p>
            </div>
          </li>
        </ul>
      </div>
      <div class="food-menu-content">
        <h2>What is this?</h2>
        <ul class="food-menu-list">
          <li class="food-menu-item">
            <div class="food-menu-summary">
              <p>
                Foodship connects restaurants to homeless shelters.
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div id="shelter" class="content-block reviews-block">
  <div class="reviews-block-inner container">
    <div class="feature-box text-center col-12-tablet col-8-desktop no-float center-element">
      <h2 class="h2-secondary">Guest Reviews</h2>
      <blockquote>
        <p>
          If you've been to one of our restaurants, you've seen - and tasted - what keeps our customers coming back for more.
          Perfect materials and freshly baked food, delicious Lambda cakes, muffins, and gourmet coffees makes us hard to resist!
          Stop in today and check us out!
        </p>
        <cite>
          food inc, New York
        </cite>
      </blockquote>
    </div>
  </div>
</div>



<div id="restaurant" class="content-block reservations-block">
  <div class="reservations-block-inner container">
    <div class="clear">
      <div class="reservation-block-img col-3-desktop none block-desktop">
        <img src="img/food-01.jpg" alt="Food">
      </div>
      <div class="reservation-block-img col-6-tablet col-3-desktop none block-tablet">
        <img src="img/food-02.jpg" alt="Food">
      </div>
      <div class="reservation-block-form col-6-tablet">
        <div class="text-center">
          <h2>Restaurant check-in</h2>
          <p>
            If you would like to help homeless shelters, you can check in the amount of food left in your restaurant here
          </p>
        </div>
        <?php if ($_POST) { echo '<p> Thank you!</p>'; } else { echo '
        <form action="/#restaurant" method="post" class="reservations-form">
          <fieldset>
            <legend class="sr">Contact Us</legend>
            <div class="clear">
              <div class="col-6-tablet field-group">
                <label class="block strong" for="name">Your name</label>
                <input name="name" class="field form-control" id="name" type="text" placeholder="your name *">
              </div>
              <div class="col-6-tablet field-group">
                <label class="block strong" for="number">Phone number</label>
                <input name="number" class="field form-control" id="number" type="text" placeholder="phone number *">
              </div>
              <div class="col-6-tablet field-group">
                <label class="block strong" for="restaurant-name">Resaurant name</label>
                <input name="restaurant-name" class="field form-control" id="restaurant-name" type="text" placeholder="restaurant name *">
              </div>
              <div class="col-6-tablet field-group">
                <label class="block strong" for="address">Address</label>
                <input name="address" class="field form-control" id="address" type="text" placeholder="restaurant address *">
              </div>
            </div>
            <div class="clear">
              <div class="col-6-tablet field-group">
                <label class="block strong" for="food">Type of food</label>
                <input name="food" class="field form-control" id="food" type="text" placeholder="type of food *">
              </div>
              <div class="col-6-tablet field-group">
                <label class="block strong" for="amount">Number of people to feed</label>
                <span class="select">
                  <select name="amount" id="amount">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </span>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" class="button reservations-submit" value="Register">
            </div>
          </fieldset>
        </form>
        ';}?>
      </div>
    </div>
  </div>
</div>



<div class="footer">
  <div class="footer-inner container">
    <div class="clear">
      <div class="footer-column col-4-desktop">
        <h3 class="footer-heading">About us</h3>
        <p>
          Lambda's new and expanded Chelsea location represents a truly <strong>authentic</strong> Greek
          patisserie, featuring breakfasts of fresh croissants and steaming bowls of caf&eacute;.
        </p>
      </div>
      <div class="footer-column col-4-desktop">
        <h3 class="footer-heading">Opening Hours</h3>
        <p>
          <strong>Mon-Thu:</strong> 7.00am - 8.00pm <br>
          <strong>Fri-Sun:</strong> 7.00am - 10.00pm
        </p>
        <ul class="payment-types icon-list-inline">
          <li><span class="payment payment-mastercard"><span class="sr">Mastercard</span></a></li>
          <li><span class="payment payment-visa"><span class="sr">Visa</span></span></li>
          <li><span class="payment payment-american-express"><span class="sr">American Express</span></span></li>
          <li><span class="payment payment-paypal"><span class="sr">PayPal</span></span></li>
        </ul>
      </div>
      <div class="footer-column col-4-desktop">
        <h3 class="footer-heading">Our Location</h3>
        <p>
          19th Paradise Street Sitia <br>
          128 Meserole Avenue
        </p>
        <ul class="footer-social-list icon-list-inline">
          <li class="navigation-item-social"><a class="social social-twitter" href="#"><span class="sr">Twitter</span></a></li>
          <li class="navigation-item-social"><a class="social social-facebook" href="#"><span class="sr">Facebook</span></a></li>
          <li class="navigation-item-social"><a class="social social-google-plus" href="#"><span class="sr">Google Plus</span></a></li>
          <li class="navigation-item-social"><a class="social social-youtube" href="#"><span class="sr">YouTube</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script src="js/vendor/wow.js"></script>
<script src="js/vendor/webfontloader.js"></script>
<script src="js/default.js"></script>

</body>
</html>
