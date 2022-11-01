// check if form has non empty username and password if so then post action to register.php
// if not then alert user to fill in all fields


register = () => {
    const user = document.forms["register-form"]["username"].value;
    const pass = document.forms["register-form"]["password"].value;
    
    if (user == "") {
        alert("Please enter a username");
    } else if (pass == "") {
        alert("Please enter a password");
    } 
    
    if (user != "" || pass != "") {
        document.forms["register-form"].submit();
    } 

}
