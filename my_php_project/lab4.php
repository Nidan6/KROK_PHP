<?php

echo "введіть число N \n";
$n = readline();

if(!is_numeric($n)){
	echo "Ви ввели не число\n";
}

$n = (int)$n;
$sum_even = 0;

echo "Парні числа:";

for ($i = 0; $i <= $n; $i++){ //$i = 0, бо 0 є парним числом
	if ($i % 2 == 0){
		echo $i.", ";
		$sum_even += $i;
	}
}
echo "Сума парних чисел: $sum_even \n";

$sum_uneven = 0;
echo "Непарні числа: ";

$j = 0;

while($j <= $n){
	if ($j % 2 != 0){
		echo $j.", ";
		$sum_uneven += $j;
	}
	$j++;	
}
echo "Сума непраних чисел: $sum_uneven";


