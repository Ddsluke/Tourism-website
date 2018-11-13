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
 
$stmt = $conn->prepare("SELECT AName,Area,Type,Price FROM Attractions WHERE AName LIKE '%?%' AND Area LIKE '%?%' AND Type LIKE '%?%'");
$stmt->bind_param("", $AName,$Area, $Type);
if(isset($_POST["Attraction NAME"])and !empty($_POST["Attraction NAME"])){
    $AName=$_POST["Attraction NAME"];
}
if(isset($_POST["Area"])and !empty($_POST["Area"])){
    $AName=$_POST["Area"];
}
if(isset($_POST["Type"])and !empty($_POST["Type"])){
    $AName=$_POST["Type"];
}
$result = $conn->$stmt->execute();
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "Name: " .$row["AName"] ." - Type: ". $row["Type"]." -Area: " .$row["Area"]."<br>";
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

