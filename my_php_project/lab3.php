<div class="container">
	<h1>Обмін валют </h1>
	<br>

<?php
	$currency_a = $_POST['currency_a'] ?? '';
	$currency_b = $_POST['currency_b'] ?? '';
	$amount = $_POST['amount'] ?? '';
	$result = null;
	
	$errors = [];
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		if(is_numeric($currency_a) || is_numeric($currency_b)){
			$errors[] = "Помилка, введіть корректний код валюти";
			
		}elseif(!is_numeric($amount)){
			$errors[] = "Помилка, ви ввели не число.";
			
		}elseif($amount <= 0){
		$errors[] = "Кількість валюти не може бути від'ємною";}
		
	
		//Намагаюсь згадати як використовувати API через індійські туторіали замість swich...case
		//По потребі можу переробити на swich...case
	
		$json = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
	
		if($json === false){
		$errors[] = "Не вдалось отримати відповідт від НБУ";
		} else {
			//перетворюємо json
			$data = json_decode($json, true);
			//використовуємо масив як ключ-значення => код_валюти-курс
			$rates = [];
			foreach($data as $item){
			$rates[$item['cc']] = $item['rate'];}
			
			//довго возився з помилкою, поки не зрозумів, що у НБУ нема гривні...
			//додаємо її тут:
			$rates['UAH'] = 1;
			
			//перевод у верхній регістр, щоб не було помилки
			$code_a = strtoupper($currency_a);
			$code_b = strtoupper($currency_b);
		
			//перевірка на відповідність json списку введеної валюти
			if (isset($rates[$code_a]) && isset($rates[$code_b])){
				//перевод у UAH
				$value_UAH = $amount * $rates[$code_a];
				//переводимо те, що вийшло у валюту
				$result = $value_UAH / $rates[$code_b];
			}else{
			$errors[] = "Не вірний код валюти";}
		}
	}
	?>
	
<form method = "POST">
<lable> "Валюта 1"</lable>
<input type = "text" name = "currency_a" value="<?= htmlspecialchars($currency_a) ?>">
<br><br>

<lable> "Валюта 2"<lable>
<input type = "text" name = "currency_b" value="<?= htmlspecialchars($currency_b) ?>">
<br><br>

<lable> "Кількість"<lable>
<input type = "text" name = "amount" value="<?= htmlspecialchars($amount) ?>">
<br><br>

<button type="submit">Конвертувати</button>
</form>

<?php if ($errors): ?>
<?php foreach ($errors as $e): ?>
<p style="color:red;"><?= htmlspecialchars($e) ?></p>
<?php endforeach; ?>
<?php endif; ?>

<?php if ($result !== null): ?>
	<p>Розрахунок: <?= number_format($result, 2) ?></p>
<?php endif; ?>


			
	