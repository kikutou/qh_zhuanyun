 <?php
$servername = "kikurds.cybgglmkvezu.ap-northeast-1.rds.amazonaws.com";
$username = "kiku";
$password = "Juteng378084190";

 echo "begin";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 
