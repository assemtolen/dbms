<?php
$conn = mysqli_connect('109.95.210.8', 'u64302_admin', 'Shelek123', 'u64302_survey');

#$query = "SELECT * FROM `info`";
$charset = 'utf8';
if(!mysqli_set_charset($conn, $charset)){
	print("Ошибка кодировки");
}
#$result1 = mysqli_query($conn, $query);
$options = "";

$row_query = 'SELECT DISTINCT university, uni_index FROM info2';
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
	
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
 <link rel="stylesheet" href="./survey_files/style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
 <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
	<div class="select_cont" id='select_cont'>
	<p style="color: white; font-size: 24px; font-style: normal;text-align: center;">В каком вузе учились/учитесь?</p>
	<br>
	<form action="survey.php" method="GET">
		<select class="custom-select" required="" name='code' required>
        	<div class="div_option"><?php echo $options; ?></div>
    	</select>
    	<div class="div_sub"><button  type="submit" name="submit" class="submit">отправить</button></div>
    </form>
    </div>

</body>
<script type="text/javascript">
new SlimSelect({
  select: '.custom-select'
}) 
</script>
</html>
