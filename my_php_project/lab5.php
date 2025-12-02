<?php
	
	$numbers = [];
	$limit = 10;
	
	echo "Лабороторна робота №5\n";
	echo "Введіть $limit унікальних чисел\n";
	
	while (count($numbers) < $limit){
		echo "Введіть число: ";
		$step = count($numbers) +1;
		
		$input = trim(readline());
		$input = (int)$input;
		
		echo "Ви ввели $step чисел\n";
		
		If(!is_numeric($input)){
			echo "Ви ввели не число\n";
		}
		
		if(in_array($input, $numbers)){
			echo "Число $input вже є у списку\n";
		}else{
			$numbers[] = $input;
		}
	}
	echo "Ви ввели: [" . implode(", ", $numbers) . "]\n";
	
	$min_val = min($numbers);
	$max_val = max($numbers);
	$sum_val = array_sum($numbers);
	$avrg_val = $sum_val / count($numbers);
	
	echo "Мінімальне: $min_val\n";
	echo "Максимальне: $max_val\n";
	echo "Сума: $sum_val\n";
	echo "Середнє арифметичне: $avrg_val\n";
	
	sort($numbers);
	
	echo "Відсортований масив: [". implode(", ", $numbers) ."]";
?>
	
	
	