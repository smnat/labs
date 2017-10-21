<?php
echo "Лабораторная работа №3. Заполнение массива по спирали.";
//по умолчанию установлена кодировка cp1251, чтобы была возможность добавить строку с русскими буквами

function ArraySpiral($array,$size)
{
	echo "<br><b>Исходная строка: </b>".$array;
	$size=5; //длина стороны
	$curl=round($size/2); //количество витков
	$s=0; 

	for ($i=1; $i<=$curl; $i++)
	{
		//Заполняем верхнюю строку
		for ($row=$i; $row<=$size-$i+1; $row++)
		{
			if ($array[$s])
			{
				$table[$i][$row]=$array[$s];
				$s++;
			}
			else {$table[$i][$row]=" ";}
			
		}
		//Заполняем правый столбец
		for ($column=$i+1; $column<=$size-$i+1; $column++)
		{	
			if ($array[$s])
			{
				$table[$column][$size-$i+1]=$array[$s];
				$s++;
			}
			else {$table[$column][$size-$i+1] = " ";}
		}
		//Заполняем нижнюю строку
		for ($row=$size-$i; $row>=$i; $row--)
		{
			if ($array[$s])
			{
				$table[$size-$i+1][$row]=$array[$s];
				$s++;
			}
			else {$table[$size-$i+1][$row]=" ";}
		}
		//Заполняем левый столбец
		for ($column=$size-$i; $column>=$i+1; $column--)
		{	
			if ($array[$s])
			{
				$table[$column][$i]=$array[$s];
				$s++;
			}
			else {$table[$column][$i]=" ";}
		}	
	}

	//Вывод на экран
	echo "<html>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=windows-1251' />
			</head>
			<body>
				<table>";

	for ($row=1; $row<=$size; $row++)
	{
		echo "<tr>";
		for ($cell=1; $cell<=$size; $cell++) 
			echo "<td>".$table[$row][$cell]."</td>";
		echo "</tr>";
	}
	echo "		</table>
			</body>
		  </html>";
 }
 
ArraySpiral('Пример строки для заполнения',5);
?>