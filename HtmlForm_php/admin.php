<?php
session_start();

?>
<?php
session_start();

if($_SESSION["authn"]=="pass")
{
 echo("WELCOME ADMIN");
 
}
else
{
    header("Location:login.php"); 
}
?>
<html>
<head>
        <link rel="stylesheet" href="samplestylr.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="display">
        <div id="buttons">
            <button id="form_update">UPDATEEMAIL</button><br>
            <button id="get_allemails">GETALLTHEEMAILIDS</button><br>
            <button id="from_getfemaleemail">GET ALL FEMALE EMAILIDS</button><br>
            <button id="from_getAllregistrations">GET ALL REGISTRATIONS</button><br>
            <a href="login.php">RETURN TO LOGIN PAGE</a>
        </div>
        
    </div>
    
</body>

</html>
<script>
    $(document).ready(function () {
        $("#form_update").click(function () {
            window.location.replace("http://cs2.mwsu.edu/~sai/update.html");
        });


        $("#get_allemails").click(function () {
            $("#buttons").hide();
            var formdata = {
                action: "getEmails"
            }
            $.post("samplevalidation.php", formdata)
                .done(function (data) {
                    // console.log("Data Loaded: " + data['data'][0]['email']);
                    jQuery.each(data['data'], function (i, val) {
                        console.log(val['email']);
                        $("#display").append(val['email']);
                        $("#display").append('<br>');
                    });
                    $("#display").append('<br>'); 
                    $("#display").append('<br>'); 
                    $("#display").append('<a href="admin.php">RETURN TO WELCOME PAGE</a>'); 
                });

        });


        $("#from_getfemaleemail").click(function () {
            $("#buttons").hide();
            var formdata = {
                action: "femaleemail"
            }
            $.post("samplevalidation.php", formdata)
                .done(function (data) {
                    // console.log("Data Loaded: " + data['data'][0]['email']);
                    jQuery.each(data['data'], function (i, val) {
                        console.log(val['email']);
                        $("#display").append(val['email']);
                        $("#display").append('<br>');
                        
                    });
                    $("#display").append('<br>'); 
                    $("#display").append('<br>'); 
                    $("#display").append('<a href="admin.php">RETURN TO WELCOME PAGE</a>'); 
                });
                
        });
        
        $("#from_getAllregistrations").click(function () {
            $("#buttons").hide();
            var formdata = {
                action: "getUsers"
            }
            $.post("samplevalidation.php", formdata)
                .done(function (data) {
                    jQuery.each(data['data'], function (i, val) {
                       
                        console.log(val['email']);
                        var firs=val['first']
                        var las=val['last']
                        var emai=val['email']
                        var gende=val['gender']
                        var htmlStr = "<tr>" +"<td>" + firs + "</td>" + "<td>"+'\t'+"</td>" +"<td>" + las + "</td>"+ "<td>"+'\t'+"</td>" + "<td>" + emai + "</td>"  + "<td>"+'\t'+"</td>" +"<td>" + gende +"</td>"+"</tr>"+"</table>"
                        
                        $("#display").append(htmlStr);
                    });
                    $("#display").append('<br>'); 
                    $("#display").append('<br>'); 
                    $("#display").append('<a href="admin.php">RETURN TO WELCOME PAGE</a>'); 
                });
                
        });

    });
</script>
