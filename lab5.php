<?php
echo "Лабораторная работа №5. Функция для разбивки числа.<br>
Николаева Наталья";

function ExplodeString($n)
{
	$NewString="";
	echo "<br>Исходная строка:".$n."<br>";
	//Переворачиваем строку, чтобы было легче разбивать
	$n=strrev($n);
	$len=strlen($n); //длина строки
	for($i=0;$i<$len;$i++)
	{	
		if (($i%3==0) && ($i<>0) )
			$NewString.=",".$n[$i];
		else
			$NewString.=$n[$i];
	}
	//Переворачиваем обратно
	$NewString=strrev($NewString);
	return $NewString;
}
echo "Новая строка ".ExplodeString('12345678');
?>