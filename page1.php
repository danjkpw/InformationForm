<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>student Name List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="margin-top: 10px;">
<?php
include('connect.php');

$student_class = "M.6/1";
$perpage = 10;

if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;


$sql = "select * from student where student_class like '$student_class' limit {$start} , {$perpage} ";
$query = mysqli_query($conn, $sql);
?>

<div class="w3-container">
<center>
		<table class="w3-table w3-striped w3-border">
		<tr class="w3-green w3-center">
			<th class="w3-center">Class</th>
			<th class="w3-center">Student Number</th>
			<th class="w3-center">Student ID</th>
			<th class="w3-center">Name</th>
			<th class="w3-center">surname</th>
		</tr> 
		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $result['student_class']; ?></td>
			<td><?php echo $result['student_number']; ?></td>
			<td><?php echo $result['student_id']; ?></td>
			<td><?php echo $result['student_name']; ?></td>
			<td><?php echo $result['student_surname']; ?></td>
		</tr>
		<?php } ?>
		</table>
		<?php
		$sql2 = "select * from student where student_class like '$student_class'";
		$query2 = mysqli_query($conn, $sql2);
		$total_record = mysqli_num_rows($query2);
		$total_page = ceil($total_record / $perpage);
		?>
</div> <!-- /container -->
<br>
<div class="w3-center">
	<div class="w3-bar w3-large">
		<a href="page1.php?page=1" class="w3-hover-green"> &laquo; </a>
		<?php for($i=1;$i<=$total_page;$i++){ ?>
		<a href="page1.php?page=<?php echo $i; ?>" class="w3-hover-green"><?php echo $i; ?></a>
		<?php } ?>
		<a href="page1.php?page=<?php echo $total_page;?>" class="w3-hover-green">&raquo;</a>
	</div>
</div>

</body>
</html>