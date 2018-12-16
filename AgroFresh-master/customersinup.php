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
  $name=$_POST['fname'];
  $name1=$_POST['mname'];
  $name2=$_POST['lname'];
  $gen=$_POST['gender'];
  $mobile=$_POST['mob'];
  $emil=$_POST['eml'];
  $ldmk=$_POST['lndmk'];
  $state=$_POST['state'];
  $pncd=$_POST['pin'];
  $pswd=$_POST['paswd'];
  $rpswd=$_POST['rpaswd'];
	if(!isset($name)||!isset($name1)||!isset($name2)||!isset($gen)||!isset($emil)||!isset($mobile)||!isset($ldmk)||
	!isset($pncd)||!isset($pswd)||!isset($rpswd)||trim($name)==''||trim($name1)==''||trim($name2)==''||trim($mobile)==''||
	trim($ldmk)==''||trim($pncd)==''||trim($pswd)==''||trim($rpswd)==''||!isset($state)||trim($state)==''||trim($gen)==''||trim($emil)=='')//||empty($_POST['Retype Password']))
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
		$sql="INSERT INTO CUSTOMER(`C_ID`,`FNAME`,`MNAME`,`LNAME`,`GENDER`,`PHONE_NO`,`EMAIL`,`LANDMARK`,`STATE`,`PINCODE`)
		values(NULL,'$name','$name1','$name2','$gen',$mobile,'$email','$ldmk','$state',$pncd)";
		//echo $sql;
		if(mysqli_query($con,$sql))
		{
			echo "Data Submitted Successfully!";
      $sql0="SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='AGROFRESH'
      AND TABLE_NAME='CUSTOMER'";
      $result=mysqli_query($con,$sql0);
      $row=mysqli_fetch_assoc($result);
      $id=$row[AUTO_INCREMENT]-1;
      $sql1="INSERT INTO ADMIN(`PHONE_NO`,`PASS_WORD`,`USER_TABLE`,`U_ID`)
      VALUES($mobile,'$pswd','C',$id)";
      mysqli_query($con,$sql1);
      header("Location: res.php");
		}// QUES
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

<form action="customersinup.php" method="post">

<h1 align="center"><font color="blue">Please fill in the following details!!</font></h1>
<table cellspacing="30" align="center">


	<div >
	<tr>
		<td><strong>FIRST NAME</strong></td>
		<td>
			<input type="text" name="fname" />
		</td>
	</tr></div>

	<tr>
		<td><strong>MIDDLE NAME</strong></td>
		<td>
			<input type="text" name="mname" />
		</td>
	</tr>

	<tr>
		<td><strong>LAST NAME</strong></td>
    <td>
      <input type="text" name="lname"/>
		<!--<td>
			Male<input type="radio" name="Gender" value="Male" />
			Female<input type="radio" name="Gender" value="Female" />
		</td>
  -->
	</tr>
  <tr>
    <td><strong>GENDER</strong></td>
    <td>
      Male<input type="radio" name="gender" value='M'/>
      Female<input type="radio" name="gender" value='F'/>
    </td>
  </tr>

	<tr>
		<td><strong>Mobile No</strong></td>
		<td><input type="number" name="mob" /></td>
	</tr>

  <tr>
    <td><strong>EMAIL</strong></td>
    <td><input type="email" name="eml"/></td>
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
		<td><input type="number" name="pin" /></td>
	</tr>

  <tr>
    <td><strong>Password</strong></td>
    <td><input type="text" name="paswd"/></td>
  </tr>
  <tr>
    <td><strong>Confirm Password</strong></td>
    <td><input type="text" name="rpaswd"/></td>
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
