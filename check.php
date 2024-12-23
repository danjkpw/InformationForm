<html>
<head>
<meta http-equiv="Content-Language" content="th" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta http-equiv="content-Type" content="text/html; charset=window-874" >
<meta http-equiv="content-Type" content="text/html; charset=tis-620" >

<title>ข้อมูลนักเรียน</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<form class="w3-container w3-card-4" action="upfile.php" enctype="multipart/form-data" method ="post" >
<?php

include('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];

//$cmd = "SELECT * FROM `student` WHERE student_id = '$id' and student_name like  '%".$name."%' ";

$cmd = "SELECT * FROM `student` WHERE student_id = '$id' and student_name like  '$name' ";
$result = mysqli_query($conn,$cmd);
$row =mysqli_fetch_array($result);
//
if ($row =="")
{
    ?>
    <script language "javascript">
        alert ('Incorrect Username or Password');
        window.history.back();
    </script>
    <?php
}
else
{
	    $student_class = $row["student_class"];
		$student_number = $row["student_number"];
		$student_name = $row["student_name"];
		$student_surname = $row["student_surname"];
		$student_nickname = $row["student_nickname"];
		$birthday = $row["birthday"];
		$home_tel = $row["home_tel"];
		$mobile = $row["mobile"];
		$email = $row["email"];
		$image = $row["image"];
		$address = $row["address"];
		$mu = $row["mu"];
		$soi = $row["soi"];
		$road = $row["road"];
		$district = $row["district"];
		$amphur = $row["amphur"];
		$province = $row["province"];
		$zipcode = $row["zipcode"];
		
		
		Print ("<INPUT TYPE= hidden name=student_id value=$id>");
		Print ("<INPUT TYPE= hidden name=student_classnumber value=$student_class>");
		Print ("<INPUT TYPE= hidden name=student_roomnum value=$student_number>");
		Print ("<INPUT TYPE= hidden name=student_name value=$student_name>");
		Print ("<INPUT TYPE= hidden name=student_surname value=$student_surname>");
	
}

?>

<div class="w3-container">
  <div class="w3-card-4 w3-display-topmiddle" style="width:70%;">
    <header class="w3-container w3-blue">
      <h1>Student data</h1>
    </header>

    <div class="w3-container w3-text-indigo">
		  <p>เลขประจำตัวนักเรียน : 	<?php echo $id; ?>				</p>
		  <p>ห้อง :			<?php echo $student_class; ?>		</p>
		  <p>เลขที่ :			<?php echo $student_number; ?>			</p>
		  <p>ชื่อ :			    <?php echo $student_name; ?>			</p>
		  <p>นามสกุล :			<?php echo $student_surname; ?>			</p>

		  <p>ชื่อเล่น : 		 	<input type="text" id="nickname_id" name="student_nickname" value="<?php echo $student_nickname;?>"></p>
          <p>วันเกิด :  			<input type="date" id="birthday_id" name="birthday"  		value="<?php echo $birthday;?>"></p>
          <p>เบอร์โทรศัพท์บ้าน :  	<input type="text" id="home_tel_id" name="home_tel"  		value="<?php echo $home_tel;?>"></p>
		  <p>เบอร์มือถือ :  		<input type="text" id="mobile_id" 	name="mobile"  			value="<?php echo $mobile;?>"></p>
		  <p>อีเมล :			<input type="text" id="email_id" 	name="email"  			value="<?php echo $email;?>"></p>
		  <p>รูปภาพ :  			<input type="file" id="image_id" 	name="image"></p>
		  
		  <?php echo "<img src=".'uploads/'.$image." width='480'/>";?>
		  <p>บ้านเลขที่ :  		<input type="text" id="address_id"  name="address"  		value="<?php echo $address;?>"></p>
		  <p>หมู่ที่ :  			<input type="text" id="mu_id" 		name="mu"  				value="<?php echo $mu;?>"></p>
		  <p>ซอย :  			<input type="text" id="soi_id" 		name="soi"  			value="<?php echo $soi;?>"></p>
		  <p>ถนน :  			<input type="text" id="road_id" 	name="road"  			value="<?php echo $road;?>"></p>
		  <p>ตำบล/แขวง : 		<input type="text" id="district_id" name="district"  		value="<?php echo $district;?>"></p>
		  <p>อำเภอ/เขต :  		<input type="text" id="amphur_id" 	name="amphur"  			value="<?php echo $amphur;?>"></p>
		  <p>จังหวัด :  			<input type="text" id="province_id" name="province" 		value="<?php echo $province;?>"></p>
		  <p>รหัสไปรษณีย์ :  		<input type="text" id="zipcode_id"  name="zipcode"  		value="<?php echo $zipcode;?>"></p>
		  
    </div>
	
	
    <input type="submit" value ="submit" name ="submit" class="w3-btn w3-indigo">
<br>
<br>
    <footer class="w3-container w3-blue">
      <h5>Create By : Jakrapat Wongpradu</h5>
    </footer>
  </div>
</div>
</form>
</body>
</html>
