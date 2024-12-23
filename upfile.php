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
<?php
include ('connect.php');

ini_set('memory_limit', '2M');
ini_set('upload_max_filesize', '2M');
ini_set('post_max_size', '3M');

$id = $_POST["student_id"];
$classnumber = $_POST["student_classnumber"];
$roomnum = $_POST["student_roomnum"];
$name = $_POST["student_name"];
$surname = $_POST["student_surname"];
$student_nickname = $_POST["student_nickname"];
$birthday = $_POST["birthday"];
$home_tel = $_POST["home_tel"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
//$image = $_POST["image"];
$address = $_POST["address"];
$mu = $_POST["mu"];
$soi = $_POST["soi"];
$road = $_POST["road"];
$district = $_POST["district"];
$amphur = $_POST["amphur"];
$province = $_POST["province"];
$zipcode = $_POST["zipcode"];

$filename   = $id."-".uniqid();
$extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION );
$allowedExts = array("jpg", "jpeg", "png", "tiff", "pdf");
$basename   = $filename . '.' . $extension;
$source       = $_FILES["image"]["tmp_name"];
$destination = "uploads/" . $basename;
?>
	
<div class="w3-container"> 
	<p>เลขประจำตัวนักเรียน : 		<?php echo $id; ?>				</p>
	<p>ห้อง :				<?php echo $classnumber; ?>		</p>
	<p>เลขที่ :				<?php echo $roomnum; ?>			</p>
	<p>ชื่อ :				<?php echo $name; ?>			</p>
	<p>นามสกุล :			<?php echo $surname; ?>			</p>
	<p>ชื่อเล่น :				<?php echo $student_nickname; ?>		</p>
	<p>วันเกิด :				<?php echo $birthday; ?>		</p>
	<p>เบอร์โทรศัพท์บ้าน :		<?php echo $home_tel; ?>		</p>
	<p>เบอร์มือถือ :			<?php echo $mobile; ?>			</p>
	<p>อีเมล :				<?php echo $email; ?>			</p>
	<p>รูปภาพ :			    <?php echo $basename; ?>		</p>
	<p>บ้านเลขที่ :			<?php echo $address; ?>			</p>
	<p>หมู่ที่ :				<?php echo $mu; ?>				</p>
	<p>ซอย :				<?php echo $soi; ?>				</p>
	<p>ถนน :				<?php echo $road; ?>			</p>
	<p>ตำบล/แขวง :			<?php echo $district; ?>		</p>
	<p>อำเภอ/เขต :			<?php echo $amphur; ?>			</p>
	<p>จังหวัด :				<?php echo $province; ?>		</p>
	<p>รหัสไปรษณีย์ :			<?php echo $zipcode; ?>			</p>
</div>

<?php

if ($_FILES["image"]["size"] > 2000000)
{
       ?>
    <script>
        alert ("ไฟล์มีขนาดใหญ่เกินไป");
        window.history.back ();
    </script>
    <?php
}

else  if (in_array($extension, $allowedExts))
{
    move_uploaded_file( $source, $destination ) ;
	
	
		$sql = "UPDATE student SET student_nickname='$student_nickname'
		,birthday='$birthday'
		,home_tel='$home_tel'
		,mobile='$mobile'
		,email='$email'
		,image='$basename'
		,address='$address'
		,mu='$mu'
		,soi='$soi'
		,road='$road'
		,district='$district'
		,amphur='$amphur'
		,province='$province'
		,zipcode='$zipcode' 
		
		WHERE student_id = '$id'";
	
	if ($conn->query($sql) === TRUE)
    {
        echo "Ready to update Data";
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}	
?>
</body>
</html>