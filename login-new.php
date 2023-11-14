<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				var phone = $("#phone").val();
				var confirm_password = $("#confirm_password").val();
				if(username.length > 10){
					alert("Username should be less than 10 characters");
				}
				else if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)){
					alert("Password should contain 2 capital, numeric, and small letters");
				}
				else if(email.indexOf('@') == -1){
					alert("Invalid email address");
				}
				else{
					var user = {
						username: username,
						password: password,
						email: email,
						phone: phone
					};
					var users = JSON.parse(localStorage.getItem("users"));
					if(users == null){
						users = [];
					}
					var found = false;
					for(var i = 0; i < users.length; i++){
						if(users[i].username == username){
							found = true;
							break;
						}
					}
					if(found){
						alert("User already exists");
					}
					else{
						if(password != confirm_password){
							alert("Passwords do not match");
						}
						else{
							users.push(user);
							localStorage.setItem("users", JSON.stringify(users));
							alert("User created successfully");
						}
					}
				}
			});
		});
	</script>
</head>
<body>
	<h1>Login Page</h1>
	<form>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="phone">Phone:</label>
		<input type="text" id="phone" name="phone"><br><br>
		<input type="button" id="submit" value="Submit">
	</form>
</body>
</html>
