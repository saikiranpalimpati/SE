<?php
session_start();
session_destroy();
?>
<?php
session_start();
?>
<html>

<head>
    Admin Login
    <link rel="stylesheet" href="samplestylr.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="loginvalidation.php" method="post">
        <p>
            Username:
            <input type="text" name="uname" id="form_uname" placeholder="Aron" />
        </p>
        <p>
            Password:
            <input type="password" name="pass" id="form_password" />
        </p>
        <span id="errorMsg"></span>
        <br>
        <input type="hidden" name="action" value="check">
        <input type="submit" name="submit" value="SUBMIT">

    </form>
    
</body>

</html>
<script>
    $(document).ready(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            var formuname = false;
            var formpassword = false;

            if (!$('#form_uname').val()) {
                if ($("#form_uname").parent().next(".validation").length == 0) // only add if not added
                {
                    $("#form_uname").parent().after(
                        "<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter username</div>"
                    );
                }
            } else {
                formuname = true;
                $("#form_uname").parent().next(".validation").remove(); // remove it

            }
            if (!$('#form_password').val()) {
                if ($("#form_password").parent().next(".validation").length == 0) // only add if not added
                {
                    $("#form_password").parent().after(
                        "<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>"
                    );

                }
            } else {
                formpassword = true;
                $("#form_password").parent().next(".validation").remove(); // remove it
            }


            var formdata = {
                uname: $("#form_uname").val(),
                pass: $("#form_password").val(),
                action: "check"
            }
           
            if (formuname && formpassword) {
                
                $.post("loginvalidation.php", formdata)
                    .done(function (data) {
                        //console.log(data);
                        //var passw = data['data'][0]['password'];
                        if(data['data'].length==0){
                            $('#errorMsg').css('color','red');
                            $('#errorMsg').html('Invalid username');

                        }
                        else{
                            if(data['data'][0]['password']==$("#form_password").val()){
                                $('#errorMsg').html('');
                                window.location.replace("http://cs2.mwsu.edu/~sai/admin.php");
                            }
                            else{
                                $('#errorMsg').css('color','red');
                                $('#errorMsg').html('Incorrect password');
                            }
                        }
                       
                    });
            }
        });


    });

</script>
