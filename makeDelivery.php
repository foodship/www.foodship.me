<?php
function deliver(){
	echo "start";
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
	WHERE `Id` = " . $_GET['id'] . "
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

	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.postmates.com/v1/customers/cus_KeDc-a3WqAD2rk/deliveries",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pickup_address\"\r\n\r\n $address \r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pickup_phone_number\"\r\n\r\n $number \r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pickup_name\"\r\n\r\n $name \r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"dropoff_address\"\r\n\r\n3910 Irving St, Philadelphia, PA 19104\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"manifest\"\r\n\r\nTests\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"dropoff_phone_number\"\r\n\r\n415-445-4444\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"dropoff_name\"\r\n\r\nDeliverer\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"quote_id\"\r\n\r\ndqt_KeEkr3G_TOt0vV\r\n-----011000010111000001101001--",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic MGI1ODYyNjItNjQ4OS00Y2U4LTlhMzUtYmU4ZmIwZTc0NTE2Og==",
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=---011000010111000001101001",
    "postman-token: d9d50115-70f4-4124-f48b-27a56a2df83e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);


	echo "<h2>Your order has been processsed.</h2>";
}