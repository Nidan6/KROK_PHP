<?php
	$a = '';
	$b = '';
	
?>	

<html>
<body>
	<form method="POST" action=''>
		<label for='a'>Сторона а:</label>
		<input type='text' id='a' name='a' value="<?php echo htmlspecialchars($a); ?>">
		
		<br><br>
		
		<label for='b'>Сторона b:</label>
		<input type='text' id='b' name='b' value="<?php echo htmlspecialchars($b); ?>">
		
		<br><br>
		
		<button type="submit" name="calculate" style="padding: 15px 30px"> Обчислити </button>
	</form>

	<?php
		
		$a = $_POST['a'];
		$b = $_POST['b'];
		
		if (is_numeric($a) && is_numeric($b)){
			echo "a = $a <br/> b = $b";
	
			echo "<br/> Периметр: ". (($a * 2) + ($b * 2));
			echo "<br/> Площа: ". ($a * $b);
	}
	?>

</body>
</html>
	