<?php
echo "Лабораторная работа №2. Обратная польская запись.";

function PNotation($str_in) 
{
	$stack = array(); //Стэк
	$res = 0;  //Результат вычисления 
	for($i = 0; $i<strlen($str_in);$i++) 
	{
		//Проверяем является ли символ числом, если да - складываем в стэк
		if(is_Numeric($str_in[$i])) 		  
			array_push($stack,$str_in[$i]);		
		else 
		{
			//Проверяем является ли символ пробелом, если да - пропускаем
			if(trim($str_in[$i]))
			{
				$n2 = array_pop($stack); 
				$n1 = array_pop($stack);
				switch($str_in[$i]) 
				{
					case '+': $res = $n1 + $n2; break;
					case '-': $res = $n1 - $n2; break;
					case '/': $res = $n1 / $n2; break;
					case '*': $res = $n1 * $n2; break;
				default: echo "Ошибка!<br>";
				}	
			array_push($stack,$res);
			}
		}
	}
	return array_pop($stack);
}

$str = '4 5 2 * +';
$result = PNotation($str);
echo "<br>Входная строка: ".$str;
echo "<br>Результат вычисления: ".$result;
?>