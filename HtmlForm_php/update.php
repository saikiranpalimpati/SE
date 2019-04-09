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
<html>

<head>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="samplestylr.css">
</head>

<form action="samplevalidation.php" method="post">

    <p>
        Enter your first name:
        <input type="text" name="fname" id="form_fname" placeholder="Aron" />
    </p>
    <p>
        Enter your email:
        <input type="text" name="email" id="form_email" placeholder="Aron_finch@gmai.com" />
    </p>
    
        <input type="hidden" name="action" value="updateUser">
        <input type="submit" name="submit" value="SUBMIT">



</form>
<a href="admin.html">RETURN TO WELCOME PAGE</a>
<div id="test"></div>

</html>
<script>
    $(document).ready(function () {

        $('form').on('submit', function (e) {
            e.preventDefault();
            var regex = /^[a-zA-Z ]+$/;
            var emailregex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var fname_submit = false;
            var email_submit = false;

            if (!$('#form_fname').val()) {
                if ($("#form_fname").parent().next(".validation").length == 0) // only add if not added
                {

                    $("#form_fname").parent().after(
                        "<td class='validation' style='color:red;'>FIRST NAME CANNOT BE EMPTY</td>"
                    );

                }
            }
            else {
                $("#form_fname").parent().next(".validation").remove();
            }
            if ($('#form_fname').val()) {
                if (!$('#form_fname').val().match(regex)) {
                    $("#form_fname").parent().after(
                        "<td class='validation' style='color:red;margin-bottom: 20px;'>Please enter letters only</td>"
                    );
                }

                else {
                    $("#form_fname").parent().next(".validation").remove(); // remove it
                    fname_submit = true;
                }
            }
            //email
            if (!$('#form_email').val()) {
                if ($("#form_email").parent().next(".validation").length == 0) // only add if not added
                {

                    $("#form_email").parent().after(
                        "<td class='validation' style='color:red;'>email CANNOT BE EMPTY</td>"
                    );

                }
            }
            else {
                $("#form_email").parent().next(".validation").remove();
            }
            if ($('#form_email').val()) {
                if (!$('#form_email').val().match(emailregex)) {
                    $("#form_email").parent().after(
                        "<td class='validation' style='color:red;margin-bottom: 20px;'>email should contain '@' and '.' in it</td>"
                    );
                }

                else {
                    $("#form_email").parent().next(".validation").remove(); // remove it
                    email_submit = true;
                }
            }
            var formdata = {
                email: $("#form_email").val(),
                fname: $("#form_fname").val(),
                action: "updateUser"
            }

            if (fname_submit && email_submit) {
                $.post("samplevalidation.php", formdata)
                    .done(function (data) {
                        console.log("Data Loaded: " + data);
                    });
            }
        });


    });

</script>
