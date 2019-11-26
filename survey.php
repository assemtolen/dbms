<?php
	$social_life_err='';
	$conn = mysqli_connect('109.95.210.8', 'u64302_admin', 'Shelek123', 'u64302_survey');
	$charset = 'utf8';
	if(!mysqli_set_charset($conn, $charset)){
		print("Ошибка кодировки");
	}

	$code = (isset($_GET["code"]) ? $_GET["code"] : '');
	$row_query = 'SELECT `speciality_name`,`info_id` FROM info1 where uni_index = '.$code.' GROUP BY `speciality_name`';
	$row_result = mysqli_query($conn,$row_query);
	
	$options ='';
	if ($row_result) {
		while ($row = mysqli_fetch_array($row_result)) {
			$options = $options.'<option value='.$row[1].'>'.$row[0].'</option>';
		}	
	}
	$social_life = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["social_life"])) {
	    $social_life_err = "social_life is required";
	  } else {
	    $social_life = test_input($_POST["social_life"]);
	  }
 	}
	// if(isset($_POST['submit'])){
	// 	$university_name = 'SELECT DISTINCT university FROM info where code ='.$_POST['specialty'];
	// 	$uni_result = mysqli_query($conn, $university_name);
	// 	$university_name =mysqli_fetch_assoc($uni_result);
	// 	$q = "INSERT INTO survey1 ( university, specialty, social_life, study_load, exchange, work_by_profession) VALUES ('".$university_name['university']."', '',1,1,1,1)";
	// 	$result = mysqli_query($conn,$q) or die (mysqli_error ($conn));
		
	// }
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>survey</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="end.php" method="post">
	<div class="select_cont">
		<select class="custom-select d-block w-100" required="" name='specialty'>
        	<?php echo $options; ?>
    	</select>
    	<h5 style="color: white;">Какая социальная жизнь? (клубы, концерты, праздники)</h5>
    	<div class="radio_bttn">
	    	<label class="radio">
	    		<input type="radio" name="social_life" <?php if (isset($social_life) && $social_life=="1") echo "checked";?> value="1" required>плохо
	    		<span></span>
	    	</label>
	    	<label class="radio">
		    	<input type="radio" name="social_life" <?php if (isset($social_life) && $social_life=="2") echo "checked";?> value="2">хорошо
		    	<span></span>
		    </label>
		    <label class="radio">
		    	<input type="radio" name="social_life" <?php if (isset($social_life) && $social_life=="3") echo "checked";?> value="3">отлично
		    	<span></span>
		    </label>
		    <span class="error"><?php echo $social_life_err;?></span>
	    </div>
	    <h5 style="color: white;">На сколько сложно учиться на вашей специальности?</h5>
	    <div class="radio_bttn">
	    	<label class="radio">
	    		<input type="radio" name="study_load" <?php if (isset($study_load) && $study_load=="1") echo "checked";?> value="1" required>1
	    		<span></span>
	    	</label>
	    	<label class="radio">
		    	<input type="radio" name="study_load" <?php if (isset($study_load) && $study_load=="2") echo "checked";?> value="2">2
		    	<span></span>
	    	</label>
	    	<label class="radio">	    	
		    	<input type="radio" name="study_load" <?php if (isset($study_load) && $study_load=="3") echo "checked";?> value="3">3
		    	<span></span>
	    	</label>
	    	<label class="radio">	    	
		    	<input type="radio" name="study_load" <?php if (isset($study_load) && $study_load=="4") echo "checked";?> value="4">4
		    	<span></span>
		    </label>
		    <label class="radio">	    	
		    	<input type="radio" name="study_load" <?php if (isset($study_load) && $study_load=="5") echo "checked";?> value="5">5
		    	<span></span>
		    </label>
	    </div>
	    <h5 style="color: white;">Есть ли программа обмена студентами (exchange)?</h5>
	    <div class="radio_bttn">
	    	<label class="radio">
		    	<input type="radio" name="exchange" <?php if (isset($exchange) && $exchange=="1") echo "checked";?> value="1" required>есть
		    	<span></span>
	    	</label>
	    	<label class="radio">
	    		<input type="radio" name="exchange" <?php if (isset($exchange) && $exchange=="0") echo "checked";?> value="2">нет
	    		<span></span>
	    	</label>	
	    </div>
	    <h5 style="color: white;">Есть ли в университете оборудованные лаборатории/специализированные помещения?</h5>
	    <div class="radio_bttn">
	    	<label class="radio">
	    		<input type="radio" name="equipped_laboratories" <?php if (isset($equipped_laboratories) && $equipped_laboratories=="1") echo "checked";?> value="1" required>есть
	    		<span></span>
	    	</label>
	    	<label class="radio">
	    		<input type="radio" name="equipped_laboratories" <?php if (isset($equipped_laboratories) && $equipped_laboratories=="0") echo "checked";?> value="0">нет
	    		<span></span>
	    	</label>
	    </div>
	    <h5 style="color: white;">Язык обучения?</h5>
	    <div class="radio_bttn">
	    	<label class="radio">
	    		<input type="radio" name="education_lang" <?php if (isset($education_lang) && $education_lang=="1") echo "checked";?> value="1" required>казахский
	    		<span></span>
	    	</label>
	    	<label class="radio">
	    		<input type="radio" name="education_lang" <?php if (isset($education_lang) && $education_lang=="2") echo "checked";?> value="2">русский
	    		<span></span>
	    	</label>
	    	<label class="radio">
	    		<input type="radio" name="education_lang" <?php if (isset($education_lang) && $education_lang=="3") echo "checked";?> value="3">английский
	    		<span></span>
	    	</label>
	    </div>
	    <h5 style="color: white;">Работаете ли вы по профессии?</h5>
	    <div class="radio_bttn">
	    	<label class="radio">
	    		<input type="radio" name="work_by_profession" <?php if (isset($work_by_profession) && $work_by_profession=="1") echo "checked";?> value="1" required>работаю
	    		<span></span>
	    	</label>
	    	<label class="radio">
	    		<input type="radio" name="work_by_profession" <?php if (isset($work_by_profession) && $work_by_profession=="0") echo "checked";?> value="0">не работаю
	    		<span></span>
	    	</label>
	    </div>
	    <div class="div_sub"><input  type="submit" name="submit" class="submit"></input></div>

	</div>
</form>
</body>
</html>
