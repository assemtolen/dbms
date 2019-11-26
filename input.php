<?php
$conn = mysqli_connect('109.95.210.8', 'u64302_admin', 'Shelek123', 'u64302_survey');

#$query = "SELECT * FROM `info`";
$charset = 'utf8';
if(!mysqli_set_charset($conn, $charset)){
	print("Ошибка кодировки");
}
#$result1 = mysqli_query($conn, $query);
$options = "";

$row_query = 'SELECT DISTINCT university, uni_index FROM info1';
$row_result = mysqli_query($conn,$row_query);
while ($row = mysqli_fetch_array($row_result)) {
	$options = $options.'<option value = '.$row[1].' style ="width:80%;">'.$row[0].'</option>';
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>survey</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script>
		
	</script>
</head>
<body>
	<div class="select_cont" id='select_cont'>
	<form action="survey.php" method="GET">
		<select class="custom-select d-block w-100" required="" name='code' class="chosen">
        	<div class="div_option"><?php echo $options; ?></div>
    	</select>
    	<div class="div_sub"><input  type="submit" name="submit" class="submit"></input></div>
    </form>
    </div>

</body>

</html>
