<?php
function registerCustomer(){
		
		
		$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
		if(!$con){
			echo mysqli_connect_errno();//error connection
		
		}else{
			//1.colloect data from addCarForm
		
			$UserId=$_POST['UserId'];
			$Password=$_POST['Password'];
			$userType="CUSTOMER";
			
			//2.insert new record in car table
			$sql ="insert into user(userId,password,userType)
			values('$UserId','$Password','$userType'
			)";//THIS MUCH SAME TO PHP TABLE 
			echo $sql;
			mysqli_query($con,$sql);
		}
		
	}
	?>
	<?php
	registerCustomer();
	echo "<script>
alert('Register done! ');
window.location.href='../../login.php';
</script>";
	//header('Location:../../login.php');
	//header('Location:../../rentInformation/rentForm.php');
	
	
	
	
	?>