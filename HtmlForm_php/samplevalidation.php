<?php
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
valid==0;
if(valid ==1){
$fp = fopen('test.txt','w');
fwrite($fp,$firstname);
fwrite($fp,"\t");
fwrite($fp,$lastname);
fwrite($fp,"\t");
fwrite($fp,$email);
fwrite($fp,"\t");
fwrite($fp,$gender);
fwrite($fp,"\t");
fwrite($fp,"\n");
fclose($fp);
}
else{
"<a history.go(-1)></a>"
}
