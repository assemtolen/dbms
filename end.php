<?php
	$conn = mysqli_connect('109.95.210.8', 'u64302_admin', 'Shelek123', 'u64302_survey');
	$charset = 'utf8';
	if(!mysqli_set_charset($conn, $charset)){
		print("Ошибка кодировки");
	}

	$query = 'SELECT * FROM info2 where info_id ='.$_POST['specialty'];
	$query_result = mysqli_query($conn, $query);
	$all = mysqli_fetch_assoc($query_result);
	$q = (isset($_POST["specialty"]) ? $_POST["specialty"] : '');
	$q = "INSERT INTO survey1 (`university`, `specialty`, `social_life`, `study_load`, `exchange`, `equipped_laboratories`, `education_lang`, `work_by_profession`) VALUES ('".$all['university']."', '".$all['specialty']."',".$_POST['social_life'].",".$_POST['study_load'].",".$_POST['exchange'].",".$_POST['equipped_laboratories'].",".$_POST['work_by_profession'].",".$_POST['work_by_profession'].")";
	$result = mysqli_query($conn,$q) or die (mysqli_error ($conn));

?>
<!DOCTYPE html>
<html>
<head>
	<title>end</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body style="background: #3C3C3C">
	<div style="text-align: center; color: #ffc103; font-size: 20px; margin-top: 40px;">СПАСИБО ЗА ОТВЕТЫ :D</div>

</body>
</html>
