<?php
// the first way the user input some keyword and then show the result 
$servername = "mysql.comp.polyu.edu.hk";
$username = "17083686d";
$password = "fdtwjmfn";
 
// CONNECT
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("CAN'T CONNECT : " . $conn->connect_error);
} 
 
$stmt = $conn->prepare("SELECT HName,Area,Level FROM Hotel WHERE HName LIKE '%?%' AND Area LIKE '%?%' AND Level = ?");
$stmt->bind_param("", $HName,$Area);
$stmt->bind_param(1, $Level);
if(isset($_POST["Hotel name"])and !empty($_POST["Hotel name"])){
    $AName=$_POST["Hotel name"];
}
if(isset($_POST["Area"])and !empty($_POST["Area"])){
    $AName=$_POST["Area"];
}
if(isset($_POST["Level"])and !empty($_POST["Level"])){
    $AName=$_POST["Level"];
}
$result = $conn->$stmt->execute();
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "Name: " .$row["HName"] ." - Level: ". $row["Level"]." -Area: " .$row["Area"]."<br>";
    }
} else {
    echo "can't find the result sorry";
}
$conn->close();
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



