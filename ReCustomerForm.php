<!DOCTYPE html>
<html>
<style>
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
	.center { 
  text-align: center;
          margin: auto;
  width: 60%;
  border: 3px solid #359DB5;
  padding: 10px;
    }
</style>
<h1 class = center>Register customer</h1>
<form action ="processRegister.php" method="POST" class = center>
<input type = "text" name ="UserId" placeholder="enter UserId "><br>
<input type = "text" name ="Password" placeholder="enter Password "><br>

<input type = "submit" name ="saveFacilityButton" value="Save"><br>
</form>


</html>