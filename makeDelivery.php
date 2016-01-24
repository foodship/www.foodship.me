<?php
function deliver(){
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
	WHERE `Id` = $_GET['id']
	LIMIT 0 , 10";
	$result = $conn->query($sql);
	$address = "";
	$number = "";
	$name = "";

	if ($result->num_rows > 0) {
	  $row = $result->fetch_assoc();
	  $address = $row['Address'];
	  $number = $row['Number'];
	  $name = $row['Name'];
	} else {
	    echo "0 results";
	}
	$conn->close();

	$request = new HttpRequest();
	$request->setUrl('https://api.postmates.com/v1/customers/cus_KeDc-a3WqAD2rk/deliveries');
	$request->setMethod(HTTP_METH_POST);

	$request->setHeaders(array(
	  'postman-token' => '3edbfe4b-d784-f8ad-63a0-d32a5374cdf0',
	  'cache-control' => 'no-cache',
	  'authorization' => 'Basic MGI1ODYyNjItNjQ4OS00Y2U4LTlhMzUtYmU4ZmIwZTc0NTE2Og==',
	  'content-type' => 'multipart/form-data; boundary=---011000010111000001101001'
	));

	$request->setBody('-----011000010111000001101001
	Content-Disposition: form-data; name="pickup_address"

	$address
	-----011000010111000001101001
	Content-Disposition: form-data; name="pickup_phone_number"

	$number
	-----011000010111000001101001
	Content-Disposition: form-data; name="pickup_name"

	$name
	-----011000010111000001101001
	Content-Disposition: form-data; name="dropoff_address"

	3910 Irving St, Philadelphia, PA 19104
	-----011000010111000001101001
	Content-Disposition: form-data; name="dropoff_phone_number"

	415-445-4444
	-----011000010111000001101001
	Content-Disposition: form-data; name="dropoff_name"

	Deliverer
	-----011000010111000001101001
	Content-Disposition: form-data; name="quote_id"

	dqt_KeEkr3G_TOt0vV
	-----011000010111000001101001--');

	try {
	  $response = $request->send();

	  echo $response->getBody();
	} catch (HttpException $ex) {
	  echo $ex;
	}
}
echo "<h2>Your order has been processsed.</h2>"