<?php

const MYCAR = "Volvo";
echo MYCAR; // Volvo


$a = 5;

// Pre-increment
echo ++$a; // Output: 6 (nilai $a menjadi 6)
echo $a;   // Output: 6 (nilai $a tetap 6)

// Post-increment
echo $a++; // Output: 6 (nilai $a menjadi 7 setelah dievaluasi)
echo $a;   // Output: 7 (nilai $a sekarang 7)

// Pre-decrement
echo --$a; // Output: 6 (nilai $a menjadi 6)
echo $a;   // Output: 6 (nilai $a tetap 6)

// Post-decrement
echo $a--; // Output: 6 (nilai $a menjadi 5 setelah dievaluasi)
echo $a;   // Output: 5 (nilai $a sekarang 5)



$hostname = "localhost";
$database = "name_database";
$password = "";
$username = "root";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
