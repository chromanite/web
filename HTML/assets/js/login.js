login = () => {
    const user = document.forms["login-form"]["username"].value;
    const pass = document.forms["login-form"]["password"].value;
    
    if (user == "") {
        alert("Please enter a username");
    } else if (pass == "") {
        alert("Please enter a password");
    } 

    if (user != "" || pass != "") {
        document.getElementById("login-submit").submit();
    } else {
        alert("Please fill in all fields");
    }
}


