<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$con=mysqli_connect("localhost","root","","AGROFRESH");
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
  $name=$_POST['aname'];
  $oname1=$_POST['ofname'];
  $oname2=$_POST['olname'];
  $mobile=$_POST['mob'];
  $ldmk=$_POST['lndmk'];
  $state=$_POST['state'];
  $pncd=$_POST['pin'];
  $pswd=$_POST['paswd'];
  $rpswd=$_POST['rpaswd'];
	if(!isset($name)||!isset($oname1)||!isset($oname2)||!isset($mobile)||!isset($ldmk)||
	   !isset($pncd)||!isset($pswd)||!isset($rpswd)||trim($name)==''||trim($oname1)==''||trim($oname2)==''||
     trim($mobile)==''||trim($ldmk)==''||trim($pncd)==''||trim($pswd)==''||trim($rpswd)==''||!isset($state)||trim($state)=='')//||empty($_POST['Retype Password']))
	{
		$check=0;
		echo "Please fill all the required information!";
	}
  if($pswd!=$rpswd){
    $check=0;
    echo "Password didn't match!";
  }

	if($check==1)
	{
		$sql="INSERT INTO `AGROFRESH`.`TRANSPORT`(`T_ID`,`AGENCY`,`OWNER_FNAME`,`OWNER_LNAME`,`PHONE_NO`,`LANDMARK`,`STATE`,`PINCODE`)
		values(NULL,'$name','$oname1','$oname2',$mobile,'$ldmk','$state',$pncd)";
    $sql0="SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='AGROFRESH'
    AND TABLE_NAME='TRANSPORT'";


		//echo $sql;
		if(mysqli_query($con,$sql))
		{
			echo "Data Submitted Successfully!";
			$result=mysqli_query($con,$sql0);
			$row=mysqli_fetch_assoc($result);
			$id=$row[AUTO_INCREMENT]-1;
			$sql1="INSERT INTO ADMIN(`PHONE_NO`,`PASS_WORD`,`USER_TABLE`,`U_ID`)
			VALUES($mobile,'$pswd','T',$id)";
			mysqli_query($con,$sql1);
 			header("Location: res.php");

		}
		else
		{
			echo "Query Failed!";
		}
	}
}


if(isset($_POST['GoBack']))
{
   header("Location: test.php");
}
?>
<body id="back">

<form action="transportsinup.php" method="post">

<h1 align="center"><font color="blue">Please fill in the following details!!</font></h1>
<table cellspacing="30" align="center">


	<div >
	<tr>
		<td><strong>AGENCY NAME</strong></td>
		<td>
			<input type="text" name="aname" />
		</td>
	</tr></div>

	<tr>
		<td><strong>OWNER FIRST NAME</strong></td>
		<td>
			<input type="text" name="ofname" />
		</td>
	</tr>

	<tr>
		<td><strong>OWNER LAST NAME</strong></td>
    <td>
      <input type="text" name="olname"/>
		<!--<td>
			Male<input type="radio" name="Gender" value="Male" />
			Female<input type="radio" name="Gender" value="Female" />
		</td>
  -->
	</tr>


	<tr>
		<td><strong>Mobile No</strong></td>
		<td><input type="text" name="mob" /></td>
	</tr>

	<tr>
		<td><strong>Landmark</strong></td>
		<td><input type="text" name="lndmk" /></td>
	</tr>

	<tr>
		<td><strong>State</strong></td>
		<td><input type="text" name="state" /></td>
	</tr>

	<tr>
		<td><strong>Pincode</strong></td>
		<td><input type="text" name="pin" /></td>
	</tr>

  <tr>
    <td><strong>Password</strong></td>
    <td><input type="password" name="paswd"/></td>
  </tr>
  <tr>
    <td><strong>Confirm Password</strong></td>
    <td><input type="password" name="rpaswd"/></td>
  </tr>

	<tr id="buttons">
	<td align="centre"><input type="submit" name="GoBack" value="GoBack" id="submit"/></td>
		<td align="centre"><input type="submit" name="Submit" value="Submit" id="submit"/></td>
		<td align="centre"><input type="submit" name="Cancel" value="Cancel" id="loru"/></td>

	</tr>

</table>
</form>
</body>
<?php
mysqli_close($con);
?>
</html>
