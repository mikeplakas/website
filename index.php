<html>

<head>
<link rel="stylesheet" href="mystyle.css">

</head>

<body>

<br><br><br><br><br><br><br> <br><br><br><br>

<table align="center">
 
<tr> 

<td>

<form action ="find_user.php" method ="post">

User Username:
<input type = "text" name ="username">

<br>
<br>
User Password:

<input type = "password" name = "password">


<br>
<br>

<input type ="submit" value = "Login User">

</form>     

</td>

<td>

<form action ="find_admin.php" method ="post">

Admin Username:
<input type = "text" name ="username">

<br>
<br>
Admin Password:

<input type = "password" name = "password">


<br>
<br>

<input type ="submit" value = "Login Admin">

</form>
</td>
</tr>

<tr>
<br><br>
<td colspan="2">
<form action="register.php" align ="center">

<input type="submit" value="Register">

</form>

</td>

</tr>

</table>


</body>



</html>