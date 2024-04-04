<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
.mySlides {display: none}
.center { 
  text-align: center;
          margin: auto;
  width: 60%;
  border: 3px solid #359DB5;
  padding: 10px;
    }


body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.center { 
        text-align:center; 
        width:100%; 
    }
	        /* Common CSS styles */
		html,body,h1,h2,h3,h4,h5,h6,.result {font-family: "Roboto", sans-serif}


        header {
			font-family: "Roboto", sans-serif;
            background-color: #D3D3D3; 
            color: black;
            text-align: center;
            padding: 20px 0;
            position: relative; /* Position the header relative for absolute positioning of elements inside */
        }

        nav {
            background-color: #E0E0E0; 
            color: black;
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #fff;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: black;
            text-decoration: none;
            font-weight: bold; /* Added font-weight */
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {

            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000; /* Text color */
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
button {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

button:hover {

  background-color: #04AA6D;
  color: white;
  }
  .button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}



.button4 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button4:hover {
  background-color: #555555;
  color: white;
}

    </style>
	<?php
	echo'
	<title>Staff Menu</title>
	<h1 class="center">Customer Menu</h1>
	<form action="login/checkLogin.php" method="POST" class="center">
	<fieldset style="width:15%" class="center">

	<button  ><i class="fa fa-bank" style="font-size:20px"></i><a href="bookFacility/bookingForm.php">Check facility availability</a></button>
            <button class="button button4" ><i class="fa fa-bookmark" style="font-size:20px"></i><a href="customer/customerUpdate.php">Update Customer</a></button>
			<button class="button button2" ><i class="fa fa-bookmark" style="font-size:20px"></i><a href="bookFacility/bookingList.php">Booking History</a></button>
         <button class="button button4" ><i class="fa fa-hourglass-end" style="font-size:20px"></i><a href="login/logOut.php">Logout</a></button>
		 
	</fieldset>
	</form>
	';
	?>
</html>