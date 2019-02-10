
function ranfun()
{
	
 var fname = document.getElementById("fname").value;
 var lname = document.getElementById("lname").value;
 var email = document.getElementById("email").value;
 var gender = document.getElementsByName("gender");
 var textExp = /^[a-zA-Z]+$/;
 if(fname.match(textExp))
 {
	 return true;
 }
 else{
	 alert("Invalid firstname entry");
 }
 if(lname.match(textExp))
 {
	 return true;
 }
 else
 {
	 alert("Invalid lastname entry");
 }
 var gender_select;
	for(var i = 0; i < gender.length; i++){
    if(gender[i].checked){
        gender_select = gender[i].value;
    }
}

 alert(gender_select);
}
