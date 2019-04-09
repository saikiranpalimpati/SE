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
    case  'addUser':
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO `registration` (`email`, `first`, `last`,`gender`) VALUES ('{$email}', '{$fname}', '{$lname}', '{$gender}')";
        $result = $conn->query($sql);
        $myfile = fopen("test.txt", "a") or die("Unable to open file!");
        fwrite($myfile,$fname);
        fwrite($myfile,"\t");
        fwrite($myfile,$lname);
        fwrite($myfile,"\t");
        fwrite($myfile,$email);
        fwrite($myfile,"\t");
        fwrite($myfile,$gender);
        fwrite($myfile,"\t");
        fwrite($myfile,"\n");
        fclose($myfile);
        if(!$result){
            $response['error'] = "User not added.";
            $response['success'] = false;
        }else{
            $response['success'] = true;
            $response['data'] = ['email'=>$email];
        }
        break;
    case  'updateUser':
        $fname = $_POST['fname'];
        
        $email = $_POST['email'];
        
        $sql = "UPDATE `registration` SET `email` = '$email' WHERE `first`= '$fname' ";
        $result = $conn->query($sql);
        if(!$result){
            $response['error'] = "User not added.";
            $response['success'] = false;
        }else{
            $response['success'] = true;
            $response['data'] = ['email'=>$email];
        }
        break;

    case 'getUsers':
        $sql = "SELECT * FROM `registration`";
        $result = $conn->query($sql);
        if($result){
            
            $response['success'] = true;
            $response['data'] = [];
            $outstring="";
            while($row = $result->fetch_assoc()) {
                $response['data'][] = $row;
            }
            
        }else{
            $response['error'] = "Query failed.";
            $response['sql'] = "SELECT * FROM registration";
        }
        
        break;
    
    case 'femaleemail':
        
        $sql = "SELECT `email` FROM `registration` WHERE `GENDER` = 'female'";
        $result = $conn->query($sql);

        if($result){
            $myfile = fopen("femaleEmail.txt", "w") or die("Unable to open file!");
            $response['success'] = true;
            $response['data'] = [];

            while($row = $result->fetch_assoc()) {
                $response['data'][] = $row;
                fwrite($myfile,"$row[email]");
                fwrite($myfile,"\n");
            }
            fclose($myfile);
        }else{
            $response['error'] = "Query failed.";
            $response['sql'] = "SELECT `email` FROM `registration` WHERE `GENDER` = 'female'";
        }
        
        break;

    case 'getEmails':
        $sql = "SELECT `email` FROM `registration`";
        $result = $conn->query($sql);
        if($result){
            $myfile = fopen("AllEmails.txt", "w") or die("Unable to open file!");
            fwrite($myfile,"eMAIL");
            fwrite($myfile,"\n");
            $response['success'] = true;
            $response['data'] = [];

            while($row = $result->fetch_assoc()) {
                $response['data'][] = $row;
                fwrite($myfile,"$row[email]");
                fwrite($myfile,"\n");
            }
            

        }else{
            $response['error'] = "Query failed.";
            $response['sql'] = "SELECT * FROM registration";
        }
        
        break;
    default:
        
        echo"Not a valid action!";
}

$conn->close();
header("Content-Type: application/json");
echo json_encode($response);
//echo json_encode($response['success']);
