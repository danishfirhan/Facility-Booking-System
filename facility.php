<?php
//car.php
function getListOfFacility()
    {
        //1.create connection to my sql to my server
		$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
        if (!$con)//error connection
        {
            echo mysqli_connect_error();
        } else {
            $sql = "select * from facilitydb";
            $facilityListQty = mysqli_query($con, $sql);
            return $facilityListQty;
        }
    }
function addNewFacility()
	{
		$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
    if (!$con) {
        echo mysqli_connect_error();
        return;
    }else{
			//echo ' in fucntion addNewFacility()';
			$facilityId = $_POST['facilityId'];
			$checkQuery = "SELECT * FROM facilitydb WHERE facilityId = '$facilityId'";
			mysqli_query($con, $checkQuery);
			
            //collect car info from the form
            $facilityId = $_POST['facilityId'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $capacity = $_POST['capacity'];
			$facilityDetail = $_POST['facilityDetail'];
            $ratePerDay = $_POST['ratePerDay'];
            $status = $_POST['status'];
			$Date = $_POST['Date'];
            //construct sql statement
            $sql = "insert into facilitydb (facilityId, name, category, capacity,facilityDetail,ratePerDay, status,Date) values ('$facilityId','$name','$category','$capacity','$facilityDetail','$ratePerDay','$status','$Date')";
            mysqli_query($con,$sql); 
		}
}

function deleteFacility()
{
	//1.create and test connection
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if (!$con)//error connection
        {
            echo mysqli_connect_error();
        } else {
            //2.construct sql for delete & execute query
			$facilityIdToDelete=$_POST['facilityIdToDelete'];
			$sql=" delete from facilitydb where facilityId = '$facilityIdToDelete'";
			echo $sql;
			mysqli_query($con,$sql);
		}
	
}
function getFacilityInformation($facilityId)
{
	//1.create and test connection
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if (!$con)//error connection
        {
            echo mysqli_connect_error();
        }  
		else
		{
		$sql = "select * from facilitydb where facilityId = '$facilityId'";
		$qry = mysqli_query($con,$sql);
		return $qry;
		}

}

function updateFacility()
{
	//1.create and test connection
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if (!$con)//error connection
        {
            echo mysqli_connect_error();
        } else {
            $facilityId = $_POST['facilityId'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $capacity = $_POST['capacity'];
			$facilityDetail = $_POST['facilityDetail'];
            $ratePerDay = $_POST['ratePerDay'];
            $status = $_POST['status'];
			$Date = $_POST['Date'];
            //construct sql statement
            $sql = "update facilitydb set name = '$name', category = '$category', capacity = '$capacity', facilityDetail='$facilityDetail',
            ratePerDay = '$ratePerDay', status = '$status' ,Date = '$Date' where facilityId = '$facilityId'";
	echo $sql;
	mysqli_query($con,$sql);

        }
	
}
function searchByFacilityId($facilityIdToSearch)
{
	//1.create and test connection
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if (!$con)//error connection
        {
            echo mysqli_connect_error();
        } else {
			$sql = "SELECT * FROM facilitydb where facilityId = '$facilityIdToSearch'";
			$qry = mysqli_query($con,$sql);
			return $qry;
        }
	
}

function getAvailableFacilityOnTheseDate($dateRentStart ,$dateRentEnd)
{
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
    if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 $sqlStr = "select facilityId,name, category,capacity,facilityDetail,ratePerDay from facilitydb
where facilityId not in(
(SELECT distinct facilityId from bookings";
 $sqlStr .= " where dateRentStart BETWEEN '".$dateRentStart."' AND '".$dateRentEnd."'";
 $sqlStr .= " or dateRentEnd BETWEEN '".$dateRentStart."' AND '".$dateRentEnd."'))";
 //echo $sqlStr;
 $result = mysqli_query($con,$sqlStr);
 return $result;

}
?>