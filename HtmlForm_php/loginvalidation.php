<?php

$servername = 'localhost';
$username = 'saikiran';
$password = "vS8IxGj4VCi776FT";
$dbname = "saikiran";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(array_key_exists('action',$_POST)){
    $action = $_POST['action'];
    
}else{
    if(array_key_exists('action',$_GET)){
        $action = $_GET['action'];
    }
}

$response = [];


switch($action){
    
    case 'check':
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        $sql = "SELECT `password` FROM login WHERE `username` = '$username'";
        $result = $conn->query($sql);
        if($result){
            $response['success'] = true;
            $response['data'] = [];
            while($row = $result->fetch_assoc()) {
                  $response['data'][] = $row;
              }    
        }
        else{
            $response['error'] = "Query failed.";
            $response['sql'] = "SELECT * FROM login";
           
        }
        break;
    default:
        echo"Not a valid action!";
 }
 $conn->close();
 header("Content-Type: application/json");
 echo json_encode($response);