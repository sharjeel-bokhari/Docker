<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';
$my_db= 'MYSQL_DATABASE';
// check the MySQL connection status
$conn = new mysqli($host, $user, $pass,$my_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}
if ($result = $conn -> query("SELECT DATABASE()")) {
    $row = $result -> fetch_row();
    echo "Default database is " . $row[0];
    $result -> close();
  }
  

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
// echo empty($result);
if(empty($result)) {
    $sql = "CREATE TABLE product (
                ID int(11) AUTO_INCREMENT primary key,
                NAME varchar(255) NOT NULL,
                COST INT NOT NULL
                )";
    if ($conn->query($sql) === TRUE) {
        echo "Table product created successfully";
        $ins = $conn->query("insert into product (name, cost) values ('hassan', 2000);");
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $x) {
            echo "<br>";
            echo $x['NAME'] . " " . $x['COST'];
            echo "<br>";    
        }
        } else {
        echo "Error creating table: " . $conn->error;
        }
}
else{
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $x) {
        echo "<br>";
        echo $x['NAME'] . " " . $x['COST'];
        echo "<br>";
    }
}


$url = 'http://brands:5001/products'; // Replace with the actual URL of your Python microservice

// // Make an HTTP request to the Python microservice
// $response = file_get_contents($url);

// // Check if the request was successful
// if ($response === TRUE) {
//     // Parse the JSON response
//     $prod = json_decode($response, true);

//     // Iterate over the products and display the details
//     foreach ($prod as $y) {
//         echo "Name: " . $y['name'] . "<br>";
//         echo "Brand: " . $y['brand'] . "<br>";
//         echo "Price: " . $y['price'] . "<br><br>";
//     }
// } else {
//     // Handle the case when the request failed
//     echo "Failed to fetch product details.";
// }

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

echo '<br>' . $response .'Hello<br>';

if ($response !== false) {
    $prod = json_decode($response, true);

    foreach ($prod as $y) {
        echo "Name: " . $y['name'] . "<br>";
        echo "Brand: " . $y['brand'] . "<br>";
        echo "Price: " . $y['price'] . "<br><br>";
    }
} else {
    echo "Failed to fetch product details.";
}

curl_close($curl);

?>
</body>
</html>
