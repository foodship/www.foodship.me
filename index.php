<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Foodship</title>

  <meta name="description" content="Foodship connects homeless shelter to restaurants donating food.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="magnific-popup.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="jquery.magnific-popup.js"></script>

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
        <!--
        <ul class="navigation-social">
          <li class="navigation-item-social"><a class="social social-twitter" href="#"><span class="sr">Twitter</span></a></li>
          <li class="navigation-item-social"><a class="social social-facebook" href="#"><span class="sr">Facebook</span></a></li>
          <li class="navigation-item-social"><a class="social social-google-plus" href="#"><span class="sr">Google Plus</span></a></li>
        </ul>
        -->
      </div>
    </div>
  </div>
  <div class="banner-inner container">
    <h1 class="banner-lead">
      <span class="banner-lead-1">shipping food</span>
      <span class="banner-lead-2">to people in need</span>
    </h1>
    <div class="banner-buttons">
      <a href="#shelter" class="button button-primary">I'm a homeless shelter</a>
      <a href="#restaurant" class="button button-primary">I'm a restaurant</a>
    </div>
  </div>
</div>

<div id="about" class="content-block food-menu-block">
  <div class="food-menu-block-inner container">
    <div class="clear">
      <div class="food-menu-content">
        <h2>Who are we?</h2>
        <ul class="food-menu-list">
          <li class="food-menu-item">
            <div class="food-menu-summary">
              <p>
                We are four Freshmen majoring in Computer Science at the University of Pennsylvania. This is our second time participating in a hackathon.
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
                Foodship connects homeless shelter to restaurants donating food. With just a touch of a button, restaurants can ship food to homeless shelters to benefit those in need. No more trudging along in ankle-deep snow.
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
      <h2 class="h2-secondary">Restaurants</h2>
      <blockquote>
        <p>
          <?php
          $servername = "sql.foodship.me";
          $username = "foodship";
          $password = "djmingudjmingu";
          $dbname = "foodship";
          
$conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * 
FROM  `restaurants` 
WHERE `Ordered` = 0
LIMIT 0 , 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<table style="width:100%">
  <tr><td class=header>Name</td><td class=header>Location</td><td class=header>Food</td><td class=header>Servings</td></tr>';

    while($row = $result->fetch_assoc()) {
      //print_r($row);
      //echo $row["Id"]. " - Name: " . $row["Name"]. ", Restaurant: " . $row["Restaurant-name"]. "<br>";
      echo "<tr><td>" . '<a class="popup-with-form" href="#test-form" onclick="update_id(' . $row['Id'] . ')">' . $row['Restaurant-name'] . '</a>' . "</td><td>" . $row['Address'] . "</td><td>" . $row['Food'] . "</td><td>" . $row['People'] . "</td></tr>";
    }echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>

        </p>
        <cite>
        </cite>
      </blockquote>
    </div>
  </div>
</div>

<script>$(document).ready(function() {
	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});

var selected_id;

function update_id(id) {
	selected_id = id;
	
	
}

function pass_id() {
	var data = $('#test-form').serialize();
	$.post("getDeliveryQuote.php?id=" + selected_id, data).done(function (data) {
        alert(data);
        location.reload();
    });
}

</script>



<!-- form itself -->
<form id="test-form" class="mfp-hide white-popup-block">
	<h1>Shelter Information</h1>
	<fieldset style="border:0;">
		<ol>
			<li>
				<label for="name">Name</label>
				<input id="name" name="name" type="text" placeholder="Name" required="">
			</li>
			<li>
				<label for="address">Address</label>
				<input id="address" name="address" type="text" placeholder="e.g. 3910 Irving Street" required="">
			</li>
			<li>
				<label for="phone">Phone</label>
				<input id="phone" name="phone" type="tel" placeholder="e.g. +447500000000" required="">
			</li>
			
		</ol>
		 <a onclick="pass_id()">Register</a>
	</fieldset>
</form>

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
        <?php if ($_POST) {
          $servername = "sql.foodship.me";
          $username = "foodship";
          $password = "djmingudjmingu";
          $dbname = "foodship";
          $name = $_POST['name'];
          $number = $_POST['number'];
          $restaurant_name = $_POST['restaurant-name'];
          $address = $_POST['address'];
          $food = $_POST['food'];
          $people = $_POST['amount'];
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $sql = 'INSERT INTO  `foodship`.`restaurants` (`Id`, `Name`, `Number`, `Restaurant-name`, `Address`, `Food`, `People` , `Ordered`)
          VALUES (NULL , "' . $name . '", "' . $number . '", "' . $restaurant_name . '", "' . $address . '", "' . $food . '", "' . $people . '", "0")';
          if ($conn->query($sql) === TRUE) {
            echo "<p> Thank you!</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close(); } else { echo '
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
      <div class="footer-column col-6-desktop">
        <h3 class="footer-heading">About us</h3>
        <p>
          Foodship connects homeless shelter to restaurants donating food. With just a touch of a button, restaurants can ship food to homeless shelters to benefit those in need. No more trudging along in ankle-deep snow.
        </p>
      </div>
      <div class="footer-column col-6-desktop">
        <h3 class="footer-heading">Our Profiles</h3>
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/mingzhang2019" data-format="hover" data-related="false" data-text="Ming Zhang"></script>
        <br>
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/sanjanasarkar" data-format="hover" data-related="false" data-text="Sanjana Sarkar"></script>
        <br>
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/abha-vedula-263726111" data-format="hover" data-related="false" data-text="Abha Vedula"></script>
        <br>
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/victoria-huang-7804a7113" data-format="hover" data-related="false" data-text="Victoria Huang"></script>
      <!--
        <ul class="footer-social-list icon-list-inline">
          <li class="navigation-item-social"><a class="social social-twitter" href="#"><span class="sr">Twitter</span></a></li>
          <li class="navigation-item-social"><a class="social social-facebook" href="#"><span class="sr">Facebook</span></a></li>
          <li class="navigation-item-social"><a class="social social-google-plus" href="#"><span class="sr">Google Plus</span></a></li>
          <li class="navigation-item-social"><a class="social social-youtube" href="#"><span class="sr">YouTube</span></a></li>
        </ul>
      -->
      </div>
      <!--
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
      -->
    </div>
  </div>
</div>

<script src="js/vendor/wow.js"></script>
<script src="js/vendor/webfontloader.js"></script>
<script src="js/default.js"></script>

</body>
</html>
