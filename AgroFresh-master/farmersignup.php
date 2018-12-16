<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
<<<<<<< HEAD
$con=mysqli_connect("localhost","datainfo","datainfo","datainfo");
=======
$con=mysqli_connect("localhost","root","","agrofresh");
>>>>>>> important commit
if(mysqli_connect_errno())
{
	die("Connection Failed-".mysqli_connect_errno());
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
$dobErr="";
$check=1;
if(isset($_POST['Submit']))
{
	//$DOB=$_POST['Year']."-".$_POST['Month']."-".$_POST['Date'];
	//$check=1;
<<<<<<< HEAD
	if(empty($_POST['Name'])||empty($_POST['FatherName'])||empty($_POST['Gender'])||empty($_POST['Mobile'])||empty($_POST['Address'])||
	   empty($_POST['Pincode'])||empty($_POST['Password']))//||empty($_POST['Retype Password']))
=======
	$name=$_POST['fname'];
	$name1=$_POST['mname'];
	$name2=$_POST['lname'];
	$gen=$_POST['gender'];
	$mobile=$_POST['mob'];
	$ldmk=$_POST['lndmk'];
	$state=$_POST['state'];
	$pncd=$_POST['pin'];
	$pswd=$_POST['paswd'];
	$rpswd=$_POST['rpaswd'];
	if(!isset($name)||!isset($name1)||!isset($name2)||!isset($gen)||!isset($mobile)||!isset($ldmk)||
	!isset($pncd)||!isset($pswd)||!isset($rpswd)||trim($name)==''||trim($name1)==''||trim($name2)==''||trim($mobile)==''||
	trim($ldmk)==''||trim($pncd)==''||trim($pswd)==''||trim($rpswd)==''||!isset($state)||trim($state)==''||trim($gen)=='')//||empty($_POST['Retype Password']))
>>>>>>> important commit
	{
		$check=0;
		echo "Please fill all the required information!";
	}
<<<<<<< HEAD
	else
	{
		//$ID=$_POST['ID'];
		$Name=$_POST['Name'];
		$FatherName=$_POST['FatherName'];
		$Gender=$_POST['Gender'];
		$Mobile=$_POST['Mobile'];
		$Address=$_POST['Address'];
		$Pincode=$_POST['Pincode'];
		$Password=$_POST['Password'];
	}
	
	if($check==1)
	{
		$sql="INSERT INTO farmer(Name,FatherName,Gender,Mobile,Address,Pincode,Password)
		values('$Name','$FatherName','$Gender','$Mobile','$Address','$Pincode','$Password')";
=======
	if($pswd!=$rpswd){
    $check=0;
    echo "Password didn't match!";
  }

	if($check==1)
	{
		$sql="INSERT INTO farmer(`F_ID`,`FNAME`,`MNAME`,`LNAME`,`GENDER`,`PHONE_NO`,`LANDMARK`,`STATE`,`PINCODE`)
		values(NULL,'$name','$name1','$name2','$gen',$mobile,'$ldmk','$state',$pncd)";
>>>>>>> important commit
		//echo $sql;
		if(mysqli_query($con,$sql))
		{
			echo "Data Submitted Successfully!";
<<<<<<< HEAD
			
			 
=======
			$sql0="SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='AGROFRESH'
			AND TABLE_NAME='FARMER'";
			$result=mysqli_query($con,$sql0);
      $row=mysqli_fetch_assoc($result);
      $id=$row[AUTO_INCREMENT]-1;
      $sql1="INSERT INTO ADMIN(`PHONE_NO`,`PASS_WORD`,`USER_TABLE`,`U_ID`)
      VALUES($mobile,'$pswd','F',$id)";
      mysqli_query($con,$sql1);
			header("Location: res.php");

>>>>>>> important commit
		}
		else
		{
			echo "Query Failed!";
<<<<<<< HEAD
		}	
	}
}

if(isset($_POST['Submit']))
{
   header("Location: res.php");
}
=======
		}
	}
}


>>>>>>> important commit
if(isset($_POST['GoBack']))
{
   header("Location: test.php");
}
?>
<body id="back">

<form action="farmersignup.php" method="post">

<h1 align="center"><font color="blue">Please fill in the following details!!</font></h1>
<table cellspacing="30" align="center">

<<<<<<< HEAD
	
	<div >
	<tr id="Name" >
		<td><strong>Name</strong></td>
		<td>
			<input type="text" name="Name" />
		</td>
	</tr></div>
	
	<tr>
		<td><strong>Father's Name</strong></td>
		<td>
			<input type="text" name="FatherName" />
		</td>
	</tr>
	
	<tr>
		<td><strong>Gender</strong></td>
		<td>
			Male<input type="radio" name="Gender" value="Male" />
			Female<input type="radio" name="Gender" value="Female" />
		</td>
	</tr>
	
	
	<tr>
		<td><strong>Mobile</strong></td>
		<td><input type="text" name="Mobile" /></td>
	</tr>
	
	<tr>
		<td><strong>Address</strong></td>
		<td><input type="text" name="Address" /></td>
	</tr>
	
	<tr>
		<td><strong>Pincode</strong></td>
		<td><input type="text" name="Pincode" /></td>
	</tr>
	
	<tr>
		<td><strong>Password</strong></td>
		<td><input type="text" name="Password" /></td>
	</tr>
	
	
	
=======

	<div >
	<tr id="Name" >
		<td><strong>First Name</strong></td>
		<td>
			<input type="text" name="fname" />
		</td>
	</tr></div>

	<tr>
		<td><strong>Middle Name</strong></td>
		<td>
			<input type="text" name="mname" />
		</td>
	</tr>

	<tr>
		<td><strong>Last Name</strong></td>
		<td>
			<input type="text" name="lname"/></td>
		</tr>

	<tr>
		<td><strong>Gender</strong></td>
		<td>
			Male<input type="radio" name="gender" value="M" />
			Female<input type="radio" name="gender" value="F" />
		</td>
	</tr>


	<tr>
		<td><strong>Mobile</strong></td>
		<td><input type="number" name="mob" /></td>
	</tr>

	<tr>
		<td><strong>LANDMARK</strong></td>
		<td><input type="text" name="lndmk" /></td>
	</tr>

	<tr>
		<td><strong>STATE</strong></td>
		<td><input type="text" name="state" /></td>
	</tr>

	<tr>
		<td><strong>PINCODE</strong></td>
		<td><input type="number" name="pin"/></td>
	</tr>

	<tr>
		<td><strong>Password</strong></td>
		<td><input type="text" name="paswd" /></td>
	</tr>

	<tr>
		<td><strong>Confirm Password</strong></td>
		<td><input type="text" name="rpaswd" /></td>
	</tr>

>>>>>>> important commit
	<tr id="buttons">
	<td align="centre"><input type="submit" name="GoBack" value="GoBack" id="submit"/></td>
		<td align="centre"><input type="submit" name="Submit" value="Submit" id="submit"/></td>
		<td align="centre"><input type="submit" name="Cancel" value="Cancel" id="loru"/></td>
<<<<<<< HEAD
		
	</tr>
	
=======

	</tr>

>>>>>>> important commit
</table>
</form>
</body>
<?php
mysqli_close($con);
?>
</html>
