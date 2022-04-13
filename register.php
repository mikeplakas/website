<html>

<head>
<link rel="stylesheet" href="mystyle.css">

</head>

<br>

<form action ="complete_registration.php" method ="post">

New Username:
<input type="text" name ="username">

<br>
<br>
New Password:
<input type = "password" name ="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

<br>
<br>

New Email:
<input type = "email" name="email">

<br>
<br>
<input type = "submit" value="Register">



</form>

</html>